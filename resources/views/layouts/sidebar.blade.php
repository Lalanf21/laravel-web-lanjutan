<h4>Main menu</h4>

<div class="list-group list-group-flush">
    <a href="{{ @route('mahasiswa') }}" class="list-group-item list-group-item-action {{ (request()->is('mahasiswa')) ? 'active' : '' }}">

        Mahasiswa
    </a>
    <a href="{{ @route('dosen.index') }}" class="list-group-item list-group-item-action {{ (request()->is('dosen')) ? 'active' : '' }}">

        Dosen
    </a>
    <a href="" class="list-group-item list-group-item-action">
        Program Studi
    </a>
</div>
