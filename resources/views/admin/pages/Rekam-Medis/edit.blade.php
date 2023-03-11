@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Edit Rekam Medis</header>
        <form action={{ route('rekam.medis.update', $rekam->id) }} method="POST">
            @method('PUT')
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">

                        <div class="input-field">
                            <label>No Rekam Medis</label>
                            <select name="pasien_id" class="pilih" required disabled>
                                @foreach ($lab as $lab)
                                    <option value="{{ $lab->id }}" {{ $lab->id == $lab->id ? 'selected' : '' }}
                                        required>{{ $lab->no_rm }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Tindakan</label>
                            <select name="tindakan_id" class="pilih" required>
                                @foreach ($tindakan as $tindakan)
                                    <option value="{{ $tindakan->id }}"
                                        {{ $tindakan->id == $tindakan->id ? 'selected' : '' }} required>
                                        {{ $tindakan->nm_tindakan }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="input-field">
                            <label>Obat</label>
                            <select name="obat[]" class="pilih2" multiple="multiple" required>
                                @foreach ($obat as $obat)
                                    <option value="{{ $obat->nama_obat }}" @selected(old('obat[]', $obat->nama_obat) == $obat->nama_obat) required>
                                        {{ $obat->nama_obat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Dokter</label>
                            <select name="dokter" class="pilih" required>
                                @foreach ($dokter as $dokter)
                                    <option value="{{ $dokter->nama_dokter }}" @selected(old('dokter') == $dokter->id) required>
                                        {{ $dokter->nama_dokter }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Pasien</label>
                            <select name="pasiens" class="pilih" required>
                                @foreach ($pasien as $pasien)
                                    <option value="{{ $pasien->nama_pasien }}"
                                        {{ $pasien->id == $pasien->id ? 'selected' : '' }} required>
                                        {{ $pasien->nama_pasien }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Diagnosa</label>
                            <input type="text" name="diagnosa" value="{{ $rekam->diagnosa }}" required>
                        </div>
                    </div>
                </div>

                <div class="details-id">
                    <div class="fields">
                        <div class="input-field">
                            <label>Resep</label>
                            <input type="text" name="resep" value="{{ $rekam->resep }}" required>
                        </div>

                        <div class="input-field">
                            <label>Keluhan</label>
                            <input type="text" name="keluhan" value="{{ $rekam->keluhan }}" required>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Pemeriksaan</label>
                            <input type="date" name="tgl_pemeriksaan" value="{{ $rekam->tgl_pemeriksaan }}" required>
                        </div>

                        <div class="input-field">
                            <label>Keterangan</label>
                            <input type="text" name="ket" value="{{ $rekam->ket }}">
                        </div>

                    </div>
                    <button class="nextBtn">
                        <span class="btnText">Simpan</span>
                    </button>
                </div>
        </form>
    </div>
@endsection
