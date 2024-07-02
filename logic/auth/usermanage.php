<?php
require_once(__DIR__ . "/../connect.php");

// Function to fetch all admins from the database
function fetchAllAdmins($conn) {
    $sql = "SELECT * FROM admin WHERE name != 'Admin'";
    $result = $conn->query($sql);

    $admins = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $admins[] = $row;
        }
    }
    return $admins;
}

// Function to update admin data
function updateAdminData($conn, $adminId, $newName, $newEmail, $newPassword) {
    $updateSql = "UPDATE admin SET name = ?, email = ?, password = ? WHERE id = ?";
    $updateStmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($updateStmt, $updateSql)) {
        mysqli_stmt_bind_param($updateStmt, "sssi", $newName, $newEmail, $newPassword, $adminId);
        mysqli_stmt_execute($updateStmt);
        mysqli_stmt_close($updateStmt);
        header("Location: admin_view.php");
        exit();
    } else {
        // Handle prepared statement error
        die("Update statement preparation error: " . mysqli_error($conn));
    }
}

// Function to delete admin data
function deleteAdminData($conn, $adminIdToDelete) {
    $deleteSql = "DELETE FROM admin WHERE id = ?";
    $deleteStmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($deleteStmt, $deleteSql)) {
        mysqli_stmt_bind_param($deleteStmt, "i", $adminIdToDelete);
        mysqli_stmt_execute($deleteStmt);
        mysqli_stmt_close($deleteStmt);
    } else {
        // Handle prepared statement error
        die("Delete statement preparation error: " . mysqli_error($conn));
    }
}

// Handle admin updates
if (isset($_POST["updateAdmin"])) {
    $adminId = $_POST["adminId"];
    $newName = $_POST["newName"];
    $newEmail = $_POST["newEmail"];
    $newPassword = password_hash($_POST["newPassword"], PASSWORD_BCRYPT);

    updateAdminData($conn, $adminId, $newName, $newEmail, $newPassword);
}

// Handle admin deletion
if (isset($_POST["deleteAdmin"])) {
    $adminIdToDelete = $_POST["adminIdToDelete"];
    deleteAdminData($conn, $adminIdToDelete);
}

// Fetch admins
$admins = fetchAllAdmins($conn);

// Function to get admin data by ID
function getAdminById($conn, $adminId) {
    $sql = "SELECT * FROM admin WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $adminId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            return $row;
        }
    }

    return null;
}

// Fetch the admin ID from the URL
$adminId = isset($_GET['adminId']) ? $_GET['adminId'] : null;

// Fetch the admin data
$admin = getAdminById($conn, $adminId);
?>
