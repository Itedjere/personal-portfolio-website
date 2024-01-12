<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Godspower Itedjere</title>
		<style>
			/* Add your CSS styles here */
			body {
				font-family: Arial, sans-serif;
				margin: 0;
				padding: 0;
				color: #737373;
			}

			header {
				background-color: #000000;
				color: #ffbd39;
				text-align: center;
				padding: 20px;
				font-size: 24px;
				text-transform: uppercase;
			}

			.container {
				max-width: 800px;
				margin: 0 auto;
				padding: 20px;
			}

			footer {
				background-color: #000000;
				color: #ffbd39;
				text-align: center;
				padding: 10px;
				font-size: 16px;
			}
		</style>
	</head>
	<body>
		<header>Godspower Itedjere</header>

		<div class="container">
			<p>
				Name:
				<?php echo $name; ?>
			</p>

			<p>
				Email Address:
				<?php echo $email; ?>
			</p>

			<p>
				Subject:
				<?php echo $subject; ?>
			</p>

			<p>Message:</p>

			<div>
				<?php echo $message; ?>
			</div>
		</div>

		<footer>
			&copy;
			<?php echo date("Y"); ?>
			Godspower Itedjere. All Rights Reserved.
		</footer>
	</body>
</html>
