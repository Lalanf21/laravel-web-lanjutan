<?php

namespace App\Http\Controllers;

use App\model\Prodi;
use App\model\Mahasiswa;
use Illuminate\Http\Request;
use DataTables;

class ProdiController extends Controller
{
    public function index()
    {
        return view('prodi.index');
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_prodi' => 'required',
            'nama_prodi' => 'required',
            'kaprodi' => 'required',
        ]);
        Prodi::create($request->all());
        return redirect()->route('prodi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function prodi_list()
    {
        $prodi = Prodi::with('mahasiswa')->get();
        // dd($prodi);
        return DataTables::of($prodi)
            ->addIndexColumn()
            ->addColumn('action', function ($prodi) {
                $action = '<a class="text-primary" href="/prodi/' . $prodi->kode_prodi . '/edit">Edit</a>';
                $action .= ' | <a class="text-danger" href="/prodi/delete/' . $prodi->kode_prodi . '">Hapus</a>';
                return $action;
            })
            ->make(true);
    }

    public function edit($id)
    {
        $prodi = prodi::findOrFail($id);
        // dd($prodi);
        return view('prodi.edit', compact('prodi'));
    }

    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'kode_prodi' => 'required',
            'nama_prodi' => 'required',
            'kaprodi' => 'required',
        ]);
        // dd($request->all());

        $prodi->update($request->all());

        return redirect()->route('prodi.index')
        ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();
        return redirect()->route('prodi.index')
        ->with('success', 'Data berhasil dihapus');
    }
}
