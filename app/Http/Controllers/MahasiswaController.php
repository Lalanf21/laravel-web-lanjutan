<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\model\Prodi;
use App\model\Mahasiswa;

class MahasiswaController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.index');
    }

    public function mhs_list()    
    {
        $mhs =  Mahasiswa::with('mprodi')->get();
        return DataTables::of($mhs)
            ->addIndexColumn()
            ->addColumn('action', function ($mhs) {
                $action = '<a class="text-primary" href="/mahasiswa/edit/' . $mhs->nim . '">Edit</a>';
                $action .= ' | <a class="text-danger" href="/mahasiswa/delete/' . $mhs->nim . '">Hapus</a>';
                return $action;
            })
            ->make(true);
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama_lengkap' => 'required',
        ]);
        
        Mahasiswa::create($request->all());
        
        return redirect()->route('mahasiswa')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Mahasiswa $mahasiswa, $id)
    {
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('prodi', 'mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama_lengkap' => 'required',
        ]);
        // dd($request->all());

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa')
        ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa')
        ->with('success', 'Data berhasil dihapus');
    }
}
