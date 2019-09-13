<?php
  $longurl = htmlspecialchars($_POST[LongURL]);

  $link = mysqli_connect("localhost", "root", "", "shorturl");

  $result = mysqli_query($link, "SELECT longurl,shorturl FROM urls WHERE longurl = ('$longurl')");
  if ($num_rows = mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_row($result);
    echo $row[1];
  }
  else {
    $result = mysqli_query($link, "SELECT MAX(id) AS id FROM urls");

    $row = mysqli_fetch_row($result);

    $rowValue = base_convert($row[0] + 1, 10, 36);

    $shorturl = "shorturl.com/";
    $shorturl .= $rowValue;

    mysqli_query($link, "INSERT INTO urls(longurl, shorturl) VALUES ('$longurl', '$shorturl')");

    echo $shorturl;
  }
?>
