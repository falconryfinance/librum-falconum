<?php
	//get the index from URL
	$index = $_GET['index'];

	//get json data
	$data = file_get_contents('lista.json');
	$data_array = json_decode($data);

	//assign the data to selected index
	$row = $data_array[$index];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<title>Librum Falconum</title>
</head>
<body>
<br />
<div class="container">
<form method="POST">
	<p><a class="btn btn-primary btn-lg btn-sm" href="index.php">Back</a></p>
	<p>
		<label for="title">Title</label>
		<input type="text" id="title" name="title" value="<?php echo $row->title; ?>">
	</p>
	<p>
		<label for="text">Text/Desc.</label>
		<input type="text" class="form-control" id="text" name="text" value="<?php echo $row->text; ?>">
	</p>
	<p>
		<label for="tags">Tags/Type</label>
		<input type="text" class="form-control" id="tags" name="tags" value="<?php echo $row->tags; ?>">
	</p>
	<p>
		<label for="url">URL</label>
		<input type="text" class="form-control" id="url" name="url" value="<?php echo $row->url; ?>">
	</p>
	<input class="btn btn-primary btn-lg btn-sm" type="submit" name="save" value="Save">
</form>
</div>

<?php
	if(isset($_POST['save'])){
		//set the updated values
		$input = array(
			'title' => $_POST['title'],
			'text' => $_POST['text'],
			'tags' => $_POST['tags'],
			'url' => $_POST['url']
		);
		
		//update the selected index
		$data_array[$index] = $input;

		//reordering array
		$data_array = array_values($data_array);
		//encode back to json
		$data = json_encode($data_array, JSON_PRETTY_PRINT);
		file_put_contents('list.json', $data);

		header('location: index.php');
	}
?>
</body>
</html>
