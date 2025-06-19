<div class="container">
    <div class="row align-items-center mb-4">
        <div class="col-md-8">
            <h2 class="mb-0">DETAIL MANAJEMEN GEDUNG DAN RUANG UNJ</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ asset('img/kampus a/kampus-a.jpg') }}" class="card-img-top" alt="Rawamangun Muka">
                <div class="card-body">
                    <h5 class="card-title">Kampus Rawamangun Muka</h5>
                    <p class="card-text">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo
                        Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220
                    </p>
                    <div class="d-flex justify-content-center">
                        <a href="detail-kampus-a" class="btn btn-info btn-block">Lihat Detail Kampus</a>
                    </div>
                    {{-- <a href="{{ route('kampus.detail', ['id' => 1]) }}" class="btn btn-info btn-block">Lihat Detail
                    Kampus
                </a> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ asset('img/kampus b/kampus-b.jpeg') }}" class="card-img-top" alt="Rawamangun Muka">
                <div class="card-body">
                    <h5 class="card-title">Kampus Pemuda</h5>
                    <p class="card-text">Jl. Velodrome No.2, RW.6, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur,
                        Daerah Khusus Ibukota Jakarta 13220
                    </p>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-info btn-block">Lihat Detail Kampus</a>
                    </div>
                    {{-- <a href="{{ route('kampus.detail', ['id' => 1]) }}" class="btn btn-info btn-block">Lihat Detail
                    Kampus
                </a> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ asset('img/kampus a/kampus-a.jpg') }}" class="card-img-top" alt="Rawamangun Muka">
                <div class="card-body">
                    <h5 class="card-title">Kampus Rawamangun Muka</h5>
                    <p class="card-text">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo
                        Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220
                    </p>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-info btn-block">Lihat Detail Kampus</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ asset('img/kampus a/kampus-a.jpg') }}" class="card-img-top" alt="Rawamangun Muka">
                <div class="card-body">
                    <h5 class="card-title">Kampus Rawamangun Muka</h5>
                    <p class="card-text">Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo
                        Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220
                    </p>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-info btn-block">Lihat Detail Kampus</a>
                    </div>
                    {{-- <a href="{{ route('kampus.detail', ['id' => 1]) }}" class="btn btn-info btn-block">Lihat Detail
                    Kampus
                </a> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Daftar Kampus --}}
    {{-- <table class="table table-bordered">
        <thead style="background-color: rgb(0, 101, 105);">
            <tr>
                <th style="color: #fff;">No</th>
                <th style="color: #fff;">Nama Kampus</th>
                <th style="color: #fff;">Alamat Kampus</th>
                <th style="color: #fff;">No Telp Kampus</th>
                <th style="color: #fff;">Email Kampus</th>
                <th style="color: #fff;">Jumlah Gedung</th>
                <th style="color: #fff;">Jumlah Unit</th>
                <th style="color: #fff;">Luas Wilayah Kampus</th>
                <th style="color: #fff;">Foto Kampus</th>
                <th style="color: #fff;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <td>1</td>
            <td>Kampus Rawamangun Muka</td>
            <td>Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus
                Ibukota Jakarta 13220</td>
            <td>(021) 4898486</td>
            <td>HumasKomunikasiDigital@unj.ac.id</td>
            <td>50</td>
            <td>15</td>
            <td>1000 M2</td>
            <td>Foto Kampus</td>
            <td class="text-center">
                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                <form action="#" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                </form>
            </td>
        </tbody>
    </table> --}}
</div>