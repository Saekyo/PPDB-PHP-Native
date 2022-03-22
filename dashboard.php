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


<body>
    <div class="container">
        <!-- <form method="post">
            <table>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="mb-2">
                            <label for="formUsername" class="form-label">Username</label>
                            <input class="form-control" id="formUsername" type="text" name="user" value="<?php echo @$edit['username'] ?>" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="mb-2">
                            <label for="formPassword" class="form-label">Password</label>
                            <input class="form-control" id="formPassword" type="text" name="pass" value="<?php echo base64_decode(@$edit['password']) ?>" required>
                        </div>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <?php if (@$_GET['id'] == "") { ?>
                            <input class="btn btn-primary mb-3" type="submit" name="simpan" value="Simpan">
                        <?php } else { ?>
                            <input class="btn btn-primary mb-3" type="submit" name="ubah" value="Ubah">
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </form> -->
        <form method="post">
             <table id="table-id" class="table table-striped table-bordered" style="width:100%"> 
                <thead>
                    <tr>
                        <th>No Pendaftaran</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>Asal SMP</th>
                        <th>Jurusan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = $go->tampil($con, $table);
                    if ($data == "") {
                        echo "<tr><td colspan='4'>No Data</td></tr>";
                    } else {
                        foreach ($data as $r) {

                    ?>
                            <tr>
                                <td><?php echo $r['no_daftar'] ?></td>
                                <td><?php echo $r['nama'] ?></td>
                                <td><?php echo $r['jk'] ?></td>
                                <td><?php echo $r['alamat'] ?></td>
                                <td><?php echo $r['agama'] ?></td>
                                <td><?php echo $r['asal_smp'] ?></td>
                                <td><?php echo $r['jurusan'] ?></td>
                                <td class="text-center"><a class="btn btn-danger mr-2" href="?menu=dashboard&hapus&id=<?php echo $r['no_daftar'] ?>" onclick="return confirm('Hapus Data?')">Hapus</a> <span><a class="btn btn-primary ml-2" href="?menu=edit&id=<?php echo $r['no_daftar'] ?>">Edit</a></span></td>
                            </tr>
                    <?php }
                    } ?>

                </tbody>
                <tfoot>
                    <!-- <td></td>
                    <td>
                        <input class="form-control" placeholder="Username" id="formUsername" type="text" name="user" value="<?php echo @$edit['username'] ?>" required>
                    </td>
                    <td>
                        <input class="form-control" placeholder="Password" id="formPassword" type="text" name="pass" value="<?php echo base64_decode(@$edit['password']) ?>" required>
                    </td>
                    <td colspan="2" class="text-center">
                        <?php if (@$_GET['id'] == "") { ?>
                            <input class="btn btn-success" type="submit" name="simpan" value="Simpan Data">
                        <?php } else { ?>
                            <input class="btn btn-success" type="submit" name="ubah" value="Edit Data">
                        <?php } ?>
                    </td> -->
                </tfoot>
            </table>
        </form>
    </div>
</body>
