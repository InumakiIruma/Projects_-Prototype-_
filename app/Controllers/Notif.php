<?php

namespace App\Controllers;

class Notif extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data = $db->table('notif')
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get()->getResultArray();

        return $this->response->setJSON($data);
    }

    public function count()
    {
        $db = \Config\Database::connect();

        $total = $db->table('notif')
            ->where('status', 'unread')
            ->countAllResults();

        return $this->response->setJSON(['total' => $total]);
    }

    public function read()
    {
        $db = \Config\Database::connect();

        $db->table('notif')
            ->where('status', 'unread')
            ->update(['status' => 'read']);

        return $this->response->setJSON(['success' => true]);
    }
}
