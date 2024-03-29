<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PermissionsController extends Controller
{

    public function checkPermission(){
        if(auth()->id() !=1){
            abort(403);
        }
    }

    public function runBackup(){
        Artisan::call('generate:seeders');
    }

    public function index(){
        $this->checkPermission();
        return Inertia::render('UserManagement/Permissions/PermissionIndex', [
            'active' => 'permission',
            'permissions' => PermissionGroup::query()
                ->where('permission_group_id', 0)
                ->with('permissionGroup.permissions')
                ->with('permissions')
                ->orderBy('sort')
                ->get()
        ]);
    }
    public function store(Request $request){
        $this->checkPermission();
        $data = $request->validate([
            'name' => ['required', function($field, $value, $error) use ($request){
                if(
                    PermissionGroup::query()
                        ->where('name', $value)
                        ->where('permission_group_id', $request->get('permission_group_id'))
                        ->exists()
                ) $error('This name already exists');
            }],
            'permission_group_id' => 'sometimes',
        ]);
        $max_sort = PermissionGroup::query()->where('permission_group_id', $data['permission_group_id'])->max('sort');
        if(PermissionGroup::query()->where('permission_group_id', $data['permission_group_id'])->count() > 0){
            $max_sort = $max_sort+1;
        }else{
            $max_sort = $max_sort > 0 ? $max_sort+1:$max_sort;
        }
        $data['sort'] = $max_sort == null?0:$max_sort;
        PermissionGroup::create($data);
        dispatch(function(){
            $this->runBackup();
        });
        return back()->with(['message'=>translate('Group created successfully'), 'type'=>'success']);
    }
    public function destroy($lang, $permissionGroup){
        $this->checkPermission();
        $permissionGroup = PermissionGroup::query()->findOrFail($permissionGroup);
        if($permissionGroup->permissionGroup->count() > 0 || $permissionGroup->permissions->count() > 0){
            return back()->with(['message'=>translate('Group cannot be deleted because child groups exists'), 'type'=>'error']);
        }
        $permissionGroup->delete();
        dispatch(function(){
            $this->runBackup();
        });
        return back()->with(['message'=>translate('Group deleted successfully')]);
    }

    public function update($lang, $permissionGroup, Request $request){
        $this->checkPermission();
        $data = $request->validate([
            'name' => 'required',
        ]);
        PermissionGroup::findOrFail($permissionGroup)->update($data);
        dispatch(function(){
            $this->runBackup();
        });
        return back()->with(['message'=>translate('Group updated successfully'), 'type' => 'success']);
    }

    public function savePermission(Request $request){
        $this->checkPermission();
        $data = $request->validate([
            'name' => ['required', function($field, $value, $error) use ($request){
                if(
                    Permission::query()->where('name', $value)
                        ->where('permission_group_id', $request->get('permission_group_id'))
                        ->exists()
                ) $error('Name already exists');
            }],
            'permission_group_id' =>'required',
        ]);
        $category = PermissionGroup::findOrFail($data['permission_group_id']);
        $data['key'] = Str::slug($category->name.'-'.$data['name']);
        Permission::create($data);
        dispatch(function(){
            $this->runBackup();
        });
        return back()->with(['message'=>translate('Permission created successfully'), 'type' => 'success']);
    }

    public function deletePermission($lang, Permission $permission){
        $this->checkPermission();
        if(RolePermission::query()->where('permission_id', $permission->id)->exists()){
            return back()->with(['message'=>translate('This permission cannot be deleted because its attached to some roles'), 'type'=> 'error']);
        }else{
            $permission->delete();
            dispatch(function(){
                $this->runBackup();
            });
            return back()->with(['message'=>translate('Permission created successfully'), 'type' => 'success']);
        }
    }
    public function updatePermissionSort($lang, Request $request){
        /*dd([
            'parent' => (int)$request->get('parent_id'),
            'removedIndex' => (int)$request->get('removedIndex'),
            'addedIndex' => (int)$request->get('addedIndex'),

        ]);*/
        /*dd(PermissionGroup::query()
            ->where('permission_group_id', (int)$request->get('parent_id'))
            ->where('sort', (int)$request->get('addedIndex'))->get());*/
        /*dd([
            'first' =>  PermissionGroup::query()
                ->where('permission_group_id', $request->get('parent_id'))
                ->where('sort', (int)$request->get('removedIndex'))->first(),
            'second' => PermissionGroup::query()
                ->where('permission_group_id', $request->get('parent_id'))
                ->where('sort', (int)$request->get('addedIndex'))->first(),
            'parent' => (int)$request->get('parent_id'),
            'removedIndex' => (int)$request->get('removedIndex'),
            'addedIndex' => (int)$request->get('addedIndex'),
        ]);*/
        /*dd(PermissionGroup::query()
            ->where('permission_group_id', $request->get('parent_id'))
            ->where('sort', (int)$request->get('addedIndex'))->first());*/
        $first = PermissionGroup::query()
            ->where('permission_group_id', $request->get('parent_id'))
            ->where('sort', (int)$request->get('addedIndex'))
            ->first();
        $second = PermissionGroup::query()
            ->where('permission_group_id', $request->get('parent_id'))
            ->where('sort', (int)$request->get('removedIndex'))
            ->first();
        $first->update([
            'sort' => (int)$request->get('removedIndex')
        ]);
        $second->update([
            'sort' => (int)$request->get('addedIndex')
        ]);
        dispatch(function(){
            $this->runBackup();
        });
        return back()->with(['message' => translate('Sort updated'), 'type' => 'success']);
    }
}
