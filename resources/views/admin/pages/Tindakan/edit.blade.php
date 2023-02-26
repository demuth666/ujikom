@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Tambah Pasien</header>
        <form action={{ route('update.tindakan', $tindakan->id) }} method="POST">
            @method('PUT')
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>kd Tindakan</label>
                            <input type="number" name="id" value="{{ $tindakan->id }}" required>
                        </div>

                        <div class="input-field">
                            <label>Nama Tindakan</label>
                            <input type="text" name="nm_tindakan" value="{{ $tindakan->nm_tindakan }}" required>
                        </div>

                        <div class="input-field">
                            <label>Keterangan</label>
                            <input type="text" name="ket" value="{{ $tindakan->ket }}" required>
                        </div>

                        <button class="nextBtn">
                            <span class="btnText">Simpan</span>
                        </button>
                    </div>
                </div>
        </form>
    </div>
@endsection
