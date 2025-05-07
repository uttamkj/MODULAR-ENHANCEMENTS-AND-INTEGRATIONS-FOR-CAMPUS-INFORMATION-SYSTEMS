<?php

// edited by neha
require_once "db/dbconnect.php";

function logIn($sic, $password)
{
    global $conn;
    try {
        $qry = "SELECT * FROM login_data WHERE sic=? AND password=?";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("ss", $sic, $password);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    } finally {
        $stmt->close();
    }
}

function getUser($sic)
{
    global $conn;

    $qry = "SELECT role FROM login_data WHERE sic = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param("s", $sic);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        return $res->fetch_assoc();
    }

    return null; // User not found
}

function updatePassword($sic, $newPass)
{
    global $conn;

    // Ensure user exists before updating
    if (!getUser($sic)) {
        return false;
    }

    $qry = "UPDATE login_data SET password=? WHERE sic=?";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param("ss", $newPass, $sic);

    try {
        $stmt->execute();
        return $stmt->affected_rows > 0;
    } catch (Exception $e) {
        return false;
    } finally {
        $stmt->close();
    }
}

?>