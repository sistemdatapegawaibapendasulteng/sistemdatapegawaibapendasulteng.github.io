<?php

namespace App\Controllers;


class IdentitasPegawai extends BaseController
{
    public function index()
    {
        $identitasPegawai = $this->modelIdentitasPegawai->findAll();
        $data = [
            'identitasPegawai' => $identitasPegawai,
            'validation' => \Config\Services::validation()
        ];
        return view('viewIdentitasPegawai', $data);
    }

    public function tambah()
    {
        if (!$this->validate([
            'tambahNama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} masih kosong'
                ]
            ],
            'tambahTanggalLahir' => [
                'label' => 'Tanggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} masih kosong'
                ]
            ],
            'tambahNip' => [
                'label' => 'NIP',
                'rules' => 'required|numeric|is_unique[tabelIdentitasPegawai.nip]',
                'errors' => [
                    'required' => '{field} masih kosong',
                    'numeric' => '{field} berupa angka',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'tambahNoTelepon' => [
                'label' => 'No Telepon',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} masih kosong',
                    'numeric' => '{field} berupa angka'
                ]
            ],
            'tambahTahunPengangkatan' => [
                'label' => 'Tahun Pengangkatan',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} masih kosong',
                    'numeric' => '{field} berupa angka',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Data Gagal Ditambahkan');
            return redirect()->to('/IdentitasPegawai')->withInput()->with('validation', $validation->listErrors());
        } else {
            $this->modelIdentitasPegawai->save(
                [
                    'nama' => $this->request->getVar('tambahNama'),
                    'tanggalLahir' => $this->request->getVar('tambahTanggalLahir'),
                    'nip' => $this->request->getVar('tambahNip'),
                    'noTelepon' => $this->request->getVar('tambahNoTelepon'),
                    'tahunPengangkatan' => $this->request->getVar('tambahTahunPengangkatan'),
                    'golongan' => $this->request->getVar('tambahGolongan'),
                ]
            );
            session()->setFlashdata('berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->to('/identitasPegawai');
        }
    }
    public function ubah($id)
    {
        $nipLama = $this->modelIdentitasPegawai->where(['id' => $id])->first();
        if ($nipLama['nip'] == $this->request->getVar('ubahNip')) {
            $ruleNip = 'required|numeric';
        } else {
            $ruleNip = 'required|is_unique[tabelIdentitasPegawai.nip]';
        }

        if (!$this->validate([
            "ubahNama.$id" => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} masih kosong'
                ]
            ],
            "ubahTanggalLahir.$id" => [
                'label' => 'Tanggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} masih kosong'
                ]
            ],
            "ubahNip.$id" => [
                'label' => 'NIP',
                'rules' => $ruleNip,
                'errors' => [
                    'required' => '{field} masih kosong',
                    'numeric' => '{field} berupa angka',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            "ubahNoTelepon.$id" => [
                'label' => 'No Telepon',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} masih kosong',
                    'numeric' => '{field} berupa angka'
                ]
            ],
            "ubahTahunPengangkatan.$id" => [
                'label' => 'Tahun Pengangkatan',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} masih kosong',
                    'numeric' => '{field} berupa angka',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Data Gagal Di Ubah');
            return redirect()->to('/IdentitasPegawai')->withInput()->with('validation', $validation->listErrors());
        } else {
            $this->modelIdentitasPegawai->save(
                [
                    'id' => $id,
                    'nama' => $this->request->getVar('ubahNama'),
                    'tanggalLahir' => $this->request->getVar('ubahTanggalLahir'),
                    'nip' => $this->request->getVar('ubahNip'),
                    'noTelepon' => $this->request->getVar('ubahNoTelepon'),
                    'tahunPengangkatan' => $this->request->getVar('ubahTahunPengangkatan'),
                    'golongan' => $this->request->getVar('ubahGolongan'),

                ]
            );
            session()->setFlashdata('berhasil', 'Data Berhasil Di Ubah');
            return redirect()->to('/identitasPegawai');
        }
    }
    public function hapus($id)
    {
        $this->modelIdentitasPegawai->delete($id);
        session()->setFlashdata('berhasil', 'Data Berhasil Di Hapus');
        return redirect()->to('/identitasPegawai');
    }


    public function kepangkatan()
    {
        $identitasPegawai = $this->modelIdentitasPegawai->findAll();
        $data = [
            'identitasPegawai' => $identitasPegawai,
            'validation' => \Config\Services::validation()
        ];
        return view('viewKepangkatan', $data);
    }
}
