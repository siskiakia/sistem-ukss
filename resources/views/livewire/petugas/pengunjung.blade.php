<div class="row">
    <div class="col-12">

    @include('admin-lte/flash')

    @include('petugas/pengunjung/create')
    @include('petugas/pengunjung/edit')
    @include('petugas/pengunjung/delete')

    <div class="card">
        <div class="card-header">
        <span wire:click="create" class="btn btn-sm btn-primary">Tambah</span>

             <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 250px;">
                <input wire:model="search" type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
                </div>
            </div>
            </div>
            <!-- /.card-header -->
            @if ($pengunjung->isNotEmpty())
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th width="10%">No</th>
                    <th>PENGUNJUNG</th>
                    <th>KELAS</th>
                    <th>TANGGAL</th>
                    <th>KELUHAN</th>
                    <th>OBAT</th>
                    <th width="15%" class="text-end">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($pengunjung as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->kelas ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') ?? '-' }}</td>
                        <td>{{$item->keluhan?? '-'}}</td>
                        <td>

                                    @if(is_array($item->obat) || is_object($item->obat))
                            @foreach($item->obat as $obat)
                                {{ $obat['obat'] }}<br>
                            @endforeach
                        @else
                            {{ $item->obat }}
                        @endif
                         </td>
                        <td class="text-end">
                            <div class="btn-group d-flex justify-content-end">
                                <span wire:click="edit({{$item->id}})" class="btn btn-sm btn-primary mr-2">Edit</span>
                                <span wire:click="delete({{$item ->id}})" class="btn btn-sm btn-danger">Hapus</span>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        @endif
    </div>
    <!-- /.card -->

    <div class="row justify-content-center">
        {{$pengunjung->links()}}
    </div>

    @if ($pengunjung->isEmpty())
        <div class="card">
            <div class="card-body">
                <div class="alert alert-warning">
                    Anda tidak memiliki data
                </div>
            </div>
        </div>
    @endif

    </div>
</div>
<!-- /.row -->