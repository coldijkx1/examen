<?php
	session_start();
	require_once('config.php');
	
	if(isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'delete')
	{
		$id = intval(trim($_GET['id']));
		
		$sql = 'delete from Reis where id = '.$id;
		$deleteRs = mysqli_query($con,$sql);
		
		if(mysqli_affected_rows($con) == 0)
		{
			$_SESSION['error_msg'] = 'Unable to delete record';
			header('location:index.php');
			exit();
		}
		else
		{
			$_SESSION['success_msg'] = 'Record has been deleted successfully';
			header('location:index.php');
			exit();
		}
	}
	
	
	$sql = 'select * from Reis order by id desc';
	$rs = mysqli_query($con,$sql);
?>

 
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Demo Simple CRUD Operations in PHP using MYSQLi (Procedural)</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<h2>Blogs</h2>
		<a href="create.php" class="add-new">Add New</a>
		
		<?php 
			if(isset($_SESSION['success_msg']))
			{
				echo '<div class="success-msg">'.$_SESSION['success_msg'].'</div>';
				unset($_SESSION['success_msg']);
			}
			
			if(isset($_SESSION['error_msg']))
			{
				echo '<div class="error-msg">'.$_SESSION['error_msg'].'</div>';
				unset($_SESSION['error_msg']);
			}
			
		?>
		
		<table class="table">
			<tr>
				<th>#</th>
				<th>Boekingsnummer</th>
				<th>Titel</th>
				<th>Bestemming</th>
				<th>Omschrijving</th>
                <th>Begindatum</th>
                <th>Einddatum</th>
                <th>Maximaalaantalinschrijvingen</th>
			</tr>
			<?php 
				while($row = mysqli_fetch_assoc($rs))
				{
					$created = date('d-m-Y',strtotime($row['created']));
			?>
					<tr>
						<td> <?php echo $row['id']?> </td>
						<td> <?php echo $row['Boekingsnummer']?> </td>
						<td> <?php echo $row['Titel']?> </td>
                        <td> <?php echo $row['Bestemming']?> </td>
                        <td> <?php echo $row['Omschrijving']?> </td>
                        <td> <?php echo $row['Begindatum']?> </td>
                        <td> <?php echo $row['Einddatum']?> </td>
                        <td> <?php echo $row['Maxinschrijvingen']?> </td>
						<td> <?php echo $created?> </td>
						<td>  
							<a href="edit.php?id=<?php echo $row['id']?>" >Edit</a> | 
							<a href="index.php?action=delete&id=<?php echo $row['id']?>" class="delete-record">Delete</a>
						</td>
					</tr>
			<?php 
				}
			?>
		</table>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".delete-record").click(function(e){
				e.preventDefault();
				
				var confirmBox = confirm('Are you Sure?');
				
				if(confirmBox == true)
				{	
					var getHref = $(this).attr('href');
					window.location.href=getHref;
				}
				
				
			});
		});
		
		
	</script>	
</body>
</html>