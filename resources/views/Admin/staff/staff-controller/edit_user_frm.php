<?php
  require_once '../../dbcon.php';
  require_once '../../Classes/Users.php';

  $u=new User($q->db, $q->mysqli);

  $user_id=clean_string($_GET['user_id']);
  $full_name=clean_string($_GET['full_name']);
  $phone_number=clean_string($_GET['phone_number']);
  $access_level=clean_string($_GET['access_level']);
  $username=clean_string($_GET['username']);

  reject_empty($full_name);
  reject_empty($phone_number);
  reject_empty($access_level);
  reject_empty($username);

  $query=$u->UpdateUser($user_id,$full_name,$phone_number,$access_level,$username);
  echo $query;

 ?>
