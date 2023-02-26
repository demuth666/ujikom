@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Dokter</h3>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </div>
        </section>
        <div class="add">
            <a href={{ route('add.dokter') }}>
                <button class="button-create" role="button">Tambah</button>
            </a>
        </div>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Poli</th>
                        <th> Tanggal Kunjungan</th>
                        <th> Kd User</th>
                        <th> Nama Dokter</th>
                        <th> SIP</th>
                        <th> Tempat Lahir</th>
                        <th> No Telp</th>
                        <th> Alamat</th>
                        <th> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokter as $dokter)
                        <tr>
                            <td><strong> {{ $dokter->poli['nama_poli'] }}</strong></td>
                            <td> {{ $dokter->tgl_kunjungan }} </td>
                            <td> {{ $dokter->kd_user }} </td>
                            <td> {{ $dokter->nama_dokter }} </td>
                            <td> {{ $dokter->sip }} </td>
                            <td> {{ $dokter->tempat_lahir }} </td>
                            <td> {{ $dokter->no_tlp }} </td>
                            <td> {{ $dokter->alamat }} </td>
                            <td>
                                <div class="button-action">
                                    <a href={{ route('edit.dokter', $dokter->id) }}>
                                        <button class="button-edit" role="button">Edit</button>
                                    </a>
                                    <form action="{{ route('destroy.dokter', $dokter->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="button-delete" role="button">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection
