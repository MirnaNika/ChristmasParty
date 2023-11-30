<?php

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

  // Get registrations from the database
  $result = $conn->query("SELECT * FROM registrations");
  $registrations = $result->fetch_all(MYSQLI_ASSOC);

  // Close the database connection
  $conn->close();

  echo "<h2>Christmas Party Registrations</h2>";
  echo "<ul>";
  foreach ($registrations as $registration) {
    echo "<li><strong>{$registration['name']}</strong>: Meal - {$registration['meal']}, Dessert - {$registration['dessert']}</li>";
  }
  echo "</ul>";
?>
