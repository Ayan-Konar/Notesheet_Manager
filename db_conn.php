 <?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"dpl-project");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 