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
		  <li class="nav-item">
              <a class="nav-link page-scroll" href="formutama.php">FORM UTAMA</a>
            </li>
		   <li class="nav-item">
              <a class="nav-link page-scroll" href="kesimpulan.php">KESIMPULAN</a>
            </li>
			 <li class="nav-item">
              <a class="nav-link page-scroll" href="insert.php">Masukan Data</a>
            </li>
			
			
			
          </ul>
        </div>
      </div>
    </nav>

	<br>



			
	
	</section>
	<!---------------------------------------------4----------------------------------------------->
	<br>
	<br>
	
	<br>
	<br>
	<section>
		<div class="container-fluid">
			<div class="row justify-content-center">
				
				
				<div class="col-5">
					<form method="POST" action="" class="form-container">
					<h3>Kesimpulan</h3>
					<hr>

						<h3>Masukan Data</h3>
						<div class="form-group">
							<label for="pendaki">Type Pendaki</label>
							<select name="pendaki" class="form-control" id="pendaki">
							  <option value="Pemula">Pemula</option>
							  <option value="Menengah">Menengah</option>
							  <option Value="Profesional">Profesional</option>
							</select>
						</div>
						
						<div class="form-group">
							<label for="cuaca">Cuaca</label>
							<select name="cuaca" class="form-control" id="waktu">
							  <option value="Cerah">Cerah</option>
							  <option value="Mendung">Mendung</option>
							  <option Value="Hujan">Hujan</option>
							</select>
						</div>
						
						<div class="form-group">
							<label for="waktu">Waktu</label>
							<select name="waktu" class="form-control" id="waktu">
							  <option value="Pagi">Pagi</option>
							  <option value="Siang">Siang</option>
							  <option Value="Malam">Malam</option>
							</select>
						</div>
						
						<div class="form-group">
							<label for="typegunung">Gunung Berapi</label>
							<select name="typegunung" class="form-control" id="typegunung">
							  <option value="TRUE">TRUE</option>
							  <option value="FALSE">FALSE</option>
							  
							</select>
						</div>
						
						
					<button type="submit" name="masukan" class="btn btn-outline-info">Cari Kesimpulan</button>
					<br>
					<br>
					
						
						
					
				
						<?php
					if(isset($_POST["masukan"])){
						
				$pendaki=$_POST["pendaki"];
				$cuaca=$_POST["cuaca"];
				$waktu=$_POST["waktu"];
				$typegunung=$_POST["typegunung"];
				
		
					switch ($pendaki) {
					case "Pemula":
						$hasilpendakiya=$_SESSION['pemulaya'];
						$hasilpendakitidak=$_SESSION['pemulatidak'];
						break;
					case "Menengah":
						$hasilpendakiya=$_SESSION['menengahya'];
						$hasilpendakitidak=$_SESSION['menengahtidak'];
						break;
					case "Profesional":
						$hasilpendakiya=$_SESSION['profesionalya'];
						$hasilpendakitidak=$_SESSION['profesionaltidak'];
						break;
					default:
						echo "Belum Memasukan Data";
					}
					
					switch ($cuaca) {
					case "Cerah":
						$hasilcuacaya=$_SESSION['cerahya'];
						$hasilcuacatidak=$_SESSION['cerahtidak'];
						break;
					case "Mendung":
						$hasilcuacaya=$_SESSION['mendungya'];
						$hasilcuacatidak=$_SESSION['mendungtidak'];
						break;
					case "Hujan":
						$hasilcuacaya=$_SESSION['hujanya'];
						$hasilcuacatidak=$_SESSION['hujantidak'];
						break;
					default:
						echo "Belum Memasukan Data";
					}
					
					switch ($waktu) {
					case "Pagi":
						$hasilwaktuya=$_SESSION['pagiya'];
						$hasilwaktutidak=$_SESSION['pagitidak'];
						break;
					case "Siang":
						$hasilwaktuya=$_SESSION['siangya'];
						$hasilwaktutidak=$_SESSION['siangtidak'];
						break;
					case "Malam":
						$hasilwaktuya=$_SESSION['malamya'];
						$hasilwaktutidak=$_SESSION['malamtidak'];
						break;
					default:
						echo "Belum Memasukan Data";
					}
					
					switch ($typegunung) {
					case "FALSE":
						$hasiltypeya=$_SESSION['falseya'];
						$hasiltypetidak=$_SESSION['falsetidak'];
						break;
					case "TRUE":
						$hasiltypeya=$_SESSION['trueya'];
						$hasiltypetidak=$_SESSION['truetidak'];
						break;
					
					default:
						echo "Belum Memasukan Data";
					}
					
					echo "<h4>Data Yang Di Masukan</h4>";
						echo "<table class='table'>
						<thead class='thead-dark'>
						<tr>
						<th scope='col'>No</th>
						<th scope='col'>Type Pendaki</th>
						<th scope='col'>Cuaca</th>
						<th scope='col'>Waktu</th>
						<th scope='col'>Gunung Berapi</th>
						
						</tr>
						</thead>";
						
							
						
						
						echo "<tr>";
						echo "<td>1.</td>";
						echo "<td>" . $pendaki. "</td>";					
						echo "<td>" . $cuaca . "</td>";
						echo "<td>" . $waktu . "</td>";
						echo "<td>" . $typegunung. "</td>";
						
						
						echo "</tr>";
						 
						
						
						
						echo "</table>";
					
					$totalya=$hasilpendakiya*$hasilcuacaya*$hasilwaktuya*$hasiltypeya;
					$totaltidak=$hasilpendakitidak*$hasilcuacatidak*$hasilwaktutidak*$hasiltypetidak;
					
					echo "Mendaki Gunung : Ya = ".round($totalya, 6);
					echo "<br>";
					echo "Mendaki Gunung : Tidak = ".round($totaltidak, 6);
					echo "<br>";
					
					if($totalya>$totaltidak){
						echo "<b><i>Karena ".round($totalya, 6).">".round($totaltidak, 6)." Dapat disimpulkan Mendaki Gunung = Ya</i></b>";
					}
					elseif($totalya<$totaltidak){
						echo "<b><i>Karena ".round($totalya, 6)."<".round($totaltidak, 6)." Dapat disimpulkan Mendaki Gunung = Tidak</i></b>";
					}
					else "error";
				}
	
				
				?>
					 
					</form>
					
				</div>
				</div>
				</div>
			
			
	
	</section>
	<br>
	<br>
	
	<!-- Footer -->
	<hr>
	<footer >


    <!-- Copyright -->
    <div class="footer-copyright text-center py-3"><font color="white">© 2018 Copyright:</font>
      <a href="tentangkami.php"> Kelompok 1</a>
    </div>
    <!-- Copyright -->
	</div>
  </footer>

	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	<script src="js/scroll.js"></script>
	
   
	
 
	
	
  </body>
</html>