<?php
include 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Convert checkbox/multi-select fields to comma-separated strings
    $grade_level = isset($_POST['grade_level']) ? implode(", ", $_POST['grade_level']) : '';
    $diagnosis = isset($_POST['diagnosis']) ? implode(", ", $_POST['diagnosis']) : '';
    $manifestations = isset($_POST['manifestations']) ? implode(", ", $_POST['manifestations']) : '';

    // Prepare SQL (49 columns -> 49 placeholders)
    $sql = "INSERT INTO enrollment (
        school_year, lrn, grade_level, graded_level, kinder_condition, kinder_program, psa_birth_cert_no,
        last_name, first_name, middle_name, extension, birthdate, birthplace, sex,
        mother_tongue, religion, ethnic_group, ip_community, four_ps, household_id,
        cur_house_no, cur_street, cur_barangay, cur_city, cur_province, cur_country, cur_zipcode,
        perm_house_no, perm_street, perm_barangay, perm_city, perm_province, perm_country, perm_zipcode,
        father_lastname, father_firstname, father_middlename, father_contact,
        mother_lastname, mother_firstname, mother_middlename, mother_contact,
        guardian_lastname, guardian_firstname, guardian_middlename, guardian_contact,
        special_needs, diagnosis, manifestations
    ) VALUES (".str_repeat("?,", 48)."?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) die("SQL Error: " . $conn->error);

    // Bind 49 parameters (all strings)
    $stmt->bind_param(
        str_repeat("s", 49),
        $_POST['school_year'], $_POST['lrn'], $grade_level, $_POST['graded_level'], $_POST['kinder_condition'], $_POST['kinder_program'], $_POST['psa_birth_cert_no'],
        $_POST['last_name'], $_POST['first_name'], $_POST['middle_name'], $_POST['extension'], $_POST['birthdate'], $_POST['birthplace'], $_POST['sex'],
        $_POST['mother_tongue'], $_POST['religion'], $_POST['ethnic_group'], $_POST['ip_community'], $_POST['four_ps'], $_POST['household_id'],
        $_POST['cur_house_no'], $_POST['cur_street'], $_POST['cur_barangay'], $_POST['cur_city'], $_POST['cur_province'], $_POST['cur_country'], $_POST['cur_zipcode'],
        $_POST['perm_house_no'], $_POST['perm_street'], $_POST['perm_barangay'], $_POST['perm_city'], $_POST['perm_province'], $_POST['perm_country'], $_POST['perm_zipcode'],
        $_POST['father_lastname'], $_POST['father_firstname'], $_POST['father_middlename'], $_POST['father_contact'],
        $_POST['mother_lastname'], $_POST['mother_firstname'], $_POST['mother_middlename'], $_POST['mother_contact'],
        $_POST['guardian_lastname'], $_POST['guardian_firstname'], $_POST['guardian_middlename'], $_POST['guardian_contact'],
        $_POST['special_needs'], $diagnosis, $manifestations
    );

    if ($stmt->execute()) {
        echo "✅ Enrollment saved successfully!";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
