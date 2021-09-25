<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function edit(Setting $setting)
    {
        $settings = Setting::where('id', 1)->get();

        return view('admin.settings.edit', compact(['settings']));
    }

    public function update(Request $request, Setting $setting)
    {
        $data = $request->validate([
            'form_status'   => 'required',
            'from'          => 'required_if:form_status,1|date',
            'to'            => 'required_if:form_status,1|date'
        ]);

        $setting->update($data);

        return redirect()->route('settings.index')
        ->with('success', ' تم ضبط وقت التسجيل من ' . $request->from . ' الى ' . $request->to);
    }

}
