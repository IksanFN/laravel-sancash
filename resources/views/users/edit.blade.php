<x-app-layout title="Edit User">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 p-2 shadow-smooth">
                <div class="card-body">
                    <h5 class="text-center mb-3">Form Edit User</h5>
                    <form action="{{ route('users.update', $user->uuid) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                            @error('avatar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Nomor Induk Siswa Nasional</label>
                            <input type="text" name="nisn" class="form-control" value="{{ $user->nisn }}">
                            @error('nisn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Posisi</label>
                            <select name="position" class="form-select">
                                <option value="student" {{ ($user->position == 'student') ? 'selected' : '' }}>Pelajar</option>
                                <option value="teacher" {{ ($user->position == 'teacher') ? 'selected' : '' }}>Guru</option>
                                <option value="treasurer" {{ ($user->position == 'treasurer') ? 'selected' : '' }}>Bendahara</option>
                                <option value="admin" {{ ($user->position == 'admin') ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('position')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Update password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-secondary shadow-sm" type="submit">Simpan</button>
                            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary shadow-sm">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>