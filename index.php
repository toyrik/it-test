<?php
  session_start();
  require_once "redirect.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>URLShorter</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
   <h1 class="title">URLShorter</h1>
<?php
  if(isset($_SESSION['feedback'])) {
   echo "<p>".$_SESSION['feedback']."</p>";
   unset($_SESSION['feedback']);
  }  ?>
   <form action="shorten.php" method="post">
    <input type="url" name="url" placeholder="Insert URL" autocomplete="off">
    <input type="submit" value="get url">
   </form>
  </div>
</body>
</html>