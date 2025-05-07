<?php
require_once "../db/dbconnect.php";
function addNotice($posted_date, $author, $title, $category, $file_name)
{
    global $conn;
    try {
        $qry = "INSERT INTO notice (posted_date, author, title, category, file) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("sssss", $posted_date, $author, $title, $category, $file_name);
        $res = $stmt->execute();

        if (!$res) {
            echo $conn->error;
        }
        return $res;
    } catch (Exception $e) {
        die($e->getMessage());
    } finally {
        $stmt->close();
        $conn->close();
    }
}

function getNotices($category)
{
    global $conn;
    try {
        // $qry = "SELECT title, author, posted_date, file FROM notice WHERE category = ? ORDER BY posted_date DESC";
        $qry = "SELECT * FROM notice WHERE category = ? ORDER BY posted_date DESC";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $stmt->close();
    }
}

///////////////////////////////////////////////
function getAllNotices()
{
    global $conn;
    try {
        $qry = "SELECT * FROM notice ORDER BY id DESC";
        $stmt = $conn->prepare($qry);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $stmt->close();
    }
}


function getPaginatedNotices($limit, $offset) {
    global $conn;
    $qry = "SELECT * FROM notice ORDER BY id DESC LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param("ii", $limit, $offset);
    $stmt->execute();
    return $stmt->get_result();
}

function getTotalNotices() {
    global $conn;
    $qry = "SELECT COUNT(*) AS total FROM notice";
    $result = $conn->query($qry);
    $row = $result->fetch_assoc();
    return $row['total'];
}




?>