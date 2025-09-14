<?php
// enrollment.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enrollment Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
<div class="max-w-6xl mx-auto bg-white shadow-xl rounded-xl p-8 mb-8">
    <h1 class="text-2xl font-bold text-center mb-6">📚 Basic Education Enrollment Form</h1>
    <form method="POST" action="save_enrollment.php" class="space-y-6">

        <!-- School Year & Grade -->
        <div>
            <h2 class="text-lg font-semibold mb-2">📖 School Year & Grade Level</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="school_year" placeholder="School Year (e.g. 2025-2026)" class="border rounded-lg p-2 w-full">
                <select name="grade_level" class="border rounded-lg p-2 w-full">
                    <option value="">Select Grade Level</option>
                    <option>Grade 7</option><option>Grade 8</option>
                    <option>Grade 9</option><option>Grade 10</option>
                    <option>Grade 11</option><option>Grade 12</option>
                </select>
            </div>
        </div>

        <!-- Learner Info -->
        <div>
            <h2 class="text-lg font-semibold mb-2">👤 Learner’s Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <input type="text" name="last_name" placeholder="Last Name" class="border rounded-lg p-2">
                <input type="text" name="first_name" placeholder="First Name" class="border rounded-lg p-2">
                <input type="text" name="middle_name" placeholder="Middle Name" class="border rounded-lg p-2">
                <input type="text" name="extension" placeholder="Extension (Jr., III, etc.)" class="border rounded-lg p-2">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                <input type="date" name="birthdate" class="border rounded-lg p-2">
                <input type="text" name="birthplace" placeholder="Birthplace" class="border rounded-lg p-2">
                <select name="sex" class="border rounded-lg p-2">
                    <option value="">Select Sex</option>
                    <option>Male</option><option>Female</option>
                </select>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                <input type="text" name="mother_tongue" placeholder="Mother Tongue" class="border rounded-lg p-2">
                <input type="text" name="religion" placeholder="Religion" class="border rounded-lg p-2">
                <input type="text" name="ethnic_group" placeholder="Ethnic Group" class="border rounded-lg p-2">
            </div>
            <div class="mt-4">
                <label class="block">4Ps Beneficiary?</label>
                <select name="four_ps" class="border rounded-lg p-2 w-full">
                    <option value="">Select</option>
                    <option>Yes</option><option>No</option>
                </select>
            </div>
        </div>

        <!-- Address -->
        <div>
            <h2 class="text-lg font-semibold mb-2">🏠 Address</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="street" placeholder="House No./Street/Barangay" class="border rounded-lg p-2">
                <input type="text" name="city" placeholder="City/Municipality" class="border rounded-lg p-2">
                <input type="text" name="province" placeholder="Province" class="border rounded-lg p-2">
                <input type="text" name="country" placeholder="Country" class="border rounded-lg p-2">
                <input type="text" name="zipcode" placeholder="ZIP Code" class="border rounded-lg p-2">
            </div>
        </div>

        <!-- Parent/Guardian -->
        <div>
            <h2 class="text-lg font-semibold mb-2">👨‍👩‍👧 Parent/Guardian Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="father_name" placeholder="Father’s Name" class="border rounded-lg p-2">
                <input type="text" name="father_contact" placeholder="Father’s Contact No." class="border rounded-lg p-2">
                <input type="text" name="mother_name" placeholder="Mother’s Name" class="border rounded-lg p-2">
                <input type="text" name="mother_contact" placeholder="Mother’s Contact No." class="border rounded-lg p-2">
                <input type="text" name="guardian_name" placeholder="Guardian’s Name" class="border rounded-lg p-2">
                <input type="text" name="guardian_contact" placeholder="Guardian’s Contact No." class="border rounded-lg p-2">
            </div>
        </div>

        <!-- Previous School -->
        <div>
            <h2 class="text-lg font-semibold mb-2">🏫 Previous School Attended</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="prev_school_name" placeholder="School Name" class="border rounded-lg p-2">
                <input type="text" name="prev_school_id" placeholder="School ID" class="border rounded-lg p-2">
                <input type="text" name="prev_school_address" placeholder="School Address" class="border rounded-lg p-2">
                <input type="text" name="last_grade_level" placeholder="Last Grade Level Completed" class="border rounded-lg p-2">
                <input type="text" name="last_sy" placeholder="Last School Year Attended" class="border rounded-lg p-2">
            </div>
        </div>

        <!-- SHS Strand (optional) -->
        <div>
            <h2 class="text-lg font-semibold mb-2">🎓 SHS Track/Strand (if applicable)</h2>
            <select name="strand" class="border rounded-lg p-2 w-full">
                <option value="">Select Strand</option>
                <option>Academic - STEM</option>
                <option>Academic - ABM</option>
                <option>Academic - HUMSS</option>
                <option>Academic - GAS</option>
                <option>TVL</option>
                <option>Sports</option>
                <option>Arts & Design</option>
            </select>
        </div>

        <!-- Submit -->
        <div class="text-center">
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">
                ✅ Submit Enrollment
            </button>
        </div>

    </form>
</div>
</body>
</html>
