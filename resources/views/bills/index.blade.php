<x-app-layout title="Tagihan">

    @section('header')
        <h4>Tagihan</h4>
    @endsection

    <div class="row mb-4 ">
        <div class="col-md-6 col-lg-12">
            <a href="{{ route('bills.create_all') }}" class="btn btn-secondary shadow-sm me-2">Buat Tagihan Per-Kelas</a>
            <a href="" class="btn btn-secondary shadow-sm">Buat Tagihan Individu</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-6 mb-4">
            <div class="card border-0 shadow-smooth p-2">
                <div class="card-body">
                    <h5>Minggu Pertama</h5>
                    <p>Daftar Tagihan di Minggu Pertama</p>
                    <a href="{{ route('bills.first_week') }}" class="btn btn-secondary shadow-sm btn-sm px-3">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 mb-4">
            <div class="card border-0 shadow-smooth p-2">
                <div class="card-body">
                    <h5>Minggu Kedua</h5>
                    <p>Daftar Tagihan di Minggu Kedua</p>
                    <a href="{{ route('bills.second_week') }}" class="btn btn-secondary shadow-sm btn-sm px-3">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 mb-4">
            <div class="card border-0 shadow-smooth p-2">
                <div class="card-body">
                    <h5>Minggu Ketiga</h5>
                    <p>Daftar Tagihan di Minggu Ketiga</p>
                    <a href="{{ route('bills.third_week') }}" class="btn btn-secondary shadow-sm btn-sm px-3">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 mb-4">
            <div class="card border-0 shadow-smooth p-2">
                <div class="card-body">
                    <h5>Minggu Keempat</h5>
                    <p>Daftar Tagihan di Minggu Keempat</p>
                    <a href="{{ route('bills.fourth_week') }}" class="btn btn-secondary shadow-sm btn-sm px-3">Lihat</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>