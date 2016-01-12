<?php
include_once('include/initialization.php');
if($user = getConnectedUser($connexion)){
	redirectTo('index.php');
}

$errors = array();

if(!empty($_POST)){
	if(empty($_POST['login'])){
		$errors['login'] = 'Le login est obligatoire';
	}

	if(empty($_POST['password'])){
		$errors['password'] = 'Le password est obligatoire';
	}

	if(empty($errors)){
		$sql = 'SELECT * FROM user WHERE login = :login';
		$preparedStatement = $connexion->prepare($sql);
		$preparedStatement->bindValue(':login', $_POST['login']);
		$preparedStatement->execute();
		$user = $preparedStatement->fetch();
		if(!empty($user)
		&& password_verify($_POST['password'], $user['hash'])){
			$_SESSION['user_secret'] = $user['secret'];
			redirectTo('index.php');
		}
	}
}
?>


<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/style.css" />
	
    <title>PHP - MailingList</title>

    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

		<section class="container">

		<div class="container_menu">

		   <a href="index.php">Retour</a>
		   
		</div>

		<section class="container_inscription">



				<form action="" method="post">

					<h1>Connexion compte Admin</h1>

					<div class="email connexion">
					    <div class="field">
					      <label>Login</label>
					      <input type="text" name="login" placeholder="identifiant"/>
					    </div>

					    <div class="field">
					      <label>Password</label>
					      <input type="password" name="password" placeholder="jonsnow@hotmail.com" />
					    </div>

							<div class="field">
					      <input type="submit" class="button" name="envoyer" />
					    </div>

					</div>
					
					<?php foreach($errors as $error): ?>
						<div class="alert error"><?php echo $error; ?></div>
					<?php endforeach; ?>

				</form>


		</section>

	</section>

</body>
</html>
