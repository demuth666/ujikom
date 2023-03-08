@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Tambah Rekam Medis</header>
        <form action={{ route('store.pemeriksaan') }} method="POST">
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">

                        <div class="input-field">
                            <label>No Rekam Medis</label>
                            <input type="text" value="{{ $pasien->no_rm }}" disabled>
                            <input type="hidden" name="pasien_id" value="{{ $pasien->id }}">
                        </div>

                        <div class="input-field">
                            <label>Pasien</label>
                            <input type="text" value="{{ $pasien->nama_pasien }}" id="pasien" disabled>
                            <input type="hidden" name="pasiens" value="{{ $pasien->nama_pasien }}" id="pasien">
                        </div>

                        <div class="input-field">
                            <label>Dokter</label>
                            <input type="text" value="{{ Auth::user()->username }}" disabled>
                            <input type="hidden" name="dokter" value="{{ Auth::user()->username }}">
                        </div>

                        <div class="input-field">
                            <label>Tindakan</label>
                            <select name="tindakan_id" class="pilih" required>
                                @foreach ($tindakan as $tindakan)
                                    <option value="{{ $tindakan->id }}" required>{{ $tindakan->nm_tindakan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Keluhan</label>
                            <textarea name="keluhan" id="summer-note" required>
                            </textarea>
                        </div>

                        <div class="input-field">
                            <label>Diagnosa</label>
                            <input type="text" name="diagnosa" required>
                        </div>
                    </div>
                </div>

                <div class="details-id">
                    <div class="fields">
                        <div class="input-field">
                            <label>Obat</label>
                            <select name="obat[]" class="pilih2" multiple required>
                                @foreach ($obat as $obat)
                                    <option value="{{ $obat->nama_obat }}" required>{{ $obat->nama_obat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Resep</label>
                            <input type="text" name="resep" required>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Pemeriksaan</label>
                            <input type="date" name="tgl_pemeriksaan" required>
                        </div>
                    </div>
                    <button class="nextBtn">
                        <span class="btnText">Simpan</span>
                    </button>
                </div>
        </form>
    </div>
@endsection
