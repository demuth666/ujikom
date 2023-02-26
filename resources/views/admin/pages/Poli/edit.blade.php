@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Edit Poli</header>
        <form action="{{ route('update.poli', $poli->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>Nama Poli</label>
                            <input type="text" name="nama_poli" value="{{ $poli->nama_poli }}" required>
                        </div>

                        <div class="input-field">
                            <label>Lantai</label>
                            <input type="number" name="lantai" value="{{ $poli->lantai }}" required>
                        </div>

                        <button class="nextBtn">
                            <span class="btnText">Simpan</span>
                        </button>
                    </div>
                </div>
        </form>
    </div>
@endsection
