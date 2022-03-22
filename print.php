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

$redirect = "?menu=print";
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

if(isset($_GET['menu']) && $_GET['menu'] === 'print'){ 
    $id = $_GET['id'];
    $data = $go->detail($con, $table, $id);
};



?>

<div class="container w-100 mt-5">
    <div class="card border-primary mb-3" style="max-width: 100rem;">
        <div class="card-header">Info Pendaftaran</div>
        <div class="card-body">
        <form method="POST">
            <input type="hidden" name="student-id" value="<?= $data['no_daftar'] ?>">
            <fieldset class="form-group">
                <h5>Nama Lengkap</h5>
                <p><?= $data['nama'] ?></p>
            
            </fieldset>
            <fieldset class="form-group">
                <h5>Alamat Lengkap</h5>
                <p><?= $data['alamat'] ?></p>
            
            </fieldset>
            <fieldset class="form-group">
                <h5>Asal Sekolah</h5>
                <p><?= $data['asal_smp'] ?></p>
            
            </fieldset>
            <fieldset class="form-group">
                <h5>Jenis Kelamin</h5>
                <p><?= (int)$data['jk'] ? 'Laki-Laki' : 'Perempuan' ?></p>
                
            </fieldset>
            <fieldset class="form-group">
                <h5>Agama</h5>
                <p><?= $data['agama'] ?></p>
                
            </fieldset>
            <fieldset class="form-group">
                <h5>Jurusan</h5>
                <p><?= $data['jurusan'] ?></p>
            </fieldset>
        </form>
        </div>
    </div>
    <script>
        window.print()
    </script>
</div>