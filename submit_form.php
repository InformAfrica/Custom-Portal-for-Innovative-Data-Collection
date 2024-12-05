<?php
// Database connection
$servername = "localhost"; // Change if necessary
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "disinformation_analysis"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$post_link = $_POST['post_link'];
$post_date = $_POST['post_date'];
$platform = $_POST['platform'];
$post_type = $_POST['post_type'];
$strategy_target_audience = $_POST['strategy_target_audience'];
$strategy_target_ends = $_POST['strategy_target_ends'];
$objectives = $_POST['objectives'];
$target_audience = $_POST['target_audience'];
$narrative = $_POST['narrative'];
$content = $_POST['content'];
$social_assets = $_POST['social_assets'];
$legitimacy = $_POST['legitimacy'];
$microtarget = $_POST['microtarget'];
$channels = $_POST['channels'];
$pump_priming = $_POST['pump_priming'];
$content_delivery = $_POST['content_delivery'];
$exposure_maximization = $_POST['exposure_maximization'];
$online_harms = $_POST['online_harms'];
$offline_activity = $_POST['offline_activity'];
$persist_information = $_POST['persist_information'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO analysis_data (post_link, post_date, platform, post_type, strategy_target_audience, strategy_target_ends, objectives, target_audience, narrative, content, social_assets, legitimacy, microtarget, channels, pump_priming, content_delivery, exposure_maximization, online_harms, offline_activity, persist_information) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssssssssssss", $post_link, $post_date, $platform, $post_type, $strategy_target_audience, $strategy_target_ends, $objectives, $target_audience, $narrative, $content, $social_assets, $legitimacy, $microtarget, $channels, $pump_priming, $content_delivery, $exposure_maximization, $online_harms, $offline_activity, $persist_information);

// Execute the query
if ($stmt->execute()) {
    echo "Data submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
