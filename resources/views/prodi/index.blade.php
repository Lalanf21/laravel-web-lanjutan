@extends('layouts.app')

@section('title','Halaman Program Studi')

@section('bread1','Program Studi')
@section('bread2','daftar Program Studi')

@section('content')
    <p>
        <a href="{{ @route('prodi.create') }}"class="btn btn-success btn-sm">Tambah</a>
    </p> 
    @include('layouts.alert')
    <table class="table table-striped" id="dosen">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Program Studi</th>
                <th>Nama Program studi</th>
                <th>Nama Kaprodi</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        </table>
        <script>
            $(function() {
                $('#dosen').DataTable({
                    processing: true, 
                    serverSide: true, 
                    ajax: "{{ @route('list-prodi') }}",

                    columns: [{
                        data: 'DT_RowIndex', 
                        name: 'DT_RowIndex'
                    }, 
                    {
                        data: 'kode_prodi',
                        name: 'kode_prodi'
                    }, 
                    {
                        data: 'nama_prodi',
                        name: 'nama_prodi'
                    }, 
                    {
                        data: 'kaprodi', 
                        name: 'kaprodi'
                    }, 
                    {
                        data: 'action', 
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }]
                });
            });

        </script>
@endsection