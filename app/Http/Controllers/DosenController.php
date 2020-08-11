<?php

namespace App\Http\Controllers;

use App\model\Dosen;
use Illuminate\Http\Request;
use DataTables;

class DosenController extends Controller
{
    public function index()
    {
        return view('dosen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required',
            'nama_dosen' => 'required',
            'alamat' => 'required',
        ]);
        Dosen::create($request->all());
        return redirect()->route('dosen.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function dosen_list()
    {
        $dosen =  Dosen::get();
        // dd($dosen);
        return DataTables::of($dosen)
            ->addIndexColumn()
            ->addColumn('action', function ($dosen) {
                $action = '<a class="text-primary" href="/dosen/' . $dosen->nidn . '/edit">Edit</a>';
                $action .= ' | <a class="text-danger" href="/dosen/delete/' . $dosen->nidn . '">Hapus</a>';
                return $action;
            })
            ->make(true);
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        // dd($dosen);
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama_dosen' => 'required',
        ]);
        // dd($request->all());

        $dosen->update($request->all());

        return redirect()->route('dosen.index')
        ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosen.index')
        ->with('success', 'Data berhasil dihapus');
    }
}
