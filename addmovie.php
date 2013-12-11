
<?php
require_once('incl/functions.php');
?>

<html>
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
			if(isset($_POST['submit'])){
				if(!check_movie($_POST['name'])){
					add_movies($_POST);
				}else{
					print "<h4>That movie already exists</h4>";
				}
			}
			
		?>
		
	<form method="post" name="add_movies">
				<div>
					<label for="name">Movie Title</label> <input type="text" name="name" placeholder="Movie Name" />
				</div>
				<div>
					<label for="year">Release Year</label> <input type="text" name="year" placeholder="Year Made" />
				</div>				
				<div>
					<label for="genre">Genre</label> <input type="text" name="genre" placeholder="Genre Type" />
				</div>
				<div>
					<label for="oscars">Oscars</label> <input type="text" name="oscars" placeholder="Oscars?" />
				</div>
				<div>
					<label for="director">Director</label> <input type="text" name="director" placeholder="Who Directed it" />
				</div>
				<div>
					<label for="description">Description</label> 
				<textarea rows="5" cols="80" input="" type="text" name="description" placeholder="What is it about?" style="margin: 2px; width: 255px; height: 80px;"></textarea>
				</div>
				 <div>
                                        <select name="studio">
                                                <option value="0">Select a Studio</option>
                                                <?php
                                                        $studio= get_info('studio');
                                                        foreach($studio as $s){
                                                                print '\t<option value="'.$s['SID']. '">'.$s['name'] .'</option>\n';
                                                        }
                                                ?>
                                        </select>
                                </div>
					
				<div>
					<input type="submit" name="submit" value="Add it!" />
				</div>
	</div>
	
	</div>
	<?php
		require_once('incl/footer.php');
	?>
	</body>
</html>