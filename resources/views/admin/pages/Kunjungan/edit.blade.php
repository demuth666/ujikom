@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Edit Labotarium</header>
        <form action="{{ route('update.kunjungan', $kunjungan->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>Tanggal Kunjungan</label>
                            <input type="date" name="tgl_kunjungan" value="{{ $kunjungan->tgl_kunjungan }}" required>
                        </div>

                        <div class="input-field">
                            <label>No Pasien</label>
                            <input type="number" name="no_pasien" value="{{ $kunjungan->no_pasien }}" required>
                        </div>

                        <div class="input-field">
                            <label>Kd Poli</label>
                            <input type="number" name="kd_poli" value="{{ $kunjungan->kd_poli }}" required>
                        </div>

                        <div class="input-field">
                            <label>Jam Kunjungan</label>
                            <input type="time" name="jam_kunjungan" value="{{ $kunjungan->jam_kunjungan }}" required>
                        </div>

                        <button class="nextBtn">
                            <span class="btnText">Simpan</span>
                        </button>
                    </div>
                </div>
        </form>
    </div>
@endsection
