<?php


$conn = new mysqli($_DB_SERVER, $_USERNAME, $_PASSWORD, $_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}











?>