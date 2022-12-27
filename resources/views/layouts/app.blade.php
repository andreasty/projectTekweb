<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        .dataTables_length,
        .dataTables_paginate,
        .dataTables_filter,
        .dataTables_info {
            font-size: 14px;
            font-weight: 700;
            color: #475569 !important;
        }

        .dataTables_paginate span a.paginate_button.current {
            border: none;
            background-color: red;
        }

        /* font-size: 12x;
        color: #475569;
        font-weight: 500; */
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <!-- Page Content -->
        <main>

            {{ $slot }}
        </main>
    </div>

    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                // paging: false,
                processing: true,
                serverside: true,
                ajax: "{{ url('poinMahasiswa') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'namaKegiatan',
                        name: 'Nama Kegiatan'
                    },
                    {
                        data: 'kategori',
                        name: 'Kategori'
                    },
                    {
                        data: 'instansi',
                        name: 'Instansi'
                    },
                    {
                        data: 'tglKegiatan',
                        name: 'Tanggal Kegiatan'
                    },
                    {
                        data: 'semester',
                        name: 'Semester'
                    },
                    {
                        data: 'bukti',
                        name: 'Bukti'
                    },
                    {
                        data: 'status',
                        name: 'Status'
                    },
                    {
                        data: 'action',
                        name: 'Action'
                    }
                ],
            });
        });
    </script>
    <script>
        var sideBar = document.getElementById("mobile-nav");
        var openSidebar = document.getElementById("openSideBar");
        var closeSidebar = document.getElementById("closeSideBar");
        sideBar.style.transform = "translateX(-290px)";

        function sidebarHandler(flag) {
            if (flag) {
                sideBar.style.transform = "translateX(0px)";
                openSidebar.classList.add("hidden");
                closeSidebar.classList.remove("hidden");
            } else {
                sideBar.style.transform = "translateX(-290px)";
                closeSidebar.classList.add("hidden");
                openSidebar.classList.remove("hidden");
            }
        }
    </script>
    <!-- Modal Upload -->
    <script>
        let modal = document.getElementById("modal");

        function modalHandlerUpload(val) {
            if (val) {
                fadeIn(modal);
            } else {
                fadeOut(modal);
            }
        }

        function fadeOut(el) {
            el.style.opacity = 1;
            (function fade() {
                if ((el.style.opacity -= 0.1) < 0) {
                    el.style.display = "none";
                } else {
                    requestAnimationFrame(fade);
                }
            })();
        }

        function fadeIn(el, display) {
            el.style.opacity = 0;
            el.style.display = display || "flex";
            (function fade() {
                let val = parseFloat(el.style.opacity);
                if (!((val += 0.2) > 1)) {
                    el.style.opacity = val;
                    requestAnimationFrame(fade);
                }
            })();
        }
    </script>
    <script>
        var sideBar = document.getElementById("mobile-nav");
        var openSidebar = document.getElementById("openSideBar");
        var closeSidebar = document.getElementById("closeSideBar");
        sideBar.style.transform = "translateX(-290px)";

        function sidebarHandler(flag) {
            if (flag) {
                sideBar.style.transform = "translateX(0px)";
                openSidebar.classList.add("hidden");
                closeSidebar.classList.remove("hidden");
            } else {
                sideBar.style.transform = "translateX(-290px)";
                closeSidebar.classList.add("hidden");
                openSidebar.classList.remove("hidden");
            }
        }
    </script>
    <!-- Modal Edit -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        // Upload Data
        $('body').on('click', '.showModal', function(e) {
            event.preventDefault(e);

            $('.uploadData').click(function() {
                simpan();
            });
        });

        $('#bukti').change(function() {
            let reader = new FileReader();

            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

        // Edit Data
        $('body').on('click', '.editModal', function(e) {
            var id = $(this).data('id');
            $.ajax({
                url: 'poinMahasiswa/' + id + '/edit',
                type: 'GET',
                success: function(response) {

                    $('#namaKegiatan').val(response.result.namaKegiatan);
                    $('#kategori').val(response.result.kategori);
                    $('#instansi').val(response.result.instansi);
                    $('#tglKegiatan').val(response.result.tglKegiatan);
                    $('#semester').val(response.result.semester);
                    $('#bukti').val(response.result.bukti);
                    // $('#bukti').attr('src', response.image).show();
                    $('#status').val(response.result.status);
                    console.log(response.result);
                    $('.uploadData').click(function() {
                        simpan(id);
                    });
                }
            });
        });

        // Hapus Data
        $('body').on('click', '.deleteBtn', function(e) {
            if (confirm('Apa anda yakin ingin menghapus data ini?') == true) {
                var id = $(this).data('id');
                $.ajax({
                    url: 'poinMahasiswa/' + id,
                    type: 'DELETE',
                });
                $('#myTable').DataTable().ajax.reload();
            }
        });

        // Function simpan dan update
        function simpan(id = '') {
            if (id == '') {
                var var_url = 'poinMahasiswa';
                var var_type = 'POST';
            } else {
                var var_url = 'poinMahasiswa/' + id;
                var var_type = 'PUT';
            }
            $.ajax({
                url: var_url,
                type: var_type,
                contentType: false,
                processData: false,
                data: {
                    namaKegiatan: $('#namaKegiatan').val(),
                    kategori: $('#kategori').val(),
                    instansi: $('#instansi').val(),
                    tglKegiatan: $('#tglKegiatan').val(),
                    semester: $('#semester').val(),
                    bukti: $('#bukti').val(),
                    status: $('#status').val(),
                },
                success: function(response) {
                    if (response.errors) {
                        console.log(response.errors);
                        $('.alertForm').removeClass('hidden');
                        $('.alertForm').html("<ul>");
                        $.each(response.errors, function(key, value) {
                            $('.alertForm').find('ul').append("<li>" + value + "</li>");
                        });
                        $('.alertForm').append("</ul>");

                    } else {
                        $('.alertSuccess').removeClass('hidden');
                        $('.alertSuccess').html(response.success);
                    }

                    $('#myTable').DataTable().ajax.reload();

                }

            });
        }

        $('.closeModal').click(function() {

            $('#namaKegiatan').val('');
            $('#kategori').val('');
            $('#instansi').val('');
            $('#tglKegiatan').val('');
            $('#semester').val('');
            $('#bukti').val('');
            // $('#status').val('');

            $('.alertForm').addClass('hidden');
            $('.alertForm').html('');
            $('.alertSuccess').addClass('hidden');
            $('.alertSuccess').html('');
        });
    </script>
</body>

</html>