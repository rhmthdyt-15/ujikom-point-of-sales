<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;

use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pengeluaran = Pengeluaran::query();

        if (!empty($search)) {
            $pengeluaran->where('deskripsi', 'LIKE', '%' . $search . '%');
        }

        $pengeluaran = $pengeluaran->paginate(10);

        return view('pages.pengeluaran.index', compact('pengeluaran'));
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
        $pengeluaran = Pengeluaran::create($request->all());

        return redirect()->route('pengeluaran.index')->with(['success' => "Data Berhasil Ditambahkan!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengeluaran = Pengeluaran::find($id);

        return redirect()->route('pengeluaran.index')->with(['success' => "Data Berhasil Ditambahkan!"]);
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
        $pengeluaran = Pengeluaran::find($id);

        if (!$pengeluaran) {
            return redirect()->route('pengeluaran.index')->with(['error' => 'pengeluaran Tidak Ditemukan']);
        }

        $pengeluaran->update($request->all());

        return redirect()->route('pengeluaran.index')->with(['success' => "Data Berhasil Diupdate!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
