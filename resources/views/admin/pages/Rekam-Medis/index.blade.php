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
        <a href="{{ route('rekam.medis.cetak') }}">
            <button type="button" class="button">
                <span class="button__text">Cetak</span>
                <span class="button__icon">
                    <ion-icon name="print-outline"></ion-icon>
                </span>
            </button>
        </a>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> No Rekam Medis</th>
                        <th> Pasien</th>
                        <th> Dokter</th>
                        <th> Tindakan</th>
                        <th> Keluhan</th>
                        <th> Diagnosa</th>
                        <th> Obat</th>
                        <th> Resep</th>
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
                                <td> {{ $rekam->dokter }} </td>
                                <td> {{ $rekam->tindakan['nm_tindakan'] }} </td>
                                <td> {{ $rekam->keluhan }} </td>
                                <td> {{ $rekam->diagnosa }} </td>
                                <td> {{ $rekam->obat }} </td>
                                <td> {{ $rekam->resep }} </td>
                                <td> {{ $rekam->tgl_pemeriksaan }} </td>
                                <td>
                                    <div class="button-action">
                                        <a href="{{ route('rekam.medis.edit', $rekam->id) }}">
                                            <button type="button" class="button-edit">
                                                <span class="button__icon">
                                                    <ion-icon name="create-outline"></ion-icon>
                                                </span>
                                            </button>
                                        </a>
                                        <form action="{{ route('destroy.rekam.medis', $rekam->id) }}" id="delete-form"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button-delete" role="button" type="submit">
                                                <span class="button__icon">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                </span>
                                            </button>
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
