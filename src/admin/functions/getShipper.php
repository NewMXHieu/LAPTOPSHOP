<?php
    // Include your database connection file
    include 'databaseAccess.php';
    $conn = connectToDatabase();


    // Write your query to fetch shippers from the database
    $query = "SELECT * FROM shipper";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Fetch all shippers as an associative array
    $shippers = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Convert the shippers array to JSON and print it
    echo json_encode($shippers);

?>