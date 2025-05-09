<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title ?? 'Admin Dashboard', ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/BigProjects/Fullstack3Month/assets/css/style.css">
    <link rel="stylesheet" href="/BigProjects/Fullstack3Month/assets/css/dashboard.css">
    <link rel="stylesheet" href="/BigProjects/Fullstack3Month/assets/css/admin.css">
</head>
<body>
<?php include __DIR__ . '/../partials/navbar.php'; ?>

<div class="dashboard-container">
    <aside class="sidebar">
        <div class="user-info">
            <div class="user-avatar">
                <div class="default-avatar admin-avatar">
                    <i class="fas fa-user-shield"></i>
                </div>
            </div>
            <h3>Administrator</h3>
            <p class="admin-role">System Administrator</p>
        </div>

        <nav class="dashboard-nav">
            <ul>
                <li class="active"><a href="/BigProjects/Fullstack3Month/admin/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="/BigProjects/Fullstack3Month/admin/users"><i class="fas fa-users"></i> Manage Users</a></li>
                <li><a href="/BigProjects/Fullstack3Month/admin/albums"><i class="fas fa-images"></i> All Albums</a></li>
                <li><a href="/BigProjects/Fullstack3Month/admin/photos"><i class="fas fa-camera"></i> All Photos</a></li>
                <li><a href="/BigProjects/Fullstack3Month/admin/reports"><i class="fas fa-flag"></i> Reports</a></li>
                <li><a href="/BigProjects/Fullstack3Month/admin/settings"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>
        </nav>
    </aside>

    <main class="main-content">
        <div class="dashboard-header">
            <h1>Admin Dashboard</h1>
            <div class="actions">
                <a href="/BigProjects/Fullstack3Month/admin/users/new" class="btn"><i class="fas fa-plus"></i> Add User</a>
                <a href="/BigProjects/Fullstack3Month/admin/settings" class="btn btn-primary"><i class="fas fa-cog"></i> System Settings</a>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-details">
                    <h3>Total Users</h3>
                    <p class="stat-number"><?php echo htmlspecialchars($totalUsers ?? '0', ENT_QUOTES, 'UTF-8'); ?></p>
                    <p class="stat-label">Registered users</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-images"></i>
                </div>
                <div class="stat-details">
                    <h3>Total Albums</h3>
                    <p class="stat-number"><?php echo htmlspecialchars($totalAlbums ?? '0', ENT_QUOTES, 'UTF-8'); ?></p>
                    <p class="stat-label">Created albums</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-camera"></i>
                </div>
                <div class="stat-details">
                    <h3>Total Photos</h3>
                    <p class="stat-number"><?php echo htmlspecialchars($totalPhotos ?? '0', ENT_QUOTES, 'UTF-8'); ?></p>
                    <p class="stat-label">Uploaded photos</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-upload"></i>
                </div>
                <div class="stat-details">
                    <h3>Disk Usage</h3>
                    <p class="stat-number"><?php echo htmlspecialchars($diskUsage ?? '0 MB', ENT_QUOTES, 'UTF-8'); ?></p>
                    <p class="stat-label">Total storage used</p>
                </div>
            </div>
        </div>

        <section class="dashboard-section">
            <div class="section-header">
                <h2>Recent Users</h2>
                <a href="/BigProjects/Fullstack3Month/admin/users" class="view-all">View all</a>
            </div>
            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Registration Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($recentUsers)): ?>
                        <?php foreach ($recentUsers as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($user->registrationDate, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <?php if ($user->isActive): ?>
                                        <span class="status-badge active">Active</span>
                                    <?php else: ?>
                                        <span class="status-badge inactive">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td class="actions-cell">
                                    <a href="/BigProjects/Fullstack3Month/admin/users/<?php echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?>" class="btn-icon" title="View"><i class="fas fa-eye"></i></a>
                                    <a href="/BigProjects/Fullstack3Month/admin/users/<?php echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?>/edit" class="btn-icon" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn-icon delete-btn" data-id="<?php echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?>" title="Delete"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No users found</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="dashboard-section">
            <div class="section-header">
                <h2>System Activity</h2>
                <a href="/BigProjects/Fullstack3Month/admin/logs" class="view-all">View all</a>
            </div>
            <div class="activity-log">
                <?php if (!empty($recentActivity)): ?>
                    <?php foreach ($recentActivity as $activity): ?>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <?php if ($activity->type === 'user_login'): ?>
                                    <i class="fas fa-sign-in-alt"></i>
                                <?php elseif ($activity->type === 'user_register'): ?>
                                    <i class="fas fa-user-plus"></i>
                                <?php elseif ($activity->type === 'album_create'): ?>
                                    <i class="fas fa-folder-plus"></i>
                                <?php elseif ($activity->type === 'photo_upload'): ?>
                                    <i class="fas fa-upload"></i>
                                <?php else: ?>
                                    <i class="fas fa-info-circle"></i>
                                <?php endif; ?>
                            </div>
                            <div class="activity-content">
                                <p class="activity-text"><?php echo htmlspecialchars($activity->message, ENT_QUOTES, 'UTF-8'); ?></p>
                                <p class="activity-time"><?php echo htmlspecialchars($activity->timestamp, ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="activity-item">
                        <p class="text-center">No recent activity</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>

<script>
    // Confirmation dialog for user deletion
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const userId = this.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
                window.location.href = `/BigProjects/Fullstack3Month/admin/users/${userId}/delete`;
            }
        });
    });
</script>
</body>
</html>