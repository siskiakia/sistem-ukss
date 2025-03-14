<div class="row">
    <div class="col-12">

    @include('admin-lte/flash')

    @include('petugas/obat/create')
    @include('petugas/obat/edit')
    @include('petugas/obat/delete')
    @include('petugas/obat/show')

    <div class="card">
        <div class="card-header">
        <span wire:click="create" class="btn btn-sm btn-primary">Tambah</span>

             <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
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
            @if ($obat->isNotEmpty())
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th width="10%">No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Satuan</th>
                    <th>Kategori</th>
                    <th width="15%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($obat as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="/storage/{{$item->foto}}" alt="{{$item->nama}}" width="60" height="80"></td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->satuan}}</td>
                        <td>{{$item->kategori->nama}}</td>
                        <td>
                            <div class="btn-group">
                                <span wire:click="show({{$item->id}})" class="btn btn-sm btn-success mr-2">Lihat</span>
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
        {{$obat->links()}}
    </div>

    @if ($obat->isEmpty())
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