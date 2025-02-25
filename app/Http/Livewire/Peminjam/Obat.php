<?php

namespace App\Http\Livewire\Peminjam;

use App\Models\Obat as ModelsObat;
use App\Models\DetailPeminjaman;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Obat extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['pilihKategori', 'semuaKategori'];

    public $kategori_id, $pilih_kategori, $obat_id, $detail_obat, $search;

    public function pilihKategori($id)
    {
        $this->format();
        $this->kategori_id = $id;
        $this->pilih_kategori = true;
        $this->updatingSearch();
    }

    public function semuaKategori()
    {
        $this->format();
        $this->pilih_kategori = false;
        $this->updatingSearch();
    }

    public function detailObat($id)
    {
        $this->format();
        $this->detail_obat = true;
        $this->obat_id = $id;
    }

    public function keranjang(ModelsObat $obat)
    {
        // user harus login
        if (auth()->user()) {
            
            // role peminjam
            if (auth()->user()->hasRole('peminjam')) {
               
                $peminjaman_lama = DB::table('peminjaman')
                    ->join('detail_peminjaman', 'peminjaman.id', '=', 'detail_peminjaman.peminjaman_id')
                    ->where('peminjam_id', auth()->user()->id)
                    ->where('status', '!=', 3)
                    ->get();

                // jumlah maksimal 2
                if ($peminjaman_lama->count() == 2) {
                    session()->flash('gagal', 'Obat yang dipinjam maksimal 2');
                } else {

                    // peminjaman belum ada isinya
                    if ($peminjaman_lama->count() == 0) {
                        $peminjaman_baru = Peminjaman::create([
                            'kode_pinjam' => random_int(100000000, 999999999),
                            'peminjam_id' => auth()->user()->id,
                            'status' => 0
                        ]);

                        DetailPeminjaman::create([
                            'peminjaman_id' => $peminjaman_baru->id,
                            'obat_id' => $obat->id
                        ]);

                        $this->emit('tambahKeranjang');
                        session()->flash('sukses', 'Obat berhasil ditambahkan ke dalam keranjang');
                    } else {

                        // buku tidak boleh sama
                        if ($peminjaman_lama[0]->obat_id == $obat->id) {
                            session()->flash('gagal', 'Obat tidak boleh sama');
                        } else {

                            DetailPeminjaman::create([
                                'peminjaman_id' => $peminjaman_lama[0]->peminjaman_id,
                                'obat_id' => $obat->id
                            ]);

                            $this->emit('tambahKeranjang');
                            session()->flash('sukses', 'Obat berhasil ditambahkan ke dalam keranjang');
                        }

                    }

                }

            } else {
                session()->flash('gagal', 'Role user anda bukan peminjam');
            }

        } else {
            session()->flash('gagal', 'Anda harus login terlebih dahulu');
            redirect('/login');
        }
        
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->pilih_kategori) {
            if ($this->search) {
                $obat = ModelsObat::latest()->where('nama', 'like', '%'. $this->search .'%')->where('kategori_id', $this->kategori_id)->paginate(12);
            } else {
                $obat = ModelsObat::latest()->where('kategori_id', $this->kategori_id)->paginate(12);
            }
            $title = Kategori::find($this->kategori_id)->nama;
        }elseif ($this->detail_obat) {
            $obat = ModelsObat::find($this->obat_id);
            $title = 'Detail Obat';
        } else {
            if ($this->search) {
                $obat = ModelsObat::latest()->where('nama', 'like', '%'. $this->search .'%')->paginate(12);
            } else {
                $obat = ModelsObat::latest()->paginate(12);
            }
            $title = 'Semua Obat';
        }
        
        return view('livewire.peminjam.obat', compact('obat', 'title'));
    }

    public function format()
    {
        $this->detail_obat = false;
        $this->pilih_kategori = false;
        unset($this->obat_id);
        unset($this->kategori_id);
    }
}
