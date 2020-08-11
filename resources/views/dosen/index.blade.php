@extends('layouts.app')

@section('title','Halaman Dosen')

@section('bread1','dosen')
@section('bread2','daftar dosen')

@section('content')
    <p>
        <a href="{{ @route('dosen.create') }}"class="btn btn-success btn-sm">Tambah</a>
    </p> 
    @include('layouts.alert')
    <table class="table table-striped" id="dosen">
        <thead>
            <tr>
                <th>No</th>
                <th>NIDN</th>
                <th>Nama Dosen</th>
                <th>Alamat</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        </table>
        <script>
            $(function() {
                $('#dosen').DataTable({
                    processing: true, 
                    serverSide: true, 
                    ajax: "{{ @route('list-dosen') }}",

                    columns: [{
                        data: 'DT_RowIndex', 
                        name: 'DT_RowIndex'
                    }, 
                    {
                        data: 'nidn',
                        name: 'nidn'
                    }, 
                    {
                        data: 'nama_dosen',
                        name: 'nama_dosen'
                    }, 
                    {
                        data: 'alamat', 
                        name: 'alamat'
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