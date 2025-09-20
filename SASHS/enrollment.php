<?php
// enrollment.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enrollment Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #000;
        }
        h1, h2, h3 {
            margin: 0;
            padding: 5px 0;
        }
        .section {
            margin-bottom: 20px;
            page-break-inside: avoid;
        }
        label {
            font-weight: bold;
        }
        .field {
            margin: 5px 0;
        }
        .two-columns {
            display: flex;
            justify-content: space-between;
        }
        .two-columns > div {
            width: 48%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }

        /* PRINT STYLES */
        @media print {
            body {
                margin: 0;
            }
            button {
                display: none;
            }
            .section {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body class="bg-gray-100 p-8">
<div class="max-w-6xl mx-auto bg-white shadow-xl rounded-xl p-8 mb-8 space-y-8">
    <h1 class="text-2xl font-bold text-center mb-6">📚 Basic Education Enrollment Form</h1>
    <form method="POST" action="save_enrollment.php" class="space-y-8">

        <!-- School Year + LRN + Grade Level + Kindergarten -->
        <div class="space-y-4">
            <h2 class="text-lg font-semibold">1. 📖 School Year</h2>

            <!-- Row 1: School Year + LRN -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- School Year -->
                <div>
                    <label class="block text-sm font-medium mb-1">School Year</label>
                    <input type="text" name="school_year" placeholder="e.g. 2025-2026" class="border rounded-lg p-2 w-full">
                </div>
                <!-- LRN -->
                <div>
                    <label class="block text-sm font-medium mb-1">Learner Reference Number (LRN)</label>
                    <input type="text" name="lrn" class="border rounded-lg p-2 w-full">
                </div>
            </div>

            <!-- Row 2: Grade Level + Kindergarten -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Grade Level -->
                <div>
                    <label class="block text-sm font-medium mb-1">2. Grade Level to Enroll:</label>
                    <div class="flex flex-col space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="grade_level[]" value="Graded" class="w-4 h-4">
                            <span>Graded, specify Grade Level </span>
                            <select name="graded_level" class="border rounded-lg p-1">
                                <option value="">Select</option>
                                <option value="Grade 11">Grade 11</option>
                                <option value="Grade 12">Grade 12</option>
                            </select>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="grade_level[]" value="Non-Graded" class="w-4 h-4">
                            <span>Non-Graded (For Special Needs Education (SNEd) Only)</span>
                        </label>
                    </div>
                </div>
                <!-- Kindergarten -->
                <div>
                    <label class="block text-sm font-medium mb-1">For Kindergarten Enrollees</label>
                    <div class="flex items-start space-x-2">
                        <input type="checkbox" name="kinder_condition" class="w-4 h-4 mt-1">
                        <span class="text-sm">Does the learner have attended any Early Learning Program? If yes, please specify:</span>
                    </div>
                    <input type="text" name="kinder_program" class="border rounded-lg p-2 w-full mt-2">
                </div>
            </div>
        </div>

        <!-- Learner's Personal Info -->
        <div class="space-y-6">
            <h2 class="text-lg font-semibold"> 3. 👤 Learner’s Personal Information</h2>

            <!-- 🔹 PSA Birth Certificate Number -->
            <div>
                <label class="block mb-1">PSA Birth Certificate No. (If available upon Registration)</label>
                <input type="text" name="psa_birth_cert_no" class="border-b border-gray-400 p-2 w-full focus:outline-none" placeholder="Enter PSA Birth Certificate Number">
            </div>
        </div>

        <!-- Learner Name -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div>
                <label class="block text-sm font-medium mb-1 text-center">Last Name <span class="text-red-500">*</span></label>
                <input type="text" name="last_name" class="border rounded-lg p-2 w-full" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1 text-center">First Name <span class="text-red-500">*</span></label>
                <input type="text" name="first_name" class="border rounded-lg p-2 w-full" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1 text-center">Middle Name</label>
                <input type="text" name="middle_name" class="border rounded-lg p-2 w-full">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1 text-center">Extension (Jr., III, etc.)</label>
                <input type="text" name="extension" class="border rounded-lg p-2 w-full">
            </div>
        </div>

        <!-- Birth Info -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-medium mb-1">Birthdate <span class="text-red-500">*</span></label>
                <input type="date" name="birthdate" class="border rounded-lg p-2 w-full" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Birthplace</label>
                <input type="text" name="birthplace" class="border rounded-lg p-2 w-full">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Sex <span class="text-red-500">*</span></label>
                <select name="sex" class="border rounded-lg p-2 w-full" required>
                    <option value="">Select Sex</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
        </div>

        <!-- Other Info -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <input type="text" name="mother_tongue" placeholder="Mother Tongue" class="border rounded-lg p-2">
            <input type="text" name="religion" placeholder="Religion" class="border rounded-lg p-2">
            <input type="text" name="ethnic_group" placeholder="Ethnic Group" class="border rounded-lg p-2">
        </div>

        <div>
            <label class="block mb-1">Belonging to any Indigenous Peoples (IP) Community/Indigenous Cultural Community?</label>
            <select name="ip_community" class="border rounded-lg p-2 w-full">
                <option value="">Select</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>

        <div>
            <label class="block mb-1">4Ps Beneficiary?</label>
            <select name="four_ps" class="border rounded-lg p-2 w-full">
                <option value="">Select</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>

        <div>
            <label class="block mb-1">If Yes, please write the 4Ps Household Id Number</label>
            <input type="text" name="household_id" class="border rounded-lg p-2 w-full">
        </div>

        <!-- Address -->
        <div class="space-y-4">
            <h2 class="text-lg font-semibold"> Current Address</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <input type="text" name="street" placeholder="House No." class="border rounded-lg p-2" required>
                <input type="text" name="street" placeholder="Sitio/Street Name" class="border rounded-lg p-2" required>
                <input type="text" name="street" placeholder="Barangga." class="border rounded-lg p-2" required>
                <input type="text" name="city" placeholder="City/Municipality" class="border rounded-lg p-2" required>
                <input type="text" name="province" placeholder="Province" class="border rounded-lg p-2" required>
                <input type="text" name="country" placeholder="Country" class="border rounded-lg p-2" required>
                <input type="text" name="zipcode" placeholder="ZIP Code" class="border rounded-lg p-2" required>
            </div>
        </div>
        <div class="space-y-4">
            <h2 class="text-lg font-semibold">Permanent Address</h2>
        <!-- Row: Same with your current address? + checkbox + Yes/No -->
            <div class="flex items-center space-x-3">
                <span>Same with your current address?</span>
                <input type="checkbox" name="same_address" value="Yes" class="w-4 h-4">
                <span>Yes</span>
                <input type="checkbox" name="same_address" value="No" class="w-4 h-4">
                <span>No</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <input type="text" name="street" placeholder="House No." class="border rounded-lg p-2" required>
                <input type="text" name="street" placeholder="Sitio/Street Name" class="border rounded-lg p-2" required>
                <input type="text" name="street" placeholder="Barangga." class="border rounded-lg p-2" required>
                <input type="text" name="city" placeholder="City/Municipality" class="border rounded-lg p-2" required>
                <input type="text" name="province" placeholder="Province" class="border rounded-lg p-2" required>
                <input type="text" name="country" placeholder="Country" class="border rounded-lg p-2" required>
                <input type="text" name="zipcode" placeholder="ZIP Code" class="border rounded-lg p-2" required>
            </div>




            <!-- Parent/Guardian Info -->
            <div class="space-y-6">
                <h2 class="text-lg font-semibold"> 4. 👨‍👩‍👧 Parent/Guardian Information</h2>

                <!-- Father -->
                <div>
                    <label class="block text-sm font-medium mb-2">Father’s Information</label>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <input type="text" name="father_lastname" placeholder="Last Name" class="border rounded-lg p-2 w-full">
                        <input type="text" name="father_firstname" placeholder="First Name" class="border rounded-lg p-2 w-full">
                        <input type="text" name="father_middlename" placeholder="Middle Name" class="border rounded-lg p-2 w-full">
                        <input type="text" name="father_contact" placeholder="Contact No." class="border rounded-lg p-2 w-full">
                    </div>
                </div>

                <!-- Mother -->
                <div>
                    <label class="block text-sm font-medium mb-2">Mother’s Information</label>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <input type="text" name="mother_lastname" placeholder="Last Name" class="border rounded-lg p-2 w-full">
                        <input type="text" name="mother_firstname" placeholder="First Name" class="border rounded-lg p-2 w-full">
                        <input type="text" name="mother_middlename" placeholder="Middle Name" class="border rounded-lg p-2 w-full">
                        <input type="text" name="mother_contact" placeholder="Contact No." class="border rounded-lg p-2 w-full">
                    </div>
                </div>

                <!-- Guardian -->
                <div>
                    <label class="block text-sm font-medium mb-2">Legal Guardian’s Information</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <input type="text" name="lastname" placeholder="Last Name" class="border rounded-lg p-2 w-full">
                        <input type="text" name="firstname" placeholder="First Name" class="border rounded-lg p-2 w-full">
                        <input type="text" name="middlename" placeholder="Middle Name" class="border rounded-lg p-2 w-full">
                        <input type="text" name="mother_contact" placeholder="Contact No." class="border rounded-lg p-2 w-full">
                    </div>
                </div>
            </div>
            <!-- Special Needs Question -->
            <div class="mb-6">
                <label class="font-semibold">Is the Learner under the Special Needs Education Background?</label>
                <div class="flex items-center space-x-4 mt-2">
                    <label><input type="radio" name="special_needs" value="Yes"> Yes</label>
                    <label><input type="radio" name="special_needs" value="No"> No</label>
                </div>
                <span>If Yes, Check only 1, either from a1 or a2</span>
            </div>

            <!-- a1 Section (Always visible) -->
            <div id="special_needs_section" class="border rounded-lg p-4 bg-gray-50">
                <h3 class="font-semibold mb-3">a1. With Diagnosis from Licensed Medical Specialist:</h3>
                <div class="grid grid-cols-2 gap-2">
                    <label><input type="checkbox" name="diagnosis[]" value="ADHD"> Attention Deficit Hyperactivity Disorder</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Intellectual Disability"> Intellectual Disability</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Autism Spectrum Disorder"> Autism Spectrum Disorder</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Learning Disability"> Learning Disability</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Cerebral Palsy"> Cerebral Palsy</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Multiple Disabilities"> Multiple Disabilities</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Emotional-Behavior Disorder"> Emotional-Behavior Disorder</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Orthopedic/Physical Handicap"> Orthopedic/Physical Handicap</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Hearing Impairment"> Hearing Impairment</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Speech/Language Disorder"> Speech/Language Disorder</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Special Health Problem/Chronic Disease"> Special Health Problem/Chronic Disease</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Cancer"> Cancer</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Non-Cancer"> Non-Cancer</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Visual Impairment"> Visual Impairment</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Blind"> Blind</label>
                    <label><input type="checkbox" name="diagnosis[]" value="Low Vision"> Low Vision</label>
                </div>

                <!-- a2 Section (Always visible) -->
                <div id="manifestations_section" class="border rounded-lg p-4 bg-gray-50 mt-4">
                    <h3 class="font-semibold mb-3">a2. With Manifestations:</h3>
                    <div class="grid grid-cols-2 gap-2">
                        <label><input type="checkbox" name="manifestations[]" value="Difficulty in Applying Knowledge"> Difficulty in Applying Knowledge</label>
                        <label><input type="checkbox" name="manifestations[]" value="Difficulty in Mobility (Walking, Climbing and Grasping)"> Difficulty in Mobility (Walking, Climbing and Grasping)</label>
                        <label><input type="checkbox" name="manifestations[]" value="Difficulty in Communicating"> Difficulty in Communicating</label>
                        <label><input type="checkbox" name="manifestations[]" value="Difficulty in Performing Adaptive Skills (Self-Care)"> Difficulty in Performing Adaptive Skills (Self-Care)</label>
                        <label><input type="checkbox" name="manifestations[]" value="Difficulty in Displaying Interpersonal Behavior (Emotional and Behavioral)"> Difficulty in Displaying Interpersonal Behavior (Emotional and Behavioral)</label>
                        <label><input type="checkbox" name="manifestations[]" value="Difficulty in Remembering, Concentrating, Paying Attention and Understanding"> Difficulty in Remembering, Concentrating, Paying Attention and Understanding</label>
                        <label><input type="checkbox" name="manifestations[]" value="Difficulty in Hearing"> Difficulty in Hearing</label>
                        <label><input type="checkbox" name="manifestations[]" value="Difficulty in Seeing"> Difficulty in Seeing</label>
                    </div>
                </div>
            </div>

            <div style="text-align:center; margin-top: 20px;">
                <button onclick="window.print()">🖨️ Print Form</button>
            </div>
            
            <!-- Submit -->
        <div class="text-center">
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition"> ✅ Submit Enrollment </button>
        </div>



    </form>
</div>
</body>
</html>
