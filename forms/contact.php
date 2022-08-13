<?php

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "2h_em";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `messages`( `name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "None, Your message has been sent. Thank you!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>