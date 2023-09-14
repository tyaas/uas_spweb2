<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uas;

class UasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uas = Uas::all();

        return view('uas.index', compact('uas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uas = new uas;
        

        $request-> validate([
            'npm'=>'required|numeric',
            'nama'=>'required',
            'alamat'=>'required',
        ],[
            'npm.required'=>'npm Wajib Di isi',
            'npm.numeric'=>'npm Wajib Berupa Angka',
            'nama.required'=>'Nama Wajib Di isi',
            'alamat.required'=>'alamat Wajib Di isi',
        ]);

        $uas-> npm = $request->npm;
        $uas-> nama = $request->nama;
        $uas-> alamat = $request->alamat;
        
        $uas->save();
        return redirect()->to('uas')->with('success', 'Data Berhasil Ditambahkan');
        // return redirect('/uas');
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
        $uas = Uas::where('npm',$id)->first();

    return view('uas.edit', compact('uas'));
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
        $uas = Uas::find($id);
        $uas->npm = $request->input('npm');
        $uas->nama = $request->input('nama');
        $uas->alamat = $request->input('alamat');
        $uas->save();

    
        return redirect()->route('uas.index')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uas = Uas::find($id);

        if (!$uas) {
            return redirect()->to('uas')->with('error', 'Data tidak ditemukan.');
        }
    
        // Hapus data
        $uas->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->to('uas')->with('success', 'Data berhasil dihapus.');
    }
}
