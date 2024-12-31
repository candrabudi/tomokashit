<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner; // Import the Banner model
use Illuminate\Support\Facades\Storage;

class BBannerController extends Controller
{
    // Show banners list
    public function index()
    {
        $banners = Banner::all();
        return view('backoffice.banners.index', compact('banners'));
    }

    // Store new banner
    public function store(Request $request)
    {
        $request->validate([
            'banner_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'url_redirect' => 'nullable|string|max:255',
            'banner_status' => 'required|in:enable,disable'
        ]);

        $imagePath = $request->file('image')->store('banners', 'public');

        Banner::create([
            'banner_name' => $request->banner_name,
            'image' => asset('storage/'.$imagePath),
            'url_redirect' => $request->url_redirect,
            'banner_status' => $request->banner_status,
        ]);

        return redirect()->route('system.banners.index')->with('success', 'Banner added successfully');
    }

    // Update an existing banner
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'banner_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'url_redirect' => 'nullable|string|max:255',
            'banner_status' => 'required|in:aktif,nonaktif'
        ]);

        if ($request->hasFile('image')) {
            // Storage::disk('public')->delete($banner->image);
            $imagePath = asset('storage/'.$request->file('image')->store('banners', 'public'));
            $banner->image = $imagePath;
        }

        $banner->update([
            'banner_name' => $request->banner_name,
            'url_redirect' => $request->url_redirect,
            'banner_status' => $request->banner_status,
        ]);

        return redirect()->route('system.banners.index')->with('success', 'Banner updated successfully');
    }

    // Delete banner
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        // Storage::disk('public')->delete($banner->image);
        $banner->delete();

        return redirect()->route('system.banners.index')->with('success', 'Banner deleted successfully');
    }
}
