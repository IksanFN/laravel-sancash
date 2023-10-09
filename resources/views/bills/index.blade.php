<x-app-layout title="Tagihan">

    @section('header')
        <h4>Tagihan</h4>
    @endsection

    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-smooth p-2">
                <div class="card-body">
                    <h5>Minggu Pertama</h5>
                    <p>Daftar Tagihan di Minggu Pertama</p>
                    <a href="{{ route('bills.first_week') }}" class="btn btn-secondary shadow-sm btn-sm px-3">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-smooth p-2">
                <div class="card-body">
                    <h5>Minggu Kedua</h5>
                    <p>Daftar Tagihan di Minggu Kedua</p>
                    <a href="" class="btn btn-secondary shadow-sm btn-sm px-3">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-smooth p-2">
                <div class="card-body">
                    <h5>Minggu Ketiga</h5>
                    <p>Daftar Tagihan di Minggu Ketiga</p>
                    <a href="" class="btn btn-secondary shadow-sm btn-sm px-3">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-smooth p-2">
                <div class="card-body">
                    <h5>Minggu Keempat</h5>
                    <p>Daftar Tagihan di Minggu Keempat</p>
                    <a href="" class="btn btn-secondary shadow-sm btn-sm px-3">Lihat</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>