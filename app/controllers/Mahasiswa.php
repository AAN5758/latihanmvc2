<?php

class Mahasiswa extends Controller
{
    public function index()
    {

    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/');
            exit;
        } else {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('gagal', 'dihapus', ' ');
            header('Location: ' . BASEURL);
            exit;
        } else {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL);
            exit;
        }
    }
}