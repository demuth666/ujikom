@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Rekam Medis</h3>
            <form action="{{ route('rekam.medis.search') }}" method="GET" class="input-group">
                <input type="search" name="data" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </form>
        </section>
        <div class="add">
            <a href="{{ route('rekam.medis.add') }}">
                <button class="button-create" role="button">Tambah</button>
            </a>
        </div>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> No Rekam Medis</th>
                        <th> Tindakan</th>
                        <th> Obat</th>
                        <th> Dokter</th>
                        <th> Pasien</th>
                        <th> Diagnosa</th>
                        <th> Resep</th>
                        <th> Keluhan</th>
                        <th> Tanggal Pemeriksaan</th>
                        <th> Keterangan</th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($rekam))
                        @foreach ($rekam as $rekam)
                            <tr>
                                <td> {{ $rekam->labotarium['no_rm'] }} </td>
                                <td> {{ $rekam->tindakan['nm_tindakan'] }} </td>
                                <td> {{ $rekam->obat_id }} </td>
                                <td> {{ $rekam->dokter['nama_dokter'] }} </td>
                                <td> {{ $rekam->pasien['nama_pasien'] }} </td>
                                <td> {{ $rekam->diagnosa }} </td>
                                <td> {{ $rekam->resep }} </td>
                                <td> {{ $rekam->keluhan }} </td>
                                <td> {{ $rekam->tgl_pemeriksaan }} </td>
                                <td> {{ $rekam->ket }} </td>
                                <td>
                                    <div class="button-action">
                                        <a href="{{ route('rekam.medis.edit', $rekam->id) }}">
                                            <button class="button-edit" role="button">Edit</button>
                                        </a>
                                        <form action="{{ route('destroy.rekam.medis', $rekam->id) }}" id="delete-form"
                                            method="POST">
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
        @else
            <p>Data tidak ditemukan</p>
            @endif
        </section>
    </main>
@endsection
