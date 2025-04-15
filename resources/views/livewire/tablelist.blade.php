<div class="mx-20">
    {{-- <h1 class="text-center mt-4 font-bold text-3xl">CONTENT</h1> --}}
    <div class="flex justify-between mt-15">
        <div class="card card-side bg-[#117074] card-sm w-1/6">
            <figure class="bg-[#124F52] w-20">
                <img src="logos/peminjaman.png" class="size-10" alt="peminjaman" >
            </figure>
            <div class="card-body">
                <h2 class="card-title">Peminjaman</h2>
                <p>0</p>
            </div>
        </div>
        <div class="card card-side bg-[#CBB631] card-sm w-1/6">
            <figure class="bg-[#847517] w-20">
                <img src="logos/dibatalkan.png" class="size-10" alt="peminjaman" >
            </figure>
            <div class="card-body">
                <h2 class="card-title">Dibatalkan</h2>
                <p>0</p>
            </div>
        </div>
        <div class="card card-side bg-[#AF1A1A] card-sm w-1/6">
            <figure class="bg-[#7D1818] w-20">
                <img src="logos/ditolak.png" class="size-10" alt="peminjaman" >
            </figure>
            <div class="card-body">
                <h2 class="card-title">Ditolak</h2>
                <p>0</p>
            </div>
        </div>
        <div class="card card-side bg-[#4E8546] card-sm w-1/6">
            <figure class="bg-[#2A4825] w-20">
                <img src="logos/disetujui.png" class="size-10" alt="peminjaman" >
            </figure>
            <div class="card-body">
                <h2 class="card-title">Disetujui</h2>
                <p>0</p>
            </div>
        </div>
    </div>
    <div class="bg-[#006569] rounded-2xl my-4 p-3">
        <label class="input m-4 bg-white">
            <svg class="h-[1em] opacity-50 text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></g></svg>
            <input type="search" class="grow text-black" placeholder="Search" />
        </label>
        <div class="overflow-x-auto rounded-t-box m-3 text-black odd:bg-white even:bg-gray-100">
            <table class="table table-pin-rows">
              <!-- head -->
              <thead>
                <tr class="bg-gray-500 text-black">
                  <th>NO</th>
                  <th>KAMPUS</th>
                  <th>GEDUNG/RUANGAN</th>
                  <th>WAKTU</th>
                  <th>KEPERLUAN</th>
                  <th>STATUS</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                <tr>
                  <th>1</th>
                  <td>Kampus A</td>
                  <td>Gedung Dewi Sartika</td>
                  <td>08:00 - 12:00</td>
                  <td>Pembelajaran</td>
                  <td>Aktif</td>
                  <td>
                    <button class="btn btn-outline bg-green-500 text-white">Yes</button>
                    <button class="btn btn-outline bg-red-600 text-white">No</button>
                  </td>
                </tr>
                <!-- row 2 -->
                <tr>
                  <th>2</th>
                  <td>Kampus A</td>
                  <td>Gedung Hasyim Asy'ari</td>
                  <td>08:00-13:00</td>
                  <td>Acara</td>
                  <td>Aktif</td>
                  <td>
                    <button class="btn btn-outline bg-green-500 text-white">Yes</button>
                    <button class="btn btn-outline bg-red-600 text-white">No</button>
                  </td>
                </tr>
                <!-- row 3 -->
                <tr>
                  <th>3</th>
                  <td>Kampus B</td>
                  <td>Gedung Serbaguna</td>
                  <td>08:00-09:00</td>
                  <td>Bersih-Bersih</td>
                  <td>Aktif</td>
                  <td>
                    <button class="btn btn-outline bg-green-500 text-white">Yes</button>
                    <button class="btn btn-outline bg-red-600 text-white">No</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
    </div>
</div>
