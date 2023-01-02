<?php
  // TODO: csrf
  $_SESSION['loggedin'] = false;
  
  unset($_SESSION['Mail']);
  unset($_SESSION['uid']);
  
if (!$_SESSION['loggedin']) {
  header('Location: ./?login');
  exit;
}

unset($_SESSION['Mail']);
unset($_SESSION['uid']);

header('Location: ./?home');