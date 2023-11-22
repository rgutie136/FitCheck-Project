<?php

  $email = 'admintest@gmail.com';
  $pwd = 'Passw0rd';

  require_once "config.php";
  require_once "functions.php";


  logInUser($conn, $email, $pwd);