<?php
	# starts the session
	session_start();
	# initiate connection to other webpage
	include "PostHandler.php";

	#if Post holds a value
	if(isset($_POST["UserPost"])) {

		#insert values into database
		$UserPost = $_POST['UserPost'];
		$sql_store = "INSERT into Posts (id, post) VALUES (NULL, '$UserPost')";
		$sql = mysqli_query($db, $sql_store) or die(mysql_error());
	}
	# if nothing is in the post variable when submitted, error page
	 else {
	 	echo "Error: nothing was submitted";
	 }

?>

<html>
	<head>

	<Title>OneLine</Title>

	</head>

	<body>
		<h2>Welcome to the Site</h2>
		<p>
		<!---Get User Posts ---->
		<form action="homepage.php" method="POST">
			Submit Your Post Below
		<input type="text" name="UserPost" value="">
		<input type="submit" name="Submit" value="Submit">
		<!----User Posts copied to Database---->
		</form>
		</p>
		<!---Display User Posts from Database---->
		<h3>User Posts</h3>
			<table border= '1'>
				<tr>
					<th>Post Number</th>
					<th>Post</th>
				</tr>

				<?php 
					#prepare sql query
					$sql_list = "SELECT * FROM Posts ORDER BY id ASC";
					#queries the database
					$results = mysqli_query($db, $sql_list) or die(mysql_error());
					#create empty variable posts, to be filled
					$posts = "";
					#if there is more than one result in the database, by counting rows from sql query
					if (mysqli_num_rows($results) > 0) {
						#like a for loop. $row will be equal to the row number(id)
						#loop is killed once row is beyond the number of posts in the db
						while ($row = mysqli_fetch_assoc($results)) {
							#assign retrieved values to string to use with html
							$id = $row['id'];
							$post = $row['post'];

							$posts .= 				
							"<tr>
								<td>$id</td>
								<td>$post</td>
							</tr>";

						}

						echo $posts;
							
					} else {
						echo "There are no Posts in the Database!";
					}
				?>	
		<p2> 
		<!---Clicking user posts sends to p2p chat---->
			
			
		</p2>
	</body>
</html>
