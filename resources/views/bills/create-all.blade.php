<x-app-layout title="Form Tagihan">

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6">
            <div class="card border-0 shadow-smooth p-2">
                
                <div class="card-body">
                    <h5 class="mb-4 text-center">Form Tagihan</h5>
                    <form action="{{ route('bills.store') }}" method="post">

                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <select name="kelas" id="" class="form-select">
                                <option hidden>Pilih Kelas</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->group_id }}">{{ $group->student_group }}</option>
                                @endforeach
                            </select>
                            @error('kelas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Minggu Tagihan</label>
                            <select name="week" class="form-select" id="">
                                <option hidden>Pilih Minggu Tagihan</option>
                                <option value="firstWeek">Minggu Pertama</option>
                                <option value="secondWeek">Minggu Kedua</option>
                                <option value="thirdWeek">Minggu Ketiga</option>
                                <option value="fourthWeek">Minggu Keempat</option>
                            </select>
                            @error('week')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bulan Tagihan</label>
                            <select name="month" class="form-select" id="">
                                <option hidden>Pilih Bulan Tagihan</option>
                                @foreach ($months as $month)
                                    <option value="{{ $month->id }}">{{ $month->month }}</option>
                                @endforeach
                            </select>
                            @error('year')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Tagihan</label>
                            <select name="year" class="form-select" id="">
                                <option hidden>Pilih Tahun Tagihan</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                            @error('year')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Awal Tagihan</label>
                            <input type="date" class="form-control" name="start_of_date">
                            @error('start_of_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Akhir Tagihan</label>
                            <input type="date" class="form-control" name="end_of_date">
                            @error('end_of_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nilai Tagihan</label>
                            <input type="number" class="form-control" name="bill" placeholder="Masukkan nilai tagihan">
                            @error('bill')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2 text-center">
                            <button class="btn btn-secondary shadow-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('script')
    <script>
        $("select").select2({
            theme: "bootstrap-5",
            dropdownCssClass: "select2--small",
        });
    </script>
    @endpush
</x-app-layout>