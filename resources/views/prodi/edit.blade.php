@extends('layouts.app')
@section('title','edit program studi')
@section('bread1','program studi')
@section('bread2','edit Data')
@section('content')
<h3>Form edit program studi</h3>
<hr>

@include('layouts.alert')

<form action="{{ route('prodi.update', $prodi->kode_prodi) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="kode_prodi" class="col-sm-12">kode prodi</label>
        <div class="col-sm-3">
            <input type="text" name="kode_prodi" class="form-control" id="kode_prodi" value="{{ $prodi->kode_prodi }}" readonly>
            @error('kode_prodi')
                <small id="kode_prodi" class="form-text text-danger">
                    {{ $message}}
                </small>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="nama_prodi" class="col-sm-12">Nama prodi</label>
        <div class="col-sm-5">
            <input type="text" name="nama_prodi" class="form-control" id="nama_prodi" placeholder="Masukan nama dengan benar" value="{{ $prodi->nama_prodi }}">
            @error('nama_prodi')<small id="nama_prodi" class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="kaprodi" class="col-sm-12">nama kaprodi</label>
        <div class="col-sm-8">
            <textarea name="kaprodi" class="form-control" id="kaprodi">{{ $prodi->kaprodi }}</textarea>
            <small id="nama" class="form-text text-muted"></small>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Simpan</button>
    <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
</form>
@endsection

