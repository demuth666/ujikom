@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Pasien</h3>
            <form action="{{ route('search.pemeriksaan') }}" method="GET" class="input-group">
                <input type="search" name="data" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </form>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>No Rekam Medis
                        <th> Nama Pasien</th>
                        <th> Jenis Kelamin</th>
                        <th> Agama</th>
                        <th> Alamat</th>
                        <th> Tanggal Lahir</th>
                        <th> usia</th>
                        <th> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($pasien))
                        @foreach ($pasien as $pasien)
                            <tr>
                                <td>{{ $pasien->no_rm }}</td>
                                <td><strong> {{ $pasien->nama_pasien }}</strong></td>
                                <td> {{ $pasien->j_kelamin }} </td>
                                <td> {{ $pasien->agama }} </td>
                                <td> {{ $pasien->alamat }} </td>
                                <td> {{ $pasien->tgl_lahir }} </td>
                                <td> {{ $pasien->usia }} </td>
                                <td>
                                    <div class="button-action">
                                        <a href={{ route('add.pemeriksaan', $pasien->id) }}>
                                            <button class="button-edit" role="button">Tambah Pemeriksaan</button>
                                        </a>
                                        <a href={{ route('detail.pemeriksaan', ['pasien_id' => $pasien->id]) }}>
                                            <button class="button-edit" role="button">Lihat Detail</button>
                                        </a>
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
