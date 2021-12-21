<!-- Panggil file header -->
<?php include "header.php";?>

<?php include "koneksi.php";?>




<?php


//Uji jika tombol simpan diklik
if(isset($_POST['book1'])){
    

    //htmlspecialchars agar imputan lebih aman dari injection
    $tanggal = htmlspecialchars($_POST['tanggal'], ENT_QUOTES);
    $waktu = htmlspecialchars($_POST['waktu'], ENT_QUOTES);
    $keluhan = htmlspecialchars($_POST['keluhan'], ENT_QUOTES);
	$id = mysqli_query($koneksi,"SELECT MAX(id_pasien) FROM tpasien");
	$no = $id -> fetch_array()[0];
	
 
    //persiapan query simpan data
    $simpan = mysqli_query($koneksi,"INSERT INTO tappointment  VALUES ('','$no','1','$tanggal','$waktu','$keluhan')");
	

    //Uji jika simpan data sukses
    if($simpan){

        echo "<script>alert('Simpan data sukses, Terima kasih..!');
               document.location ='bill.php'</script>";
    } else {
        echo "<script>alert('Simpan data gagal!');
               document.location ='appointment.php'</script>";
    }
}
if(isset($_POST['book2'])){
    

    //htmlspecialchars agar imputan lebih aman dari injection
    $tanggal = htmlspecialchars($_POST['tanggal'], ENT_QUOTES);
    $waktu = htmlspecialchars($_POST['waktu'], ENT_QUOTES);
    $keluhan = htmlspecialchars($_POST['keluhan'], ENT_QUOTES);
	$id = mysqli_query($koneksi,"SELECT MAX(id_pasien) FROM tpasien");
	$no = $id -> fetch_array()[0];
 
    //persiapan query simpan data
    $simpan = mysqli_query($koneksi,"INSERT INTO tappointment  VALUES ('','$no','2','$tanggal','$waktu','$keluhan')");

    //Uji jika simpan data sukses
    if($simpan){

        echo "<script>alert('Simpan data sukses, Terima kasih..!');
               document.location ='bill.php'</script>";
    } else {
        echo "<script>alert('Simpan data gagal!');
               document.location ='appointment.php'</script>";
    }
}
if(isset($_POST['book3'])){
    

    //htmlspecialchars agar imputan lebih aman dari injection
    $tanggal = htmlspecialchars($_POST['tanggal'], ENT_QUOTES);
    $waktu = htmlspecialchars($_POST['waktu'], ENT_QUOTES);
    $keluhan = htmlspecialchars($_POST['keluhan'], ENT_QUOTES);
	$id = mysqli_query($koneksi,"SELECT MAX(id_pasien) FROM tpasien");
	$no = $id -> fetch_array()[0];
 
    //persiapan query simpan data
    $simpan = mysqli_query($koneksi,"INSERT INTO tappointment VALUES ('','$no','3','$tanggal','$waktu','$keluhan')");

    //Uji jika simpan data sukses
    if($simpan){

        echo "<script>alert('Simpan data sukses, Terima kasih..!');
               document.location ='bill.php'</script>";
    } else {
        echo "<script>alert('Simpan data gagal!');
               document.location ='appointment.php'</script>";
    }
}
if(isset($_POST['book4'])){
    

    //htmlspecialchars agar imputan lebih aman dari injection
    $tanggal = htmlspecialchars($_POST['tanggal'], ENT_QUOTES);
    $waktu = htmlspecialchars($_POST['waktu'], ENT_QUOTES);
    $keluhan = htmlspecialchars($_POST['keluhan'], ENT_QUOTES);
	$id = mysqli_query($koneksi,"SELECT MAX(id_pasien) FROM tpasien");
	$no = $id -> fetch_array()[0];
 
    //persiapan query simpan data
    $simpan = mysqli_query($koneksi,"INSERT INTO tappointment  VALUES ('','$no','4','$tanggal','$waktu','$keluhan')");

    //Uji jika simpan data sukses
    if($simpan){

        echo "<script>alert('Simpan data sukses, Terima kasih..!');
               document.location ='bill.php'</script>";
    } else {
        echo "<script>alert('Simpan data gagal!');
               document.location ='appointment.php'</script>";
    }
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

<body>

<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>

<div class="head text-center mt-4">
        <h2 class="text-grey">Pengisian Janji Temu</h2>
    </div>
    <!--  end Head -->
    <!--  Awal row -->
    <div class="row mt-4 s-10 col d-flex justify-content-center">
        <!--  col-lg-7 -->
        <div class ="col-lg-10 mb-3">
            <div class ="card shadow bg-light">
                <!--  card body -->
                <div class =" card-body ">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Appoinment</h1>
                            </div>
                            <form class="user" method ="POST" action ="">
                                <div class ="form-group">
                                    <label>Tanggal</label>
                                    <input class = "form-control" type="date" name="tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label>Waktu</label>
                                    <select class="form-control" name="waktu" required>
                                        <option value =""></option>
                                        <option value ="Pagi">08:00-10:00</option>
                                        <option value ="Siang">12:00-14:00</option>
                                        <option value ="Malam">19:00-21:00</option>
                                    </select>  
                                </div>
                                <div class="form-group">
                                    <label>Keluhan</label>
                                    <input type="text" class="form-control" name ="keluhan"
                                        placeholder="Ceritakan Keluhan Anda" required>
                                </div>   
                                
                                <div class="row">
					<div class="col-md-6">
						<div class="box_list wow fadeIn">
							<figure>
								<img src="assets/img/doktor.jpg" class="img-fluid" alt="">
							</figure>
							<div class="wrapper">
								<small>Dokter Umum</small>
								<h3>Dr. Budi</h3>
							</div>
							<ul>
								<button type="submit" name="book1" class="btn btn-primary btn-user ">Book Now</button>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="box_list wow fadeIn">
							<figure>
								<img src="assets/img/doktor2.jpg" class="img-fluid" alt="">	
							</figure>
							<div class="wrapper">
								<small>Dokter Umum</small>
								<h3>Dr. Asep</h3>
							</div>
							<ul>
								<button type="submit" name="book2" class="btn btn-primary btn-user ">Book Now</button>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="box_list wow fadeIn">
							
							<figure>
								<img src="assets/img/doktor3.jpeg" class="img-fluid" alt="">
							</figure>
							<div class="wrapper">
								<small>Dokter Umum</small>
								<h3>Dr. Agus</h3>
							</div>
							<ul>
								<button type="submit" name="book3" class="btn btn-primary btn-user ">Book Now</button>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="box_list wow fadeIn">
							
							<figure>
								<img src="assets/img/doktor4.png" class="img-fluid" alt="">
							</figure>
							<div class="wrapper">
								<small>Dokter Umum</small>
								<h3>Dr. Andi</h3>
							</div>
							<ul>
								<button type="submit" name="book4" class="btn btn-primary btn-user ">Book Now</button>
							</ul>
						</div>
					</div>
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