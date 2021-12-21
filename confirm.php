

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Panggil file footer -->
	<?php include "header.php";?>
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
    
	<!-- YOUR CUSTOM CSS -->
	<link href="assets2/css/custom.css" rel="stylesheet">

</head>



<body>

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
    

		<div class="container margin_120">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div id="confirm">
						<div class="icon icon--order-success svg add_bottom_15">
							<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
								<g fill="none" stroke="#8EC343" stroke-width="2">
									<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
									<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
								</g>
							</svg>
						</div>
					<h2>Thanks for your booking!</h2>
					<p>You'll receive a confirmation on your phone</p>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>

		<label>Jadwal Temu</label>
		<div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
									<?php
										$no = 1;
										$tampil = mysqli_query($koneksi, "SELECT * from tpasien P, tappointment A where P.id_pasien = A.id_pasien order by P.id_pasien");
										while($data = mysqli_fetch_array($tampil)):
									?>
                                    <tbody>

                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$data['tanggal']?></td>
                                            <td><?=$data['waktu']?></td>
                                            <td><?=$data['nama']?></td>
                                            <td><?=$data['alamat']?></td>
                                        </tr>
										<?php endwhile;//penutup perulangan while?>
                                    </tbody>
                                </table>
                            </div>
		<!-- /container -->
	</main>
	<!-- /main -->



	
	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="assets2/js/jquery-3.6.0.min.js"></script>
	<script src="assets2/js/common_scripts.min.js"></script>
	<script src="assets2/js/functions.js"></script>

	<!-- Panggil file footer -->
	<?php include "footer.php";?>
     
</body>
</html>