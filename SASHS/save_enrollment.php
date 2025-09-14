<?php
// save_enrollment.php
include 'config/database.php'; // siguraduhin tama path mo

function saveEnrollment($conn, $data) {
    // Handle birthdate (NULL kung empty)
    $birthdate = !empty($data['birthdate']) ? $data['birthdate'] : null;

    $sql = "INSERT INTO enrollment 
        (firstname, lastname, middlename, gender, birthdate, address, grade_level, strand, guardian_name, guardian_contact) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Gumamit ng "s" kahit sa birthdate kasi string format ang pumapasok (YYYY-MM-DD)
    $stmt->bind_param(
        "ssssssssss",
        $data['firstname'],
        $data['lastname'],
        $data['middlename'],
        $data['gender'],
        $birthdate,
        $data['address'],
        $data['grade_level'],
        $data['strand'],
        $data['guardian_name'],
        $data['guardian_contact']
    );

    if ($stmt->execute()) {
        return true;
    } else {
        die("Execute failed: " . $stmt->error);
    }
}

// --- MAIN HANDLER ---
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Siguraduhin lahat ng expected fields ay nasa POST
    $data = [
        'firstname'        => $_POST['firstname'] ?? '',
        'lastname'         => $_POST['lastname'] ?? '',
        'middlename'       => $_POST['middlename'] ?? '',
        'gender'           => $_POST['gender'] ?? '',
        'birthdate'        => $_POST['birthdate'] ?? '',
        'address'          => $_POST['address'] ?? '',
        'grade_level'      => $_POST['grade_level'] ?? '',
        'strand'           => $_POST['strand'] ?? '',
        'guardian_name'    => $_POST['guardian_name'] ?? '',
        'guardian_contact' => $_POST['guardian_contact'] ?? ''
    ];

    if (saveEnrollment($conn, $data)) {
        echo "<script>alert('Enrollment submitted successfully!'); window.location='enrollment.php';</script>";
    }
}
?>
