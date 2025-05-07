<?php
require_once 'config.php';

try {
    $filters = json_decode($_POST['filters'], true);
    
    $where = [];
    
    // Build WHERE clause based on selected filters
    if (!empty($filters['scholarship_year'])) {
        $yearList = implode("','", array_map([$conn, 'real_escape_string'], $filters['scholarship_year']));
        $where[] = "scholarship_year IN ('$yearList')";
    }
    
    if (!empty($filters['course'])) {
        $courseList = implode("','", array_map([$conn, 'real_escape_string'], $filters['course']));
        $where[] = "course IN ('$courseList')";
    }
    
    if (!empty($filters['branch'])) {
        $branchList = implode("','", array_map([$conn, 'real_escape_string'], $filters['branch']));
        $where[] = "branch IN ('$branchList')";
    }
    
    if (!empty($filters['year_of_study'])) {
        $yearOfStudyList = implode("','", array_map([$conn, 'real_escape_string'], $filters['year_of_study']));
        $where[] = "year_of_study IN ('$yearOfStudyList')";
    }
    
    if (!empty($filters['department'])) {
        $departmentList = implode("','", array_map([$conn, 'real_escape_string'], $filters['department']));
        $where[] = "department IN ('$departmentList')";
    }
    
    if (!empty($filters['scholarship_type'])) {
        $typeList = implode("','", array_map([$conn, 'real_escape_string'], $filters['scholarship_type']));
        $where[] = "scholarship_type IN ('$typeList')";
    }
    
    if (!empty($filters['gender'])) {
        $genderList = implode("','", array_map([$conn, 'real_escape_string'], $filters['gender']));
        $where[] = "gender IN ('$genderList')";
    }
    
    if (!empty($filters['state'])) {
        $stateList = implode("','", array_map([$conn, 'real_escape_string'], $filters['state']));
        $where[] = "state IN ('$stateList')";
    }
    
    if (!empty($filters['payment_status'])) {
        $statusList = implode("','", array_map([$conn, 'real_escape_string'], $filters['payment_status']));
        $where[] = "payment_status IN ('$statusList')";
    }
    
    if (!empty($filters['scholarship_name'])) {
        $nameList = implode("','", array_map([$conn, 'real_escape_string'], $filters['scholarship_name']));
        $where[] = "scholarship_name IN ('$nameList')";
    }
    
    // Construct the final query
    $sql = "SELECT 
                id, 
                scholarship_year,
                application_number,
                student_name,
                sic_no,
                regd_no,
                course,
                branch,
                year_of_study,
                department,
                scholarship_type,
                gender,
                state,
                caste,
                application_type,
                date_of_application,
                payment_status,
                scholarship_name,
                sanctioned_amount
            FROM scholarships";
    
    if (!empty($where)) {
        $sql .= " WHERE " . implode(" AND ", $where);
    }
    
    $sql .= " ORDER BY id";
    
    $result = $conn->query($sql);
    
    if (!$result) {
        throw new Exception("Query failed: " . $conn->error);
    }
    
    $data = [];
    
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
    echo json_encode($data);
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$conn->close();
?>