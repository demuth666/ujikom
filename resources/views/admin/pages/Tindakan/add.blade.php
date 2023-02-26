@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Tambah Tindakan</header>
        <form action={{ route('store.tindakan') }} method="POST">
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>Nama Tindakan</label>
                            <input type="text" name="nm_tindakan" required>
                        </div>
                    </div>
                </div>

                <div class="details-id">
                    <div class="fields">
                        <div class="input-field">
                            <label>Keterangan</label>
                            <input type="text" name="ket" required>
                        </div>
                    </div>
                    <button class="nextBtn">
                        <span class="btnText">Simpan</span>
                    </button>
                </div>
            </div>
        </form>
@endsection
