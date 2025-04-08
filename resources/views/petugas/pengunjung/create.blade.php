 @if ($create)
        <div class="modal fade show" id="modal-default" style="display: block; padding-right: 17px;">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Tambah Pengunjung</h4>
                <span wire:click="format" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pengunjung">Pengunjung</label>
                        <input wire:model="nama" type="text" class="form-control" id="nama" min="1">
                        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="pengunjung">Kelas</label>
                        <input wire:model="kelas" type="text" class="form-control" id="kelas" min="1">
                        @error('kelas') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="pengunjung">Tanggal</label>
                        <input wire:model="tanggal" type="date" class="form-control" id="tanggal" min="1">
                        @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="pengunjung">Keluhan</label>
                        <input wire:model="keluhan" type="text" class="form-control" id="keluhan" min="1">
                        @error('keluhan') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="pengunjung">Obat</label>
                        <input wire:model="obat" type="text" class="form-control" id="obat" min="1">
                        @error('obat') <small class="text-danger">{{ $message }}</small> @enderror
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