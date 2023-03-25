<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak Resep OBat</title>
</head>
<style>
    .tbl {
        border: 1px solid #000000;
        border-radius: 3px;
        padding: 10px 10px 10px 10px;
    }
</style>

<body style="font-family:Times New Roman;font-size:12px">

    <center>
        <h1></h1>
    </center>
    <table id="example1" class="tbl">
        <tr align="center" border="1">
            <td colspan="3">
                <center>
                    <h3>Resep Obat</h3>
                    <h5><i></i></h5>
                </center>
                <hr>
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <center>Nama Obat</center>
                <hr>
            </td>
        </tr>
        @foreach ($resep as $resep)
            <tr>
                <td colspan="3">
                    <center>{{ $resep->obat->nama_obat }}</center>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
