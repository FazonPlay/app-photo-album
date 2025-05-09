<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <title>--><?php //echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?><!--</title>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
<?php include __DIR__ . '/../partials/navbar.php'; ?>

<div class="dashboard-container">
    <aside class="sidebar">
        <div class="user-info">
            <div class="user-avatar">
                <?php if (!empty($user->profilePicture)): ?>
                    <img src="<?php echo htmlspecialchars($user->profilePicture, ENT_QUOTES, 'UTF-8'); ?>" alt="Profile">
                <?php else: ?>
                    <div class="default-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                <?php endif; ?>
            </div>
            <h3><?php echo htmlspecialchars($user->username ?? '', ENT_QUOTES, 'UTF-8'); ?></h3>
<!--            <h3>--><?php //echo htmlspecialchars($user->username ?? '', ENT_QUOTES, 'UTF-8'); ?><!--</h3>-->
<!--            this line of code solved the htmlspecialchars deprecated issue, use for others too-->

        </div>

        <nav class="dashboard-nav">
            <ul>
                <li class="active"><a href="/dashboard"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="/albums"><i class="fas fa-images"></i> My Albums</a></li>
                <li><a href="/photos"><i class="fas fa-camera"></i> All Photos</a></li>
                <li><a href="/favorites"><i class="fas fa-heart"></i> Favorites</a></li>
                <li><a href="/shared"><i class="fas fa-share-alt"></i> Shared with Me</a></li>
                <li><a href="/profile"><i class="fas fa-user-edit"></i> Edit Profile</a></li>
            </ul>
        </nav>
    </aside>

    <main class="main-content">
        <div class="dashboard-header">
            <h1>Welcome back, <?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?>!</h1>
            <div class="actions">
                <a href="/albums/create" class="btn"><i class="fas fa-plus"></i> New Album</a>
                <a href="/photos/upload" class="btn btn-primary"><i class="fas fa-upload"></i> Upload Photos</a>
            </div>
        </div>

        <?php if (!empty($recentAlbums)): ?>
            <section class="dashboard-section">
                <div class="section-header">
                    <h2>Recent Albums</h2>
                    <a href="/albums" class="view-all">View all</a>
                </div>
                <div class="album-grid">
                    <?php foreach ($recentAlbums as $album): ?>
                        <div class="album-card">
                            <div class="album-thumbnail">
                                <?php if (!empty($album->coverPhotoId)): ?>
                                    <img src="<?php echo htmlspecialchars($album->coverPhotoUrl, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($album->title, ENT_QUOTES, 'UTF-8'); ?>">
                                <?php else: ?>
                                    <div class="no-cover">
                                        <i class="fas fa-images"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="album-info">
                                <h3><?php echo htmlspecialchars($album->title, ENT_QUOTES, 'UTF-8'); ?></h3>
                                <p><?php echo htmlspecialchars($album->photoCount, ENT_QUOTES, 'UTF-8'); ?> photos</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if (!empty($favoritePhotos)): ?>
            <section class="dashboard-section">
                <div class="section-header">
                    <h2>Favorite Photos</h2>
                    <a href="/favorites" class="view-all">View all</a>
                </div>
                <div class="photo-grid">
                    <?php foreach ($favoritePhotos as $photo): ?>
                        <div class="photo-card">
                            <div class="photo-thumbnail">
                                <img src="<?php echo htmlspecialchars($photo->thumbnailPath, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($photo->title, ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                            <div class="photo-actions">
                                <button class="favorite-btn active"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if (!empty($sharedAlbums)): ?>
            <section class="dashboard-section">
                <div class="section-header">
                    <h2>Shared with You</h2>
                    <a href="/shared" class="view-all">View all</a>
                </div>
                <div class="album-grid">
                    <?php foreach ($sharedAlbums as $album): ?>
                        <div class="album-card shared">
                            <div class="album-thumbnail">
                                <?php if (!empty($album->coverPhotoId)): ?>
                                    <img src="<?php echo htmlspecialchars($album->coverPhotoUrl, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($album->title, ENT_QUOTES, 'UTF-8'); ?>">
                                <?php else: ?>
                                    <div class="no-cover">
                                        <i class="fas fa-images"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="album-info">
                                <h3><?php echo htmlspecialchars($album->title, ENT_QUOTES, 'UTF-8'); ?></h3>
                                <p>Shared by <?php echo htmlspecialchars($album->ownerName, ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if (!empty($pendingInvitations)): ?>
            <section class="dashboard-section">
                <div class="section-header">
                    <h2>Album Invitations</h2>
                </div>
                <div class="invitations-list">
                    <?php foreach ($pendingInvitations as $invitation): ?>
                        <div class="invitation-card">
                            <div class="invitation-details">
                                <h3><?php echo htmlspecialchars($invitation->albumTitle, ENT_QUOTES, 'UTF-8'); ?></h3>
                                <p><strong>From:</strong> <?php echo htmlspecialchars($invitation->senderName, ENT_QUOTES, 'UTF-8'); ?></p>
                                <p><?php echo htmlspecialchars($invitation->message, ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                            <div class="invitation-actions">
                                <a href="/invitations/accept/<?php echo htmlspecialchars($invitation->invitationId, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-small">Accept</a>
                                <a href="/invitations/decline/<?php echo htmlspecialchars($invitation->invitationId, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-small btn-outline">Decline</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
    </main>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>

</body>
</html>