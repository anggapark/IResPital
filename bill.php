<!-- Panggil file header -->
<?php include "header.php";?>

<?php include "koneksi.php";?>




<?php


//Uji jika tombol simpan diklik
if(isset($_POST['bconfirm'])){
    

    //htmlspecialchars agar imputan lebih aman dari injection
	$jp = htmlspecialchars($_POST['jp'], ENT_QUOTES);
	$id_app = mysqli_query($koneksi,"SELECT MAX(id_app) FROM tappointment");
	$no_app = $id_app -> fetch_array()[0];
    //persiapan query simpan data
    $simpan = mysqli_query($koneksi,"INSERT INTO tbill  VALUES ('','$no_app','$jp','50000')");

    //Uji jika simpan data sukses
    if($simpan){

        echo "<script>alert('Simpan data sukses, Terima kasih..!');
               document.location ='confirm.php'</script>";
    } else {
        echo "<script>alert('Simpan data gagal!');
               document.location ='bill.php'</script>";
    }
}

$id = mysqli_query($koneksi,"SELECT MAX(id_pasien) FROM tpasien");
$no = $id -> fetch_array()[0];
$tampil = mysqli_query($koneksi,"SELECT * FROM tpasien WHERE id_pasien = '$no'");
$data   = mysqli_fetch_array($tampil);
if($data)
{
	//jika data ditemukan, maka data ditampung ke dalam variabel
	$vnama = $data['nama'];
	$vumur = $data['umur'];
	$valamat = $data['alamat'];
	$vnope = $data['nope'];
	
}



?>


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
	<title>FINDOCTOR - Find easily a doctor and book online an appointment</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="assets2/img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="assets2/img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="assets2/img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="assets2/img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="assets2/img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="assets2/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets2/css/style.css" rel="stylesheet">
	<link href="assets2/css/menu.css" rel="stylesheet">
	<link href="assets2/css/vendors.css" rel="stylesheet">
	<link href="assets2/css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
   
    <!-- SPECIFIC CSS -->
    <link href="assets2/css/date_picker.css" rel="stylesheet">
    
	<!-- YOUR CUSTOM CSS -->
	<link href="assets2/css/custom.css" rel="stylesheet">

</head>
<?php
$tampil = mysqli_query($koneksi, "SELECT * from tpasien order by id_pasien desc");
$data = mysqli_fetch_array($tampil)
?>


<body>

<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>

    <!--  end Head -->
    <!--  Awal row -->
    <div class="row mt-4 s-10 ">
        <!--  col-lg-7 -->
   
                <form class="user" method ="POST" action ="">
                <div class="row">
				<div class="col-xl-8 col-lg-8">
				<div class="box_general_3 cart">
					<div class="form_title">
						<h3><strong>1</strong>Data Diri Kamu</h3>
						<p>
							Cek lagi data diri kamu!
						</p>
					</div>
					<div class="step">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" class="form-control"  name="nama" value="<?=@$vnama?>" disabled="disabled" >
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" class="form-control"  name="alamat" value="<?=@$valamat?>" disabled="disabled">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Umur</label>
									<input type="number" name="umur" class="form-control" value="<?=@$vumur?>" disabled="disabled" >
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
							<?php
			
								$tampil = mysqli_query($koneksi, "SELECT * from tpasien order by id_pasien desc");
								$data = mysqli_fetch_array($tampil)
							?>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
								<a href="index.php?hal=edit&id=<?=$data['id_pasien']?>" onclick="return confirm('Yakin ingin mengedit datanya?')" class="btn btn-warning">Edit</a>
                				<a href="index.php?hal=hapus&id=<?=$data['id_pasien']?>" onclick="return confirm('Yakin ingin menghapus datanya?')" class="btn btn-danger">Hapus</a>
								</div>
							</div>
							</div>
						</div>
					</div>
					<hr>
					<!--End step -->
					
						<div class="form_title">
						<h3><strong>2</strong>Payment Information</h3>
						<p>
							Pilih Jenis Pembayaran
						</p>
					</div>
					<div class="step">
                        <div class="form-group">
                            <label>Jenis Pembayaran</label>
                                <select class="form-control" name="jp">
                                <option value =""></option>
                                <option value ="ATM">ATM</option>
                                <option value ="Mobile Banking">Mobile Banking</option>
                                <option value ="Gopay">Gopay</option>
                            </select>  
                        </div>
					</div>


					
				</div>
				</div>
				<!-- /col -->
				<aside class="col-xl-4 col-lg-4" id="sidebar">
					<div class="box_general_3 booking">
						<form>
							<div class="title">
								<h3>Pembayaran Kamu</h3>
							</div>
							<div class="summary">
								<ul>
									<li>Date: <strong class="float-right">02/12/2021</strong></li>
									<li>Time: <strong class="float-right">15.30 am</strong></li>
									<li>Dr. Name: <strong class="float-right">Dr. Andi</strong></li>
								</ul>
							</div>
							<ul class="treatments checkout clearfix">

								<li class="total">
									Total Pembayaran <strong class="float-right">Rp 50.000</strong>
								</li>
							</ul>
							<hr>
								<button type="submit" name="bconfirm" class="btn_1 full-width">Confirm and pay</button>
						
							
						</form>
					</div>
					<!-- /box_general -->
				</aside>
				<!-- /asdide -->
			</div>
                            </form>
 
                </div>
                <!--  end card body -->
            </div>
        </div>
        <!--  end col lg-7 -->
    </div>
</div>
    <!--  End Row -->


	<!-- End Preload -->
    





    <!-- Head -->
    
<!-- Panggil file footer -->
<?php include "footer.php";?>

<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="assets2/js/jquery-3.6.0.min.js"></script>
	<script src="assets2/js/common_scripts.min.js"></script>
	<script src="assets2/js/functions.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="assets2/js/markerclusterer.js"></script>
    <script src="assets2/js/map_listing.js"></script>
    <script src="assets2/js/infobox.js"></script>

</body>