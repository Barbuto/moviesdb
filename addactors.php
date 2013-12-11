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
				if(!check_actor($_POST['name'])){
					add_actors($_POST);
				}else{
					print "<h4>That Artist already exists</h4>";
				}
			}
			
		?>
	
	<form method="post" name="add_actor">
				<div>
					<label for="name">Name</label> <input type="text" name="name" placeholder="Name" />
				</div>
				<div>
					<label for="age">Age of Actor</label> <input type="text" name="age" placeholder="How old are they?" />
				</div>				
				<div>
					<label for="oscars">Oscars</label> <input type="text" name="oscars" placeholder="Did they win an Oscar" />
				</div>
				<div>
					<label for="gender">Gender</label> <input type="text" name="gender" placeholder="Their Gender" />
				</div>

				<div>
					<label for="hair color">Hair Color</label> <input type="text" name="hair color" placeholder="The Color of their hair" />
				</div>
				<div>
					<label for="eye color">Eye Color</label> <input type="text" name="eye color" placeholder="The Color of their eyes" />
				</div>
				
					
				<div>
					<input type="submit" name="submit" value="Add it!" />
				</div>
	</div>
	</div>
	<?php
		require_once('incl/footer.php');
	?>
	</div>
	</body>
</html>