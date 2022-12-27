<x-app-layout>


    <div class="flex">
        <!-- Main modal Upload-->
        <div class="py-12 bg-gray-200 bg-opacity-80 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0 hidden" id="modal" aria-hidden="true">
            <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <button type="button" class="closeModal absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal" onclick="modalHandlerUpload()" aria-label="close modal" role="button">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-slate-600 text-center">Form Poin Portfolio</h3>
                        <div class="alertSuccess hidden text-green-700 text-md font-semibold bg-green-300 rounded-xl px-3 py-6"></div>
                        <div class="alertForm hidden text-red-700 text-sm font-semibold bg-red-300 rounded-xl px-3 py-4"></div>
                        <form class="space-y-6" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="NamaKegiatan" class="block mb-2 text-sm font-medium text-slate-500 ">Nama Kegiatan</label>
                                <input type="text" name="namaKegiatan" id="namaKegiatan" class="bg-gray-200 border text-slate-400 text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 block w-full p-2.5 " required>
                            </div>
                            <div>
                                <label for="kategori" class="block mb-2 text-sm font-medium text-slate-500 ">Kategori Kegiatan</label>
                                <input type="text" name="kategori" id="kategori" class="bg-gray-200 border text-slate-400 text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 block w-full p-2.5 " required>
                            </div>
                            <div>
                                <label for="instansi" class="block mb-2 text-sm font-medium text-slate-500 ">Instansi Penyelenggara</label>
                                <input type="text" name="instansi" id="instansi" class="bg-gray-200 border text-slate-400 text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 block w-full p-2.5 " required>
                            </div>
                            <div>
                                <label for="tglKegiatan" class="block mb-2 text-sm font-medium text-slate-500 ">Tanggal Kegiatan</label>
                                <input type="date" name="tglKegiatan" id="tglKegiatan" class="bg-gray-200 border text-slate-400 text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 block w-full p-2.5 " required>
                            </div>
                            <div>
                                <label for="tglKegiatan" class="block mb-2 text-sm font-medium text-slate-500 ">Semester</label>
                                <input type="number" name="semester" id="semester" class="bg-gray-200 border text-slate-400 text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 block w-full p-2.5 " required>
                            </div>
                            <div>
                                <label for="bukti" class="block mb-2 text-sm font-medium text-slate-500 ">Upload Bukti</label>
                                <input type="file" name="bukti" id="bukti" class="bg-gray-200 border text-slate-400 text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 block w-full p-2.5 " required>
                            </div>
                            <div class="">
                                <label for="status" class="block mb-2 text-sm font-medium text-slate-500 ">Upload Bukti</label>
                                <input type="text" value="Pending" name="status" id="status" class="bg-gray-200 border text-slate-400 text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 block w-full p-2.5 " required>
                            </div>

                            <button type="button" class="uploadData w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Unggah Poin</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- sidebar -->
        <div class="w-3/12 absolute sm:relative bg-white h-screen rounded-r-3xl shadow md:h-screen flex-col justify-between hidden md:flex">
            <div class="p-4">
                <img src="/assets/img/logo.png" alt="" class="mx-auto rounded-full h-12 bottom-4 my-6" />
                <hr />

                <div class="m-6">
                    <ul class="my-4">
                        <li>
                            <div class="rounded-lg p-4 bg-gray-200">
                                <i class="fa-solid fa-house text-slate-400"></i>
                                <a href="/" class="mx-4 text-slate-400">Dashboard</a>
                            </div>
                        </li>
                    </ul>

                    <ul class="my-4">
                        <li>
                            <div class="rounded-lg p-4 bg-gradient-to-r from-primary to-secondary">
                                <i class="fa-solid fa-table-list text-white"></i>
                                <a href="" class="mx-4 text-white font-semibold">Poin Portfolio</a>
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
                <!-- <img src="/assets/images/team-2.jpg" alt="" class="mx-auto rounded-full h-24 bottom-4" /> -->
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
                        <li class="p-2 rounded-lg inline md:hidden">
                            <form action="">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </form>
                        </li>
                        <li class="my-auto">
                            <a href="#" class="text-gray-700">
                                <i class="fa-solid fa-bell text-lg"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="p-2">
                <div class="overflow-x-auto relative bg-white rounded-2xl p-4">
                    <div class="px-2">
                        <h2 class="text-4xl text-slate-500 my-3">Poin Portfolio</h2>
                        <div class="my-4">

                            <button type="button" class="showModal text-white  bg-gradient-to-r from-primary to-secondary hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" type="button" onclick="modalHandlerUpload(true)">Upload Poin</button>


                        </div>
                    </div>
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
                    </table>
                </div>
            </div>
            <footer class="flex w-full h-24">
                <div class="h-auto w-full my-auto">
                    <h4 class="text-slate-500 w-1/2 float-left">
                        © Copyright made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-semibold text-slate-500" target="_blank">{{ Auth::user()->name }}</a>
                    </h4>
                    <h4 class="text-right text-slate-500 w-1/2 float-right font-semibold">Ilmu Komputer | Universitas Pendidikan Ganesha</h4>
                </div>
            </footer>
        </main>
    </div>


</x-app-layout>