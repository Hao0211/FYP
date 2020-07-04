<?php
include('config.php');
session_start();

//for delete
if(empty($_REQUEST['item']))
{
	//No item check
}
else //delete name = checkbox value = product primary key	
{
	foreach($_REQUEST['item'] as $deleteName){
		$sql="update product_detail set available='0' where ID='$deleteName'";
		$result=$conn->query($sql);
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CSS: The Missing Manual</title>
<link href="main.css" rel="stylesheet">
<script>
	function ConfirmDelete() {  
		return confirm("Are you sure you want to delete?");
	}
</script>
</head>

<body>
	<h1>Welcome to the Lorem Ipsum Store</h1>
	<form action="table.php" method="post">
	<table class="inventory" width="100%">
		<?php
			//---login
			if(isset($_GET['u'])){
				if(isset($_GET['u'])){
					session_destroy();
					echo "<script>window.location.assign('index.html');</script>";
				}
			}
			
			if($_SESSION['user']!=''){
				$user=$_SESSION['user'];
			}
			else{
				echo "<script>window.location.assign('index.html');</script>";
			}
		?>
		<caption>
			Welcome <?php echo $user; ?><a href="table.php?u=logout">Logout</a>
		</caption>
		<colgroup>
			<col id="-">
			<col id="productID">
			<col id="productName">
			<col id="price">
			<col id="quantity">
		</colgroup>
		<tr>
			<th scope="col">&nbsp;</th>
			<th scope="col">ID</th>
			<th scope="col">Name</th>
			<th scope="col">Price</th>
			<th scope="col">Quantity</th>
		</tr>

		<?php
			$sql="select ID,title,price,quantity from product_detail where available='1'";
			$result=$conn->query($sql);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){

				

		?>
<!-- Looping from here -->
		<tr>
			<td><input type="checkbox" name="item[]" value="<?php echo $row["ID"]; ?>" /></td>
			<td><?php echo $row['ID'];?></td>
			<td><?php echo $row['title'];?></td>
			<td><?php echo $row['price'];?></td>
			<td><?php echo $row['quantity'];?></th>
		</tr>
<!--- to here--->

		<?php
				}
			}
		
		?>
		<tr align="center">
		<td colspan="5"><input type="submit" value="delete" Onclick="return ConfirmDelete()" />
		</tr>
	</table>
	</form>
</body>
</html>
