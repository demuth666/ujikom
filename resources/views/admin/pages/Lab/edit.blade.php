@extends('template.index')
@section('content')
    <div class="container-form">
        <header>Edit Labotarium</header>
        <form action="{{ route('update.lab', $lab->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-first">
                <div class="form-first">
                    <div class="details-personal">
                        <div class="fields">
                            <div class="input-field">
                                <label>Hasil Lab</label>
                                <input type="text" name="hasil_lab" value="{{ $lab->hasil_lab }}" required>
                            </div>

                            <div class="input-field">
                                <input type="hidden" name="no_rm">
                            </div>
                        </div>
                    </div>
                    <div class="details-id">
                        <div class="fields">
                            <div class="input-field">
                                <label>Keterangan</label>
                                <input type="text" name="ket" value="{{ $lab->ket }}" required>
                            </div>
                        </div>
                        <button class="nextBtn">
                            <span class="btnText">Simpan</span>
                        </button>
                    </div>
                </div>
        </form>
    </div>
@endsection
