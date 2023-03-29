<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
// use Milon\Barcode\DNS1D;
// use Milon\Barcode\DNS2D;
use Picqer\Barcode\BarcodeGeneratorHTML;


use Illuminate\Support\Facades\DB;
use Milon\Barcode\DNS1D as BarcodeDNS1D;
use PhpParser\Node\Stmt\Return_;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : \Illuminate\View\View
    {
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');
        $produk = Produk::all();
        $produk = Produk::join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
            ->select('produk.*', 'kategori.nama_kategori')
            ->get();

        return view('pages.produk.index', [
            'kategori' => $kategori,
            'produk' => $produk
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
        $produk = Produk::latest()->first() ?? new Produk();
        $request['kode_produk'] = 'P' . tambah_nol_didepan((int)$produk->id_produk + 1, 6);

        $produk = Produk::create($request->all());

        return redirect()->route('produk.index')->with(['success' => 'Berhasil Ditambahkan']);
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
        $produk = Produk::find($id);

        if (!$produk) {
            return redirect()->route('produk.index')->with(['error' => 'Produk Tidak Ditemukan']);
        }

        $produk->update($request->all());

        return redirect()->route('produk.index')->with(['success' => 'Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return redirect()->route('produk.index')->with(['success' => 'Berhasil Dihapus!']);
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->input('ids');

        Produk::whereIn('id_produk', $ids)->delete();

        return response()->json([
            'message' => 'Selected items have been deleted successfully.'
        ], 200);
    }

    public function cetakBarcode(Request $request)
    {
        $dataproduk = array();
        foreach ($request->ids as $id) {
            $produk = Produk::find($id);
            $dataproduk[] = $produk;
        }

        // Generate barcode for each product
        $barcodes = array();
        $generator = new BarcodeGeneratorHTML();
        foreach ($dataproduk as $produk) {
            $barcodes[] = $generator->getBarcode($produk->kode_produk, $generator::TYPE_CODE_128);
        }

        $no  = 1;
        $pdf = Pdf::loadView('pages.produk.barcode', compact('dataproduk', 'barcodes', 'no'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream('produk.pdf');
    }
    // public function cetakBarcode(Request $request)
    // {
    //     $dataproduk = array();
    //     foreach ($request->ids as $id) {
    //         $produk = Produk::find($id);
    //         $dataproduk[] = $produk;
    //     }

    //     $no  = 1;
    //     $pdf = Pdf::loadView('pages.produk.barcode', compact('dataproduk', 'no'));
    //     $pdf->setPaper('a4', 'potrait');
    //     return $pdf->stream('produk.pdf');
    // }
}
