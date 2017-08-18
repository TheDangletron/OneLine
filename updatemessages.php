<?php

include "PostHandler.php";

}
#special characters prevents url tag insertion <malicious code here> by changing < to ln and > to gt
#stripslashes...gets rid of the slashes in the url
$username = stripslashes(htmlspecialchars($_GET['username']));

$message = stripslashes(htmlspecialchars($_GET['message']));

#if message or username is empty, die
if ($message == "" || $username == "") {
	die();
}

#catch the user message and pass it to the db. ? gets substituted in the database
$result = $db->prepare("INSERT INTO messages VALUES('',?,?)");

$result->bind_param("ss", $username, $message);

$result->execute();

?>
