@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h3>Tindakan</h3>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </div>
        </section>
        <div class="add">
            <a href={{ route('add.tindakan') }}>
                <button class="button-create" role="button">Tambah</button>
            </a>
        </div>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Nama TIndakan</th>
                        <th> Keterangan</th>
                        <th> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tindakan as $tindakan)
                        <tr>
                            <td><strong> {{ $tindakan->nm_tindakan }}</strong></td>
                            <td> {{ $tindakan->ket }} </td>
                            <td>
                                <div class="button-action">
                                    <a href="{{ route('edit.tindakan', $tindakan->id) }}">
                                        <button class="button-edit" role="button">Edit</button>
                                    </a>
                                    <form action="{{ route('destroy.tindakan', $tindakan->id) }}" id="delete-form"
                                        method="POST">
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
