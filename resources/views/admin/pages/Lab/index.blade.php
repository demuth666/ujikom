@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Labotarium</h3>
            <form action="{{ route('search.lab') }}" method="GET" class="input-group">
                <input type="search" name="data" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </form>
        </section>
        <div class="add">
            <a href="{{ route('add.lab') }}">
                <button class="button-create" role="button">Tambah</button>
            </a>
        </div>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> No Rekam Medis</th>
                        <th> Hasil Lab</th>
                        <th> Keterangan</th>
                        <th> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($lab))
                        @foreach ($lab as $lab)
                            <tr>
                                <td>{{ $lab->no_rm }}</td>
                                <td>{{ $lab->hasil_lab }}</td>
                                <td>{{ $lab->ket }}</td>
                                <td>
                                    <div class="button-action">
                                        <a href="{{ route('edit.lab', $lab->id) }}">
                                            <button class="button-edit" role="button">Edit</button>
                                        </a>
                                        <form action="{{ route('destroy.lab', $lab->id) }}" id="delete-form" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button-delete" role="button" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        @else
            <p>Data tidak ditemukan</p>
            @endif
        </section>
    </main>
@endsection
