@extends('template.index')
@section('content')
    <main class="table">
        <section class="table__header">
            <h1>Rekam Medis</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </div>
            {{-- <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF</label>
                    <label for="export-file" id="toJSON">JSON</label>
                    <label for="export-file" id="toCSV">CSV</label>
                    <label for="export-file" id="toEXCEL">EXCEL</label>
                </div>
            </div> --}}
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Tanggal Periksa</th>
                        <th> Nama Pasien</th>
                        <th> Keluhan</th>
                        <th> Nama Dokter</th>
                        <th> Diagnosa</th>
                        <th> Obat</th>
                        <th> Tindakan</th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($rekam as $rekam)
                            <td> {{ $rekam->tanggal_periksa }} </td>
                            <td><strong> {{ $rekam->nama_pasien }}</strong></td>
                            <td> {{ $rekam->keluhan }} </td>
                            <td> {{ $rekam->nama_dokter }} </td>
                            <td> {{ $rekam->diagnosa }} </td>
                            <td> {{ $rekam->obat }} </td>
                            <td> {{ $rekam->tindakan }} </td>
                            <td>

                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection
