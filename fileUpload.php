<!DOCTYPE html>
<html>
<head>
  <title>Unzip file Upload test</title>
  <meta charset="utf-8">
</head>
<body>
  <?php include('./PHP/connexion.php'); ?>
  <form action="fileUpload.php" method="POST" enctype="multipart/form-data">
    <h1>Ajouter un projet</h1>
    <textarea name="nomProjets" maxlength="50" placeholder="Nom du projet"></textarea>
    <textarea name="description" placeholder="Description du projet (synopsis, context...)"></textarea>
    <textarea name="caracteristiques" placeholder="Caractéristiques du projet : toute technique spécifiques au projet (lancer de rayon, shader, modélisation low-poly...)"></textarea>

    <select name="anneeScolaireSelect">
      <option disabled="true">Année Scolaire</option>
      <?php 
        $sql = "SELECT * FROM anneescolaire ORDER BY DateFin DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $EndYears = date("Y", strtotime($row["DateFin"]));
            $StartYears = date("Y", strtotime($row["DateDebut"]));
            echo "<option value=".$row["ID_Annee"].">".$StartYears."-".$EndYears."</option>";
          }
        } else {
          echo "0 results";
        }
      ?>
    </select>
    <select name="parcoursSelect" multiple="true">
      <option disabled="true">Parcours</option>
      <?php 
        $sql = "SELECT * FROM parcours";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            
            echo"<option value=".$row["Dossier"].">".utf8_encode($row["Nom"])."</option>";
            
          }
        } else {
          echo "0 results";
        }
      ?>
    </select>
    <select name="participantsSelect" multiple="true">
      <option disabled="true">Participants</option>
      <?php 
        $sql = "SELECT * FROM eleves ORDER BY ID_eleves DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo"<option value=".$row["ID_eleves"].">".utf8_encode($row["Nom"])." ".utf8_encode($row["Prenom"])." </option>";
          }
        } else {
          echo "0 results";
        }
      ?>
    </select>
    <input type="file" name="userfile">
    <textarea name="site" placeholder="Lien du site"></textarea>
    <textarea name="software" placeholder="Logiciels utilisés"></textarea>
    <textarea name="hardware" placeholder="Configuration PC, Périphériques externe"></textarea>
    <input type="number" name="poids" min="0" max="100" value="50"></input>
    <input type="submit" name="submit" value="Ajouter">
  </form>
  <?php
    if (isset($_POST['submit'])) {
      //Les données venant du post
      $nomProjets=$_POST['nomProjets'];
      $description=$_POST['description'];
      $caracteristiques=$_POST['caracteristiques'];
      $anneeScolaireSelect=$_POST['anneeScolaireSelect'];
      $parcoursSelect=$_POST['parcoursSelect'];
      $participantsSelect=$_POST['participantsSelect'];
      $site=$_POST['site'];
      $software=$_POST['software'];
      $hardware=$_POST['hardware'];
      $poids=$_POST['poids'];

      //Récupération du nom du dossier année scolaire
      $anneeDossier=null;
      $sql = "SELECT * FROM anneescolaire WHERE ID_Annee=".$anneeScolaireSelect;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $EndYears = date("Y", strtotime($row["DateFin"]));
          $StartYears = date("Y", strtotime($row["DateDebut"]));
          $anneeDossier = $StartYears."-".$EndYears;
        }
      } else {
        echo "0 results";
      }

      //Dossier concernant le parcours
      $dossierParcours = null;
      $nbParcours=count($parcoursSelect);

      if($nbParcours>1)
      {
        $dossierParcours="Common";
      }
      else
      {
        $dossierParcours=$parcoursSelect;
      }
      //Extraction du zip
      $array = explode(".", $_FILES["userfile"]["name"]);
      $fileName = $array[0];
      $fileExtension = strtolower(end($array));

      if ($fileExtension == "zip") {
        if (is_dir("Projets/".$anneeDossier."/".$dossierParcours."/".$fileName) == false) {
          move_uploaded_file($_FILES["userfile"]["tmp_name"], "tmp/".$_FILES["userfile"]["name"]);
          $zip = new ZipArchive();
          $zip -> open("tmp/".$_FILES["userfile"]["name"]);
          for ($num=0; $num < $zip -> numFiles; $num++) { 
            $fileInfo =$zip -> statIndex($num);
            echo "Extract ".$fileInfo["name"]."</br>";
            $zip -> extractTo("Projets/".$anneeDossier."/".$dossierParcours."/");
          }
          $zip -> close();
          unlink("tmp/".$_FILES["userfile"]["name"]);
        } else {
          echo $fileName."was already unzipped";
        }
      } else {
        echo "Only .zip";
      }
      
    }
  ?>
  <?php include('./PHP/deconnexion.php'); ?>
</body>
</html>