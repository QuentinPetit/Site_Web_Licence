<?php
   header('content-type: text/css');
   ob_start('ob_gzhandler');
   header('Cache-Control: max-age=31536000, must-revalidate');
   // etc. 
?>

<?php include('../PHP/connexion.php') ?>

.parallax2 {
  z-index: -1;
  background:
    linear-gradient(
      rgba(255, 255, 255, 0.45), 
      rgba(255, 255, 255, 0.45)
    ),
    <?php 
    	$background=$_GET['background'];
		$sql = "SELECT * FROM parcours WHERE parcours.ID_parcours =".$background; 
		$result = $conn->query($sql);

		if ($result->num_rows >0) {
			while ($row = $result->fetch_assoc()) {
				echo "url(".utf8_encode($row["Fond"]).");";
			}
		} else {
			echo "0 results";
		}
     ?>
  background-position: 50% 50%;
  background-repeat: no-repeat;
  background-attachment: fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

<?php include('../PHP/deconnexion.php') ?>
