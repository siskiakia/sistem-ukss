<?php

namespace App\Http\Livewire\Petugas;

use App\Models\Obat;
use App\Models\Pengunjung as ModelsPengunjung;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Pengunjung extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $create, $edit, $delete;
    public $nama, $pengunjung_id, $search;

    protected $rules = [
        'nama' => 'required',
    ];

    public function create()
    {
        $this->create = true;
    }

    public function store()
    {
        $this->validate();

        ModelsPengunjung::create([
            'nama' => $this->nama,
            'slug' => Str::slug($this->nama)
        ]);

        session()->flash('sukses', 'Data berhasil ditambahkan.');
        $this->format();
    }

    public function edit(ModelsPengunjung $pengunjung)
    {
        $this->format();

        $this->edit = true;
        $this->nama = $pengunjung->nama;
        $this->pengunjung_id = $pengunjung->id;
    }

    public function update(ModelsPengunjung $pengunjung)
    {
        $this->validate();

        $pengunjung->update([
            'nama' => $this->nama,
            'slug' => Str::slug($this->nama)
        ]);

        session()->flash('sukses', 'Data berhasil diubah.');
        $this->format();
    }

    public function delete(ModelsPengunjung $pengunjung)
    {
        $this->delete = true;
        $this->pengunjung_id = $pengunjung->id;
    }

    public function destroy(ModelsPengunjung $pengunjung)
    {
        $obat = Obat::where('pengunjung_id', $pengunjung->id)->get();
        foreach ($obat as $key => $value) {
            $value->update([
                'pengunjung_id' => 1
            ]);
        }
        $pengunjung->delete();

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
            $pengunjung = ModelsPengunjung::latest()->where('nama', 'like', '%'. $this->search .'%')->paginate(5);
        } else {
            $pengunjung = ModelsPengunjung::latest()->paginate(5);
        }
        
        return view('livewire.petugas.pengunjung', [
            'pengunjung' => $pengunjung
        ]);
    }

    public function format()
    {
        unset($this->create);
        unset($this->edit);
        unset($this->delete);
        unset($this->nama);
        unset($this->pengunjung_id);
    }
}
