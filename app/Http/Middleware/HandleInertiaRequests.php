<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Configurations\LanguageController;
use App\Http\Controllers\Configurations\LanguageDictionaryController;
use App\Http\Resources\SystemSettingResource;
use App\Models\Language;
use App\Models\SystemSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed[]
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'flash' => [
                'message' => fn () => $request->session()->get('message'),
                'type' => fn () => $request->session()->get('type'),
                'flash_id' => fn () => $request->session()->get('flash_id'),
                'flash_column' => fn () => $request->session()->get('flash_column'),
                'close_modal' => fn () => $request->session()->get('close_modal'),
            ],
            'lang' => $request->lang,
            'dir' => Language::whereAbbr($request->lang)->first()?->direction,
            'translations' => LanguageDictionaryController::returnAllWords($request->lang),
            'all_languages' => LanguageController::getAllLanguages(),
            'system_setting' => cache()->remember('system_settings', 60 * 60 * 24, function (){
                return new SystemSettingResource(SystemSetting::query()->first());
            })
        ]);
    }
}
