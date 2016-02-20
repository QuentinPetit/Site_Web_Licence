<?php
	session_start();
	header('Content-Type: text/xml');
	echo "<?xml version=\"1.0\"?>\n";
	echo "<exemple>\n";

	include('connexion.php');

	$query = "SELECT * FROM parcours";
	$result = mysql_query($query,$dblink) or die (mysql_error($dblink));
	
	// On boucle sur le résultat
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) 
	    echo "<li><a href='parcours.html'>". $row[1] ."</a></li>"  ;
	}
	
	include('deconnexion.php');
?>
<?php
						session_start();

						include('../PHP/connexion.php');

						$query = "SELECT Nom FROM parcours";
						$result = mysql_query($query,$dblink) or die (mysql_error($dblink));
						
						// On boucle sur le résultat
						while ($row = $result->fetch_assoc()) 
						{
						    echo "<li><a href='parcours.html'>". $row["Nom"] ."</a></li>";
						}
						
						include('../PHP/deconnexion.php');
					?>