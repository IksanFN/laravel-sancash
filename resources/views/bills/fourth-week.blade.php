<x-app-layout title="Tagihan Minggu Keempat">

    @section('header')
        <h4 class="text-primary">Daftar Tagihan Minggu Keempat</h4>
    @endsection

    <div class="row">
        <div class="col-md-6 col-lg-12">
            @livewire('bills.fourth-week-table')
        </div>
    </div>

</x-app-layout>