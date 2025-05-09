    <header class="header">
        <div class="container nav">
            <div class="logo">PhotoGallery</div>
            <ul class="nav-links">
                <?php if (empty($_SESSION['auth'])): ?>
                    <li><a href="/BigProjects/Fullstack3Month/">Home</a></li>
                    <li><a href="/gallery">Gallery</a></li>
                    <li><a href="/albums">Albums</a></li>
                    <li><a href="/BigProjects/Fullstack3Month/about">About</a></li>
                    <li><a href="/BigProjects/Fullstack3Month/contact">Contact</a></li>
                <?php else: ?>
                    <li><a href="/BigProjects/Fullstack3Month/">Home</a></li>
                    <li><a href="/BigProjects/Fullstack3Month/login">Login</a></li>
                    <li><a href="/BigProjects/Fullstack3Month/about">About</a></li>
                    <li><a href="/BigProjects/Fullstack3Month/contact">Contact</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </header>

