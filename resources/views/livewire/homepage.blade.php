<div class="flex flex-col w-full">
    {{-- Hero --}}
    <div
        class="flex flex-col bg-[url(/public/backgrounds/homepage.png)] bg-cover bg-fixed min-h-screen bg-center justify-center items-center gap-5">
        <img src="{{ asset('logos/UNJ22.png') }}" alt="logo unj" class="w-60">
        <h1 class=" text-2xl lg:text-6xl text-white text-wrap w-3/7 text-center font-semibold">
            Sistem Informasi Manajemen Gedung dan Ruang
        </h1>
        {{-- login button --}}
        <div class="btn btn-xl w-34 bg-unj-500 border-none shadow-none">
            <img src="{{ asset('logos/login.svg') }}" alt="" class="w-10 ">
            <a href="/login">login</a>
        </div>
    </div>
    {{-- judul container --}}
    <div class="text-black text-center flex flex-col gap-3 pt-10" id="kampus">
        <h1 class="text-4xl font-semibold">Universitas Negeri Jakarta Multi Kampus</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
        <p class="text-gray-500">isinya kampus-kampus di unj</p>
    </div>
    {{-- card container for campus --}}
    <div class="flex flex-col lg:flex-row justify-center mt-3 gap-3">
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
    <button class="btn border-none shadow-none mt-5 self-center rounded-full bg-unj-500"><a href="/listkampus">LIHAT
            KAMPUS</a></button>
    {{-- list beberapa gedung di UNJ --}}
    <div class="text-black text-center flex flex-col gap-3 pt-10" id="gedung">
        <h1 class="text-4xl font-semibold">Gedung - Gedung Universitas Negeri Jakarta</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
    </div>
    {{-- card container for campus --}}
    <div class="flex flex-col lg:flex-row justify-center mt-3 gap-3">
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
    <button class="btn border-none shadow-none mt-5 self-center rounded-full bg-unj-500">LIHAT GEDUNG</button>
    <div class="text-black text-center flex flex-col gap-3 pt-10" id="gedung">
        <h1 class="text-4xl font-semibold">Ruangan Universitas Negeri Jakarta</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
    </div>
    <div class="grid grid-cols-3 mt-5">
        <a href="/kampus">
            <div class="card group bg-[url(/public/backgrounds/unj_bersih.jpeg)] bg-cover h-53 ">
                <div
                    class="card-body backdrop-brightness-75 group-hover:backdrop-brightness-50 group-hover:backdrop-blur-xs transition-all duration-400">
                    <h2 class="card-title text-3xl group-hover:text-2xl transition-all duration-400">Kampus A</h2>
                    <p class="hidden group-hover:inline transition-all duration-400">Kampus utama UNJ</p>
                    <p class="hidden text-xs group-hover:inline transition-all duration-400">Jl. R.Mangun Muka Raya,
                        RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta
                        13220</p>
                </div>
            </div>
        </a>
        <a href="/kampus">
            <div class="card group bg-[url(/public/backgrounds/unj_bersih.jpeg)] bg-cover h-53 ">
                <div
                    class="card-body backdrop-brightness-75 group-hover:backdrop-brightness-50 group-hover:backdrop-blur-xs transition-all duration-400">
                    <h2 class="card-title text-3xl group-hover:text-2xl transition-all duration-400">Kampus A</h2>
                    <p class="hidden group-hover:inline transition-all duration-400">Kampus utama UNJ</p>
                    <p class="hidden text-xs group-hover:inline transition-all duration-400">Jl. R.Mangun Muka Raya,
                        RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta
                        13220</p>
                </div>
            </div>
        </a>
        <a href="/kampus">
            <div class="card group bg-[url(/public/backgrounds/unj_bersih.jpeg)] bg-cover h-53 ">
                <div
                    class="card-body backdrop-brightness-75 group-hover:backdrop-brightness-50 group-hover:backdrop-blur-xs transition-all duration-400">
                    <h2 class="card-title text-3xl group-hover:text-2xl transition-all duration-400">Kampus A</h2>
                    <p class="hidden group-hover:inline transition-all duration-400">Kampus utama UNJ</p>
                    <p class="hidden text-xs group-hover:inline transition-all duration-400">Jl. R.Mangun Muka Raya,
                        RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta
                        13220</p>
                </div>
            </div>
        </a>
        <a href="/kampus">
            <div class="card group bg-[url(/public/backgrounds/unj_bersih.jpeg)] bg-cover h-53 ">
                <div
                    class="card-body backdrop-brightness-75 group-hover:backdrop-brightness-50 group-hover:backdrop-blur-xs transition-all duration-400">
                    <h2 class="card-title text-3xl group-hover:text-2xl transition-all duration-400">Kampus A</h2>
                    <p class="hidden group-hover:inline transition-all duration-400">Kampus utama UNJ</p>
                    <p class="hidden text-xs group-hover:inline transition-all duration-400">Jl. R.Mangun Muka Raya,
                        RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta
                        13220</p>
                </div>
            </div>
        </a>
    </div>
    <div class="text-black text-center flex flex-col gap-3 pt-10" id="kampus">
        <h1 class="text-4xl font-semibold">Grafik Statistik Informasi Manajemen Gedung dan Ruang</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
        <p class="text-gray-500">Berikut adalah Grafik Statistik Informasi Manajemen Gedung dan Ruang Universitas Negeri Jakarta 2025</p>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('navbar');
        const scrolledClass = 'bg-unj-500';
        const scrolledShadow = 'shadow-lg';
        const positionNav = 'fixed';
        const textScrolledClass = 'text-white';

        const scrollHandler = () => {
            if (window.scrollY > 20) {
                navbar.classList.add(scrolledClass, scrolledShadow);
            } else {
                navbar.classList.add(positionNav);
                navbar.classList.remove(scrolledClass, scrolledShadow, 'sticky');
            }
        };

        window.addEventListener('scroll', scrollHandler);
        scrollHandler();
    });
</script>
