 <?php
 include "koneksi.php";	
	$id=$_GET["id"];

	$sql = "delete from datamendaki WHERE id='$id'";
							if (mysqli_query($conn, $sql)) {
								echo "<script>
							alert('Berhasil Dihapus');
							window.location.href='datalatih.php';
						  </script>";
								
							} else {
								echo "<script>
							alert('Gagal Dihapus');
							window.location.href='datalatih.php';
						  </script>";
							}
						
  
  
	
 
 ?>