<x-app-layout title="Tagihan Minggu Pertama">

    @section('header')
        <h4 class="text-primary">Daftar Tagihan Minggu Pertama</h4>
    @endsection

    <div class="row">
        <div class="col-md-6 col-lg-12">
            @livewire('bills.first-week-table')
        </div>
    </div>

</x-app-layout>