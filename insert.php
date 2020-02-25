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
              <a class="nav-link page-scroll" href="datalatih.php">DATA LATIH</a>
            </li>  
          </ul>
        </div>
      </div>
    </nav>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<section>
		<div class="container-fluid">
			<div class="row justify-content-center">
				
				
				<div class="col-5">
					<form class="form-container" method="POST" action="">
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
							  <option value="True">True</option>
							  <option value="False">False</option>
							  
							</select>
						</div>
						
						<div class="form-group">
							<label for="mendaki">Mendaki</label>
							<select name="mendaki" class="form-control" id="mendaki">
							  <option value="Ya">Ya</option>
							  <option value="Tidak">Tidak</option>
							  
							</select>
						</div>
					<button type="submit" name="masukan" class="btn btn-outline-info">Masukan Data</button>
					</form>
				</div>
				</div>
				</div>
				
			
	
	</section>
	<?php
	include "koneksi.php";
			if(isset($_POST["masukan"])){
				$pendaki=$_POST["pendaki"];
				$cuaca=$_POST["cuaca"];
				$waktu=$_POST["waktu"];
				$typegunung=$_POST["typegunung"];
				$mendaki=$_POST["mendaki"];
		
				$sql="insert into datamendaki(id,pendaki,cuaca,waktu,gunungberapi,mendaki)".
				"values('','$pendaki','$cuaca','$waktu','$typegunung','$mendaki')";
			 
				mysqli_query($conn,$sql);
				$num=mysqli_affected_rows($conn);
				
				if($num>0){
					echo "<script>
							alert('Data Tersimpan');
						
							
						  </script>";
					mysqli_close($conn);
				}
				else{
					echo "<script>
							alert('Data gagal Tersimpan');
							
							
						  </script>";
					mysqli_close($conn);
				}
	
			}
	
	?>


	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	<script src="js/scroll.js"></script>
	
   
	
 
	
	
  </body>
</html>