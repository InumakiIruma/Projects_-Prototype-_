<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    // Nama tabel di database sesuai dengan SQL yang kita buat tadi
    protected $table            = 'feedback';

    // Primary key tabel
    protected $primaryKey       = 'id';

    // Gunakan auto increment untuk ID
    protected $useAutoIncrement = true;

    // Tipe kembalian data (bisa 'array' atau 'object')
    protected $returnType       = 'array';

    /**
     * allowedFields sangat penting! 
     * Ini adalah daftar kolom yang diizinkan untuk diisi lewat fungsi insert/update.
     * Kolom lain yang tidak terdaftar di sini akan diabaikan demi keamanan.
     */
    protected $allowedFields    = [
        'nama',
        'email',
        'tipe',
        'pesan',
        'created_at'
    ];

    // Mengaktifkan fitur otomatisasi waktu (opsional)
    // Jika true, CI4 akan otomatis mengisi created_at dan updated_at
    protected $useTimestamps    = false;

    /**
     * Catatan: Kita set false karena di Controller kita sudah mengisi 
     * 'created_at' secara manual menggunakan date('Y-m-d H:i:s').
     */
}
