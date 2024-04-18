<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function tambah()
    {
        $nama = $_POST['nama'];
        $nrp = $_POST['nrp'];
        $email = $_POST['email'];
        $jurusan = $_POST['jurusan'];

        $data = $this->model("Mahasiswa_model")->addMahasiswa($nama, $nrp, $email, $jurusan);
        var_dump($data);
        if (!data) {
            Flasher::setFlash("create user", "sukses", "post");
            header('Location: http://localhost/latihanmvc2/public');
        } else {

            Flasher::setFlash("create user", "error", "post");
            header('Location: http://localhost/latihanmvc2/public');
        }
    }
}