<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelIdentitasPegawai extends Model
{
    protected $table      = 'tabelIdentitasPegawai';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'tanggalLahir', 'nip', 'noTelepon', 'tahunPengangkatan', 'golongan'];
}
