<?php
  session_start();
  require_once "../../Classes/Accounts.php";
  require_once "../../Classes/Seagate.php";

  $account=new Account($q->db, $q->mysqli);
  $seagate=new SeaGate();

  $transfer_id=$seagate->Clean($_GET['transfer_id']);
  echo $account->DeleteTransfer($transfer_id);

 ?>
