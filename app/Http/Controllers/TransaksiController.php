<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Customer;
use App\Models\Obat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
   public function index(Request $request)
{
    $query = Transaksi::with(['customer', 'obat']);

    if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
        $query->whereBetween('tanggal_transaksi', [
            $request->tanggal_awal,
            $request->tanggal_akhir
        ]);
    }

    $transaksis = $query->get();

    return view('transaksi.index', compact('transaksis'));
}


    public function create()
    {
        $customers = Customer::all();
        $obats     = Obat::all();
        return view('transaksi.create', compact('customers', 'obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'obat_id'     => 'required|exists:obats,id',
            'jumlah'      => 'required|integer|min:1',
        ]);

        $obat = Obat::findOrFail($request->obat_id);
        $total = $obat->harga * $request->jumlah;

        Transaksi::create([
            'customer_id'      => $request->customer_id,
            'obat_id'          => $request->obat_id,
            'jumlah'           => $request->jumlah,
            'total_harga'      => $total,
            // 'tanggal_transaksi' otomatis oleh default timestamp
        ]);

        return redirect()->route('transaksi.index')
                         ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit(Transaksi $transaksi)
    {
        $customers = Customer::all();
        $obats     = Obat::all();
        return view('transaksi.edit', compact('transaksi', 'customers', 'obats'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'obat_id'     => 'required|exists:obats,id',
            'jumlah'      => 'required|integer|min:1',
        ]);

        $obat = Obat::findOrFail($request->obat_id);
        $total = $obat->harga * $request->jumlah;

        $transaksi->update([
            'customer_id' => $request->customer_id,
            'obat_id'     => $request->obat_id,
            'jumlah'      => $request->jumlah,
            'total_harga' => $total,
        ]);

        return redirect()->route('transaksi.index')
                         ->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')
                         ->with('success', 'Transaksi berhasil dihapus.');
    }

    public function cetakPDF()
    {
        $transaksis = Transaksi::with(['customer', 'obat'])->get();

        $pdf = Pdf::loadView('transaksi.cetak', compact('transaksis'));
        return $pdf->download('laporan-transaksi.pdf');
    }
}
