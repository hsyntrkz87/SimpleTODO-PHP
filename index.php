<?php 
	
	

	
	$db = mysqli_connect("localhost", "root", "", "todo");

	
	if (isset($_POST['submit'])) {

		if (empty($_POST['task'])) {
			echo '<script>alert("Fill ");</script>';
		}else{
			$task = $_POST['task'];
			$query = "INSERT INTO task (duty) VALUES ('$task')";
			mysqli_query($db, $query);
			header('location: index.php');
		}
	}	


	if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];

		mysqli_query($db, "DELETE FROM task WHERE id=".$id);
		header('location: index.php');
	}

	$tasks = mysqli_query($db, "SELECT * FROM task");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/4ecf395b08.js" crossorigin="anonymous"></script>

    <title>TodoAPP</title>
</head>

<body>

    <div class="main">
        <div class="title">
            Todo Application
        </div>
        <form method="post" action="index.php" class="input_form">
            <?php if (isset($errors)) { ?>
            <p><?php echo $errors; ?></p>
            <?php } ?>
            <input type="text" name="task" class="task" placeholder="Add Todo">
            <button type="submit" name="submit" id="btn" class="btn">+</button>
        </form>



				

        <?php $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>


		
      <p style="font-size: 25px;" ><?php echo $row['duty']; ?> <a href="index.php?del_task=<?php echo $row['id'] ?>"> <img src="img/x.png"></a></p>
        








        <?php $i++; } ?>
    </div>













</body>

</html>