<div class="row">
    <div class="col-12">

    @include('admin-lte/flash')

    {{-- @include('petugas/penerbit/create') --}}

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
            @if ($user->isNotEmpty())
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th width="10%">No</th>
                    <th>Nama</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            @if ($item->roles[0]->name == 'admin')
                                <span class="badge bg-indigo">Admin</span>
                            @elseif ($item->roles[0]->name == 'petugas')
                                <span class="badge bg-olive">Petugas</span>
                            @else
                                <span class="badge bg-fuchsia">Peminjam</span>
                            @endif
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
        {{$user->links()}}
    </div>

    @if ($user->isEmpty())
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