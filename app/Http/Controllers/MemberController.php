<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $member = Member::query();

        if (!empty($search)) {
            $member->where('nama', 'LIKE', '%' . $search . '%');
        }

        $member = $member->paginate(10);

        return view('pages.member.index', compact('member'));
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
        $member = member::latest()->first() ?? new member();
        $request['kode_member'] = tambah_nol_didepan((int)$member->kode_member + 1, 5);

        $member = member::create($request->all());

        return redirect()->route('member.index')->with(['success' => 'Berhasil Ditambahkan']);
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
        // $member = Member::find($id);

        // if (!$member) {
        //     return redirect()->route('member.index')->with(['error' => 'member Tidak Ditemukan']);
        // }

        // $member->update($request->all());

        $member = Member::find($id)->update($request->all());

        return redirect()->route('member.index')->with(['success' => 'Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return redirect()->route('member.index')->with(['success' => 'Berhasil Dihapus!']);
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->input('ids');

        Member::whereIn('id_member', $ids)->delete();

        return response()->json([
            'message' => 'Selected items have been deleted successfully.'
        ], 200);
    }

    public function cetakMember(Request $request)
    {
        $datamember = array();
        foreach ($request->ids as $id) {
            $member = Member::find($id);
            $datamember[] = $member;
        }

        return $datamember;
        $no  = 1;
        $pdf = Pdf::loadView('pages.member.cetak', compact('data$datamember', 'no'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('member.pdf');
        // $datamember = array();
        // if (!empty($request->id_member)) {
        //     foreach ($request->id_member as $id) {
        //         $member = Member::find($id);
        //         $datamember[] = $member;
        //     }
        // }

        // return $datamember;

        // $no = 1;
        // $pdf = Pdf::loadView('member.barcode', compact('datamember', 'no'));
        // $pdf->setPaper('a4', 'potrait');
        // return $pdf->stream('member.pdf');
    }
}
