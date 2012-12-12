<?php
// Fill up array with names

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("spatchaker", $con);

$query = "SELECT * FROM my_members WHERE email_active = '1' " ;
$result = mysql_query($query);

while($row = mysql_fetch_array($result))
  {
    $a[] = $row['name'];
  }


//get the q parameter from URL
$q=$_GET["q"];

//lookup all hints from array if length of q>0
if (strlen($q) > 0)
  {
  $hint="";
  for($i=0; $i<count($a); $i++)
    {
    if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
      {
      if ($hint=="")
        {
        $hint="<a href='public_profile.php?name=$a[$i]' class='hint'>" . $a[$i] . "</a>";
        }
      else
        {
        $hint=$hint." , <a href='public_profile.php?name=$a[$i]' class='hint'>" . $a[$i] . "</a>";
        }
      }
    }
  }

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint == "")
  {
  $response="no results";
  }
else
  {
  $response=$hint;
  }

//output the response
echo $response;
?>

<style>
.hint {
text-decoration: none;
} 
</style>
