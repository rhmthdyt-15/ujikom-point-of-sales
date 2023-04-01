<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : \Illuminate\View\View
    {
        $user = User::isNotAdmin()->orderBy('id', 'desc')->get();

        return view('pages.user.index', compact('user'));
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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'kasir';
        $user->foto = '/img/user.jpg';
        $user->save();

        return redirect()->route('user.index')->with(['success' => 'Berhasil Ditambahkan']);
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password') && $request->password != "") 
            $user->password = bcrypt($request->password);
        $user->update();

        return redirect()->route('user.index')->with(['success' => 'Berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

    public function profil()
    {
        $profil = auth()->user();

        return view('pages.user.profil', compact('profil'));
    }

    public function editProfil()
    {
        $profil = auth()->user();

        return view('pages.user.edit-profil', compact('profil'));
    }

    public function updateProfil(Request $request)
{
    $user = auth()->user();
    
    $user->name = $request->name;
    if ($request->has('password') && $request->password != "") {
        if (Hash::check($request->old_password, $user->password)) {
            if ($request->password == $request->password_confirmation) {
                $user->password = bcrypt($request->password);
            } else {
                return response()->json('Konfirmasi password tidak sesuai', 422);
            }
        } else {
            return response()->json('Password lama tidak sesuai', 422);
        }
    }

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $nama = 'logo-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/img'), $nama);

        $user->foto = "/img/$nama";
    }

    $user->update();

    return redirect()->route('user.profil')->with(['success' => 'Data Berhasil diupdate']);
}

}
