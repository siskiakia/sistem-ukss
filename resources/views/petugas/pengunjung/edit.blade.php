 @if ($edit)
        <div class="modal fade show" id="modal-default" style="display: block; padding-right: 17px;">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Edit Pengunjung</h4>
                <span wire:click="format" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pengunjung">Pengunjung</label>
                        <br>
                        <label for="pengunjung">nama</label>
                        <input wire:model="nama" type="text" class="form-control" id="pengunjung" min="1">
                        <label for="pengunjung">kelas</label>
                        <input wire:model="kelas" type="text" class="form-control" id="pengunjung" min="1">
                        <label for="pengunjung">tanggal</label>
                        <input wire:model="tanggal" type="date" class="form-control" id="pengunjung" min="1">
                        <label for="pengunjung">keluhan</label>
                        <input wire:model="keluhan" type="text" class="form-control" id="pengunjung" min="1">
                        <label for="pengunjung">obat</label>
                        <input wire:model="obat" type="text" class="form-control" id="pengunjung" min="1">
                        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <span wire:click="format" type="button" class="btn btn-default" data-dismiss="modal">Batal</span>
                <span type="button" wire:click="update({{$pengunjung_id}})" class="btn btn-success">Update</span>
                </div>
            </div>
            </div>
        </div>
    @endif