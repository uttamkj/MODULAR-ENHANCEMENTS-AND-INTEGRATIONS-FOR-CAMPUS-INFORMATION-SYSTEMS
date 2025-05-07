<?php
//edited by neha
include_once "navbar.php";
require_once "functions.php";
?>
<div class="w-25 mx-auto">
    <h4 class="text-center mb-4 mt-2">Update Password</h4>
    <form action="" method="post" class="form">
        <input type="password" placeholder="Enter Current Password" name="oldPass" class="form-control mb-2" required>
        <input type="password" placeholder="Enter New Password" name="newPass" class="form-control mb-2" required>
        <p id="msg" class="text-center"></p>
        <div class="d-flex justify-content-center">
            <input type="submit" value="Change" name="change" class="btn btn-primary">
        </div>
    </form>
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
require_once "footer.php";
?>