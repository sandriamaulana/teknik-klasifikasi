<?php session_start()?>

<!doctype html>
<html lang="en" id="home">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	


    <title>Teknik Klasifikasi-Data Mining</title>
  </head>
  <body id="body">
  <!--------------------------------------------------area NAVBAR------------------------------------------------------------->
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="main-menu">
      <div class="container">
        <a class="navbar-brand page-scroll" href="index.php">Data Mining</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
			 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Daftar Hitungan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#1">Jumlah Class</a>
          <a class="dropdown-item" href="#1">Probabilitas Awal</a>
		   <a class="dropdown-item" href="#2">Jumlah Kasus</a>
        
        </div>
      </li>
		   <li class="nav-item">
              <a class="nav-link page-scroll" href="kesimpulan.php">KESIMPULAN</a>
            </li>
			 <li class="nav-item">
              <a class="nav-link page-scroll" href="datalatih.php">Data Latih</a>
            </li>
			
          </ul>
        </div>
      </div>
    </nav>


	<!-------------------------------------------------------------menghitung jumlah class-------------------------------------------------->
	<section id="1">
		<br>
	<br>
	<br>
	<br>
	<br>
	<br>
		<div class="container-fluid">
			<div class="row justify-content-center">
				
				
				<div class="col-5">
					<form class="form-container">
					<h3>JUMLAH CLASS</h3>
					<hr>
					  <?php
	
						include "koneksi.php";

						
						$result = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where mendaki='Ya'");
						$result2 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where mendaki='Tidak'");
						$result3 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki");
						
						echo "<table class='table'>
						<thead class='thead-dark'>
						<tr>
						<th scope='col'>No</th>
						<th scope='col'>Class</th>
						<th scope='col'>Jumlah</th>
						
						</tr>
						</thead>";
						
							$j=1; 
						while($Ya = mysqli_fetch_array($result))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>C2 → Mendaki = Ya → </td>";
						echo "<td>" . $Ya[0] . "</td>";	
						
						
						
						echo "</tr>";
						 $j++ ;
						}
						while($Tidak = mysqli_fetch_array($result2))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>C2 → Mendaki = Tidak → </td>";								
						echo "<td>" . $Tidak[0] . "</td>";
						
						
						echo "</tr>";
						 $j++ ;
						}
						$total=mysqli_fetch_array($result3);
						echo "<td></td>";
				
						echo "<td> Total </td>";
						echo "<td>" .$total[0]. "</td>";
						
						
						echo "</table>";
						
						
						
						
					?>
						<h3>PROBABILITAS AWAL UNTUK SETIAP CLASS</h3>
						<hr>
					 <?php
	
						include "koneksi.php";

						
						$result = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where mendaki='Ya'");
						$result2 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where mendaki='Tidak'");
						$result3 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki");
						$totaldata = mysqli_fetch_array($result3);
						$totaldatac=$totaldata[0];
						
						echo "<table class='table'>
						<thead class='thead-dark'>
						<tr>
						<th scope='col'>No</th>
						<th scope='col'>Class</th>
						<th scope='col'>Total</th>
						
						</tr>
						</thead>";
						
							$j=1; 
						while($Ya = mysqli_fetch_array($result))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(C1) = P (Mendaki  = Ya) </td>";
						$yahasil=$Ya[0];
						$totalprioriya=$yahasil/$totaldatac;
						echo "<td>" . round($totalprioriya, 6) . "</td>";	
						
						
						
						echo "</tr>";
						 $j++ ;
						}
						while($Tidak = mysqli_fetch_array($result2))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(C2) = P (Mendaki = Tidak) </td>";	
						$tidakhasil=$Tidak[0];
						$totalprioritidak=$tidakhasil/$totaldatac;
						echo "<td>" . round($totalprioritidak, 6) . "</td>";
						
						
						echo "</tr>";
						 $j++ ;
						}
						
				
						
						
						
						echo "</table>";
						
						
						
						
					?>
				
				
					 
					</form>
				</div>
				</div>
				</div>
				
			
	
	</section>
	
		<!------------------------------------------------------------- jumlah kasus yang sama dengan class yang sama-------------------------------------------------->
	<section id="2">

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
		<div class="container-fluid">
			<div class="row justify-content-center">
				
				
				<div class="col-6">
					<form class="form-container">
					<h3> JUMLAH KASUS YANG SAMA DENGAN CLASS YANG SAMA</h3>
					<hr>
					  <?php
	
						include "koneksi.php";

						
						$result1 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where pendaki='Pemula' and mendaki='Ya'");
						$result2 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where pendaki='Pemula' and mendaki='Tidak'");
						$result3 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where pendaki='Menengah' and mendaki='Ya'");
						$result4 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where pendaki='Menengah' and mendaki='Tidak'");
						$result5 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where pendaki='Profesional' and mendaki='Ya'");
						$result6 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where pendaki='Profesional' and mendaki='Tidak'");
						$result7 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where cuaca='Cerah' and mendaki='Ya'");
						$result8 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where cuaca='Cerah' and mendaki='Tidak'");
						$result9 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where cuaca='Mendung' and mendaki='Ya'");
						$result10 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where cuaca='Mendung' and mendaki='Tidak'");
						$result11 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where cuaca='Hujan' and mendaki='Ya'");
						$result12 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where cuaca='Hujan' and mendaki='Tidak'");
						$result13 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where waktu='Pagi' and mendaki='Ya'");
						$result14 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where waktu='Pagi' and mendaki='Tidak'");
						$result15 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where waktu='Siang' and mendaki='Ya'");
						$result16 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where waktu='Siang' and mendaki='Tidak'");
						$result17 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where waktu='Malam' and mendaki='Ya'");
						$result18 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where waktu='Malam' and mendaki='Tidak'");
						$result19 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where gunungberapi='TRUE' and mendaki='Ya'");
						$result20 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where gunungberapi='TRUE' and mendaki='Tidak'");
						$result21 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where gunungberapi='FALSE' and mendaki='Ya'");
						$result22 = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where gunungberapi='FALSE' and mendaki='Tidak'");
						
						
						$jumlahya = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where mendaki='Ya'");
						$hasilya= mysqli_fetch_array($jumlahya);
						$jumlahtidak = mysqli_query($conn,"SELECT COUNT(*) FROM datamendaki where mendaki='Tidak'");
						$hasiltidak=mysqli_fetch_array($jumlahtidak);
						
						echo "<table class='table'>
						<thead class='thead-dark'>
						<tr>
						<th scope='col'>No</th>
						<th scope='col'>P(E1,E2,En | C1);</th>
						<th scope='col'>Jumlah</th>
						<th scope='col'>Dari</th>
						<th scope='col'>Total</th>
						
						</tr>
						</thead>";
						
							$j=1; 
						//----------------------------------------------1----------------------------------------------------
						while($jumlah1 = mysqli_fetch_array($result1))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Pendaki=Pemula | Mendaki = Ya)</td>";
						echo "<td>" . $jumlah1[0] . "</td>";	
						echo "<td>" . $hasilya[0] . "</td>";
						$jumlahc1=$jumlah1[0];
						$hasilc1=$hasilya[0];
						$total1=$jumlahc1/$hasilc1;
						echo "<td>" . $_SESSION['pemulaya']=round($total1, 6) . "</td>";	
						echo "</tr>";
						
						 $j++ ;
						}
						
						//----------------------------------------------2----------------------------------------------------
						while($jumlah2 = mysqli_fetch_array($result2))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Pendaki=Pemula | Mendaki = Tidak)</td>";
						echo "<td>" . $jumlah2[0] . "</td>";	
						echo "<td>" . $hasiltidak[0] . "</td>";
						$jumlahc2=$jumlah2[0];
						$hasilc2=$hasiltidak[0];
						$total2=$jumlahc2/$hasilc2;
						echo "<td>" .  $_SESSION['pemulatidak']=round($total2, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------3----------------------------------------------------
						while($jumlah3 = mysqli_fetch_array($result3))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Pendaki=Menengah | Mendaki = Ya)</td>";
						echo "<td>" . $jumlah3[0] . "</td>";	
						echo "<td>" . $hasilya[0] . "</td>";
						$jumlahc3=$jumlah3[0];
						$hasilc3=$hasilya[0];
						$total3=$jumlahc3/$hasilc3;
						echo "<td>" . $_SESSION['menengahya']=round($total3, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------4----------------------------------------------------
						while($jumlah4 = mysqli_fetch_array($result4))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Pendaki=Menengah | Mendaki = Tidak)</td>";
						echo "<td>" . $jumlah4[0] . "</td>";	
						echo "<td>" . $hasiltidak[0] . "</td>";
						$jumlahc4=$jumlah4[0];
						$hasilc4=$hasiltidak[0];
						$total4=$jumlahc4/$hasilc4;
						echo "<td>" . $_SESSION['menengahtidak']=round($total4, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------5----------------------------------------------------
						while($jumlah5 = mysqli_fetch_array($result5))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Pendaki=Profesional | Mendaki = Ya)</td>";
						echo "<td>" . $jumlah5[0] . "</td>";	
						echo "<td>" . $hasilya[0] . "</td>";
						$jumlahc5=$jumlah5[0];
						$hasilc5=$hasilya[0];
						$total5=$jumlahc5/$hasilc5;
						echo "<td>" . $_SESSION['profesionalya']=round($total5, 6). "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------6----------------------------------------------------
						while($jumlah6 = mysqli_fetch_array($result6))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Pendaki=Profesional | Mendaki = Tidak)</td>";
						echo "<td>" . $jumlah6[0] . "</td>";	
						echo "<td>" . $hasiltidak[0] . "</td>";
						$jumlahc6=$jumlah6[0];
						$hasilc6=$hasiltidak[0];
						$total6=$jumlahc6/$hasilc6;
						echo "<td>" . $_SESSION['profesionaltidak']=round($total6, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------7----------------------------------------------------
						while($jumlah7 = mysqli_fetch_array($result7))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Cuaca = Cerah | Mendaki = Ya)</td>";
						echo "<td>" . $jumlah7[0] . "</td>";	
						echo "<td>" . $hasilya[0] . "</td>";
						$jumlahc7=$jumlah7[0];
						$hasilc7=$hasilya[0];
						$total7=$jumlahc7/$hasilc7;
						echo "<td>" . $_SESSION['cerahya']=round($total7, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------8----------------------------------------------------
						while($jumlah8 = mysqli_fetch_array($result8))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Cuaca = Cerah | Mendaki = Tidak)</td>";
						echo "<td>" . $jumlah8[0] . "</td>";	
						echo "<td>" . $hasiltidak[0] . "</td>";
						$jumlahc8=$jumlah8[0];
						$hasilc8=$hasiltidak[0];
						$total8=$jumlahc8/$hasilc8;
						echo "<td>" . $_SESSION['cerahtidak']=round($total8, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------9----------------------------------------------------
						while($jumlah9 = mysqli_fetch_array($result9))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Cuaca = Mendung| Mendaki = Ya)</td>";
						echo "<td>" . $jumlah9[0] . "</td>";	
						echo "<td>" . $hasilya[0] . "</td>";
						$jumlahc9=$jumlah9[0];
						$hasilc9=$hasilya[0];
						$total9=$jumlahc9/$hasilc9;
						echo "<td>" . $_SESSION['mendungya']=round($total9, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------10----------------------------------------------------
						while($jumlah10 = mysqli_fetch_array($result10))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Cuaca = Mendung | Mendaki = Tidak)</td>";
						echo "<td>" . $jumlah10[0] . "</td>";	
						echo "<td>" . $hasiltidak[0] . "</td>";
						$jumlahc10=$jumlah10[0];
						$hasilc10=$hasiltidak[0];
						$total10=$jumlahc10/$hasilc10;
						echo "<td>" . $_SESSION['mendungtidak']=round($total10, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------11----------------------------------------------------
						while($jumlah11 = mysqli_fetch_array($result11))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Cuaca = Hujan | Mendaki = Ya)</td>";
						echo "<td>" . $jumlah11[0] . "</td>";	
						echo "<td>" . $hasilya[0] . "</td>";
						$jumlahc11=$jumlah11[0];
						$hasilc11=$hasilya[0];
						$total11=$jumlahc11/$hasilc11;
						echo "<td>" . $_SESSION['hujanya']=round($total11, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------12----------------------------------------------------
						while($jumlah12 = mysqli_fetch_array($result12))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Cuaca = Hujan | Mendaki = Tidak)</td>";
						echo "<td>" . $jumlah12[0] . "</td>";	
						echo "<td>" . $hasiltidak[0] . "</td>";
						$jumlahc12=$jumlah12[0];
						$hasilc12=$hasiltidak[0];
						$total12=$jumlahc12/$hasilc12;
						echo "<td>" . $_SESSION['hujantidak']=round($total12, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------13----------------------------------------------------
						while($jumlah13 = mysqli_fetch_array($result13))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Waktu = Pagi | Mendaki = Ya )</td>";
						echo "<td>" . $jumlah13[0] . "</td>";	
						echo "<td>" . $hasilya[0] . "</td>";
						$jumlahc13=$jumlah13[0];
						$hasilc13=$hasilya[0];
						$total13=$jumlahc13/$hasilc13;
						echo "<td>" . $_SESSION['pagiya']=round($total13, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------14----------------------------------------------------
						while($jumlah14 = mysqli_fetch_array($result14))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Waktu = Pagi | Mendaki = Tidak )</td>";
						echo "<td>" . $jumlah14[0] . "</td>";	
						echo "<td>" . $hasiltidak[0] . "</td>";
						$jumlahc14=$jumlah14[0];
						$hasilc14=$hasiltidak[0];
						$total14=$jumlahc14/$hasilc14;
						echo "<td>" . $_SESSION['pagitidak']=round($total14, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------15----------------------------------------------------
						while($jumlah15 = mysqli_fetch_array($result15))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Waktu = Siang| Mendaki = Ya )</td>";
						echo "<td>" . $jumlah15[0] . "</td>";	
						echo "<td>" . $hasilya[0] . "</td>";
						$jumlahc15=$jumlah15[0];
						$hasilc15=$hasilya[0];
						$total15=$jumlahc15/$hasilc15;
						echo "<td>" .  $_SESSION['siangya']=round($total15, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------16----------------------------------------------------
						while($jumlah16 = mysqli_fetch_array($result16))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Waktu = Siang | Mendaki = Tidak )</td>";
						echo "<td>" . $jumlah16[0] . "</td>";	
						echo "<td>" . $hasiltidak[0] . "</td>";
						$jumlahc16=$jumlah16[0];
						$hasilc16=$hasiltidak[0];
						$total16=$jumlahc16/$hasilc16;
						echo "<td>" . $_SESSION['siangtidak']=round($total16, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
							//----------------------------------------------17----------------------------------------------------
						while($jumlah17 = mysqli_fetch_array($result17))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Waktu = Malam | Mendaki = Ya )</td>";
						echo "<td>" . $jumlah17[0] . "</td>";	
						echo "<td>" . $hasilya[0] . "</td>";
						$jumlahc17=$jumlah17[0];
						$hasilc17=$hasilya[0];
						$total17=$jumlahc17/$hasilc17;
						echo "<td>" . $_SESSION['malamya']=round($total17, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
								//----------------------------------------------18----------------------------------------------------
						while($jumlah18 = mysqli_fetch_array($result18))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Waktu = Malam | Mendaki = Tidak )</td>";
						echo "<td>" . $jumlah18[0] . "</td>";	
						echo "<td>" . $hasiltidak[0] . "</td>";
						$jumlahc18=$jumlah18[0];
						$hasilc18=$hasiltidak[0];
						$total18=$jumlahc18/$hasilc18;
						echo "<td>" . $_SESSION['malamtidak']=round($total18, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
							//----------------------------------------------19----------------------------------------------------
						while($jumlah19 = mysqli_fetch_array($result19))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Gunung Berapi = TRUE | Mendaki = Ya )</td>";
						echo "<td>" . $jumlah19[0] . "</td>";	
						echo "<td>" . $hasilya[0] . "</td>";
						$jumlahc19=$jumlah19[0];
						$hasilc19=$hasilya[0];
						$total19=$jumlahc19/$hasilc19;
						echo "<td>" . $_SESSION['trueya']=round($total19, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
								//----------------------------------------------20----------------------------------------------------
						while($jumlah20 = mysqli_fetch_array($result20))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Gunung Berapi = TRUE | Mendaki = Tidak )</td>";
						echo "<td>" . $jumlah20[0] . "</td>";	
						echo "<td>" . $hasiltidak[0] . "</td>";
						$jumlahc20=$jumlah20[0];
						$hasilc20=$hasiltidak[0];
						$total20=$jumlahc20/$hasilc20;
						echo "<td>" . $_SESSION['truetidak']=round($total20, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
								//----------------------------------------------21----------------------------------------------------
						while($jumlah21 = mysqli_fetch_array($result21))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Gunung Berapi = FALSE | Mendaki = Ya )</td>";
						echo "<td>" . $jumlah21[0] . "</td>";	
						echo "<td>" . $hasilya[0] . "</td>";
						$jumlahc21=$jumlah21[0];
						$hasilc21=$hasilya[0];
						$total21=$jumlahc21/$hasilc21;
						echo "<td>" .  $_SESSION['falseya']=round($total21, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						//----------------------------------------------22----------------------------------------------------
						while($jumlah22 = mysqli_fetch_array($result22))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>P(Gunung Berapi = FALSE | Mendaki = TIDAK )</td>";
						echo "<td>" . $jumlah22[0] . "</td>";	
						echo "<td>" . $hasilya[0] . "</td>";
						$jumlahc22=$jumlah22[0];
						$hasilc22=$hasiltidak[0];
						$total22=$jumlahc22/$hasilc22;
						echo "<td>" . $_SESSION['falsetidak']=round($total22, 6) . "</td>";	
						echo "</tr>";
						 $j++ ;
						}
						
						echo "</table>";
						
						
					?>
				
				
					 
					</form>
				</div>
				</div>
				</div>
				
		<br>
<hr>		
	
	<footer >
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3"><font color="white">© 2018 Copyright:</font>
      <a href="tentangkami.php"> Kelompok 1</a>
    </div>
    <!-- Copyright -->

  </footer>
	
	


	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	<script src="js/scroll.js"></script>
	
   
	
 
	
	
  </body>
</html>