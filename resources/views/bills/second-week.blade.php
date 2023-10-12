<x-app-layout title="Tagihan Minggu Kedua">

    @section('header')
        <h4 class="text-primary">Daftar Tagihan Minggu Kedua</h4>
    @endsection

    <div class="row">
        <div class="col-md-6 col-lg-12">
            @livewire('bills.second-week-table')
        </div>
    </div>

</x-app-layout>