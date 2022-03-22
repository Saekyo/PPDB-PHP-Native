<?php

include "config/koneksi.php";
include "library/oop.php";

$go = new oop();
$table = 'tbl_registrations';
@$field = array(
    'nama' => $_POST['nama'],
    'jk' => $_POST['jk'],
    'alamat' => $_POST['alamat'],
    'agama' => $_POST['agama'],
    'asal_smp' => $_POST['asal_smp'],
    'jurusan' => $_POST['jurusan']
);

$redirect = "?menu=dashboard";
@$where = "no_daftar = $_GET[id]";

if (isset($_POST['simpan'])) {
    $go->simpan($con, $table, $field, $redirect);
}

if (isset($_GET['hapus'])) {
    $go->hapus($con, $table, $where, $redirect);
}

if (isset($_GET['edit'])) {
    $edit = $go->edit($con, $table, $where);
}

if (isset($_POST['ubah'])) {
    $go->ubah($con, $table, $field, $where, $redirect);
}


?>
<div class="container w-50 mt-5">
    <div class="card mt-2 mx-auto p-4 bg-light">
        <div class="card-body bg-light">
            <div class="container">
                <form id="contact-form" role="form" method="POST">
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Nama Lengkap *</label>
                                    <input id="form_name" type="text" value="<?= @$edit['nama'] ?>" name="nama" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Asal Sekolah *</label>
                                    <input id="form_lastname" type="text" value="<?= @$edit['asal_smp'] ?>" name="asal_smp" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_jk">Jenis Kelamin *</label>
                                    <select class="form-select form-control" value="<?= @$edit['jk'] ?>" name="jk" id="exampleSelect1">
                                        <option value="<?= @$edit['jk'] ?>" selected hidden><?= @$edit['jk'] ?></option>
                                        <option value="Laki-Laki">Laki-Laki </option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_need">Agama *</label>
                                    <select id="form_need" name="agama" class="form-control" required="required">
                                        <option value="<?= @$edit['agama'] ?>" selected hidden><?= @$edit['agama'] ?></option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Kong Hu Chu">Kong Hu Chu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_need">Jurusan *</label>
                                    <select class="form-select form-control" value="<?= @$edit['jurusan'] ?>" name="jurusan" id="exampleSelect1">
                                        <option value="<?= @$edit['jurusan'] ?>" selected hidden><?= @$edit['jurusan'] ?></option>
                                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                        <option value="Tata Boga">Tata Boga</option>
                                        <option value="Tata Busana">Tata Busana</option>
                                        <option value="Multimedia">Multimedia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Alamat Lengkap *</label>
                                    <textarea id="form_message" value="<?= @$edit['alamat'] ?>" name="alamat" class="form-control" rows="4" required="required"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12"> <input type="submit" name="ubah" class="btn btn-primary btn-send pt-2 btn-block " value="Submit"> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>