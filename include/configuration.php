<?php
$host = 'michaeljw01.mysql.db';
$dbname = 'mailinglist';
$user = 'michaeljw01';
$password = 'ptg758L1';

try
{
	$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=UTF8', $user, $password);
}catch (PDOException $e)
{
	die('Error : '.$e->getMessage());
}

?>