@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Kunjungan</h3>
            <form action="{{ route('search') }}" method="GET" class="input-group">
                <input type="search" name="data" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </form>
        </section>
        <div class="add"><a href="{{ route('add.kunjungan') }}">
                <button class="button-create" role="button">Tambah</button>
            </a></div>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Tanggal Kunjungan</th>
                        <th> Pasien</th>
                        <th> Poli</th>
                        <th> Jam Kunjungan</th>
                        <th> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($kunjungan))
                        @foreach ($kunjungan as $kunjungans)
                            <tr>
                                <td>{{ $kunjungans->tgl_kunjungan }}</td>
                                <td>{{ $kunjungans->pasien['nama_pasien'] }}</td>
                                <td>{{ $kunjungans->poli['nama_poli'] }}</td>
                                <td>{{ $kunjungans->jam_kunjungan }}</td>
                                <td>
                                    <div class="button-action">
                                        <a href="{{ route('edit.kunjungan', $kunjungans->id) }}">
                                            <button class="button-edit" role="button">Edit</button>
                                        </a>
                                        <form action="{{ route('destroy.kunjungan', $kunjungans->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button-delete" role="button" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            @else
                <tbody>
                    <tr>
                        <td>kontol</td>
                    </tr>
                </tbody>
                @endif
            </table>
        </section>
    </main>
@endsection
