@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Tambah Resep</header>
        <form action={{ route('store.resep') }} method="POST">
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">

                        <div class="input-field">
                            <label>No Rekam Medis</label>
                            <input type="text" value="{{ $rekam->pasien->no_rm }}" disabled required>
                            <input type="hidden" name="pasien_id" value="{{ $rekam->pasien->id }}" required>
                        </div>

                        <div class="input-field">
                            <label>Pasien</label>
                            <input type="text" value="{{ $rekam->pasien->nama_pasien }}" disabled required>
                            <input type="hidden" value="{{ $rekam->pasien->id }}" name="pasiens" required>
                        </div>

                        <div class="input-field">
                            <label>Tindakan</label>
                            <input type="text" value="{{ $rekam->tindakan }}" disabled required>
                        </div>

                        <div class="input-field">
                            <label>Diagnosa</label>
                            <input type="text" value="{{ $rekam->diagnosa }}" disabled required>
                            <input type="hidden" name="diagnosa" value="{{ $rekam->diagnosa }}" required>
                        </div>

                        <div class="input-field">
                            <label>Keluhan</label>
                            <input type="text" name="keluhan" value="{{ $rekam->keluhan }}" disabled required>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Pemeriksaan</label>
                            <input type="date" name="tgl_pemeriksaan" value="{{ $rekam->tgl_pemeriksaan }}" disabled
                                required>
                        </div>
                    </div>
                </div>

                <div class="details-id">
                    <div class="fields">
                        <div class="input-field">
                            <label>Obat</label>
                            <select name="obat_id" class="pilih" id="obat" required>
                                @foreach ($obat as $obat)
                                    <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field"></div>
                    </div>
                    <button class="nextBtn">
                        <span class="btnText">Tambah</span>
                    </button>
                </div>
        </form>
    </div>
    <div class="add">
        <a href="{{ route('lihat', $rekam->kode_resep) }}">
            <button class="button-add" role="button" type="submit">
                <span class="button__icon">
                    <ion-icon name="checkmark-outline"></ion-icon>
                </span>
            </button>
        </a>
    </div>
    <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th> Obat</th>
                    <th>
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resep as $resep)
                    @if ($resep->pasien_id == $rekam->pasien_id && $resep->diagnosa == $rekam->diagnosa)
                        <tr>
                            <td> {{ $resep->obat->nama_obat }} </td>
                            <td>
                                <div class="button-action">
                                    <a
                                        href="{{ route('destroy.resep', ['id' => $resep->id, 'obat_id' => $resep->obat_id]) }}">
                                        <button class="button-delete" id="delete-data" role="button"
                                            type="submit">Hapus</button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('print.resep', $rekam->kode_resep) }}">
            <button type="button" class="button">
                <span class="button__text">Cetak</span>
                <span class="button__icon">
                    <ion-icon name="print-outline"></ion-icon>
                </span>
            </button>
        </a>
    </section>
@endsection
