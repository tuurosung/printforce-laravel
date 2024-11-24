<?php
  require_once '../../dbcon.php';
  require_once '../../Classes/Expenditure.php';
  require_once '../../Classes/Seagate.php';

  $seagate = new SeaGate();
  $expenditure = new Expenditure();

  $expenditure_id=$seagate->Clean($_GET['expenditure_id']);
  $expenditure_header= $seagate->Clean($_GET['header_id']);
  $description= $seagate->Clean($_GET['description']);
  $amount= $seagate->Clean($_GET['amount']);
  $account= $seagate->Clean($_GET['account_number']);
  $date= $seagate->Clean($_GET['date']);

  reject_empty($expenditure_id);
  reject_empty($expenditure_header);
  reject_empty($description);
  reject_empty($amount);
  reject_empty($account);

  echo $expenditure->EditExpenditure($expenditure_id, $expenditure_header, $description, $amount, $date, $account);
 ?>
