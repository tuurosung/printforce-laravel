<?php

  require_once '../../dbcon.php';
  require_once '../../Classes/Expenditure.php';

  $header_id=clean_string($_GET['header_id']);

  $e=new Expenditure();

  $query=$e->DeleteHeader($header_id);

  echo $query;

 ?>
