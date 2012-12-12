<?php
if ($_FILES["file"]["size"] < 20000000)
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/".$_POST['name']."/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/".$_POST['name']."/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/".$_POST['name']."/". $_FILES["file"]["name"];
      }
    }
  }
else
  {
  die("Invalid file");
  }
?> 


<form action="uploadxmltodb.php" method="post">
Table Name: <input name="table" type="text"> </input>
<input name="file" type="text" value=<?php echo "upload/".$_POST['name']."/". $_FILES["file"]["name"]; ?> > </input>
<input type="submit"></input>
</form>

