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
                        data: 'action',
                        name: 'Action'
                    }
                ]
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
        let modalEdit = document.getElementById("modalEdit");

        function modalHandlerEdit(val) {
            if (val) {
                fadeIn(modalEdit);
            } else {
                fadeOut(modalEdit);
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $('body').on('click', '.showModal', function(e) {
            
            $('.uploadData').click(function() {
                // alert('Saya diklik');

                // console.log($namaKegiatan + '-' + $kategori + '-' + $instansi + '+ ' + $tglKegiatan + '-' + $semester + '-' + $bukti)
                $.ajax({
                    url: 'poinMahasiswa',
                    type: 'POST',
                    data: {
                        namaKegiatan: $('#namaKegiatan').val(),
                        kategori: $('#kategori').val(),
                        instansi: $('#instansi').val(),
                        tglKegiatan: $('#tglKegiatan').val(),
                        semester: $('#semester').val(),
                        bukti: $('#bukti').val(),
                    },
                    success: function(response) {
                        console.log(response);
                        $('#myTable').DataTable().ajax.reload();
                        
                    }

                });
            });
        });
    </script>
</body>

</html>