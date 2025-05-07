<?php
//edited by neha
include_once "../includes/navbar.php";
require_once "../functions.php";
?>
<style>
    .form-section {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .form-card {
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        border-radius: 15px;
        overflow: hidden;
    }
    .form-image {
        background-image: url('https://plus.unsplash.com/premium_photo-1681487746049-c39357159f69?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cGFzc3dvcmR8ZW58MHx8MHx8fDA%3D'); /* Replace with your own image if needed */
        background-size: cover;
        background-position: center;
    }
</style>

<div class="container form-section">
    <div class="row w-75 form-card">
        <div class="col-md-6 form-image d-none d-md-block">
            <!-- Side image -->
        </div>
        <div class="col-md-6 bg-white p-4">
            <h4 class="text-center mb-4 mt-2">Update Password</h4>
            <form action="" method="post" class="form">
                <input type="password" placeholder="Enter Current Password" name="oldPass" class="form-control mb-3" required>
                <input type="password" placeholder="Enter New Password" name="newPass" class="form-control mb-3" required>
                <p id="msg" class="text-center mb-3"></p>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Change" name="change" class="btn btn-primary px-4">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['change'])) {
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $sic = $_SESSION['sic'];  // Make sure session is started

    // Get the correct res$result for the user
    $result = getUser($sic);
    if (!$result) {
        echo "<script>document.querySelector('#msg').innerHTML = 'User not found'; document.querySelector('#msg').style.color = 'red';</script>";
        exit;
    }

    // Fetch current password from the correct res$result
    $qry = "SELECT password FROM login_data WHERE sic=?";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param("s", $sic);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $dbPass = $user['password'];

    // Password validation
    if ($oldPass === $newPass) {
        echo "<script>document.querySelector('#msg').innerHTML = 'Password must not be the same'; document.querySelector('#msg').style.color = 'red';</script>";
    } elseif ($dbPass !== $oldPass) {
        echo "<script>document.querySelector('#msg').innerHTML = 'Current password is wrong'; document.querySelector('#msg').style.color = 'red';</script>";
    } else {
        $res = updatePassword($sic, $newPass);
        if ($res === true) {
            echo "<script>document.querySelector('#msg').innerHTML = 'Password changed successfully'; document.querySelector('#msg').style.color = 'green';</script>";
        } else {
            echo "<script>document.querySelector('#msg').innerHTML = 'Error updating password'; document.querySelector('#msg').style.color = 'red';</script>";
        }
    }
}
?>

<?php
require_once "../includes/footer2.php";
?>
