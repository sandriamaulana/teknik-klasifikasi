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
              <a class="nav-link page-scroll" href="insert.php">TAMBAH DATA</a>
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
					 <h3>Data Latih</h3>
					 <hr>
					 <?php
	
						include "koneksi.php";

						
						$result = mysqli_query($conn,"SELECT * FROM datamendaki ");
						
						echo "<table class='table'>
						<thead class='thead-dark'>
						<tr>
						<th scope='col'>No</th>
						<th scope='col'>Pendaki</th>
						<th scope='col'>Cuaca</th>
						<th scope='col'>Waktu</th>
						<th scope='col'>Gunung Berapi</th>
						<th scope='col'>Mendaki</th>
						<th scope='col'>aksi</th>
						</tr>
						</thead>";
						
							$j=1; 
						while($row = mysqli_fetch_array($result))
						{
						echo "<tr>";
						echo "<td>" . $j . "</td>";
						echo "<td>" . $row['pendaki'] . "</td>";					
						echo "<td>" . $row['cuaca'] . "</td>";
						echo "<td>" . $row['waktu'] . "</td>";
						echo "<td>" . $row['gunungberapi'] . "</td>";
						echo "<td>" . $row['mendaki'] . "</td>";
						$id=$row['id'];
						echo "<td><a href='delete.php?id={$id}'>Hapus</a>";
						
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