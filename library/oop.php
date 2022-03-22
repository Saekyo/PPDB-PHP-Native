<?php


class oop{
                
        function simpan($con, $table, array $field, $redirect){
                    
            $sql = "INSERT INTO $table SET ";   
            foreach($field as $key => $value){
                $sql.=" $key = '$value',";
            }

            $sql = rtrim($sql, ',');            
            $jalan = mysqli_query($con, $sql);

            if($jalan){
                echo "<script>
                alert('Data Berhasil Disimpan');
                document.location.href='$redirect';
                </script>";
            }
            
            else{
                echo "<script>
                alert('Data Tidak Berhasil Disimpan');
                document.location.href='$redirect';
                </script>";
            }
        }

        //NEW CONTROLLER
        function buat($con, $table, array $field){
                    
            $sql = "INSERT INTO $table SET ";   
            foreach($field as $key => $value){
                $sql.=" $key = '$value',";
            }

            $sql = rtrim($sql, ',');            
            $jalan = mysqli_query($con, $sql);

            if($jalan){
                echo "<script>
                alert('Data Berhasil Disimpan');
                document.location.href='index.php';
                </script>";
            }
            
            else{
                echo "<script>
                alert('Data Tidak Berhasil Disimpan');
                document.location.href='index.php';
                </script>";
            }
        }

        function tampil($con, $table){
            $sql = "SELECT * FROM $table";
            $jalan = mysqli_query($con, $sql);
            while($data = mysqli_fetch_assoc($jalan))
                $isi[] = $data;
                return @$isi;
        }

        
        function hapus($con, $tabel, $where, $redirect){
            $sql = "DELETE FROM $tabel WHERE $where";
            $jalan = mysqli_query($con, $sql);
            if($jalan){
                echo "<script>alert('Data Berhasil dihapus');document.location.href='$redirect'</script>";
            }else{
                echo "<script>alert('Data Gagal dihapus');document.location.href='$redirect'</script>";
            }
        }

        
        function edit($con, $tabel, $where){
            $sql = "SELECT * FROM $tabel WHERE $where";
            $jalan = mysqli_query($con, $sql);
            $tampung = mysqli_fetch_assoc($jalan);
            return $tampung;
        }

         
        function ubah($con, $tabel, array $field, $where, $redirect){
            $sql = "UPDATE $tabel SET ";
            foreach($field as $key => $value){
                $sql.= " $key = '$value',";
            }
            $sql = rtrim($sql, ',');
            $sql.= " WHERE $where";
            $jalan = mysqli_query($con, $sql);

            if($jalan){
                echo "<script>alert('Data Berhasil diubah');document.location.href='$redirect'</script>";
            }else{
                echo "<script>alert('Data Gagal diubah');document.location.href='$redirect'</script>";
            }
        }

        
        
        
}
?>