<?php
	//get the index
	$index = $_GET['index'];

	//fetch data from json
	$data = file_get_contents('list.json');
	$data_array = json_decode($data);

	//delete the row with the index
	unset($data_array[$index]);
	
	//reordering array
	$data_array = array_values($data_array);

	//encode back to json
	$data = json_encode($data_array, JSON_PRETTY_PRINT);
	file_put_contents('list.json', $data);

	header('location: index.php');
?>
