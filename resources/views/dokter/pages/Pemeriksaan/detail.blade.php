@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Detail Pasien</h3>
        </section>
        <a href="{{ route('rekam.medis.cetak', $rekam->pasien_id) }}">
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
                        <th> Pasien</th>
                        <th> Dokter</th>
                        <th> Tindakan</th>
                        <th> Keluhan</th>
                        <th> Diagnosa</th>
                        <th> Kode Resep</th>
                        <th> Tanggal Pemeriksaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail as $detail)
                        <tr>
                            <td> {{ $detail->pasien->nama_pasien }} </td>
                            <td> {{ $detail->dokter }} </td>
                            <td> {{ $detail->tindakan }} </td>
                            <td> {{ $detail->keluhan }} </td>
                            <td> {{ $detail->diagnosa }} </td>
                            @if ($detail->kode_resep == '-')
                                <td>
                                    <a
                                        href="{{ route('add.resep', ['id' => $detail->id, 'pasien_id' => $detail->pasien_id]) }}">
                                        <ion-icon name="add-circle-outline"></ion-icon>
                                    </a>
                                </td>
                            @else
                                <td><a href="{{ route('lihat', $detail->kode_resep) }}"> {{ $detail->kode_resep }} </a></td>
                            @endif
                            <td> {{ $detail->tgl_pemeriksaan }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection
