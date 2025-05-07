<?php
require_once 'dbconnect.php';

// Function to get all students
function getAllStudents() {
    global $conn;
    $sql = "SELECT * FROM student_silicon ORDER BY name ASC";
    $result = $conn->query($sql);
    
    $students = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }
    return $students;
}

// Function to search students by SIC or Name
function searchStudents($searchTerm) {
    global $conn;
    $searchTerm = $conn->real_escape_string($searchTerm);
    $sql = "SELECT * FROM student_silicon WHERE sic_no LIKE '%$searchTerm%' OR name LIKE '%$searchTerm%' ORDER BY name ASC";
    $result = $conn->query($sql);
    
    $students = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }
    return $students;
}

// Function to get a student by ID
function getStudentById($id) {
    global $conn;
    $id = $conn->real_escape_string($id);
    $sql = "SELECT * FROM student_silicon WHERE sl_no = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

// Function to update student data
function updateStudent($data) {
    global $conn;
    
    $sl_no = $conn->real_escape_string($data['sl_no']);
    $sic_no = $conn->real_escape_string($data['sic_no']);
    $university_regd_no = $conn->real_escape_string($data['university_regd_no']);
    $name = $conn->real_escape_string($data['name']);
    $course = $conn->real_escape_string($data['course']);
    $original_branch = $conn->real_escape_string($data['original_branch']);
    $branch_change = $conn->real_escape_string($data['branch_change']);
    $branch = $conn->real_escape_string($data['branch']);
    $gender = $conn->real_escape_string($data['gender']);
    $lateral = $conn->real_escape_string($data['lateral']);
    $roll_no = $conn->real_escape_string($data['roll_no']);
    $caste = $conn->real_escape_string($data['caste']);
    $religion = $conn->real_escape_string($data['religion']);
    $nationality = $conn->real_escape_string($data['nationality']);
    $category = $conn->real_escape_string($data['category']);
    $moa = $conn->real_escape_string($data['moa']);
    $rank = $conn->real_escape_string($data['rank']);
    $date_of_birth = $conn->real_escape_string($data['date_of_birth']);
    $date_of_admission = $conn->real_escape_string($data['date_of_admission']);
    $district = $conn->real_escape_string($data['district']);
    $state = $conn->real_escape_string($data['state']);
    $is_or_discontinued = $conn->real_escape_string($data['is_or_discontinued']);
    $cgpa = $conn->real_escape_string($data['cgpa']);
    $year_of_passing = $conn->real_escape_string($data['year_of_passing']);
    $company = $conn->real_escape_string($data['company']);
    
    $sql = "UPDATE student_silicon SET 
            sic_no = '$sic_no',
            university_regd_no = '$university_regd_no',
            name = '$name',
            course = '$course',
            original_branch = '$original_branch',
            branch_change = '$branch_change',
            branch = '$branch',
            gender = '$gender',
            lateral = '$lateral',
            roll_no = '$roll_no',
            caste = '$caste',
            religion = '$religion',
            nationality = '$nationality',
            category = '$category',
            moa = '$moa',
            rank = '$rank',
            date_of_birth = '$date_of_birth',
            date_of_admission = '$date_of_admission',
            district = '$district',
            state = '$state',
            is_or_discontinued = '$is_or_discontinued',
            cgpa = '$cgpa',
            year_of_passing = '$year_of_passing',
            company = '$company'
            WHERE sl_no = '$sl_no'";
    
    if ($conn->query($sql) === TRUE) {
        return true;
    }
    return false;
}

// Function to delete a student
function deleteStudent($id) {
    global $conn;
    $id = $conn->real_escape_string($id);
    $sql = "DELETE FROM student_silicon WHERE sl_no = '$id'";
    
    if ($conn->query($sql) === TRUE) {
        return true;
    }
    return false;
}
?>