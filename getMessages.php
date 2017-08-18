<?php

include "PostHandler.php";
	
}
#sp
$username = stripslashes(htmlspecialchars($_GET['username']));

$result = $db->prepare("SELECT * FROM messages");

$result->bind_param("s", $username);

$result->execute();

$result = $result->get_result();

while ($r = $result->fetch_row()) {
	echo $r[1];
	echo "\\";
	echo $r[2];
	echo "\n";
}

?>
