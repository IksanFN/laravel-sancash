<x-app-layout title="Mapping Pelajar">

    @section('header')
        <h4>Mapping Pelajar</h4>
    @endsection

    <div class="row">
        <div class="col-lg-12 col-md-6">
            <div class="card border-0 shadow-smooth p-2">
                <div class="card-body">
                    <form action="{{ route('students.update', $student->uuid) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Pengguna</label>
                                <select name="user_id" class="form-select">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id  }}" {{ ($user->id == $student->user_id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <select name="group_id" class="form-select">
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id  }}" {{ ($group->id == $student->group_id) ? 'selected' : '' }}>{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                @error('major_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <select name="major_id" class="form-select">
                                    @foreach ($majors as $major)
                                        <option value="{{ $major->id  }}" {{ ($major->id == $student->major_id) ? 'selected' : '' }}>{{ $major->name }}</option>
                                    @endforeach
                                </select>
                                @error('group_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nomor Handphone</label>
                                <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $student->phone_number) }}"/>
                                @error('phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioDefault1" {{ ($student->gender == 'Male') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Laki-laki
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault2" {{ ($student->gender == 'Female') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          Perempuan
                                        </label>
                                    </div>
                                </div>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="address" class="form-control">{{ $student->address }}</textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 text-center">
                        <button type="submit" class="btn btn-secondary shadow-sm px-4">Update</button>
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