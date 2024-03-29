@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Dokter</h3>
            <form action="{{ route('search.dokter') }}" method="GET" class="input-group">
                <input type="search" name="data" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </form>
        </section>
        <div class="add">
            <a href={{ route('add.dokter') }}>
                <button class="button-add" role="button" type="submit">
                    <span class="button__icon">
                        <ion-icon name="add-circle-outline"></ion-icon>
                    </span>
                </button>
            </a>
        </div>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Nama Dokter</th>
                        <th> Poli</th>
                        <th> SIP</th>
                        <th> Tanggal Kunjungan</th>
                        <th> Tempat Lahir</th>
                        <th> No Telp</th>
                        <th> Alamat</th>
                        <th> Kd User</th>
                        <th> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($dokter))
                        @foreach ($dokter as $dokter)
                            <tr>
                                <td> {{ $dokter->nama_dokter }} </td>
                                <td><strong> {{ $dokter->poli['nama_poli'] }}</strong></td>
                                <td> {{ $dokter->sip }} </td>
                                <td> {{ $dokter->tgl_kunjungan }} </td>
                                <td> {{ $dokter->tempat_lahir }} </td>
                                <td> {{ $dokter->no_tlp }} </td>
                                <td> {{ $dokter->alamat }} </td>
                                <td> {{ $dokter->user_id }} </td>
                                <td>
                                    <div class="button-action">
                                        <a href={{ route('edit.dokter', $dokter->id) }}>
                                            <button class="button-edit" role="button">Edit</button>
                                        </a>
                                        <form action="{{ route('destroy.dokter', $dokter->id) }}" id="delete-form"
                                            method="POST">
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
        @else
            <p>Data tidak ditemukan</p>
            @endif
        </section>
    </main>
@endsection
