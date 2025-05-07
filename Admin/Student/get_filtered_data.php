<?php
require_once 'config.php';

try {
    $filters = json_decode($_POST['filters'], true);
    
    $where = [];
    
    // Build WHERE clause based on selected filters
    if (!empty($filters['course'])) {
        $courseList = implode("','", array_map([$conn, 'real_escape_string'], $filters['course']));
        $where[] = "course IN ('$courseList')";
    }
    
    if (!empty($filters['original_branch'])) {
        $originalBranchList = implode("','", array_map([$conn, 'real_escape_string'], $filters['original_branch']));
        $where[] = "original_branch IN ('$originalBranchList')";
    }
    
    if (!empty($filters['branch_change'])) {
        $branchChangeList = implode("','", array_map([$conn, 'real_escape_string'], $filters['branch_change']));
        $where[] = "branch_change IN ('$branchChangeList')";
    }
    
    if (!empty($filters['branch'])) {
        $branchList = implode("','", array_map([$conn, 'real_escape_string'], $filters['branch']));
        $where[] = "branch IN ('$branchList')";
    }
    
    if (!empty($filters['gender'])) {
        $genderList = implode("','", array_map([$conn, 'real_escape_string'], $filters['gender']));
        $where[] = "gender IN ('$genderList')";
    }
    
    if (!empty($filters['lateral'])) {
        $lateralList = implode("','", array_map([$conn, 'real_escape_string'], $filters['lateral']));
        $where[] = "lateral IN ('$lateralList')";
    }
    
    if (!empty($filters['moa'])) {
        $moaList = implode("','", array_map([$conn, 'real_escape_string'], $filters['moa']));
        $where[] = "moa IN ('$moaList')";
    }
    
    if (!empty($filters['district'])) {
        $districtList = implode("','", array_map([$conn, 'real_escape_string'], $filters['district']));
        $where[] = "district IN ('$districtList')";
    }
    
    if (!empty($filters['yearOfPassing'])) {
        $yearList = implode("','", array_map([$conn, 'real_escape_string'], $filters['yearOfPassing']));
        $where[] = "year_of_passing IN ('$yearList')";
    }
    
    // Construct the final query
    $sql = "SELECT 
                sl_no, 
                sic_no, 
                name, 
                course, 
                original_branch,
                branch_change,
                branch,
                gender, 
                lateral, 
                moa, 
                district,
                year_of_passing
            FROM student_silicon";
    
    if (!empty($where)) {
        $sql .= " WHERE " . implode(" AND ", $where);
    }
    
    $sql .= " ORDER BY sl_no";
    
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