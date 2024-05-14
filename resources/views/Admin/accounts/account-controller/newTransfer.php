<?php
  require_once "../../dbcon.php";
  require_once "../../Classes/Accounts.php";

  $account=new Account($q->db, $q->mysqli);

  $transfer_id=clean_string($_GET['transfer_id']);
  $notes=clean_string($_GET['notes']);
  $source=clean_string($_GET['source']);
  $destination=clean_string($_GET['destination']);
  $amount=clean_string($_GET['amount']);
  $date=clean_string($_GET['date']);

  // echo $amount;
  // reject_empty($transfer_id);
  // reject_empty($source);
  // reject_empty($destination);
  reject_empty($amount);
  // reject_empty($date);
  // reject_empty($notes);

  echo $account->FundTransfer($transfer_id,$source,$destination,$amount,$date,$notes);

 ?>
