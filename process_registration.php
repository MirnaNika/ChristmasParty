<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $meal = htmlspecialchars($_POST['meal']);
  $dessert = htmlspecialchars($_POST['dessert']);

  $servername = "localhost";
  $username = "mirna";
  $password = "123";
  $dbname = "christmas_party";

  // Connect to the database
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

 // Prepare SQL statement
 $stmt = $conn->prepare("INSERT INTO registrations (name, meal, dessert) VALUES (?, ?, ?)");
 $stmt->bind_param("sss", $name, $meal, $dessert);

 // Execute the statement
 if ($stmt->execute()) {
    // Insertion successful
} else {
    // Handle the error
}

 // Close the statement and connection
 $stmt->close();
 $conn->close();

 // Redirect back to the registration form
 header("Location: registrations.php");
 exit;
}
?>
