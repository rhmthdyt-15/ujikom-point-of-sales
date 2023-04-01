<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Member;
use App\Models\Pembelian;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kategori = Kategori::count();
        $produk = Produk::count();
        $supplier = Supplier::count();
        $member = Member::count();
        $user = User::count();
        $penjualan = Penjualan::count();
        $pembelian = Pembelian::count();

    
        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');
    
        $data_tanggal = [];
        $data_pendapatan = [];
    
        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);
    
            $total_penjualan = Penjualan::whereDate('created_at', $tanggal_awal)->sum('bayar');
            $total_pembelian = Pembelian::whereDate('created_at', $tanggal_awal)->sum('bayar');
            $total_pengeluaran = Pengeluaran::whereDate('created_at', $tanggal_awal)->sum('nominal');
    
            $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
            $data_pendapatan[] = $pendapatan;
    
            $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
        }
    
        $tanggal_awal = date('Y-m-01');
    
        if (auth()->user()->role == 'admin') {
            return view('pages.admin.dashboard', 
            compact(
                'kategori', 
                'produk', 
                'supplier', 
                'member', 
                'tanggal_awal', 
                'tanggal_akhir', 
                'data_tanggal', 
                'data_pendapatan',
                'user',
                'penjualan',
                'pembelian'
            ));
        } else {
            return view('pages.kasir.dashboard');
        }
    }
}
