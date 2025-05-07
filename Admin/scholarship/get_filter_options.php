<?php
require_once 'config.php';

try {
    $options = [];
    
    // Get scholarship year options
    $sql = "SELECT DISTINCT scholarship_year FROM scholarships WHERE scholarship_year IS NOT NULL ORDER BY scholarship_year";
    $result = $conn->query($sql);
    $options['scholarship_year'] = []; // Changed from scholarship_years to scholarship_year
    while($row = $result->fetch_assoc()) {
        $options['scholarship_year'][] = $row['scholarship_year'];
    }
    
    // Get course options
    $sql = "SELECT DISTINCT course FROM scholarships WHERE course IS NOT NULL ORDER BY course";
    $result = $conn->query($sql);
    $options['course'] = []; // Changed from courses to course
    while($row = $result->fetch_assoc()) {
        $options['course'][] = $row['course'];
    }
    
    // Get branch options
    $sql = "SELECT DISTINCT branch FROM scholarships WHERE branch IS NOT NULL ORDER BY branch";
    $result = $conn->query($sql);
    $options['branch'] = []; // Changed from branches to branch
    while($row = $result->fetch_assoc()) {
        $options['branch'][] = $row['branch'];
    }
    
    // Get year_of_study options
    $sql = "SELECT DISTINCT year_of_study FROM scholarships WHERE year_of_study IS NOT NULL ORDER BY year_of_study";
    $result = $conn->query($sql);
    $options['year_of_study'] = []; // Changed from years_of_study to year_of_study
    while($row = $result->fetch_assoc()) {
        $options['year_of_study'][] = $row['year_of_study'];
    }
    
    // Get department options
    $sql = "SELECT DISTINCT department FROM scholarships WHERE department IS NOT NULL ORDER BY department";
    $result = $conn->query($sql);
    $options['department'] = []; // Changed from departments to department
    while($row = $result->fetch_assoc()) {
        $options['department'][] = $row['department'];
    }
    
    // Get scholarship type options
    $sql = "SELECT DISTINCT scholarship_type FROM scholarships WHERE scholarship_type IS NOT NULL ORDER BY scholarship_type";
    $result = $conn->query($sql);
    $options['scholarship_type'] = []; // Changed from scholarship_types to scholarship_type
    while($row = $result->fetch_assoc()) {
        $options['scholarship_type'][] = $row['scholarship_type'];
    }
    
    // Get gender options
    $sql = "SELECT DISTINCT gender FROM scholarships WHERE gender IS NOT NULL ORDER BY gender";
    $result = $conn->query($sql);
    $options['gender'] = []; // Changed from genders to gender
    while($row = $result->fetch_assoc()) {
        $options['gender'][] = $row['gender'];
    }
    
    // Get state options
    $sql = "SELECT DISTINCT state FROM scholarships WHERE state IS NOT NULL ORDER BY state";
    $result = $conn->query($sql);
    $options['state'] = []; // Changed from states to state
    while($row = $result->fetch_assoc()) {
        $options['state'][] = $row['state'];
    }
    
    // Get payment status options
    $sql = "SELECT DISTINCT payment_status FROM scholarships WHERE payment_status IS NOT NULL ORDER BY payment_status";
    $result = $conn->query($sql);
    $options['payment_status'] = []; // Changed from payment_statuses to payment_status
    while($row = $result->fetch_assoc()) {
        $options['payment_status'][] = $row['payment_status'];
    }
    
    // Get scholarship name options
    $sql = "SELECT DISTINCT scholarship_name FROM scholarships WHERE scholarship_name IS NOT NULL ORDER BY scholarship_name";
    $result = $conn->query($sql);
    $options['scholarship_name'] = []; // Changed from scholarship_names to scholarship_name
    while($row = $result->fetch_assoc()) {
        $options['scholarship_name'][] = $row['scholarship_name'];
    }
    
    echo json_encode($options);
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$conn->close();
?>