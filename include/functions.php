<?php

function loginExists($connexion, $login){
  $query = $connexion->prepare('SELECT COUNT(*) AS total FROM user WHERE login = :login');
  $query->bindValue(':login', $login);
  $query->execute();
  if($result = $query->fetch()){
    return !empty($result['total']);
  }
  return false;
}

function getConnectedUser($connexion)
{

  if(empty($_SESSION['user_secret'])){
    return false;
  }
  $secret = $_SESSION['user_secret'];
  $query = $connexion->prepare('SELECT * FROM user WHERE secret = :secret');
  $query->bindValue(':secret', $secret);
  $query->execute();
  if($user = $query->fetch()){
    return $user;
  }else{
    return false;
  }
}

function redirectTo($url)
{
  header('Location: '.$url);
  exit;
}

function validateDate($input, $format = 'Y-m-d H:i:s')
{
    $date = DateTime::createFromFormat($format, $input);
    return $date && $date->format($format) == $input;
}

function displayTasks($tasks){
  include('tasks.view.php');
}
