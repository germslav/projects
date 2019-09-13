<?php

  $shorturl =  "shorturl.com";
  $shorturl .= htmlspecialchars($_SERVER['REQUEST_URI']);

  $link = mysqli_connect("localhost", "root", "", "shorturl");

  $result = mysqli_query($link, "SELECT longurl,shorturl FROM urls WHERE shorturl = ('$shorturl')");

  $row = mysqli_fetch_row($result);

  $rowValue = $row[0];

  //echo $rowValue;

  header('Location: ' . $rowValue);
?>
