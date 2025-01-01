<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class BGeneralSettingController extends Controller
{
    /**
     * Tampilkan halaman pengaturan.
     */
    public function index()
    {
        // Ambil data pengaturan dari database
        $settings = GeneralSetting::first();
        
        // Jika belum ada data pengaturan, buat data baru
        if (!$settings) {
            $settings = GeneralSetting::create([
                'site_maintenance' => false,
                'meta_keywords' => '',
                'meta_author' => '',
                'live_chat_link' => '',
                'live_chat_script' => '',
            ]);
        }

        // Kirim data ke halaman view
        return view('backoffice.general_settings.index', compact('settings'));
    }

    /**
     * Simpan atau perbarui pengaturan.
     */
    public function update(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'agent_code' => 'nullable|string|max:255',
            'agent_token' => 'nullable|string|max:255',
            'agent_signature' => 'nullable|string|max:255',
            'site_maintenance' => 'required|boolean',
            'site_title' => 'nullable|string|max:255',
            'site_description' => 'nullable|string',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'site_favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'social_facebook' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'social_linkedin' => 'nullable|url',
            'social_telegram' => 'nullable|url',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_author' => 'nullable|string|max:255',
            'live_chat_link' => 'nullable|url',
            'live_chat_script' => 'nullable|string',
        ]);

        // Cek jika ada file gambar logo dan favicon, lalu upload
        if ($request->hasFile('site_logo')) {
            // Simpan gambar logo di public storage dan ambil path relatifnya
            $validatedData['site_logo'] = $request->file('site_logo')->store('logos', 'public');
            // Simpan URL untuk akses langsung ke file
            $validatedData['site_logo_url'] = asset('storage/' . $validatedData['site_logo']);
        }

        if ($request->hasFile('site_favicon')) {
            // Simpan favicon di public storage dan ambil path relatifnya
            $validatedData['site_favicon'] = $request->file('site_favicon')->store('favicons', 'public');
            // Simpan URL untuk akses langsung ke file
            $validatedData['site_favicon_url'] = asset('storage/' . $validatedData['site_favicon']);
        }

        // Ambil data pengaturan pertama atau buat baru jika tidak ada
        $settings = GeneralSetting::first() ?? new GeneralSetting();

        // Perbarui data pengaturan
        $settings->fill($validatedData);
        $settings->save();

        // Kembali ke halaman pengaturan dengan pesan sukses
        return redirect()->route('system.settings.index')->with('success', 'Settings updated successfully.');
    }
}
