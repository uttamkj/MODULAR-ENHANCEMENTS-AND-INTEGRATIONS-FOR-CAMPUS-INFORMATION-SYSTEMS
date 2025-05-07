<?php
require_once 'config.php';

try {
    $options = [];
    
    // Get course options
    $sql = "SELECT DISTINCT course FROM placement_records WHERE course IS NOT NULL ORDER BY course";
    $result = $conn->query($sql);
    if (!$result) {
        throw new Exception("Error fetching course options: " . $conn->error);
    }
    $options['courses'] = [];
    while($row = $result->fetch_assoc()) {
        $options['courses'][] = $row['course'];
    }
    
    // Get branch options
    $sql = "SELECT DISTINCT branch FROM placement_records WHERE branch IS NOT NULL ORDER BY branch";
    $result = $conn->query($sql);
    if (!$result) {
        throw new Exception("Error fetching branch options: " . $conn->error);
    }
    $options['branches'] = [];
    while($row = $result->fetch_assoc()) {
        $options['branches'][] = $row['branch'];
    }
    
    // Get batch/year of passing options
    $sql = "SELECT DISTINCT passing_year FROM placement_records WHERE passing_year IS NOT NULL ORDER BY passing_year";
    $result = $conn->query($sql);
    if (!$result) {
        throw new Exception("Error fetching year options: " . $conn->error);
    }
    $options['yearsOfPassing'] = [];
    while($row = $result->fetch_assoc()) {
        $options['yearsOfPassing'][] = $row['passing_year'];
    }
    
    // Get company options
    $sql = "SELECT DISTINCT company FROM placement_records WHERE company IS NOT NULL AND company != '' ORDER BY company";
    $result = $conn->query($sql);
    if (!$result) {
        throw new Exception("Error fetching company options: " . $conn->error);
    }
    $options['companies'] = [];
    while($row = $result->fetch_assoc()) {
        $options['companies'][] = $row['company'];
    }
    
    // Get batch year options
    $sql = "SELECT DISTINCT batch_year FROM placement_records WHERE batch_year IS NOT NULL ORDER BY batch_year";
    $result = $conn->query($sql);
    if (!$result) {
        throw new Exception("Error fetching batch year options: " . $conn->error);
    }
    $options['batchYears'] = [];
    while($row = $result->fetch_assoc()) {
        $options['batchYears'][] = $row['batch_year'];
    }

    echo json_encode($options);
} catch(Exception $e) {
    echo json_encode([
        'error' => $e->getMessage(),
        'courses' => [],
        'branches' => [],
        'yearsOfPassing' => [],
        'companies' => [],
        'batchYears' => []
    ]);
}

$conn->close();
?>