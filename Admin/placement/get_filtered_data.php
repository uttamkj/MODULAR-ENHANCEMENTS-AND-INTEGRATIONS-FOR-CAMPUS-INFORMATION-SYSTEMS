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
    
    if (!empty($filters['branch'])) {
        $branchList = implode("','", array_map([$conn, 'real_escape_string'], $filters['branch']));
        $where[] = "branch IN ('$branchList')";
    }
    
    if (!empty($filters['yearOfPassing'])) {
        $yearList = implode("','", array_map([$conn, 'real_escape_string'], $filters['yearOfPassing']));
        $where[] = "passing_year IN ('$yearList')";
    }
    
    if (!empty($filters['placed']) && in_array($filters['placed'], ['Y', 'N'])) {
        $placed = $conn->real_escape_string($filters['placed']);
        if ($placed == 'Y') {
            $where[] = "(company IS NOT NULL AND company != '')";
        } else {
            $where[] = "(company IS NULL OR company = '')";
        }
    }
    
    if (!empty($filters['company'])) {
        $companyList = implode("','", array_map([$conn, 'real_escape_string'], $filters['company']));
        $where[] = "company IN ('$companyList')";
    }
    
    if (!empty($filters['package'])) {
        $packageList = implode("','", array_map([$conn, 'real_escape_string'], $filters['package']));
        $where[] = "package IN ('$packageList')";
    }
    
    if (!empty($filters['jobDomain'])) {
        $jobDomainList = implode("','", array_map([$conn, 'real_escape_string'], $filters['jobDomain']));
        $where[] = "job_domain IN ('$jobDomainList')";
    }
    
    if (!empty($filters['batchYear'])) {
        $batchYearList = implode("','", array_map([$conn, 'real_escape_string'], $filters['batchYear']));
        $where[] = "batch_year IN ('$batchYearList')";
    }
    
    // Construct the final query
    $sql = "SELECT 
                id,
                sic_number as sic_no,
                student_name as name, 
                branch,
                course,
                CASE WHEN company IS NOT NULL AND company != '' THEN 'Y' ELSE 'N' END AS placed,
                company,
                package,
                job_domain,
                batch_year,
                passing_year as year_of_passing,
                registration_number
            FROM placement_records";
    
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
    
    // Always return data as an array, even if empty
    echo json_encode(['data' => $data]);
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage(), 'data' => []]);
}

$conn->close();
?>