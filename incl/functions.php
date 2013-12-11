<?php

require_once('incl/Database.php'); 

$host= 'localhost';
$u= 'stephe46';
$p= 'minidude1$';
$d= 'stephe46_movies';

global $db;
$db= new Database($d, $u, $p, $host);

/**Return all info from whatever
table is passed to get_info().
If no table is passed, movie table is used by default.
**/
function get_info($table='movies'){
	$db= $GLOBALS['db'];
	$results= $db->query("SELECT * FROM $table");
	return $db->resToArray($results);
}

function get_infoa($table='actors'){
	$db= $GLOBALS['db'];
	$results= $db->query("SELECT * FROM $table");
	return $db->resToArray($results);
}

function get_infos($table='studio'){
	$db= $GLOBALS['db'];
	$results= $db->query("SELECT * FROM $table");
	return $db->resToArray($results);
}


function get_movies($id){
	$db= $GLOBALS['db'];
	$query= "SELECT * FROM movies WHERE MID='$id'";
	return $db->get_row($query);
}
function get_actors($id){
	$db= $GLOBALS['db'];
	$query= "SELECT * FROM actors WHERE AID='$id'";
	return $db->get_row($query);
}

function get_studio($id){
	$db= $GLOBALS['db'];
	$query= "SELECT * FROM studio WHERE SID='$id'";
	return $db->get_row($query);
}

function check_movie($name){
	$movies= get_info();
	
	foreach($movies as $temp){
		if(strtolower($name) == strtolower($temp['name'])){
			return true;
		}
	}
	
	return false;
	
}

function check_actor($name){
	$actors= get_infoa();
	
	foreach($actors as $temp){
		if(strtolower($name) == strtolower($temp['name'])){
			return true;
		}
	}
	
	return false;
	
}		

function check_studio($name){
	$studio= get_infos();
	
	foreach($studio as $temp){
		if(strtolower($name) == strtolower($temp['name'])){
			return true;
		}
	}
	
	return false;
	
}		



function add_movies($info){
	$db= $GLOBALS['db'];
	extract($info);
	$submitted= $db->query("INSERT INTO movies VALUES('', '$name', '$year', '$genre', '$oscars', '$director', '$description', $studio)");

	if($submitted){ 
		print "<h3>$name was submitted!</h3>"; 
	}else{
		print "<h3>There was an issue: ". mysql_error(). "</h3>";
		error_log(mysql_error());
	}
}

function update_movies($info){
	$db= $GLOBALS['db'];
	
	foreach($info as $key => $value){
		$info[$key]= $db->clean($value);
	}
	extract($info);
	
	$query= "UPDATE movies SET name='$name', year='$year', genre='$genre', oscars='$oscars', director='$director', description='$description', MID='$movies', SID='studio', timestamp='now()' WHERE MID='$MID'";
	
	$submitted= $db->query($query);

	if($submitted){ 
		print "<h3>$name updated!</h3>"; 
	}else{
		print "<h3>There was an issue: ". mysql_error(). "</h3>";
		error_log(mysql_error());
	}
}


function add_actors($info){
	$db= $GLOBALS['db'];
	extract($info);
	
	$submitted= $db->query("INSERT INTO actors VALUES('', '$name', '$age', '$oscars', '$gender', '$hair_color', '$eye_color')");

	if($submitted){ 
		print "<h3>$name submitted!</h3>"; 
	}else{
		print "<h3>There was an issue: ". mysql_error(). "</h3>";
		error_log(mysql_error());
	}
}

function update_actors($info){
	$db= $GLOBALS['db'];
	
	foreach($info as $key => $value){
		$info[$key]= $db->clean($value);
	}
	extract($info);
	
	$query= "UPDATE actors SET name='$name', age='$age', oscars='$oscars', gender='$gender', hair_color='$hair_color', eye_color='$eye_color', AID='$actors', timestamp='now()' WHERE AID='$AID'";
	
	$submitted= $db->query($query);

	if($submitted){ 
		print "<h3>$name updated!</h3>"; 
	}else{
		print "<h3>There was an issue: ". mysql_error(). "</h3>";
		error_log(mysql_error());
	}
}

function add_studio($info){
	$db= $GLOBALS['db'];
	extract($info);
	
	$submitted= $db->query("INSERT INTO studio VALUES('', '$name', '$year', '$location', '$owner')");

	if($submitted){ 
		print "<h3>$name submitted!</h3>"; 
	}else{
		print "<h3>There was an issue: ". mysql_error(). "</h3>";
		error_log(mysql_error());
	}
}

function update_studio($info){
	$db= $GLOBALS['db'];
	
	foreach($info as $key => $value){
		$info[$key]= $db->clean($value);
	}
	extract($info);
	
	$query= "UPDATE studio SET name='$name', year='$year', location='$location', owner='$owner', SID='$studio', timestamp='now()' WHERE SID='$SID'";
	
	$submitted= $db->query($query);

	if($submitted){ 
		print "<h3>$name updated!</h3>"; 
	}else{
		print "<h3>There was an issue: ". mysql_error(). "</h3>";
		error_log(mysql_error());
	}
}



function print_array($a){
	print "<pre>";
	print_r($a);
	print "</pre>";
}

?>