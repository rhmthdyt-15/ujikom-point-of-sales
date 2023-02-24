<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $supplier = Supplier::query();

        if (!empty($search)) {
            $supplier->where('nama_supplier', 'LIKE', '%' . $search . '%');
        }

        $supplier = $supplier->paginate(10);

        return view('pages.supplier.index', compact('supplier'));
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
        $validatedData = $request->validate([
            'nama' => 'required|string|max:100',
            'telepon' => 'required|string|max:12',
            'alamat' => 'required|string|max:255',
        ]);

        $supplier = new Supplier();
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
        $supplier->save();

        return redirect()->route('supplier.index')->with(['success' => "Data Berhasil Ditambahkan!"]);
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
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return redirect()->route('su$supplier.index')->with(['error' => 'su$supplier Tidak Ditemukan']);
        }

        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with(['success' => "Data Berhasil Diupdate!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect()->route('supplier.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
