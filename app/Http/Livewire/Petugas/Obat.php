<?php

namespace App\Http\Livewire\Petugas;

use App\Models\Obat as ModelsObat;
use App\Models\Kategori;
use App\Models\Pengunjung;
use App\Models\Rak;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Obat extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    use WithFileUploads;

    public $create, $edit, $delete, $show;
    public $kategori, $rak, $pengunjung;
    public $kategori_id, $rak_id, $pengunjung_id, $baris;
    public $nama, $stok, $satuan, $foto, $obat_id, $search;

    protected $rules = [
        'nama' => 'required',
        'satuan' => 'required',
        'stok' => 'required|numeric|min:1',
        'foto' => 'required|image|max:1024',
        'kategori_id' => 'required|numeric|min:1',
        'rak_id' => 'required|numeric|min:1',
        'pengunjung_id' => 'required|numeric|min:1',
    ];

    protected $validationAttributes = [
        'kategori_id' => 'kategori',
        'rak_id' => 'rak',
        'pengunjung_id' => 'pengunjung',
    ];

    public function pilihKategori()
    {
        $this->rak = Rak::where('kategori_id', $this->kategori_id)->get();
    }

    public function create()
    {
        $this->format();

        $this->create = true;
        $this->kategori = Kategori::all();
        $this->pengunjung = Pengunjung::all();
    }

    public function store()
    {
        $this->validate();

        $this->foto = $this->foto->store('obat', 'public');

        ModelsObat::create([
            'foto' => $this->foto,
            'nama' => $this->nama,
            'satuan' => $this->satuan,
            'stok' => $this->stok,
            'kategori_id' => $this->kategori_id,
            'rak_id' => $this->rak_id,
            'pengunjung_id' => $this->pengunjung_id,
            'slug' => Str::slug($this->nama)
        ]);

        session()->flash('sukses', 'Data berhasil ditambahkan.');
        $this->format();
    }

    public function show(ModelsObat $obat)
    {
        $this->format();

        $this->show = true;
        $this->nama = $obat->nama;
        $this->foto = $obat->foto;
        $this->satuan = $obat->satuan;
        $this->stok = $obat->stok;
        $this->kategori = $obat->kategori->nama;
        $this->pengunjung = $obat->pengunjung->nama;
        $this->rak = $obat->rak->rak;
        $this->baris = $obat->rak->baris;
    }

    public function edit(ModelsObat $obat)
    {
        $this->format();

        $this->edit = true;
        $this->obat_id = $obat->id;
        $this->nama = $obat->nama;
        $this->satuan = $obat->satuan;
        $this->stok = $obat->stok;
        $this->kategori_id = $obat->kategori_id;
        $this->rak_id = $obat->rak_id;
        $this->pengunjung_id = $obat->pengunjung_id;
        $this->kategori = Kategori::all();
        $this->rak = Rak::where('kategori_id', $obat->kategori_id)->get();
        $this->pengunjung = Pengunjung::all();
    }

    public function update(ModelsObat $obat)
    {
        $validasi = [
            'nama' => 'required',
            'satuan' => 'required',
            'stok' => 'required|numeric|min:1',
            'kategori_id' => 'required|numeric|min:1',
            'rak_id' => 'required|numeric|min:1',
            'pengunjung_id' => 'required|numeric|min:1',
        ];

        if ($this->foto) {
            $validasi['foto'] = 'required|image|max:1024';
        }

        $this->validate($validasi);

        if ($this->foto) {
            Storage::disk('public')->delete($obat->foto);
            $this->foto = $this->foto->store('obat', 'public');
        } else {
            $this->foto = $obat->foto;
        }

        $obat->update([
            'foto' => $this->foto,
            'nama' => $this->nama,
            'satuan' => $this->satuan,
            'stok' => $this->stok,
            'kategori_id' => $this->kategori_id,
            'rak_id' => $this->rak_id,
            'pengunjung_id' => $this->pengunjung_id,
            'slug' => Str::slug($this->nama)
        ]);

        session()->flash('sukses', 'Data berhasil diubah.');
        $this->format();
    }

    public function delete(ModelsObat $obat)
    {
        $this->format();

        $this->delete = true;
        $this->obat_id = $obat->id;
    }

    public function destroy(ModelsObat $obat)
    {
        Storage::disk('public')->delete($obat->foto);
        $obat->delete();

        session()->flash('sukses', 'Data berhasil dihapus.');
        $this->format();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search) {
            $obat = ModelsObat::latest()->where('nama', 'like', '%'. $this->search .'%')->paginate(5);
        } else {
            $obat = ModelsObat::latest()->paginate(5);
        }
        
        return view('livewire.petugas.obat', compact('obat'));
    }

    public function format()
    {
        unset($this->create);
        unset($this->delete);
        unset($this->edit);
        unset($this->show);
        unset($this->obat_id);
        unset($this->nama);
        unset($this->foto);
        unset($this->stok);
        unset($this->satuan);
        unset($this->kategori);
        unset($this->pengunjung);
        unset($this->rak);
        unset($this->rak_id);
        unset($this->pengunjung_id);
        unset($this->kategori_id);
    }
}
