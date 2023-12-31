<div>
    <div class="card border-0 p-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" wire:model.live.debounce.1000ms='query' placeholder="Search" class="form-control">
                </div>
                
                <div class="col-md-4 ms-auto text-end">
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
                        <th>Kode Tagihan</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Tagihan</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody class="align-middle">
                        @forelse ($secondWeeks as $bill)
                            <tr wire:key='{{ $bill->id }}'>
                                <td>{{ $loop->index + $secondWeeks->firstItem() }}</td>
                                <td>{{ $bill->bill_code }}</td>
                                <td>{{ $bill->student_nisn }}</td>
                                <td>{{ $bill->student_name }}</td>
                                <td>{{ $bill->student_group }}</td>
                                <td>{{ number_format($bill->bill) }}</td>
                                <td>
                                    @if ($bill->is_paid)
                                        <span class="badge bg-success">Sudah Bayar</span>
                                    @else
                                        <span class="badge bg-danger">Belum Bayar</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm shadow-sm px-3" data-bs-toggle="modal" data-bs-target="#pay">
                                        <i class="bi bi-credit-card me-1"></i> Bayar
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="pay" tabindex="-1" aria-labelledby="payLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="hapusUserLabel">Hapus User</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin akan menghapus nya?</p>
                                                <form action="{{ route('students.destroy', $bill->uuid) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <a href="" class="btn btn-primary">Bayar</a>
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
                {{ $secondWeeks->links() }}
            </div>
        </div>
    </div>
</div>
