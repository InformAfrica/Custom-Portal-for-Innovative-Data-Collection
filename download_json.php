<?php
// Database connection settings
$servername = "localhost"; // Adjust if needed
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "disinformation_analysis"; // The name of the database

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the header to inform the browser about the content type and the filename for the JSON file
header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="disinformation_analysis.json"');

// Fetch all data from the 'analysis_data' table
$sql = "SELECT * FROM analysis_data";
$result = $conn->query($sql);

// Initialize an array to hold the data
$data = [];

// Fetch each row and add it to the data array
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Output the data as JSON
echo json_encode($data, JSON_PRETTY_PRINT);

// Close the database connection
$conn->close();
?>
