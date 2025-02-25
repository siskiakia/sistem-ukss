<div class="container">
    @include('admin-lte/flash')

    <div class="row">
        <div class="col-md-8 mb-3">
            <h1>{{$title}}</h1>
        </div>
        @if (!$detail_obat)
            <div class="col-md-4">
              <label class="sr-only" for="inlineFormInputGroup">Username</label>
                <div class="input-group mb-2">
                  <input wire:model="search" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Cari Buku">
                  <div class="input-group-prepend">
                    <button class="input-group-text">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
            </div>
        @endif
    </div>

    @if ($detail_obat)
        
        <div class="row">
            <div class="col-md-4">
                <img src="/storage/{{$obat->foto}}" alt="{{$obat->nama}}" width="300" height="400">
            </div>
            <div class="col-md-8">
                 <table class="table">
                  <tbody>
                    <tr>
                      <th>Nama</th>
                      <td>:</td>
                      <td>{{$obat->nama}}</td>
                    </tr>
                    <tr>
                      <th>Satuan</th>
                      <td>:</td>
                      <td>{{$obat->satuan}}</td>
                    </tr>
                    <tr>
                      <th>Kategori</th>
                      <td>:</td>
                      <td>{{$obat->kategori->nama}}</td>
                    </tr>
                    <tr>
                      <th>Pengunjung</th>
                      <td>:</td>
                      <td>{{$obat->pengunjung->nama}}</td>
                    </tr>
                    <tr>
                      <th>Rak</th>
                      <td>:</td>
                      <td>{{$obat->rak->rak}}</td>
                    </tr>
                    <tr>
                      <th>Baris</th>
                      <td>:</td>
                      <td>{{$obat->rak->baris}}</td>
                    </tr>
                    <tr>
                      <th>Stok</th>
                      <td>:</td>
                      <td>{{$obat->stok}}</td>
                    </tr>
                  </tbody>
                </table>

                <button wire:click="keranjang({{$obat->id}})" class="btn btn-success">Keranjang</button>
            </div>
        </div>

    @else
    
        @if ($obat->isNotEmpty())
    
            <div class="row">
                @foreach ($obat as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div wire:click="detailObat({{$item->id}})" class="card mb-4 shadow" style="cursor: pointer">
                        <img src="/storage/{{$item->foto}}" class="card-img-top" alt="{{$item->nama}}" width="200" height="300">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{$item->nama}}</strong></h5>
                            <p class="card-text">{{$item->satuan}}</p>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row justify-content-center">
                {{$obat->links()}}
            </div>

        @else

            <div class="alert alert-danger">
                Data tidak ada
            </div>
        @endif

    @endif
    
</div>