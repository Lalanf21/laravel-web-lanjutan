<h4>Main menu</h4>

<div class="list-group list-group-flush">
    <a href="{{ @route('mahasiswa') }}" class="list-group-item list-group-item-action {{ (request()->is('mahasiswa')) ? 'active' : '' }}">
        Mahasiswa
    </a>
    <a href="{{ @route('dosen.index') }}" class="list-group-item list-group-item-action {{ (request()->is('dosen')) ? 'active' : '' }}">
        Dosen
    </a>
    <a href="{{ @route('prodi.index') }}" class="list-group-item list-group-item-action {{ (request()->is('prodi')) ? 'active' : '' }}">
        Program Studi
    </a>
</div>
