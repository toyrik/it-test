<?php
  session_start();
  require_once "classes/shortener.php";

  $baseurl = $_SERVER['HTTP_HOST'];


  $s = new Shortener();

  if(isset($_POST['url'])) {
   $url = $_POST['url'];

   if($code = $s->makeCode($url)) {
    $_SESSION['feedback'] = "Ready! Here is your link: <a href='http://$baseurl/?code=$code'>$baseurl/?code=$code</a>";
   } else {
    $_SESSION['feedback'] = "Mistake! Possibly an incorrect URL?";
   }
  }
  header("Location: http://$baseurl/index.php");
?>