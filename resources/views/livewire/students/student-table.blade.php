<div>
    <div class="card border-0 p-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" wire:model.live.debounce.1000ms='query' placeholder="Search" class="form-control">
                </div>
                <div class="col-md-2">
                    <select wire:model.live='group' id="" class="form-select">
                        <option value="" selected>--Filter Kelas--</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->student_group }}">{{ $group->student_group }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 ms-auto text-end">
                    <a href="{{ route('students.create') }}" class="btn btn-secondary shadow-sm" ><i class="bi bi-person-plus-fill"></i> Mapping Pelajar</a>
                    <a href="" class="btn btn-success shadow-sm"><i class="bi bi-file-earmark-fill me-1"></i> Excel</a>
                </div>
                <div class="col-md-2">
                    <select wire:model.live='limit' id="" class="form-select">
                        <option value="5">5 Data</option>
                        <option value="10">10 Data</option>
                        <option value="25">25 Data</option>
                        <option value="50">50 Data</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-smooth">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table mb-3">
                    <thead>
                        <th>No</th>
                        <th>Nomor Induk Siswa Nasional</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody class="align-middle">
                        @forelse ($students as $student)
                            <tr wire:key='{{ $student->id }}'>
                                <td>{{ $loop->index + $students->firstItem() }}</td>
                                <td>{{ $student->student_nisn }}</td>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->student_group }}</td>
                                <td>{{ $student->student_major }}</td>
                                <td>
                                    @if ($student->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Non Aktif</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('students.edit', $student->uuid) }}" class="btn btn-sm btn-warning text-white shadow-sm"><i class="bi bi-pencil-square"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#hapusUser">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="hapusUser" tabindex="-1" aria-labelledby="hapusUserLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="hapusUserLabel">Hapus User</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin akan menghapus nya?</p>
                                                <form action="{{ route('students.destroy', $student->uuid) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        <div class="alert alert-warning text-center" role="alert">
                            <strong>Data belum ada!</strong>
                        </div>
                        @endforelse
                        
                    </tbody>
                </table>
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
