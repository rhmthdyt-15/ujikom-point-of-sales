<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index ()
    {
        $setting = Setting::first();

        return view('pages.setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->nama_perusahaan = $request->nama_perusahaan;
        $setting->telepon = $request->telepon;
        $setting->alamat = $request->alamat;
        $setting->diskon = $request->diskon;

        $setting->update();

        // return response()->json('Data berhasil disimpan', 200);
        return redirect()->route('setting.index')->with(['success' => 'Data Berhasil diupadate']);
    }
}
