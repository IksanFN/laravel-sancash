<x-app-layout title="Tambah User">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 p-2 shadow-smooth">
                <div class="card-body">
                    <h5 class="text-center mb-3">Form Tambah User</h5>
                    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                            @error('avatar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Nomor Induk Siswa Nasional</label>
                            <input type="text" name="nisn" class="form-control">
                            @error('nisn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Posisi</label>
                            <select name="position" class="form-select">
                                <option hidden>Pilih Posisi</option>
                                <option value="student">Pelajar</option>
                                <option value="teacher">Guru</option>
                                <option value="treasurer">Bendahara</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('position')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
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