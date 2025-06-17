<div class="flex flex-col">
    {{-- Hero --}}
    <div
        class="flex flex-col bg-[url(/public/backgrounds/homepage.png)] bg-cover bg-fixed min-h-screen bg-center justify-center items-center gap-5">
        <img src="{{ asset('logos/unj.png') }}" alt="logo unj">
        <h1 class=" text-2xl lg:text-4xl text-white text-wrap w-3/7 text-center font-semibold">
            Sistem Informasi Manajemen Gedung dan Ruang
        </h1>
        <div class="btn bg-unj-500 border-none shadow-none">
            <a href="/login">login</a>
        </div>
    </div>
    {{-- judul container --}}
    <div class="text-black text-center flex flex-col gap-3 pt-10">
        <h1 class="text-4xl font-semibold">Universitas Negeri Jakarta Multi Kampus</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
        <p class="text-gray-500">isinya kampus-kampus di unj</p>
    </div>
    {{-- card container for campus --}}
    <div class="flex flex-row justify-center mt-3">
        <div class="card bg-unj-500 shadow-sm w-xs">
            <figure>
                <img src="backgrounds/unj_bersih.jpeg" alt="Kampus_A_UNJ" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Kampus Rawamangun</h2>
                <p class="text-xs not-lg:hidden">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota
                    Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                <div class="card-actions">
                    <a href="/gedung"
                        class="btn bg-white text-black w-full hover:bg-gray-200 rounded-lg outline-none">Details</a>
                </div>
            </div>
        </div>
    </div>
    <div class="btn border-none shadow-none mt-5 self-center rounded-full bg-unj-500">LIHAT KAMPUS</div>
    <div>

    </div>
</div>
