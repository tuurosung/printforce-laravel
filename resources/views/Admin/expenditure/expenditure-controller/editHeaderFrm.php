<?php

require_once '../../Classes/Seagate.php';
require_once '../../Classes/Expenditure.php';

  $expenditure=new Expenditure();
  $seagate=new SeaGate();

  $header_id=$seagate->Clean($_GET['header_id']);
  $header_name=$seagate->Clean($_GET['header_name']);

  echo $expenditure->EditHeader($header_id,$header_name);
