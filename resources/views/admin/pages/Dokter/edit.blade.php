@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Edit Dokter</header>
        <form action={{ route('update.dokter', $dokter->id) }} method="POST">
            @method('put')
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">

                        <div class="input-field">
                            <label>Poli</label>
                            <select name="poli_id" required>
                                @foreach ($poli as $poli)
                                    <option value="{{ $poli->id }}">{{ $poli->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Kunjungan</label>
                            <input type="date" name="tgl_kunjungan" value="{{ $dokter->tgl_kunjungan }}" required>
                        </div>

                        <div class="input-field">
                            <label>Kd User</label>
                            <input type="text" name="kd_user" value="{{ $dokter->kd_user }}" required>
                        </div>

                        <div class="input-field">
                            <label>Nama Dokter</label>
                            <input type="text" name="nama_dokter" value="{{ $dokter->nama_dokter }}" required>
                        </div>

                        <div class="input-field">
                            <label>SIP</label>
                            <input type="number" name="sip" value="{{ $dokter->sip }}" required>
                        </div>

                        <div class="input-field">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ $dokter->tempat_lahir }}" required>
                        </div>

                    </div>
                </div>

                <div class="details-id">
                    <div class="fields">

                        <div class="input-field">
                            <label>No Telp</label>
                            <input type="number" name="no_tlp" value="{{ $dokter->no_tlp }}" required>
                        </div>

                        <div class="input-field">
                            <label>Alamat</label>
                            <input type="text" name="alamat" value="{{ $dokter->alamat }}" required>
                        </div>

                        <div class="input-field">
                        </div>

                        <button class="nextBtn">
                            <span class="btnText">Simpan</span>
                        </button>
                    </div>
                </div>
        </form>
    </div>
@endsection
