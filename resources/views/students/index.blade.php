<x-app-layout title="Pelajar">

    @section('header')
        <h4 class="text-primary">Pelajar</h4>
        <p>Halaman untuk mengakomodir data pelajar</p>
    @endsection

    <div class="row">
        <div class="col-md-6 col-lg-12">
            @livewire('students.student-table')
        </div>
    </div>

</x-app-layout>