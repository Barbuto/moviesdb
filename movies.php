<?php
require_once('incl/functions.php');
?>

<html lang="en-us">
	<head>
	<?php
	require_once('incl/header.php');
	?>
	</head>
<div id= "container">
<?php
	require_once('incl/menu.php');
?>
	<body>
	<div id= "moviepage">

	<?php
			
			if(isset($_GET['id'])){
				$movies= get_movies($_GET['id']);
				print_array($movies);

			}else{
				$results= get_info('movies');
			
				foreach($results as $movies){
					print '<h4><a href="movies.php?id='.$movies['MID'].'">'.$movies['name'].'</a></h4>';
				}
			}
			
		?>
		
	</div>
	<?php
		require_once('incl/footer.php');
	?>
	</div>
	</body>
</html>