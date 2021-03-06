<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Jabatan\Entities\Jabatan;
use Modules\ModulSistem\Entities\ModulSistem;
use Modules\User\Entities\User;

class UserController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');

        $id_modul = ModulSistem::where('modul', '=', 'User')->value('id');

        $this->middleware('userCanAccess:'.$id_modul, ['only' => 'showAllStaff']);

        $this->middleware('userCanCreate:'.$id_modul, ['only' => ['createNewStaff', 'saveNewStaff']]);

        $this->middleware('userCanRead:'.$id_modul, ['only' => ['showDetailStaff']]);

        $this->middleware('userCanUpdate:'.$id_modul, ['only' => ['editStaff', 'updateStaff']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllStaff()
    {
        $user = User::where('jabatan_id', '!=', '4')->paginate(15);

        return view('user::index')
            ->with('users', $user);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createNewStaff()
    {
        $jabatan = Jabatan::where('id', '!=', '4')->get();

        return view('user::create')->with('jabatans', $jabatan);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function saveNewStaff(Request $request)
    {
        $this->validate($request, [
            'id_user' => 'required|unique:users',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
            'jabatan_id' => 'required'
        ]);

        $user = new User();
        $user->id_user = $request->id_user;
        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->telepon = $request->telepon;
        $user->password = bcrypt($request->telepon);
        $user->jabatan_id = $request->jabatan_id;

        $user->save();

        Session::flash('message', 'Akun berhasil dibuat.');

        return redirect()->route('user.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function showDetailStaff($id)
    {
        $staff = User::findorFail($id);

        return view('user::show')->with('user', $staff);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function editStaff($id)
    {
        $user = User::findorFail($id);

        $jabatan = Jabatan::where('id', '!=', '4')->get();

        return view('user::edit')
            ->with('user', $user)
            ->with('jabatans', $jabatan);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updateStaff(Request $request, $id)
    {
        $user = User::findorFail($id);

        $this->validate($request, [
            'id_user' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
            'jabatan_id' => 'required'
        ]);

        $user->id_user = $request->id_user;
        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->telepon = $request->telepon;
        $user->jabatan_id = $request->jabatan_id;
        $user->save();

        Session::flash('message', 'Perubahan berhasil disimpan.');

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function deleteStaff($id)
    {
        $staff = User::findorFail($id);

        $staff->delete();

        Session::flash('message', 'Staff berhasil dihapus.');

        return redirect()->route('user.index');
    }

    public function cariStaff(Request $request)
    {
        $query = $request->get('query');

        $results = DB::table('users')->select('*')->where('id', 'like', '%'.$query.'%')->
            orWhere('nama', 'like', '%'.$query.'%')->
            orWhere('alamat', 'like', '%'.$query.'%')->
            orWhere('telepon', 'like', '%'.$query.'%')->get();

        return view('user::hasil_cari')->with('results', $results)->with('query', $query);
    }
}
