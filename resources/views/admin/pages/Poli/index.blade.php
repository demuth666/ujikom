@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Poli klinik</h3>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </div>
        </section>
        <div class="add">
            <a href="{{ route('add.poli') }}">
                <button class="button-create" role="button">Tambah</button>
            </a>
        </div>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Nama Poli</th>
                        <th> Lantai</th>
                        <th> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($poli as $poli)
                        <tr>
                            <td> <strong>{{ $poli->nama_poli }}</strong> </td>
                            <td>{{ $poli->lantai }}</td>
                            <td>
                                <div class="button-action">
                                    <a href="{{ route('edit.poli', $poli->id) }}">
                                        <button class="button-edit" role="button">Edit</button>
                                    </a>
                                    <form action="{{ route('destroy.poli', $poli->id) }}" id="delete-form" method="POST">
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
