<<<<<<< HEAD
{{-- Edit Kampus --}}

<div class="container mt-4">
    {{-- Judul halaman --}}
    <div class="flex justify-center text-center items-center mb-6 mt-6">
        <span class="text-2xl font-bold text-gray-800 leading-none">
            Daftar Kampus UNJ <br>
            <span class="text-sm font-semibold text-gray-800">
                Daftar kampus yang terdaftar di UNJ (Klik "Edit" untuk mengedit kampus)
            </span>
        </span>
    </div>
    <table class="bg-white text-black border border-gray-300 table table-bordered">
        <thead class="bg-teal-700 text-white text-center table-success">
            <tr>
                <th>No</th>
                <th>Nama Kampus</th>
                <th>Alamat Kampus</th>
                <th>No Telp Kampus</th>
                <th>Email Kampus</th>
                <th>Jumlah Gedung</th>
                <th>Jumlah Unit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white text-black text-center">
            <tr>
                <td>1</td>
                <td>Rawamangun Muka</td>
                <td>Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</td>
                <td>(021) 4890108</td>
                <td>HumasKomunikasi Digital@unj.ac.id</td>
                <td>15</td>
                <td>10</td>
                <td class="flex flex-col gap-2">
                    {{-- <a href="edit-kampus" type="button" class="inline-flex items-center gap-2 px-1 py-1.5 text-xs font-medium text-center text-white bg-yellow-500 rounded-sm hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        Edit
                    </a> --}}
                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="justify-center inline-flex items-center gap-2 px-3 py-1.5 text-xs font-medium text-center text-white bg-yellow-500 rounded-sm hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        Edit
                    </button>
                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full text-left">
                        <div class="relative p-4 w-full max-w-xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm w-2xl p-2">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Edit Kampus
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-all hover:cursor-pointer" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form wire:submit.save="save" class="p-4 md:p-5">
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Kampus</label>
                                            <input wire:model="name" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Rawamangun Muka" required="">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Alamat Kampus</label>
                                            <input wire:model="address" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220" required="">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">No Telp Kampus</label>
                                            <input wire:model="contact" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="(021)4890108" required="">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Email Kampus</label>
                                            <input wire:model="email" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="HumasKomunikasiDigital@unj.ac.id" required="">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Gedung</label>
                                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="15" required="">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Unit</label>
                                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="10" required="">
                                        </div>
                                        {{-- <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Luas Kampus (m2)</label>
                                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                        </div> --}}
                                        {{-- <div class="col-span-2 sm:col-span-1">
                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                                            <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                                        </div> --}}
                                        {{-- <div class="col-span-2 sm:col-span-1">
                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                                            <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                                <option selected="">Select category</option>
                                                <option value="TV">TV/Monitors</option>
                                                <option value="PC">PC</option>
                                                <option value="GA">Gaming/Console</option>
                                                <option value="PH">Phones</option>
                                            </select>
                                        </div> --}}
                                        <div class="col-span-2">
                                            <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Foto Kampus</label>
                                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                            <li>
                                                <a href="{{ asset('storage/dokumen/Dokumen.pdf') }}"
                                                    target="_blank">Foto.jpeg</a>
                                            </li>
                                        </div>
                                        <div class="col-span-2">
                                            <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Dokumen Kampus</label>
                                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="user_avatar_help" id="user_avatar" type="file" >
                                            <li>
                                                <a href="{{ asset('storage/dokumen/Dokumen.pdf') }}"
                                                    target="_blank">Dokumen.pdf</a>
                                            </li>
                                        </div>
                                        <div class="col-span-2">
                                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Kampus</label>
                                            <textarea wire:model="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500" placeholder="Kampus pusat UNJ"></textarea>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="text-white inline-flex items-center bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                            Tambah
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a href="" type="button" class="justify-center inline-flex items-center gap-2 px-3 py-1.5 text-xs font-medium text-center text-white bg-green-700 rounded-sm hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                        </svg>
                        Simpan
                    </a>
                    {{-- <a href="" type="button" class="px-1 py-1 text-xs font-medium text-center text-white bg-green-700 rounded-sm hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                        Simpan
                    </a> --}}
                </td>
            </tr>
        </tbody>
    </table>
