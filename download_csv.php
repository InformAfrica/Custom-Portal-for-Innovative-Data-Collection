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

// Set the header to inform the browser about the content type and the filename for the CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="disinformation_analysis.csv"');

// Open output stream (php://output) to write directly to the file for download
$output = fopen('php://output', 'w');

// Fetch all data from the 'analysis_data' table
$sql = "SELECT * FROM analysis_data";
$result = $conn->query($sql);

// Write the column names as the first row in the CSV
$columns = $result->fetch_fields();
$column_names = [];
foreach ($columns as $column) {
    $column_names[] = $column->name;
}
fputcsv($output, $column_names);

// Fetch and write the data to the CSV
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

// Close the output stream and database connection
fclose($output);
$conn->close();
?>
