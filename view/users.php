<?php
/**
 * @var array $persons
 */
require("_partials/errors.php")
?>
<div class="row">
    <div class="col">
        <div class="h1 pt-2 pb-2 text-center">
            All users
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="spinner-border text-primary d-none" role="status" id="spinner">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 d-flex justify-content-end">
                <a href="index.php?component=user" type="button" class="btn btn-primary" ><i class="fa fa-plus me-2"></i>Add User</a>
            </div>
        </div>
        <table class="table" id="list-users">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center" id="pagination">

        </ul>
    </nav>
</div>

<script src="./assets/js/services/user.js" type="module"></script>
<script src="./assets/js/components/users.js" type="module"></script>
<script type="module">
    import { refreshList } from './assets/js/components/users.js';

    document.addEventListener('DOMContentLoaded', async () => {
        refreshList(1);

    });

</script>








<!---->
<!--<div class="dashboard-container">-->
<!--    <aside class="sidebar">-->
<!--        <div class="user-info">-->
<!--            <div class="user-avatar">-->
<!--                <div class="default-avatar admin-avatar">-->
<!--                    <i class="fas fa-user-shield"></i>-->
<!--                </div>-->
<!--            </div>-->
<!--            <h3>Administrator</h3>-->
<!--            <p class="admin-role">System Administrator</p>-->
<!--        </div>-->
<!---->
<!--        <nav class="dashboard-nav">-->
<!--            <ul>-->
<!--                <li><a href="/BigProjects/Fullstack3Month/admin/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>-->
<!--                <li class="active"><a href="/BigProjects/Fullstack3Month/admin/users"><i class="fas fa-users"></i> Manage Users</a></li>-->
<!--                <li><a href="/BigProjects/Fullstack3Month/admin/albums"><i class="fas fa-images"></i> All Albums</a></li>-->
<!--                <li><a href="/BigProjects/Fullstack3Month/admin/photos"><i class="fas fa-camera"></i> All Photos</a></li>-->
<!--                <li><a href="/BigProjects/Fullstack3Month/admin/reports"><i class="fas fa-flag"></i> Reports</a></li>-->
<!--                <li><a href="/BigProjects/Fullstack3Month/admin/settings"><i class="fas fa-cog"></i> Settings</a></li>-->
<!--            </ul>-->
<!--        </nav>-->
<!--    </aside>-->
<!---->
<!--    <main class="main-content">-->
<!--        <div class="dashboard-header">-->
<!--            <h1>User Management</h1>-->
<!--            <div class="actions">-->
<!--                <a href="/BigProjects/Fullstack3Month/admin/users/new" class="btn"><i class="fas fa-plus"></i> Add User</a>-->
<!--                <button id="refresh-users" class="btn btn-secondary"><i class="fas fa-sync"></i> Refresh</button>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <section class="dashboard-section">-->
<!--            <div class="section-header">-->
<!--                <h2>All Users</h2>-->
<!--                <div class="search-box">-->
<!--                    <input type="text" id="search-users" placeholder="Search users...">-->
<!--                    <button><i class="fas fa-search"></i></button>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div id="users-message" class="message" style="display: none;"></div>-->
<!---->
<!--            <div class="table-responsive">-->
<!--                <table class="admin-table" id="users-table">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th>ID</th>-->
<!--                        <th>Username</th>-->
<!--                        <th>Email</th>-->
<!--                        <th>Registration Date</th>-->
<!--                        <th>Last Login</th>-->
<!--                        <th>Role</th>-->
<!--                        <th>Status</th>-->
<!--                        <th>Actions</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody id="users-list">-->
<!--                    <!-- User rows will be populated via JavaScript -->-->
<!--                    --><?php //if (!empty($users)): ?>
<!--                        --><?php //foreach ($users as $user): ?>
<!--                            <tr>-->
<!--                                <td>--><?php //echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?><!--</td>-->
<!--                                <td>--><?php //echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?><!--</td>-->
<!--                                <td>--><?php //echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?><!--</td>-->
<!--                                <td>--><?php //echo htmlspecialchars($user->registrationDate, ENT_QUOTES, 'UTF-8'); ?><!--</td>-->
<!--                                <td>--><?php //echo htmlspecialchars($user->lastLogin ?? 'Never', ENT_QUOTES, 'UTF-8'); ?><!--</td>-->
<!--                                <td>--><?php //echo htmlspecialchars($user->roles, ENT_QUOTES, 'UTF-8'); ?><!--</td>-->
<!--                                <td>-->
<!--                                    --><?php //if ($user->isActive): ?>
<!--                                        <span class="status-badge active">Active</span>-->
<!--                                    --><?php //else: ?>
<!--                                        <span class="status-badge inactive">Inactive</span>-->
<!--                                    --><?php //endif; ?>
<!--                                </td>-->
<!--                                <td class="actions-cell">-->
<!--                                    <a href="/BigProjects/Fullstack3Month/admin/users/--><?php //echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?><!--" class="btn-icon" title="View"><i class="fas fa-eye"></i></a>-->
<!--                                    <a href="/BigProjects/Fullstack3Month/admin/users/--><?php //echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?><!--/edit" class="btn-icon" title="Edit"><i class="fas fa-edit"></i></a>-->
<!--                                    <button class="btn-icon delete-user" data-id="--><?php //echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?><!--" data-username="--><?php //echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?><!--" title="Delete"><i class="fas fa-trash"></i></button>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                        --><?php //endforeach; ?>
<!--                    --><?php //else: ?>
<!--                        <tr>-->
<!--                            <td colspan="8" class="text-center">No users found</td>-->
<!--                        </tr>-->
<!--                    --><?php //endif; ?>
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->
<!---->
<!--            <div class="pagination-container" id="pagination">-->
<!--                <!-- Pagination will be added by JavaScript -->-->
<!--            </div>-->
<!--        </section>-->
<!--    </main>-->
<!--</div>-->
