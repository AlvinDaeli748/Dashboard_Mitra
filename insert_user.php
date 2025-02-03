<?php
// Check if the correct number of arguments is provided
if ($argc != 5) {
    echo "Usage: php insert_user.php <username> <password> <name> <role>\n";
    exit(1);
}

// Get arguments from the command line
$new_user = $argv[1];    // First argument: username
$user_password = $argv[2]; // Second argument: password
$user_name = $argv[3];    // Third argument: name
$user_role = $argv[4];    // Fourth argument: role

// Hash the password securely using PHP's password_hash function
$hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

// Database connection settings
$servername = "localhost"; // Database host (usually localhost)
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "captain_db"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to insert the new user into the database (id is auto-increment)
$sql = "INSERT INTO users (username, password, name, role) VALUES ('$new_user', '$hashed_password', '$user_name', '$user_role')";

// Execute the query and check if it was successful
if ($conn->query($sql) === TRUE) {
    echo "New user '$new_user' created successfully!\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error . "\n";
}

// Close the connection to the database
$conn->close();
?>
