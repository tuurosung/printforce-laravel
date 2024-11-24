<?php
  session_start();
  require_once "../../Classes/Accounts.php";
  require_once "../../Classes/Seagate.php";

  $account=new Account($q->db, $q->mysqli);
  $seagate=new SeaGate();

  $transfer_id=$seagate->Clean($_GET['transfer_id']);
  $notes= $seagate->Clean($_GET['notes']);
  $source= $seagate->Clean($_GET['source']);
  $destination= $seagate->Clean($_GET['destination']);
  $amount= $seagate->Clean($_GET['amount']);
  $date= $seagate->Clean($_GET['date']);

  // echo $amount;
  // reject_empty($transfer_id);
  // reject_empty($source);
  // reject_empty($destination);
  // reject_empty($amount);
  // reject_empty($date);
  // reject_empty($notes);

  echo $account->EditTransfer($transfer_id,$source,$destination,$amount,$date,$notes);

 ?>
