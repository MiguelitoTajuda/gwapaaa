<?php
// Database connection settings
$servername = "localhost"; // Use "localhost" if it's running locally on the VM
$username = "your_database_username"; // Replace with your MySQL username
$password = "your_database_password"; // Replace with your MySQL password
$dbname = "mydb"; // The database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $section = $_POST['section'];

    // SQL query to insert data into the students table
    $sql = "INSERT INTO students (firstname, lastname, middlename, age, address, course, section)
            VALUES ('$firstname', '$lastname', '$middlename', '$age', '$address', '$course', '$section')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
