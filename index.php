<!-- Panggil file header -->
<?php include "header.php";?>
<?php include "koneksi.php";?>




<?php

//Uji jika tombol simpan diklik
if(isset($_POST['blanjut'])){

    if($_GET['hal']=="edit"){
        //Data akan diedit
        $edit = mysqli_query($koneksi," UPDATE tpasien set
                                        nama ='$_POST[nama]',
                                        umur ='$_POST[umur]',
                                        alamat ='$_POST[alamat]',
                                        nope ='$_POST[nope]'
                                        WHERE id_pasien = '$_GET[id]'
                                        ");
        if($edit) //jika Edit berhasil
        {
            echo "<script>
                    alert('Edit Data Sukses!');
                    document.location='bill.php';
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

    else{
        //htmlspecialchars agar imputan lebih aman dari injection

        $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
        $umur = htmlspecialchars($_POST['umur'], ENT_QUOTES);
        $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
        $nope = htmlspecialchars($_POST['nope'], ENT_QUOTES);
    
        //persiapan query simpan data
        $simpan = mysqli_query($koneksi,"INSERT INTO tpasien  VALUES ('','$nama','$umur', '$alamat','$nope')");
    
        //Uji jika simpan data sukses
        if($simpan){
    
            echo "<script>alert('Simpan data sukses, Terima kasih..!');
                   document.location ='appointment.php'</script>";
        } else {
            echo "<script>alert('Simpan data gagal!');
                   document.location ='index.php'</script>";
        }
    }
    }

    if(isset($_GET['hal']))
    {
        //Pengujian jika edit data
        if($_GET['hal']=="edit")
        {
            //tampilknan data yang akan diedit
            $tampil = mysqli_query($koneksi,"SELECT * FROM tpasien WHERE id_pasien = '$_GET[id]'");
            $data   = mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan, maka data ditampung ke dalam variabel
                $vnama = $data['nama'];
                $vumur = $data['umur'];
                $valamat = $data['alamat'];
                $vnope = $data['nope'];
                
            }
        }
        else if($_GET['hal']=="hapus")
        {
            //hapus data dalam tabel
            $hapus = mysqli_query($koneksi,"DELETE FROM tpasien WHERE id_pasien = '$_GET[id]' ");
            if($hapus){
                echo "<script>
                alert('Hapus Data Sukses!');
                document.location='index.php';
                </script>";
            }
            else
            {
                echo "<script>
                alert('Hapus Data Gagal!');
                document.location='bill.php';
                </script>";
            } 
        }
    }

    

    
   

?>


    <div class="head text-center">
        <img src="assets/img/logo.png" width="250" height="250" />
        <h2 class="text-grey">Reservasi Rumah Sakit Bhayangkara <br>Kelompok 8</h2>
    </div>
    <!--  end Head -->
    <!--  Awal row -->
    <div class="row mt-4 s-10 col d-flex justify-content-center">
        <!--  col-lg-7 -->
        <div class ="col-lg-7 mb-3">
            <div class ="card shadow bg-light">
                <!--  card body -->
                <div class =" card-body ">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Identitas Pasien</h1>
                            </div>
                            <form class="user" method ="POST" action ="">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user " value="<?=@$vnama?>" name ="nama" 
                                        placeholder="Nama Pasien" required>
                                </div> 

                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" value="<?=@$vumur?>" name ="umur"
                                        placeholder="Umur Pasien"required>
                                </div> 

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user " value="<?=@$valamat?>" name ="alamat"
                                        placeholder="Alamat Pasien"required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user " value="<?=@$vnope?>" name ="nope"
                                        placeholder="No HP Pasien"required>
                                </div>
                                
                                <button type="submit" name="blanjut" class="btn btn-primary btn-user btn-block">Lanjutkan</button>
                            

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">By Kelompok 8 | 2021 - <?=date('Y')?></a>
                            </div>  
                </div>
                <!--  end card body -->
            </div>
        </div>
        <!--  end col lg-7 -->
    </div>
    <!--  End Row -->

 
<!-- Panggil file footer -->

<?php include "footer.php";?>
