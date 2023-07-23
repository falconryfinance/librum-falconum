<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
   <script src="js/jquery.bdt.js"></script>
   <link href="css/jquery.bdt.css" rel="stylesheet">
   <link href="css/font-awesome.min.css" rel="stylesheet">
   <script src="js/jquery.sortelements.js"></script>
   
	<title>Librum Falconum</title>
</head>
<body>

<div class="container">
  <h3>Librum Falconum</h3>
  <h5>The Library of Falcons starts here. Add media below. Tag uploads with the media type</h5>
  <hr class="my-4">
  </div>
<br />

<div class="container"><a class="btn btn-primary btn-lg btn-sm" href="add.php" role="button">Add</a></div><br />

<div class="container">
<table id="bootstrap-table" class="table table-hover">
	<thead class="text-center">
		<th class="col-sm-1">Num. <i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-2">Title <i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-3">Text/Desc. <i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-2">Tags/Type <i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-2">URL <i class="fa fa-sort" aria-hidden="true"></i></th>
		<th class="col-sm-2">Operation</th>
	</thead>
	<tbody>
		<?php
			//fetch data from json
			$data = file_get_contents('list.json');
			//decode into php array
			$calup = json_decode($data);		
		?>

		<?php 
		$index = 0;
		
		if(is_array($calup)){
		
		foreach ($calup as $calup): 
		?>
        <tr style="display: table-row;">
		    <td style="text-align: center;"> <?php echo $index+1; ?> </td>
            <td> <?php echo $calup->title; ?> </td>
            <td> <?php echo $calup->text; ?> </td>
			<td> <?php echo $calup->tags; ?> </td>
            <td> <?php echo $calup->url; ?> </td>
			<td style="text-align: center;">
			<div class="btn-group btn-group-sm" role="group">
			<a class="btn btn-primary btn-sm" href="edit.php?index=<?php echo $index; ?>" role="button">Edit</a> 
			<a class="btn btn-warning btn-sm" href="delete.php?index=<?php echo $index; ?>" role="button">Delete</a>
			</div>
			</td>
        </tr>
		<?php
		$index++;
		endforeach;
		
		} 
		?>
	</tbody>
</table>
</div>

    <script type="text/javascript">
    $(document).ready( function () {
       $('#bootstrap-table').bdt({
		    showSearchForm: 1,
            showEntriesPerPageField: 1
	   });
    });
    </script>

</body>
</html>
