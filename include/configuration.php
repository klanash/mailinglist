<?php
$host = 'localhost';
$dbname = 'mailinglist';
$user = 'root';
$password = 'root';

try
{
	$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=UTF8', $user, $password);
}catch (PDOException $e)
{
	die('Error : '.$e->getMessage());
}

?>