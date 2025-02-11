﻿    <script>
        window.onload = function() {
            const email = "";

            // Use fetch to make an AJAX call to backend_redirect.php to insert/increment counter
            fetch('https://liveagent.extensyaai.com/link/backend_redirect.php', {
                method: 'POST',
                body: new URLSearchParams({
                    'email': email
                })
            })
            .then(response => response.json())  // Parse the response as JSON
            .then(data => {
                if (data.success) {
                    console.log('Counter updated successfully!');
                } else {
                    console.error('Failed to update counter.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        };
    </script>

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
