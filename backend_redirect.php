<?php
require_once('conn.php'); // Your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email or any other data passed from the public page
    $email = $_POST['email'];

    // First, try to get the current counter value from the database
    $sql = "SELECT counter FROM counter LIMIT 1"; // Assuming you have a single row for the counter
    $result = $conn->query($sql);

    if ($result === false) {
        // If there's an error with the query, return an error response
        echo json_encode(['success' => false, 'message' => 'Database error']);
        exit();
    }

    if ($result->num_rows > 0) {
        // If the counter exists, fetch the current value
        $row = $result->fetch_assoc();
        $current_count = $row['counter'];

        // Increment the counter by 1
        $new_count = $current_count + 1;

        // Update the counter in the database
        $update_sql = "UPDATE counter SET counter = ? "; // Assuming there's a single row to update
        $stmt = $conn->prepare($update_sql);
        if ($stmt === false) {
            echo json_encode(['success' => false, 'message' => 'Error preparing update statement']);
            exit();
        }
        $stmt->bind_param("i", $new_count);
        if (!$stmt->execute()) {
            echo json_encode(['success' => false, 'message' => 'Error executing update']);
            exit();
        }

        // Return success response
        echo json_encode(['success' => true]);
    } else {
        // If no counter exists, insert a new record with a value of 1
        $insert_sql = "INSERT INTO counter (counter) VALUES (1)";
        if ($conn->query($insert_sql) === false) {
            echo json_encode(['success' => false, 'message' => 'Error inserting initial counter']);
            exit();
        }

        // Return success response
        echo json_encode(['success' => true]);
    }
} else {
    // If it's not a POST request, return an error response
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
