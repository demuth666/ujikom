@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Tambah Kunjungan</header>
        <form action="{{ route('store.kunjungan') }}" method="POST">
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>Tanggal Kunjungan</label>
                            <input type="date" name="tgl_kunjungan" required>
                        </div>

                        <div class="input-field">
                            <label>Pasien</label>
                            <select name="pasien_id" class="pilih" required>
                                @foreach ($pasien as $pasien)
                                    <option value="{{ $pasien->id }}" required>{{ $pasien->nama_pasien }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Poli</label>
                            <select name="poli_id" class="pilih" required>
                                @foreach ($poli as $poli)
                                    <option value="{{ $poli->id }}" required>{{ $poli->nama_poli }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Jam Kunjungan</label>
                            <input type="time" name="jam_kunjungan" required>
                        </div>

                    </div>

                    <div class="details-id">
                        <div class="fields">
                            <button class="nextBtn">
                                <span class="btnText">Simpan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
