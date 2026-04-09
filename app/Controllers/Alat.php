<?php

namespace App\Controllers;

class Alat extends BaseController
{
    public function index()
    {
        return view('alat/index');
    }

    public function data()
    {
        $db = \Config\Database::connect();
        $alat = $db->table('alat')->get()->getResultArray();

        return view('alat/data', [
            'alat' => $alat
        ]);
    }

    public function tambah()
    {
        return view('alat/tambah');
    }

    public function peminjaman()
    {
        $db = \Config\Database::connect();
        $alat = $db->table('alat')->get()->getResultArray();

        return view('alat/peminjaman', [
            'alat' => $alat
        ]);
    }

    // ================= PENGEMBALIAN =================
    public function pengembalian()
    {
        $db = \Config\Database::connect();

        $data = $db->table('peminjaman p')
            ->select('p.id_peminjaman, p.nama_peminjam, p.tanggal_pinjam, a.nama_alat')
            ->join('alat a', 'a.id_alat = p.id_alat')
            ->where('p.status', 'dipinjam')
            ->get()
            ->getResultArray();

        return view('alat/pengembalian', [
            'data' => $data
        ]);
    }

    // ================= TAMBAH ALAT =================
    public function simpan()
    {
        $db = \Config\Database::connect();

        $db->table('alat')->insert([
            'nama_alat' => $this->request->getPost('nama_alat'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jumlah' => $this->request->getPost('persediaan')
        ]);

        return redirect()->to('/alat/data')
            ->with('success', 'Data alat berhasil ditambahkan!');
    }

    // ================= PINJAM =================
    public function pinjam()
    {
        $db = \Config\Database::connect();
        $id_alat = $this->request->getPost('id_alat');

        $alat = $db->table('alat')
            ->where('id_alat', $id_alat)
            ->get()
            ->getRowArray();

        // ❌ stok habis
        if (!$alat || $alat['jumlah'] <= 0) {
            return redirect()->to('/alat/peminjaman')
                ->with('error', 'Stok alat sudah habis!');
        }

        // ✅ simpan peminjaman
        $db->table('peminjaman')->insert([
            'id_alat' => $id_alat,
            'nama_peminjam' => $this->request->getPost('nama'),
            'tanggal_pinjam' => date('Y-m-d'),
            'status' => 'dipinjam'
        ]);

        // ✅ notif
        $db->table('notif')->insert([
            'nama_peminjam' => $this->request->getPost('nama'),
            'nama_alat' => $alat['nama_alat'],
            'status' => 'unread'
        ]);

        // ✅ kurangi stok
        $db->table('alat')
            ->where('id_alat', $id_alat)
            ->set('jumlah', 'jumlah-1', false)
            ->update();

        return redirect()->to('/alat/peminjaman')
            ->with('success', 'Berhasil meminjam alat!');
    }

    // ================= KEMBALIKAN =================
    public function kembalikan($id)
    {
        $db = \Config\Database::connect();

        $pinjam = $db->table('peminjaman')
            ->where('id_peminjaman', $id) // ✅ FIX
            ->get()
            ->getRowArray();

        if ($pinjam) {

            // ubah status
            $db->table('peminjaman')
                ->where('id_peminjaman', $id)
                ->update(['status' => 'dikembalikan']);

            // tambah stok
            $db->table('alat')
                ->where('id_alat', $pinjam['id_alat'])
                ->set('jumlah', 'jumlah+1', false)
                ->update();
        }

        return redirect()->to('/alat/pengembalian')
            ->with('success', 'Alat berhasil dikembalikan!');
    }

    // ================= NOTIF =================
    public function notif()
    {
        $db = \Config\Database::connect();

        $data = $db->table('notif')
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        return $this->response->setJSON($data);
    }

    public function notifCount()
    {
        $db = \Config\Database::connect();

        $total = $db->table('notif')
            ->where('status', 'unread')
            ->countAllResults();

        return $this->response->setJSON(['total' => $total]);
    }

    public function notifRead()
    {
        $db = \Config\Database::connect();

        $db->table('notif')
            ->where('status', 'unread')
            ->update(['status' => 'read']);

        return $this->response->setJSON(['success' => true]);
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $db = \Config\Database::connect();
        $alat = $db->table('alat')->where('id_alat', $id)->get()->getRowArray();

        return view('alat/edit', [
            'alat' => $alat
        ]);
    }

    public function update($id)
    {
        $db = \Config\Database::connect();

        $db->table('alat')->where('id_alat', $id)->update([
            'nama_alat' => $this->request->getPost('nama_alat'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jumlah' => $this->request->getPost('persediaan')
        ]);

        return redirect()->to('/alat/data')
            ->with('success', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();

        $db->table('alat')->where('id_alat', $id)->delete();

        return redirect()->to('/alat/data')
            ->with('success', 'Data berhasil dihapus!');
    }
}
