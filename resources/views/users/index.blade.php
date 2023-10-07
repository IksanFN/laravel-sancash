<x-app-layout title="Pengguna">

    @section('header')
        <h4 class="text-primary">Pengguna</h4>
        <p>Halaman untuk mengakomodir data pengguna</p>
    @endsection

    <div class="row">
        <div class="col-md-6 col-lg-12">
            @livewire('users.users-table')
        </div>
    </div>

</x-app-layout>