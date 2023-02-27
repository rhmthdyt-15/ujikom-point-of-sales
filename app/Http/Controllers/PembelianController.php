<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $supplier = Supplier::orderBy('nama')->get();
        $pembelian = Pembelian::all();

        return view('pages.pembelian.index', compact('supplier', 'pembelian'));
    }

    // public function index(Request $request)
    // {
    // $supplier = Supplier::orderBy('nama')->get();
    // $pembelian = Pembelian::all();

    // return view('pages.pembelian.index', compact('supplier', 'pembelian'));

    // $supplier = Supplier::orderBy('nama')->get();
    // $searchPembelian = $request->input('search_pembelian');
    // $searchSupplier = $request->input('search_supplier');

    // $pembelian = Pembelian::query();
    // if (!empty($searchPembelian)) {
    //     $pembelian->where('id_pembelian', 'LIKE', '%' . $searchPembelian . '%');
    // }
    // $pembelian = $pembelian->paginate(10);

    // $supplierQuery = Supplier::query();
    // if (!empty($searchSupplier)) {
    //     $supplierQuery->where('nama_supplier', 'LIKE', '%' . $searchSupplier . '%');
    // }
    // $supplier = $supplierQuery->paginate(5);

    // return view('pages.pembelian.index', compact('pembelian', 'supplier', 'searchPembelian', 'searchSupplier'));
    // }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
