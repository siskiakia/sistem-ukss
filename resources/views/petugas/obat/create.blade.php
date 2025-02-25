 @if ($create)
        <div class="modal fade show" id="modal-default" style="display: block; padding-right: 17px;">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Tambah Obat</h4>
                <span wire:click="format" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input wire:model="nama" type="text" class="form-control" id="nama">
                        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input wire:model="satuan" type="text" class="form-control" id="satuan">
                                @error('satuan') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input wire:model="stok" type="number" class="form-control" id="stok" min="1">
                                @error('stok') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input wire:model="foto" type="file" class="form-control" id="foto" min="1">
                        @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select wire:model="kategori_id" wire:click="pilihKategori" class="form-control" id="kategori">
                                    <option selected value="">Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                       <option value="{{$item->id}}">{{$item->nama}}</option>             
                                    @endforeach
                                </select>
                                @error('kategori_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pengunjung">Pengunjung</label>
                                <select wire:model="pengunjung_id" class="form-control" id="pengunjung">
                                    <option selected value="">Pilih Pengunjung</option>
                                    @foreach ($pengunjung as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                                @error('pengunjung_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rak">Rak</label>
                                <select wire:model="rak_id" class="form-control" id="rak">
                                    <option selected value="">Pilih Rak</option>
                                    @isset($rak)
                                        @foreach ($rak as $item)
                                            <option value="{{$item->id}}">Rak : {{$item->rak}}, Baris : {{$item->baris}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                                @error('rak_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <span wire:click="format" type="button" class="btn btn-default" data-dismiss="modal">Batal</span>
                <span type="button" wire:click="store" class="btn btn-success">Simpan</span>
                </div>
            </div>
            </div>
        </div>
    @endif