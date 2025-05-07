<?php
require_once 'config.php';

try {
    $options = [];
    
    // Get course options
    $sql = "SELECT DISTINCT course FROM student_silicon WHERE course IS NOT NULL ORDER BY course";
    $result = $conn->query($sql);
    $options['courses'] = [];
    while($row = $result->fetch_assoc()) {
        $options['courses'][] = $row['course'];
    }
    
    // Get original branch options
    $sql = "SELECT DISTINCT original_branch FROM student_silicon WHERE original_branch IS NOT NULL ORDER BY original_branch";
    $result = $conn->query($sql);
    $options['original_branches'] = [];
    while($row = $result->fetch_assoc()) {
        $options['original_branches'][] = $row['original_branch'];
    }
    
    // Get branch options
    $sql = "SELECT DISTINCT branch FROM student_silicon WHERE branch IS NOT NULL ORDER BY branch";
    $result = $conn->query($sql);
    $options['branches'] = [];
    while($row = $result->fetch_assoc()) {
        $options['branches'][] = $row['branch'];
    }
    
    // Get gender options
    $sql = "SELECT DISTINCT gender FROM student_silicon WHERE gender IS NOT NULL ORDER BY gender";
    $result = $conn->query($sql);
    $options['genders'] = [];
    while($row = $result->fetch_assoc()) {
        $options['genders'][] = $row['gender'];
    }
    
    // Get MOA options
    $sql = "SELECT DISTINCT moa FROM student_silicon WHERE moa IS NOT NULL ORDER BY moa";
    $result = $conn->query($sql);
    $options['moa'] = [];
    while($row = $result->fetch_assoc()) {
        $options['moa'][] = $row['moa'];
    }
    
    // Get district options
    $sql = "SELECT DISTINCT district FROM student_silicon WHERE district IS NOT NULL ORDER BY district";
    $result = $conn->query($sql);
    $options['districts'] = [];
    while($row = $result->fetch_assoc()) {
        $options['districts'][] = $row['district'];
    }
    
    // Get year of passing options
    $sql = "SELECT DISTINCT year_of_passing FROM student_silicon WHERE year_of_passing IS NOT NULL ORDER BY year_of_passing";
    $result = $conn->query($sql);
    $options['yearsOfPassing'] = [];
    while($row = $result->fetch_assoc()) {
        $options['yearsOfPassing'][] = $row['year_of_passing'];
    }
    
    echo json_encode($options);
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$conn->close();
?>