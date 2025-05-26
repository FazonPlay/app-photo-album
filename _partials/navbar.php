<?php if (!empty($_SESSION['auth'])): ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">PhotoGallery</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?component=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?component=landing">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?component=albums">Albums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?component=about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?component=contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?disconnect=true">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php else: ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">PhotoGallery</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?component=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?component=login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?component=about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?component=contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>
