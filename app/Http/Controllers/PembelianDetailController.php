<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PembelianDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : \Illuminate\View\View
    {
        $id_pembelian = session('id_pembelian');
        $supplier = Supplier::find(session('id_supplier'));
    
        if (!$supplier) {
            abort(404);
        }
    
        // $pembelianDetail = PembelianDetail::all();
        $detail = PembelianDetail::with('produk')
            ->where('id_pembelian', $id_pembelian)
            ->get();
        $data = array();
        $total = 0;
        $total_item = 0;
        foreach ($detail as $item) {
            $total += $item->harga_beli * $item->jumlah;
            $total_item += $item->jumlah;
        }

        $diskon = Pembelian::find('id_pembelian')->diskon ?? 0;

        $produk = Produk::join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
                ->select('produk.*', 'kategori.nama_kategori')
                ->orderBy('nama_produk')
                ->get();

        return view('pages.pembelian_detail.index', [
            'id_pembelian' => $id_pembelian,
            'produk' => $produk, 
            'supplier' => $supplier, 
            'pembelianDetail' => $detail,
            'total' => $total,
            'total_item' => $total_item,
            'diskon' => $diskon,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $produk = Produk::where('id_produk', $request->id_produk)->first();
        if (!$produk) {
            return response()->json('Data Gagal Disimpan', 400);
        }
        $detail = new PembelianDetail();
        $detail->id_pembelian = $request->id_pembelian;
        $detail->id_produk = $produk->id_produk;
        $detail->harga_beli = $produk->harga_beli;
        $detail->jumlah = 1;
        $detail->subtotal = $produk->harga_beli;
        $detail->save();

        return response()->json('Data Berhasil Disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detail = PembelianDetail::find($id);
        $detail->jumlah = $request->jumlah;
        $detail->subtotal = $detail->harga_beli * $request->jumlah;
        $detail->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelianDetail = PembelianDetail::find($id);
        $pembelianDetail->delete();

        return redirect()->route('pembelian_detail.index');
    }

    public function loadForm($diskon, $total)
    {
        $bayar = $total - ($diskon / 100 * $total);
        $data = [
            'totalrp' => format_uang($total),
            'bayar' => $bayar,
            'bayarrp' => format_uang($bayar),
            'terbilang' => ucwords(terbilang($bayar). ' Rupiah')
        ];

        return response()->json($data);
    }
}
