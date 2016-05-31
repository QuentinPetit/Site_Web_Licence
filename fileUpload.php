<!DOCTYPE html>
<html>
<head>
  <title>Unzip file Upload test</title>
  <meta charset="utf-8">
</head>
<body>
  <form action="fileUpload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="userfile"><input type="submit" name="submit" value="Extract">
  </form>
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