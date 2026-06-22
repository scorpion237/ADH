<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
         $defaults = [
        ['key' => 'site_title',       'value' => 'ONG ADH', 'group' => 'general'],
        ['key' => 'donation_url',     'value' => '#faire-un-don-modal', 'group' => 'general'],
        ['key' => 'site_description', 'value' => '', 'group' => 'seo'],
        ['key' => 'google_analytics', 'value' => '', 'group' => 'analytics'],
        ['key' => 'contact_email',    'value' => '', 'group' => 'contact'],
        ['key' => 'contact_phone',    'value' => '', 'group' => 'contact'],
        ['key' => 'contact_address',  'value' => '', 'group' => 'contact'],
        ['key' => 'facebook_url',     'value' => '', 'group' => 'contact'],
        ['key' => 'twitter_url',      'value' => '', 'group' => 'contact'],
        ['key' => 'linkedin_url',     'value' => '', 'group' => 'contact'],
        ['key' => 'whatsapp_number',  'value' => '', 'group' => 'contact'],
    ];

    foreach ($defaults as $default) {
        \App\Models\Setting::firstOrCreate(
            ['key' => $default['key']],
            $default
        );
    }
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');
        
        foreach ($data as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Paramètres mis à jour avec succès !');
    }
}
