<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BPromotionController extends Controller
{
    // Menampilkan halaman daftar promotion
    public function index()
    {
        $promotions = Promotion::all();
        return view('backoffice.promotions.index', compact('promotions'));
    }

    // Menampilkan halaman form untuk membuat promotion
    public function create()
    {
        return view('backoffice.promotions.create');
    }

    // Menyimpan promotion baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'promotion_type' => 'required|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'turnover' => 'nullable|numeric',
            'total_turnover' => 'nullable|numeric',
            'minimum_deposit' => 'nullable|numeric',
            'maximum_deposit' => 'nullable|numeric',
            'minimum_withdraw' => 'nullable|numeric',
            'maximum_withdraw' => 'nullable|numeric',
            'claim_type' => 'nullable|string',
            'status' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        // Proses upload banner jika ada
        $bannerPath = null;
        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('promotions', 'public');
        }

        // Menyimpan data promotion
        Promotion::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active ?? true,
            'turnover' => $request->turnover,
            'total_turnover' => $request->total_turnover,
            'minimum_deposit' => $request->minimum_deposit,
            'maximum_deposit' => $request->maximum_deposit,
            'minimum_withdraw' => $request->minimum_withdraw,
            'maximum_withdraw' => $request->maximum_withdraw,
            'claim_type' => $request->claim_type ?? 'manual',
            'status' => $request->status ?? true,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'promotion_type' => $request->promotion_type,
            'banner' => $bannerPath,
        ]);

        return redirect()->route('system.promotions.index')->with('success', 'Promotion created successfully!');
    }

    // Menampilkan halaman form edit promotion
    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return response()->json($promotion);
    }

    // Mengupdate promotion
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'promotion_type' => 'required|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'turnover' => 'nullable|numeric',
            'total_turnover' => 'nullable|numeric',
            'minimum_deposit' => 'nullable|numeric',
            'maximum_deposit' => 'nullable|numeric',
            'minimum_withdraw' => 'nullable|numeric',
            'maximum_withdraw' => 'nullable|numeric',
            'claim_type' => 'nullable|string',
            'status' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        // Mencari promotion berdasarkan ID
        $promotion = Promotion::findOrFail($id);

        // Proses upload banner jika ada
        if ($request->hasFile('banner')) {
            // Hapus file banner lama dari storage
            if ($promotion->banner) {
                Storage::disk('public')->delete($promotion->banner);
            }

            // Simpan banner baru
            $bannerPath = $request->file('banner')->store('promotions', 'public');
            $promotion->banner = $bannerPath;
        }

        // Mengupdate data promotion
        $promotion->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active ?? true,
            'turnover' => $request->turnover,
            'total_turnover' => $request->total_turnover,
            'minimum_deposit' => $request->minimum_deposit,
            'maximum_deposit' => $request->maximum_deposit,
            'minimum_withdraw' => $request->minimum_withdraw,
            'maximum_withdraw' => $request->maximum_withdraw,
            'claim_type' => $request->claim_type ?? 'manual',
            'status' => $request->status ?? true,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'promotion_type' => $request->promotion_type,
        ]);

        return redirect()->route('system.promotions.index')->with('success', 'Promotion updated successfully!');
    }

    // Menampilkan detail promotion
    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('backoffice.promotions.show', compact('promotion'));
    }

    // Menghapus promotion
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        
        // Hapus banner jika ada
        if ($promotion->banner) {
            Storage::disk('public')->delete($promotion->banner);
        }

        $promotion->delete(); // Menghapus promotion

        return redirect()->route('system.promotions.index')->with('success', 'Promotion deleted successfully!');
    }
}
