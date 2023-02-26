@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Labotarium</h3>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </div>
        </section>
        <a href="{{ route('add.kunjungan') }}">
            <button class="button-create" role="button">Tambah</button>
        </a>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Tanggal Kunjungan</th>
                        <th> No Pasien</th>
                        <th> Kd Poli</th>
                        <th> Jam Kunjungan</th>
                        <th> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kunjungan as $kunjungan)
                        <tr>
                            <td>{{ $kunjungan->tgl_kunjungan }}</td>
                            <td>{{ $kunjungan->pasien['nama_pasien'] }}</td>
                            <td>{{ $kunjungan->poli['nama_poli'] }}</td>
                            <td>{{ $kunjungan->jam_kunjungan }}</td>
                            <td>
                                <div class="button-action">
                                    <a href="{{ route('edit.kunjungan', $kunjungan->id) }}">
                                        <button class="button-edit" role="button">Edit</button>
                                    </a>
                                    <form action="{{ route('destroy.kunjungan', $kunjungan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button-delete" role="button" type="submit">Hapus</button>
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
