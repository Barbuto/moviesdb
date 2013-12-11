
<html>
	<head>
<?php
	require_once('incl/header.php');	
	require_once('incl/functions.php');
?>

	</head>
<div id= "container">
<?php
	require_once('incl/menu.php');
?>
	<body>
	<div id= "moviepage">
	
	<?php
			if(isset($_POST['submit'])){
				if(!check_studio($_POST['name'])){
					add_studio($_POST);
				}else{
					print "<h4>That Studio already exists</h4>";
				}
			}
			
		?>
	<form method="post" name="add_movies">
				<div>
					<label for="name">Studio</label> <input type="text" name="name" placeholder="Studio Name" />
				</div>
				<div>
					<label for="year">Year</label> <input type="text" name="year" placeholder="Founding Year" />
				</div>				
				<div>
					<label for="location">Location</label> <input type="text" name="location" placeholder="Location" />
				</div>
				<div>
					<label for="owner">Owner</label> <input type="text" name="owner" placeholder="Who owns it" />
				</div>	
				<div>
					<input type="submit" name="submit" value="Add it!" />
				</div>
	</div>
	<?php
		require_once('incl/footer.php');
	?>
	</div>
	</body>
</html>