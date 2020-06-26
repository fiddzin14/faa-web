<?php 
  $doc = $_SERVER['DOCUMENT_ROOT']."".$_SERVER['REQUEST_URI'];
  $pisah = explode("/", $doc);
  $dir   = $_SERVER['DOCUMENT_ROOT']."/".$pisah[3]."/config/config.php";

  include"$dir";
  $faa12 = new database();

?>