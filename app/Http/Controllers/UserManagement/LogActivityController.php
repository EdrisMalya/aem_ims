<?php

namespace App\Http\Controllers\UserManagement;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Spatie\Activitylog\Models\Activity;

class LogActivityController extends Controller
{
    public function index($lang, Request $request)
    {
        $this->allowed('log-activity-access');
        $logs = Activity::query()->with('causer');
        $selected_users = [];
        if($request->has('users')){
            $selected_users = $request->get('users');
            $ids = collect($selected_users)->map(fn($item)=>isset($item['value'])?$item['value']:null)->toArray();
            $logs = $logs->whereIn('causer_id', $ids);
        }
        if($request->has('date')){
            $logs = $logs->whereDate('created_at', $request->get('date'));
        }
        $datatable = new DatatableBuilder($logs, $request, ['description', 'subject_type', 'log_name']);
        return Inertia::render('UserManagement/LogActivities/LogActivitiesIndex', [
            'active' => 'log_activities',
            'activities' => $datatable->build(),
            'users' => User::query()->get(),
            'filtered_users' => $selected_users,
            'filter_date' => $request->get('date')
        ]);
    }

    public function restore(Request $request){
        $model = $request->get('data')['subject_type'];
        $deleted_data = $request->get('data')['properties']['old'];
        unset($deleted_data['created_at']);
        unset($deleted_data['updated_at']);
        try {
            $model::create($deleted_data);
        }catch (\Exception $exception){
            Log::error($exception);
            return back()->with(['message' => translate('This record is already restored'), 'type' => 'error']);
        }
        return back()->with(['message' => translate('Restore successfully'), 'type' => 'success']);
    }

    public function deleteLogActivity($lang, Activity $activity){
        $this->allowed('log-activity-delete-log');
        $activity->delete();
        return back()->with(['message' => translate('Deleted successfully'), 'type'=>'success']);
    }

}
