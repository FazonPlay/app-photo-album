<?php
/**
 * @var PDO $pdo
 */
registerCss("assets/css/dashboard.css");
registerCss("assets/css/style.css");
registerCss("assets/css/admin.css");
require "model/admin.php";
// First, check if the user is an admin
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    // Redirect to landing page or show error
    header("Location: index.php");
    exit();
}

// Get statistics for the admin dashboard
$totalUsers = getTotalUsers($pdo);
$totalAlbums = getTotalAlbums($pdo);
$totalPhotos = getTotalPhotos($pdo);
$diskUsage = getDiskUsage($pdo);

// Get recent users
$recentUsers = getRecentUsers($pdo, 5);

// Since system_activity table may not exist yet, we'll create empty array
$recentActivity = [];
require "view/admin.php";


