<?php
require_once '../../dbcon.php';
require_once '../../Classes/Expenditure.php';

  $header_id=rand(1000,9999);
  $header_name=clean_string($_GET['header_name']);
  $date=date('Y-m-d');

  reject_empty($header_id);
  reject_empty($header_name);

  $expenditure=new Expenditure();

  $query=$expenditure->CreateHeader($header_id,$header_name);

  echo $query;
