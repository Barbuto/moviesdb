<?php
require_once('incl/functions.php');
?>


<html>
	<head>
	<?php
	require_once('incl/header.php');
	?>
	</head>
<body>
<div id= "container">

<?php
	require_once('incl/menu.php');
?>

	<div id= "moviepage">
	<body>
	<?php			
			if(isset($_GET['id'])){
				$actors= get_actors($_GET['id']);
				print_array($actors);
			}else{
				$results= get_info('actors');			
				foreach($results as $actors){
					print '<h4><a href="actors.php?id='.$actors['AID'].'">'.$actors['name'].'</a></h4>';
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