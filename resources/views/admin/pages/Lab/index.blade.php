@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Labotarium</h3>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </div>
        </section>
        <a href="{{ route('add.lab') }}">
            <button class="button-create" role="button">Tambah</button>
        </a>
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
                                    <form action="{{ route('destroy.lab', $lab->id) }}" method="POST">
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
        </section>
    </main>
@endsection
