<x-app-layout title="Tagihan Minggu Ketiga">

    @section('header')
        <h4 class="text-primary">Daftar Tagihan Minggu Ketiga</h4>
    @endsection

    <div class="row">
        <div class="col-md-6 col-lg-12">
            @livewire('bills.third-week-table')
        </div>
    </div>

</x-app-layout>