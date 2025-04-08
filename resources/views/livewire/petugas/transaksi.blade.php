<div class="container mt-4">
    <h3 class="mb-3"></h3>

    {{-- Filter & Pencarian --}}
    <div class="row mb-3">
        <div class="col-md-6">
            <button class="btn btn-outline-primary" wire:click="belumDipinjam">Belum Dipinjam</button>
            <button class="btn btn-outline-warning" wire:click="sedangDipinjam">Sedang Dipinjam</button>
            <button class="btn btn-outline-success" wire:click="selesaiDipinjam">Selesai Dipinjam</button>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" wire:model="search" placeholder="Cari kode pinjam...">
        </div>
    </div>

    {{-- Alert Notifikasi --}}
    @if(session()->has('sukses'))
        <div class="alert alert-success">
            {{ session('sukses') }}
        </div>
    @endif

    {{-- Tabel Data --}}
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Kode Pinjam</th>
                    <th>Peminjam</th>
                    <th>Obat</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksi as $item)
                    <tr>
                        <td>{{ $item->kode_pinjam }}</td>
                        <td>{{ $item->user ? $item->user->name : 'Tidak Diketahui' }}</td>
                        <td>
                            @foreach($item->detail_peminjaman as $detail)
                                {{ $detail->obat->nama }} ({{ $detail->jumlah }})
                                <br>
                            @endforeach
                        </td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->tanggal_pinjam }}</td>
                        <td>{{ $item->tanggal_kembali }}</td>
                        <td>
                            @if($item->status == 1)
                                <span class="badge badge-secondary">Belum Dipinjam</span>
                            @elseif($item->status == 2)
                                <span class="badge badge-warning">Sedang Dipinjam</span>
                            @elseif($item->status == 3)
                                <span class="badge badge-success">Selesai</span>
                            @endif
                        </td>
                        <td>
                            @if($item->status == 1)
                                <button class="btn btn-primary btn-sm" wire:click="pinjam({{ $item->id }})">Pinjam</button>
                            @elseif($item->status == 2)
                                <button class="btn btn-success btn-sm" wire:click="kembali({{ $item->id }})">Kembalikan</button>
                            @else
                                <span>-</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data transaksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $transaksi->links() }}
    </div>
</div>
