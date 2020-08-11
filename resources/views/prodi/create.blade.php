@extends('layouts.app')
@section('title','Halaman program studi')
@section('bread1','program studi')
@section('bread2','Add program studi')
@section('content')
    <h3>Form Program Studi</h3>
    <hr> @include('layouts.alert')
    <form action="{{ @route('prodi.store') }}"method="POST"> 
    @csrf
    <div class="form-group row">
        <label for="kode_prodi"class="col-sm-12">kode prodi</label>
            <div class="col-sm-3">
                <input type="text"name="kode_prodi"class="form-control"id="kode_prodi"> 
                @error('kode_prodi') 
                    <small id="kode_prodi"class="form-text text-danger">
                        {{ $message}}
                    </small>
                @enderror</div>
            </div>
            <div class="form-group row">
                <label for="nama_prodi"class="col-sm-12">Nama Prodi</label>
                <div class="col-sm-5">
                    <input type="text"name="nama_prodi"class="form-control"id="nama_prodi"> 
                    @error('nama_prodi')
                        <small id="nama_prodi"class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="kaprodi" class="col-sm-12">Nama Kaprodi</label>
                <div class="col-sm-5">
                    <input type="text" name="kaprodi" class="form-control" id="kaprodi">
                    @error('kaprodi')
                    <small id="kaprodi" class="form-text text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
            </div>
    <button class="btn btn-primary"type="submit">Simpan</button>
    <a href="{{ url()->previous() }}"class="btn btn-danger">Batal</a>
    </div>
</form>
@endsection