=======
<div class="w-full px-40">
    <div class="flex flex-col my-5">
        <a href="/" class="size-5"><img src="{{ asset('logos/back-svgrepo-com.svg') }}" alt=""></a>
        <h4 class="text-[#006569] font-bold text-4xl mt-2 text-center">EDIT KAMPUS</h4>
    </div>
    <div class="group grid grid-flow-col-dense grid-rows-3 gap-4 lg:justify-items-start text-[#006569] md:justify-items-center">
        <div class="font-bold text-4xl sm:hidden md:hidden lg:inline ">
            <input type="text" class="input bg-gray-400" placeholder="KAMPUS A">
        </div>
        <div class="row-span-2 sm:hidden md:hidden lg:inline">
            <div class="grid grid-flow-row gap-3 font-semibold">
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Alamat</div>
                    <div>:</div>
                    <div>
                        <input type="text" class="input bg-gray-400">
                    </div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Jumlah Gedung</div>
                    <div>:</div>
                    <div>
                        <input type="text" class="input bg-gray-400">
                    </div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Luas</div>
                    <div>:</div>
                    <div>
                        <input type="text" class="input bg-gray-400">
                    </div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Fakultas</div>
                    <div>:</div>
                    <div>
                        <input type="text" class="input bg-gray-400">
                    </div>
                </div>
                <div class="flex justify-center">
                    <a href="" class="btn bg-green-500">Save</a>
                </div>
                {{-- <div>Alamat</div> <div>:</div> <div>Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</div>
          <div>Jumlah gedung</div> <div>:</div> <div>200</div> --}}
            </div>
        </div>
    </div>
    <div class="lg:hidden text-[#006569]">
        <div class="font-bold text-4xl  sm:hidden md:hidden lg:inline">KAMPUS A</div>
        <div class="row-span-2  sm:hidden md:hidden lg:inline">
            <div class="grid grid-flow-row gap-3 font-semibold">
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Alamat</div>
                    <div>:</div>
                    <div>Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Jumlah Gedung</div>
                    <div>:</div>
                    <div>10</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Luas</div>
                    <div>:</div>
                    <div>1.000 hektar</div>
                </div>
                <div class="grid grid-cols-[150px_10px_auto]">
                    <div>Fakultas</div>
                    <div>:</div>
                    <div>FMIPA, FT, FBS, FE, FIP, FISH, </div>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <a href="/edit" class="btn bg-yellow-500">Edit</a>
                    <a href="" class="btn bg-red-500">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-3 mt-12">
        <div class="card bg-base-100 shadow-sm">
            <figure>
                <img src="backgrounds/unj_bersih.jpeg" alt="Kampus_A_UNJ" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Gedung Dewi Sartika</h2>
                <p class="text-xs md:hidden lg:inline">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                <div class="card-actions">
                    <a href="/gedung" class="btn bg-white text-black">Details</a>
                </div>
            </div>
        </div>
        <div class="card bg-base-100 shadow-sm">
            <figure>
                <img src="backgrounds/unj_bersih.jpeg" alt="Kampus_A_UNJ" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Gedung Dewi Sartika</h2>
                <p class="text-xs md:hidden lg:inline">Jl. Rawamangun Muka, RT.11/RW14, Rawamangun, Pulo Gadung, Jakarta Timur, Daerah Khusus Jakarta, 13320</p>
                <div class="card-actions">
                    <a href="" class="btn bg-white text-black">Details</a>
                </div>
            </div>
        </div>
        <div class="card bg-base-100 shadow-sm">
            <figure>
                <img src="backgrounds/unj_bersih.jpeg" alt="Kampus_A_UNJ" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Gedung Dewi Sartika</h2>
                <p class="text-xs md:hidden lg:inline">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                <div class="card-actions">
                    <a href="" class="btn bg-white text-black">Details</a>
                </div>
            </div>
        </div>
        <div class="card bg-base-100 shadow-sm">
            <figure>
                <img src="backgrounds/unj_bersih.jpeg" alt="Kampus_A_UNJ" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Gedung Dewi Sartika</h2>
                <p class="text-xs md:hidden lg:inline">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                <div class="card-actions">
                    <a href="" class="btn bg-white text-black">Details</a>
                </div>
            </div>
        </div>
        {{-- <a href="/kampus">
      <div class="card group bg-[url(/public/backgrounds/unj_bersih.jpeg)] bg-cover h-53 ">
        <div class="card-body rounded-box backdrop-brightness-75 group-hover:backdrop-brightness-50 group-hover:backdrop-blur-xs transition-all duration-400">
          <h2 class="card-title text-3xl group-hover:text-2xl transition-all duration-400">Gedung Dewi Sartika</h2>
          <p class="hidden group-hover:inline transition-all duration-400">Kampus utama UNJ</p>
          <p class="hidden text-xs group-hover:inline transition-all duration-400">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
        </div>
      </div>
    </a> --}}
        <a href="/tambahgedung">
            <div class="card group h-53 outline-3 outline-dashed outline-[#006569] transition-all duration-400">
                <div class="card-body">
                    <p class="font-bold text-[#006569] text-2xl text-center group-hover:text-3xl transition-all duration-400">Tambah Gedung</p>
                    <p class="font-extrabold text-[#006569] text-6xl text-center group-hover:text-7xl transition-all duration-400">+</p>
                </div>
            </div>
        </a>
    </div>
>>>>>>> public_view
</div>
