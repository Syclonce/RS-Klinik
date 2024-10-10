<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\datjal;
use App\Models\setweb;
use App\Models\order;
use App\Models\order_detail;

class PenjualanController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Penjualan Data";
        $datapjl =  datjal::all();
        return view('penjualan.index', compact('title','datapjl'));
    }

    public function penjualanadd(Request $request)
    {
        $data = $request->validate([
            "nama_barang" => 'required',
            "harga" => 'required',
            "stok" => 'required',
            "ket" => 'required',
        ]);

        datjal::create($data);
        return redirect()->route('penjualan')->with('Success', 'Data golongan darah berhasil di tambahkan');
    }


    public function order()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Order Penjualan";
        $datapjl =  datjal::all();
        return view('penjualan.order', compact('title','datapjl'));
    }

    // public function orderadd(Request $request)
    // {
    //     $data = $request->validate([
    //         "tgl" => 'required',
    //         "time" => 'required',
    //         "nama" => 'required',
    //         "Alamat" => 'required',
    //         "telepon" => 'required',
    //         "email" => 'required',
    //         "jml_tagihan" => 'required',
    //         "potongan" => 'required',
    //         "total_bayar" => 'required',
    //         "jumlah_bayar" => 'required',
    //         "kembalian" => 'required',
    //         "cara_bayar" => 'required',
    //     ]);

    //     $order = new order();
    //     $order->tgl = $data['tgl'];
    //     $order->jam = $data['time'];
    //     $order->nama_pembeli = $data['nama'];
    //     $order->alamat_pembeli = $data['Alamat'];
    //     $order->telepon = $data['telepon'];
    //     $order->email = $data['email'];
    //     $order->keterangan = $data['ket'];
    //     $order->harga = $data['jml_tagihan'];
    //     $order->potongan = $data['potongan'];
    //     $order->harga_total = $data['total_bayar'];
    //     $order->bayar = $data['jumlah_bayar'];
    //     $order->kembalian = $data['kembalian'];
    //     $order->cara_bayar = $data['cara_bayar'];
    //     $order->stok = $data['jml'];
    //     $order->datjal_id = $data['nama_brg'];

    //     $order->save();
    //     return redirect()->route('penjualan.order')->with('Success', 'Data Order berhasil di tambahkan');
    // }

    public function orderadd(Request $request)
    {
        $data = $request->validate([
            "tgl" => 'required',
            "time" => 'required',
            "nama" => 'required',
            "Alamat" => 'required',
            "telepon" => 'required',
            "email" => 'required',
            "jml_tagihan" => 'required',
            "ket" => 'required',
            "potongan" => 'required',
            "total_bayar" => 'required',
            "jumlah_bayar" => 'required',
            "kembalian" => 'required',
            "cara_bayar" => 'required',
            "items" => 'required', // Validasi data items
        ]);

        $order = new order();
        $order->tgl = $data['tgl'];
        $order->jam = $data['time'];
        $order->nama_pembeli = $data['nama'];
        $order->alamat_pembeli = $data['Alamat'];
        $order->telepon = $data['telepon'];
        $order->email = $data['email'];
        $order->keterangan = $data['ket'];
        $order->harga_tagihan = $data['jml_tagihan'];
        $order->potongan = $data['potongan'];
        $order->harga_total = $data['total_bayar'];
        $order->bayar = $data['jumlah_bayar'];
        $order->kembalian = $data['kembalian'];
        $order->cara_bayar = $data['cara_bayar'];
        $order->save();

        $orderdetail = new order_detail();
        // Simpan item yang dipesan
        $items = json_decode($data['items'], true);

        foreach ($items as $item) {
            $orderdetail->datjal_id = $item['nama'];
            $orderdetail->stok = $item['jumlah'];
            $orderdetail->harga = $item['harga'];
        }
        $orderdetail->order_id = $order->id;


        try {
            $orderdetail->save();


            return response()->json(['Success' => 'Data Order berhasil ditambahkan']);
        } catch (\Exception $e) {
            // Mengembalikan pesan error dalam bentuk JSON jika terjadi kesalahan
            return response()->json(['error' => 'Terjadi kesalahan saat menambahkan order'], 500);
        }
    }



    public function pjl()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Penjualan";
        return view('penjualan.pjl', compact('title'));
    }

}
