<?php

namespace App\Controllers;

class Peminjaman extends BaseController
{
    public function form($id)
    {
        $db = \Config\Database::connect();

        $alat = $db->table('alat')
            ->where('id_alat', $id)
            ->get()
            ->getRowArray();

        return view('peminjaman/form', [
            'alat' => $alat
        ]);
    }

    public function simpan()
    {
        $db = \Config\Database::connect();

        $db->table('peminjaman')->insert([
            'id_alat' => $this->request->getPost('id_alat'),
            'nama_peminjam' => $this->request->getPost('nama'),
            'tanggal_pinjam' => date('Y-m-d')
        ]);

        // kurangi stok
        $db->query("UPDATE alat SET jumlah = jumlah - 1 WHERE id_alat = ?", [
            $this->request->getPost('id_alat')
        ]);

        return redirect()->to('/alat/peminjaman')
            ->with('success', 'Berhasil meminjam alat!');
    }
}
