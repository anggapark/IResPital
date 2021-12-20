<?php
    //Koneksi Database
    $server   = "localhost";
    $user     = "root";
    $pass     = "";
    $database = "dblatihan";

    $koneksi  = mysqli_connect($server,$user,$pass,$database)or die(mysqli_error($koneksi));

    //jika tombol simpan diklik
    if(isset($_POST['blanjut']))
    {
        //Pengujian Apakah data akan diedit atau disimpan baru
        if($_GET['hal']=="edit")
        {
            //Data akan diedit
            $edit = mysqli_query($koneksi," UPDATE tmhs set
                                            Nama ='$_POST[tnama]',
                                            Umur ='$_POST[tumur]',
                                            Alamat ='$_POST[talamat]',
                                            dokter ='$_POST[tdokter]',
                                            keluhan ='$_POST[tkeluhan]'
                                            WHERE id_pasien = '$_GET[id]'
                                          ");
            if($edit) //jika Edit berhasil
            {
                echo "<script>
                        alert('Edit Data Sukses!');
                        document.location='index.php';
                    </script>";
            }
            else
            {
                echo "<script>
                        alert('Edit Data Gagal!');
                        document.location='index.php';
                    </script>";
            }  
        }

        else
        {
            //data akan disimpan
            $simpan = mysqli_query($koneksi,"INSERT INTO tmhs (Nama, Umur, Alamat, dokter, keluhan)
                                            VALUES ('$_POST[tnama]',
                                                    '$_POST[tumur]',
                                                    '$_POST[talamat]',
                                                    '$_POST[tdokter]',
                                                    '$_POST[tkeluhan]')
                                                    ");
            if($simpan) //jika simpan berhasil
            {
                echo "<script>
                alert('Simpan Data Sukses!');
                document.location='index.php';
                </script>";
            }
            else
            {
                echo "<script>
                alert('Simpan Data Gagal!');
                document.location='index.php';
                </script>";
            }  
        }
    }
    
        
    

    //Pengujian jika tombol edit/hapus di klik
    if(isset($_GET['hal']))
    {
        //Pengujian jika edit data
        if($_GET['hal']=="edit")
        {
            //tampilknan data yang akan diedit
            $tampil = mysqli_query($koneksi,"SELECT * FROM tmhs WHERE id_pasien = '$_GET[id]'");
            $data   = mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan, maka data ditampung ke dalam variabel
                $vnama = $data['Nama'];
                $vumur = $data['Umur'];
                $valamat = $data['Alamat'];
                $vdokter = $data['dokter'];
                $vkeluhan = $data['keluhan'];
            }
        }
        else if($_GET['hal']=="hapus")
        {
            //hapus data dalam tabel
            $hapus = mysqli_query($koneksi,"DELETE FROM tmhs WHERE id_pasien = '$_GET[id]' ");
            if($hapus){
                echo "<script>
                alert('Hapus Data Sukses!');
                document.location='index.php';
                </script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tugas Akhir Basis Data</title>
    <link rel = "stylesheet" type ="text/css" href = "css/bootstrap.min.css">
</head>
<body>
<div class="container"> 
    <h1 class="text-center">Tugas Akhir Basis Data</h1>
    <h2 class="text-center">Kelompok 8</h2>

    <!-- awal card from -->
    <div class="card mt-3">
    <div class="card-header bg-primary text-white">
        Data Diri Pasien
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label>Nama Pasien</label>
                <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Masukkan nama" required>
                
            </div>

            <div class="form-group">
                <label>Umur</label>
                <input type="number" name="tumur" value="<?=@$vumur?>" class="form-control" placeholder="Masukkan umur" required>
                
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="talamat" placeholder="Masukkan alamat lengkap anda" required><?=@$valamat?></textarea> 
            </div>

            <div class="form-group">
                <label>Dokter</label>
                <select class="form-control" name="tdokter">
                    <option value ="<?=@$vdokter?>"><?=@$vdokter?></option>
                    <option value ="Dokter-Umum">Dokter Umum</option>
                    <option value ="Dokter-Anak">Dokter Anak</option>
                    <option value ="Dokter-THT">Dokter THT</option>
                    <option value ="Dokter-Kulit">Dokter Kulit</option>
                    <option value ="Dokter-PenyakitDalam">Dokter Penyakit Dalam</option>
                    <option value ="Dokter-Bedah Saraf">Dokter Bedah Saraf</option>
                    <option value ="Dokter-Gigi">Dokter Gigi</option>
                    <option value ="Dokter-Mata">Dokter Mata</option>
          
                </select>  
            </div>

            <div class="form-group">
                <label>Keluhan</label>
                <textarea class="form-control" name="tkeluhan" placeholder="Ceritakan keluhan anda" required><?=@$vkeluhan?></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="blanjut">Lanjut</button>
            <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

        </form>
    </div>
    </div>
    <!-- akhir card from -->

    <!-- awal card Tabel -->
    <div class="card mt-3">
    <div class="card-header bg-success text-white">
        Daftar Pasien
    </div>
    <div class="card-body">

    <table class="table table-bordered table-striped">
        <tr>
            <th>No.</th>
            <th>Nama Pasien</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Dokter</th>
            <th>Keluhan</th>
            <th>Aksi</th>
        </tr>
        <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_pasien desc");
            while($data = mysqli_fetch_array($tampil)):
        ?>
        <tr>
            <td><?=$no++;?></td>
            <td><?=$data['Nama']?></td>
            <td><?=$data['Umur']?></td>
            <td><?=$data['Alamat']?></td>
            <td><?=$data['dokter']?></td>
            <td><?=$data['keluhan']?></td>
            <td>
                <a href="index.php?hal=edit&id=<?=$data['id_pasien']?>" class="btn btn-warning">Edit</a>
                <a href="index.php?hal=hapus&id=<?=$data['id_pasien']?>" onclick="return confirm('Yakin ingin menghapus datanya?')" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
    <?php endwhile;//penutup perulangan while?>

    </table>
        
    </div>
    </div>
    <!-- akhir card Tabel -->
</div>
<script type ="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>




