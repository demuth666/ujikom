@extends('template.index')
@section('content')
    <div class="container-form">
        <div class="form-first">
            <div class="details-personal">
                <div class="fields">
                    <div class="input-resep">
                        <label>No Rekam Medis</label>
                        <input type="text" value="{{ $reseps->pasien->no_rm }}" disabled required>
                        <input type="hidden" name="pasien_id" value="#" required>
                    </div>
                </div>
            </div>
            <div class="details-id">
                <div class="fields">
                    <div class="input-resep">
                        <label>Pasien</label>
                        <input type="text" value="{{ $reseps->pasien->nama_pasien }}" disabled required>
                        {{-- <p>{{ $reseps->pasien->nama_pasien }}</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('print.resep', $reseps->kode_resep) }}">
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
                        <th> Obat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resep as $resep)
                        @if ($reseps->kode_resep == $resep->kode_resep && $reseps->diagnosa == $resep->diagnosa)
                            <tr>
                                <td> {{ $resep->obat->nama_obat }} </td>
                            </tr>
                </tbody>
                @endif
                @endforeach
            </table>
        </section>
    @endsection
