@extends('layouts.app')
@section('title','edit dosen')
@section('bread1','dosen')
@section('bread2','edit Data')
@section('content')
<h3>Form edit dosen</h3>
<hr>

@include('layouts.alert')

<form action="{{ route('dosen.update', $dosen->nidn) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="nidn" class="col-sm-12">NIDN</label>
        <div class="col-sm-3">
            <input type="text" name="nidn" class="form-control" id="nidn" value="{{ $dosen->nidn }}" readonly>
            @error('nidn')
                <small id="nidn" class="form-text text-danger">
                    {{ $message}}
                </small>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="nama_dosen" class="col-sm-12">Nama dosen</label>
        <div class="col-sm-5">
            <input type="text" name="nama_dosen" class="form-control" id="nama_dosen" placeholder="Masukan nama dengan benar" value="{{ $dosen->nama_dosen }}">
            @error('nama_dosen')<small id="nama_dosen" class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="nim" class="col-sm-12">Alamat</label>
        <div class="col-sm-8">
            <textarea name="alamat" class="form-control" id="alamat">{{ $dosen->alamat }}</textarea>
            <small id="nama" class="form-text text-muted"></small>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Simpan</button>
    <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
</form>
@endsection

