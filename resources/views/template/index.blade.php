<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href={{ asset('css/style.css') }} />
    <link rel="stylesheet" href="https://kit.fontawesome.com/5edc7c9997.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Rekam Medis</title>
</head>

<body>
    @include('sweetalert::alert')
    @include('template.sidebar')
    @yield('content')
    <script 
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src={{ asset('js/script.js') }}></script>
    <script>
        $(document).ready(function() {
            $('.pilih').select2({

            });
        });

        $(document).ready(function() {
            $('.pilih2').select2({
                placeholder: "Silahkan Pilih",
            });
        });
    </script>
    <script>
        $('form#delete-form').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Anda yakin?',
                text: 'Data akan dihapus secara permanen',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).unbind('submit').submit();
                }
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#lab_id').on('change', function() {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: '/get-user-data/' + id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#pasien').val(data.nama);
                        }
                    });
                } else {
                    $('#pasien').val('');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#obat').on('change', function() {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: '/get-data/' + id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#harga').val(data.harga);
                            $('#stock').val(data.stock);
                        }
                    });
                } else {
                    $('#harga').val();
                    $('#stock').val();
                }
            });
        });
    </script>
    <script>
        function deleteData(id) {
            $.ajax({
                url: '/delete-resep/' + id,
                type: 'DELETE',
                success: function(result) {
                    // handle success
                },
                error: function(xhr, status, error) {
                    // handle error
                }
            });
        }
    </script>
</body>

</html>
