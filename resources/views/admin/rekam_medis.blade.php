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
                        <th> Tanggal Periksa <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nama Pasien <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Keluhan <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nama Dokter <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Diagnosa <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Obat <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tindakan <span class="icon-arrow">&UpArrow;</span></th>
                        <th>
                            <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 1 </td>
                        <td>Zinzu Chan Lee</td>
                        <td> Seoul </td>
                        <td> 17 Dec, 2022 </td>
                        <td>
                            <p class="status delivered">Delivered</p>
                        </td>
                        <td> <strong> $128.90 </strong></td>
                        <td>apa aja</td>
                        <td>
                            <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
@endsection
