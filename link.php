<?php
require_once('conn.php');

// Retrieve the current counter value
$sql = "SELECT counter FROM counter "; // Assuming you have only one entry
$result = $conn->query($sql);

if ($result === false) {
    die("Error in query: " . $conn->error);  // This will print the error if query fails
}

if ($result->num_rows > 0) {
    // Update the counter
    $row = $result->fetch_assoc();
    $current_count = $row['counter'];
    
    // Increment the counter by 1
    $new_count = $current_count + 1;

    // Update the counter in the database
    $update_sql = "UPDATE counter SET counter = ? ";
    $stmt = $conn->prepare($update_sql);
    if ($stmt === false) {
        die("Error preparing update statement: " . $conn->error); // Error in preparing statement
    }
    $stmt->bind_param("i", $new_count);
    if (!$stmt->execute()) {
        die("Error executing update: " . $stmt->error); // Error in execution
    }
    
    // Success in updating the counter
} else {
    // If no row exists, insert the counter value
    $insert_sql = "INSERT INTO counter (counter) VALUES (1)";
    if ($conn->query($insert_sql) === false) {
        die("Error inserting initial counter: " . $conn->error); // Error during insertion
    }
    $new_count = 1;  // First page load, set the counter to 1
}
?>

<!-- Then your HTML -->
<div style="max-width: 55%;margin-left:22.5%;margin-top:40px; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); text-align: center;">
    <h2 style="color: #dc3545; margin-bottom: 15px;">Security Awareness Notice</h2>
    <p style="font-size: 16px; line-height: 1.6;">
        You have clicked on a simulated phishing link as part of our ongoing security awareness program. This action could have exposed the company to a security breach, highlighting the importance of vigilance when handling emails containing links or attachments.
    </p>
    <p style="font-size: 16px; line-height: 1.6;">
        This simulation is designed to assess and enhance our collective ability to recognize and respond to phishing threats. Cyberattacks often begin with a single click, making awareness and caution critical in safeguarding our organization’s data and systems.
    </p>
    <p style="font-size: 16px; line-height: 1.6;"><b>Key Security Practices:</b></p>

    <ul style="text-align: left; font-size: 16px; line-height: 1.6; padding-left: 20px;">
        <li><strong>Verify Before You Click</strong> – Always check links and sender details before taking action.</li>
        <li><strong>Be Cautious with Unexpected Emails</strong> – Phishing emails often create urgency or contain unfamiliar attachments.</li>
        <li><strong>Look for Red Flags</strong> – Spelling errors, unexpected requests, or suspicious domains can indicate a phishing attempt.</li>
        <li><strong>Report Suspicious Emails</strong> – If you receive a questionable email, report it to the IT Security Team immediately.</li>
    </ul>
    <p style="font-size: 16px; line-height: 1.6;">
        Your role in maintaining our organization’s cybersecurity is vital. By staying alert and exercising caution, you contribute to a safer and more secure work environment.
    </p>
    <p style="font-size: 16px;">
        If you have any questions or need further guidance, please reach out to the Security Team or your direct manager.
    </p>
    <p style="font-size: 16px; color: #007bff;">
        <strong><?php echo htmlspecialchars($email); ?></strong>
    </p>

    <!-- Confirm button -->
    <div style="margin-top: 20px;">
    <button id="hiddenButton" style="display: none;" 
        onclick="window.location.href='/oms/phishing_awareness.php?email=<?php echo urlencode($email); ?>'">
        Confirm
    </button>
    </div>
</div>
