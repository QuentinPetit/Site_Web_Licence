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
    <textarea name="caractéristiques" placeholder="Caractéristiques du projet : toute technique spécifiques au projet (lancer de rayon, shader, modélisation low-poly...)"></textarea>
    <select>
      <option disabled="true">Année Scolaire</option>
      <?php 
        $sql = "SELECT * FROM anneescolaire ORDER BY DateFin DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $EndYears = date("Y", strtotime($row["DateFin"]));
            $StartYears = date("Y", strtotime($row["DateDebut"]));
            ?>
            <option value=<?php $row["ID_Annee"]; ?>> <?php echo $StartYears."-".$EndYears; ?> </option>
            <?php
          }
        } else {
          echo "0 results";
        }
        
      ?>
    </select>
    <input type="file" name="userfile"><input type="submit" name="submit" value="Ajouter">
  </form>
  <?php include('./PHP/deconnexion.php'); ?>
  <?php
    if (isset($_POST['submit'])) {
      $array = explode(".", $_FILES["userfile"]["name"]);
      $fileName = $array[0];
      $fileExtension = strtolower(end($array));

      if ($fileExtension == "zip") {
        if (is_dir("unzip/fileunzip/".$fileName) == false) {
          move_uploaded_file($_FILES["userfile"]["tmp_name"], "tmp/".$_FILES["userfile"]["name"]);
          $zip = new ZipArchive();
          $zip -> open("tmp/".$_FILES["userfile"]["name"]);

          for ($num=0; $num < $zip -> numFiles; $num++) { 
            $fileInfo =$zip -> statIndex($num);
            echo "Extract ".$fileInfo["name"]."</br>";
            $zip -> extractTo("unzip/fileunzip/".$fileName);
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
</body>
</html>