<?php
require 'Id3.php';
require 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="design.css">
</head>
<body>
  <?php
    $id3 = new Id3($data1);
    $id3->displayTree();
  ?>
</body>
</html>
