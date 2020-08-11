@extends('layouts.app')
@section('title','Halaman dosen')
@section('bread1','dosen')
@section('bread2','Add data dosen')
@section('content')
    <h3>Form Dosen</h3>
    <hr> @include('layouts.alert')
    <form action="{{ @route('dosen.store') }}"method="POST"> 
    @csrf
    <div class="form-group row">
        <label for="nidn"class="col-sm-12">NIDN</label>
            <div class="col-sm-3">
                <input type="text"name="nidn"class="form-control"id="nidn"> 
                @error('nidn') 
                    <small id="nidn"class="form-text text-danger">
                        {{ $message}}
                    </small>
                @enderror</div>
            </div>
            <div class="form-group row">
                <label for="nim"class="col-sm-12">Nama Dosen</label>
                <div class="col-sm-5">
                    <input type="text"name="nama_dosen"class="form-control"id="nama_dosen"placeholder="Masukan nama dengan benar"> 
                    @error('nama_dosen')
                        <small id="nama_dosen"class="form-text text-danger">
                            {{ $message }}
                        </small>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="nim"class="col-sm-12">Alamat<label> <div class="col-sm-8">
                <textarea name="alamat"class="form-control"id="alamat"></textarea>
                <small id="nama"class="form-text text-muted"></small>
            </div>
    </div>
    <button class="btn btn-primary"type="submit">Simpan</button>
    <a href="{{ url()->previous() }}"class="btn btn-danger">Batal</a>
</form>
@endsection

