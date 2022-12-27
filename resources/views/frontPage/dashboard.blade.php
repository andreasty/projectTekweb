<x-app-layout>

    <div class="flex">
        <!-- sidebar -->
        <div class="w-3/12 absolute sm:relative bg-white h-screen rounded-r-3xl shadow md:h-screen flex-col justify-between hidden md:flex">
            <div class="p-4">
                <img src="/assets/img/logo.png" alt="" class="mx-auto rounded-full h-12 bottom-4 my-6" />
                <hr />

                <div class="m-6">
                    <ul class="my-4">
                        <li>
                            <div class="rounded-lg p-4 bg-gradient-to-r from-primary to-secondary">
                                <i class="fa-solid fa-house text-white"></i>
                                <a href="" class="mx-4 text-white">Dashboard</a>
                            </div>
                        </li>
                    </ul>

                    <ul class="my-4">
                        <li>
                            <div class="rounded-lg p-4 bg-gray-200">
                                <i class="fa-solid fa-table-list text-slate-300"></i>
                                <a href="poinPorto" class="mx-4 text-slate-400 font-semibold">Poin Portfolio</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="my-4">
                        <li>
                            <div class="rounded-lg p-4 bg-gray-200">
                                <i class="fa-solid fa-file-signature text-slate-400"></i>
                                <a href="" class="mx-4 text-slate-400 font-semibold">Validasi KRS</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="my-4">
                        <li>
                            <div class="rounded-lg p-4 bg-gray-200">
                                <i class="fa-regular fa-file-lines text-slate-400"></i>
                                <a href="" class="mx-4 text-slate-400 font-semibold">Pengaduan</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="my-4">
                        <li>
                            <div class="rounded-lg p-4 bg-gray-200">
                                <i class="fa-solid fa-circle-info text-slate-400"></i>
                                <a href="" class="mx-4 text-slate-400 font-semibold">Pengumuman</a>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="w-72 z-40 absolute h-screen bg-white shadow sm:h-full flex-col justify-between md:hidden transition duration-150 ease-in-out" id="mobile-nav">
            <button class="h-10 w-10 bg-gradient-to-r from-primary to-secondary absolute right-0 mt-3 -mr-10 items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white" id="openSideBar" onclick="sidebarHandler(true)">
                <i class="fa-solid fa-bars-staggered text-xl"></i>
            </button>
            <button class="hidden h-10 w-10 bg-gradient-to-r from-primary to-secondary absolute right-0 mt-3 -mr-10 items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white" id="closeSideBar" onclick="sidebarHandler(false)">
                <i class="fa-solid fa-arrow-left text-xl"></i>
            </button>

            <div class="p-4 b">
                <img src="/assets/images/team-2.jpg" alt="" class="mx-auto rounded-full h-24 bottom-4" />
                <h4 class="text-center font-semibold">Andreas Stiady</h4>
                <p class="text-center text-sm">Semester 3</p>

                <div class="m-6">
                    <ul class="my-4">
                        <li>
                            <div class="rounded-lg p-4 bg-gradient-to-r from-primary to-secondary">
                                <i class="fa-solid fa-house text-white"></i>
                                <a href="" class="mx-4 text-white">Dashboard</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="my-4">
                        <li>
                            <div class="rounded-lg p-4 bg-gray-200">
                                <i class="fa-solid fa-circle-info text-slate-400"></i>
                                <a href="" class="mx-4 text-slate-400 font-semibold">Portfolio</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="my-4">
                        <li>
                            <div class="rounded-lg p-4 bg-gray-200">
                                <i class="fa-solid fa-table-list text-slate-300"></i>
                                <a href="" class="mx-4 text-slate-400 font-semibold">Pengumuman</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end sidebar -->
        <main class="container mx-auto h-screen">
            <!-- Navbar -->
            <nav class="flex w-full h-auto py-4">
                <div class="my-auto ml-auto">
                    <ul class="flex-row flex space-x-8 mt-4 text-sm font-semibold">

                        <li class="bg-white p-2 rounded-lg hidden md:inline">
                            <form action="">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input type="text" name="" id="" placeholder="Search" />
                            </form>
                        </li>

                        <li class="my-auto">
                            <a href="#" class="text-gray-700">
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                        </li>

                        <li class="my-auto">
                            <a href="#" class="text-gray-700">
                                <i class="fa-solid fa-bell text-lg"></i>
                            </a>
                        </li>

                        <li class="my-auto">
                            <form method="POST" action="{{ route('logout') }}">


                                @csrf

                                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>

                        </li>

                        <li class="p-2 rounded-lg inline md:hidden">

                        </li>

                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->

            <!-- Card row 3 -->
            <div class="flex flex-wrap">
                <div class="flex-row w-full sm:flex-auto sm:w-3/12 rounded-2xl p-2">
                    <div class="flex flex-row rounded-2xl bg-white h-full p-6">
                        <div class="flex-none my-auto">
                            <h2 class="text-slate-400 text-sm">Poin Anda</h2>
                            <p class="font-semibold text-2xl text-slate-500">60 Poin</p>
                        </div>

                        <div class="px-3 my-auto ml-auto">
                            <div class="flex w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-primary to-secondary">
                                <i class="fa-solid fa-trophy text-lg m-auto text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-row w-full sm:flex-auto sm:w-3/12 rounded-2xl p-2">
                    <div class="flex flex-row rounded-2xl bg-white h-full p-6">
                        <div class="flex-none my-auto">
                            <h2 class="text-slate-400 text-sm">Poin yang harus dicapai</h2>
                            <p class="font-semibold text-2xl text-slate-500">150 Poin</p>
                        </div>

                        <div class="px-3 my-auto ml-auto">
                            <div class="flex w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-primary to-secondary">
                                <i class="fa-solid fa-trophy text-lg m-auto text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-row w-full sm:flex-auto sm:w-3/12 rounded-2xl p-2">
                    <div class="flex flex-row rounded-2xl bg-white h-full p-6">
                        <div class="flex-none my-auto">
                            <h2 class="text-slate-400 text-sm">Sisa poin yang harus dicari</h2>
                            <p class="font-semibold text-2xl text-slate-500">90 Poin</p>
                        </div>

                        <div class="px-3 my-auto ml-auto">
                            <div class="flex w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-primary to-secondary">
                                <i class="fa-solid fa-trophy text-lg m-auto text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card Row 3 -->

            <!-- Card row 2-->
            <div class="flex flex-wrap">
                <div class="flex-row w-full sm:flex-auto sm:w-7/12 rounded-2xl p-2">
                    <div class="flex flex-row rounded-2xl bg-white h-full p-6">
                        <div class="flex-none my-auto  w-9/12">
                            <h2 class="text-slate-400 text-sm md:text-lg">Pembimbing akamdemik :</h2>
                            <p class="font-semibold text-sm lg:text-2xl text-slate-500 w-28 lg:w-full">I Nyoman Saputra Wahyu Wijaya, S.Kom., M.Cs.</p>
                        </div>

                        <div class="md:px-3 my-auto ml-auto">
                            <div class="flex w-14 h-14 sm:w-30 sm:h-20 lg:w-28 lg:h-28 text-center rounded-xl bg-gradient-to-tl from-primary to-secondary">
                                <i class="fa-solid fa-user text-lg lg:text-3xl m-auto text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-row w-full sm:flex-auto sm:w-5/12 rounded-2xl p-2">
                    <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(/assets/img/gedung.jpeg)" class="h-full rounded-2xl bg-center bg-cover b">
                        <div class="flex flex-row h-full p-6">
                            <div class="flex-none my-auto">
                                <h2 class="text-slate-100 text-2xl font-semibold">Ilmu Komputer</h2>
                                <p class="font-semibold text-slate-200 text-xl">Jurusan Teknik Informatika</p>
                                <p class="font-semibold text-slate-200 text-xl">Fakultas Teknik dan Kejuruan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- EndCard row 2-->

            <div class="p-2">
                <div class="overflow-x-auto relative bg-white rounded-2xl p-4">
                    <table class="w-full text-sm text-left text-slate-500 " id="myTable" style="width: 100%;">
                        <thead class="text-xs uppercase bg bg-white text-slate-500">
                            <tr>
                                <th scope="col" class="py-3 px-6">No</th>
                                <th scope="col" class="py-3 px-6">Nama Kegiatan</th>
                                <th scope="col" class="py-3 px-6">Kategori Kegiatan</th>
                                <th scope="col" class="py-3 px-6">Instansi Penyelenggara</th>
                                <th scope="col" class="py-3 px-6">Tanggal Kegiatan</th>
                                <!-- <th scope="col" class="py-3 px-6">Poin</th> -->
                                <th scope="col" class="py-3 px-6">Semester</th>
                                <th scope="col" class="py-3 px-6">Bukti</th>
                                <th scope="col" class="py-3 px-6 status">Status</th>
                                <th scope="col" class="py-3 px-6">Action</th>
                            </tr>
                        </thead>
                        <!-- <tbody>

                            
                            <tr class="bg-white border-b">
                                <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-slate-400">Test</th>
                                <td class="py-4 px-6">Test</td>
                                <td class="py-4 px-6">Test</td>
                                <td class="py-4 px-6">Test</td>
                                <td class="py-4 px-6">5</td>
                                <td class="py-4 px-6"><a href="#" class="underline">Lihat Bukti</a></td>
                                <td class="py-4 px-6 text-green-500 font-semibold">Tervalidasi</td>
                                <td class="py-4 px-6 font-semibold">
                                    <form action="" method="Post">
                                        
                                    </form>
                                </td>
                            </tr>
                            
                        </tbody> -->
                    </table>    
                </div>
            </div>
            <footer class="flex w-full h-24">
                <div class="h-auto w-full my-auto ">
                    <h4 class=" text-slate-500 w-1/2  float-left">
                        © Copyright made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-semibold text-slate-500" target="_blank">Andreas Stiady</a>
                    </h4>
                    <h4 class="text-right text-slate-500 w-1/2  float-right font-semibold">
                        Ilmu Komputer | Universitas Pendidikan Ganesha
                    </h4>
                </div>
            </footer>
        </main>
    </div>

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
</x-app-layout>