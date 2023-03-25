@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Resep Obat</h3>
            <form action="{{ route('rekam.medis.search') }}" method="GET" class="input-group">
                <input type="search" name="data" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </form>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> No Rekam Medis</th>
                        <th> Pasien</th>
                        <th> Tindakan</th>
                        <th> Keluhan</th>
                        <th> Diagnosa</th>
                        <th> Tanggal Pemeriksaan</th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($rekam))
                        @foreach ($rekam as $rekam)
                            <tr>
                                <td> {{ $rekam->pasien['no_rm'] }} </td>
                                <td> {{ $rekam->pasiens }} </td>
                                <td> {{ $rekam->tindakan_id }} </td>
                                <td> {{ $rekam->keluhan }} </td>
                                <td> {{ $rekam->diagnosa }} </td>
                                <td> {{ $rekam->tgl_pemeriksaan }} </td>
                                <td>
                                    <div class="button-action">
                                        @if ($rekam->kode_resep == '-')
                                            <a href="{{ route('lihat', $rekam->kode_resep) }}">
                                                {{<button class="button-edit" role="button">Lihat</button>}}
                                            </a>
                                        @else
                                            <a href="{{ route('lihat', $rekam->kode_resep) }}">
                                                <button class="button-edit" role="button">Lihat</button>
                                            </a>
                                        @endif
                                    </div>
                                    <a href="{{ route('add.resep', ['id' => $rekam->id]) }}" id="delete-form">
                                        <button class="button-delete" role="button" type="submit">Tambah</button>
                                    </a>
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
