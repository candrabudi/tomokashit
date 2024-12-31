<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BPaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::get();
        return view('backoffice.payment_method.index', compact('paymentMethods'));
    }

    // Menampilkan form untuk menambah metode pembayaran
    public function create()
    {
        return view('payment_methods.create');
    }

    // Menyimpan metode pembayaran baru
    public function store(Request $request)
    {
        $request->validate([
            'payment_code' => 'required|string|max:255',
            'payment_name' => 'required|string|max:255',
            'payment_type' => 'required|in:bank,ewallet,qris',
            'payment_status' => 'required|boolean',
            'payment_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Menangani file gambar jika ada
        if ($request->hasFile('payment_image')) {
            $imagePath = $request->file('payment_image')->store('payment_images', 'public');
        } else {
            $imagePath = null;
        }

        PaymentMethod::create([
            'payment_code' => $request->payment_code,
            'payment_name' => $request->payment_name,
            'payment_type' => $request->payment_type,
            'payment_status' => $request->payment_status,
            'payment_image' => $imagePath,
        ]);

        return redirect()->route('system.payment.method')->with('success', 'Metode Pembayaran berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit metode pembayaran
    public function edit($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('payment_methods.edit', compact('paymentMethod'));
    }

    // Memperbarui data metode pembayaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'payment_code' => 'required|string|max:255',
            'payment_name' => 'required|string|max:255',
            'payment_type' => 'required|in:bank,ewallet,qris',
            'payment_status' => 'required|boolean',
            'payment_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $paymentMethod = PaymentMethod::findOrFail($id);

        // Menangani file gambar jika ada
        if ($request->hasFile('payment_image')) {
            // Hapus gambar lama jika ada
            if ($paymentMethod->payment_image) {
                Storage::disk('public')->delete($paymentMethod->payment_image);
            }

            $imagePath = $request->file('payment_image')->store('payment_images', 'public');
        } else {
            $imagePath = $paymentMethod->payment_image;
        }

        $paymentMethod->update([
            'payment_code' => $request->payment_code,
            'payment_name' => $request->payment_name,
            'payment_type' => $request->payment_type,
            'payment_status' => $request->payment_status,
            'payment_image' => $imagePath,
        ]);

        return redirect()->route('system.payment.method')->with('success', 'Metode Pembayaran berhasil diperbarui!');
    }

    // Menghapus metode pembayaran
    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);

        // Hapus gambar jika ada
        if ($paymentMethod->payment_image) {
            Storage::disk('public')->delete($paymentMethod->payment_image);
        }

        $paymentMethod->delete();

        return redirect()->route('system.payment.method')->with('success', 'Metode Pembayaran berhasil dihapus!');
    }
}
