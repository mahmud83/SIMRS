<?php

namespace Modules\Obat\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Obat\Entities\Obat;

class ObatController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $obat = Obat::all();

        return view('obat::index')->with('obats', $obat);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('obat::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required'
        ]);

        $input = $request->all();

        Obat::create($input);

        Session::flash('message', 'Obat berhasil dimasukkan');

        return redirect()->route('obat.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $obat = Obat::findorFail($id);

        return view('obat::show')->with('obat', $obat);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $obat = Obat::findorFail($id);

        return view('obat::edit')->with('obat', $obat);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required'
        ]);

        $input = $request->all();

        $obat = Obat::findorFail($id);

        $obat->fill($input)->save();

        Session::flash('message', 'Obat berhasil diubah');

        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}