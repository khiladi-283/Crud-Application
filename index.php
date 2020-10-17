<?php include 'db.php' ;

if(isset($_GET["edit"]))
{
	$id = $_GET["edit"];

	$edit_state = true;

	$rec  = mysqli_query($db,
	"select * from register where id = ".$id);

	$record = mysqli_fetch_array($rec);

	$id = $record["id"];
	$name = $record["name"]; 
	$email = $record["email"];
}

?>

<html>
<head>
<title>CRUD Application</title>
<h1 align="center">CRUD Application by Shivam kumar(Khiladi)</h1>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
if(isset($_SESSION['msg'])):
?>

<div class="msg">
<?php
echo $_SESSION['msg'];
unset($_SESSION['msg']);
?>
</div>


<?php endif; ?>

<table>
<thead>
<tr>
<th>Username</th>
<th>Email</th>
<th colspan="2">Action</th>
</tr>
<tbody>
<?php while($rows = mysqli_fetch_assoc($results))
{
?>
<tr>
<td><?php echo $rows["name"]; ?></td>
<td><?php echo $rows["email"]; ?> </td>
<td><a href="index.php?edit=<?php echo $rows["id"]; ?>">Edit</a></td>
<td><a class="btn-delete" href="db.php?del=<?php echo $rows["id"]; ?>">Delete</a></td>

</tr>
<?php } ?>
</thead>
</table>

<form action="db.php" method="post">
<input type="hidden" name="id"
value=<?php echo $id; ?>>


<div class="input-group">
<label>Username</label>
<input type="text" name="uname"
value = <?php echo str_replace(' ', '&nbsp;', $name)  ?>>
</div>

<div class="input-group">
<label>Email</label>
<input type="text" name="email"
value = <?php echo $email; ?>>
</div>

<div class="input-group">
<?php if($edit_state == false): ?>
<button type="submit" name="save" class="btn">Save</button>
<?php else: ?>
<button type="submit" name="update" class="btn" >Update</button>
<?php endif ?>

</div>
