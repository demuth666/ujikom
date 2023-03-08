@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Tambah Labotarium</header>
        <form action="{{ route('store.lab') }}" method="POST">
            @csrf
            <div class="form-first">
                <div class="details-personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>No Rekam Medis</label>
                            <select name="no_rm" class="pilih" required>
                                @foreach ($pasien as $pasien)
                                    <option value="{{ $pasien->no_rm }}" required>{{ $pasien->no_rm }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-field">
                            <div class="input-field"
                    <button class="nextBtn">
                        <span class="btnText">Simpan</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
