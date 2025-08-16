<div class="flex flex-col min-w-full">
    {{-- Hero --}}
    <div
        class="flex flex-col bg-[url(/public/backgrounds/homepage.png)] bg-cover bg-fixed min-h-screen bg-center justify-center items-center gap-5">
        <img src="{{ asset('logos/UNJ22.png') }}" alt="logo unj" class="w-60">
        <h1 class=" text-2xl lg:text-6xl text-white text-wrap w-3/7 text-center font-semibold">
            SISTEM INFORMASI GEDUNG DAN RUANG
        </h1>
        {{-- login button --}}
        <div class="btn btn-xl w-34 bg-unj border-none shadow-none">
            <img src="{{ asset('logos/login.svg') }}" alt="" class="w-10 ">
            <a href="/login">login</a>
        </div>
    </div>
    {{-- judul container --}}
    <div class="text-black text-center flex flex-col gap-3 pt-30" id="kampus">
        <h1 class="text-4xl font-semibold">Universitas Negeri Jakarta Multi Kampus</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
        <p class="text-gray-500">Kampus-Kampus UNJ</p>
    </div>
    {{-- card container for campus --}}
    <div class="flex flex-wrap justify-center mt-3 gap-3">
        @foreach ($campuses as $campus)
            <div class="card bg-unj shadow-sm w-xs">
                <figure>
                    <img src="{{ asset('storage/' . $campus->images_path[0]) }}" alt="Kampus_A_UNJ" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">{{ $campus->name }}</h2>
                    <p class="text-xs not-lg:hidden">{{ $campus->address }}</p>
                    <div class="card-actions">
                        <a href="/kampus/{{ $campus->slug }}"
                            class="btn bg-white text-black w-full hover:bg-gray-200 rounded-lg outline-none">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button class="btn border-none shadow-none mt-5 self-center rounded-full bg-unj"><a href="/kampus">LIHAT
            KAMPUS</a></button>
    {{-- list beberapa gedung di UNJ --}}
    <div class="text-black text-center flex flex-col gap-3 pt-30" id="gedung">
        <h1 class="text-4xl font-semibold">Gedung - Gedung Universitas Negeri Jakarta</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
    </div>
    {{-- card container for campus --}}
    <div class="flex flex-wrap justify-center mt-3 gap-3">
        @foreach ($buildings as $building)
            <div class="card bg-unj shadow-sm w-xs">
                <figure>
                    <img src="{{ asset('storage/' . $building->images_path[0]) }}" alt="Kampus_A_UNJ" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">{{ $building->name }}</h2>
                    <p class="text-xs not-lg:hidden">{{ $building->address }}</p>
                    <div class="card-actions">
                        <a href="/gedung"
                            class="btn bg-white text-black w-full hover:bg-gray-200 rounded-lg outline-none">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button class="btn border-none shadow-none mt-5 self-center rounded-full bg-unj"><a href="/gedung">LIHAT
            GEDUNG</a></button>
    <div class="text-black text-center flex flex-col gap-3 pt-30" id="gedung">
        <h1 class="text-4xl font-semibold" id="ruang">Ruangan Universitas Negeri Jakarta</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
    </div>
    <div class="grid grid-cols-3 mt-5">
        @foreach ($rooms as $room)
            <a href="#">
                <div class="card group bg-[url(/public/backgrounds/unj_bersih.jpeg)] bg-cover h-53 ">
                    <div
                        class="card-body backdrop-brightness-75 group-hover:backdrop-brightness-50 group-hover:backdrop-blur-xs transition-all duration-400">
                        <h2 class="card-title hidden text-3xl group-hover:inline transition-all duration-400">
                            {{ $room->name }}</h2>
                        {{-- <p class="hidden group-hover:inline transition-all duration-400">{{ $room->building->campus->name }}</p>
                        <p class="hidden group-hover:inline transition-all duration-400">{{ $room->building->name }}</p> --}}
                        <p class="hidden text-xs group-hover:inline transition-all duration-400">
                            {{ $room->description }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="text-black text-center flex flex-col gap-3 pt-30" id="statistik">
        <h1 class="text-4xl font-semibold">Grafik Statistik Informasi Manajemen Gedung dan Ruang</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
        <p class="text-gray-500">Berikut adalah Grafik Statistik Informasi Manajemen Gedung dan Ruang Universitas Negeri
            Jakarta 2025</p>
        <div class="w-1/2 self-center" id="chart"></div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var options = {
        chart: {
            type: 'line'
        },
        series: [{
            name: 'sales',
            data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
        }],
        xaxis: {
            categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('navbar');
        const scrolledClass = 'bg-unj';
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
