<!doctype html>

<?php 

	include_once('include/initialization.php');
	include_once('include/configuration.php');

	$email = ""; 

	
	if(isset($_POST['submit'])){


	$pdo = $bdd->prepare('INSERT INTO user (email) VALUES(:email)');



						            		
							            	$email = $_POST['email']; 
				          					$pdo->bindParam(':email', $email);
				          					$pdo->execute();
				          					
								            $add = $pdo->fetchAll();

	};

?>


<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/style.css" />
	
    <title>PHP - MailingList</title>

    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>

<body>

	<?php 

		if(!empty($_POST)){
			if(empty($_POST['email'])){
				$errors['email'] = 'Le mail est obligatoire';
			}else{

				$errors['email'] = 'Votre email à bien été enregistré';

			}
			
		}

	?>

	<section class="container">

		<div class="container_menu">
		    <a href="login.php">Login</a>
		</div>

		<section class="container_inscription">


				<form action="" method="post">

					<h1>Hep, inscris-toi à notre newsletter !</h1>

					<div class="email row col-md-12">
						<label for="email">Nous avons besoin de votre email:</label> <br>
						<input id="email" type="email" name="email" value="" placeholder="jonsnow@hotmail.com">
						<input type="submit" name="submit" value="submit">

						<?php foreach($errors as $error): ?>
							<div class="alert error"><?php echo $error; ?></div>
						<?php endforeach; ?>

					</div>

				</form>


		</section>

	</section>



</body>
</html>