<?php
/** @var string $title */
/** @var string $content */
/** @var string $headerTitle */
/** @var string $siteName */

use models\User;

$user = User::isUserAuthenticated() ? User::getCurrentAuthenticatedUser() : null;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= htmlspecialchars($siteName) ?> | <?= htmlspecialchars($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/themes/light/css/style.css" />
</head>
<body>
<header class="d-flex flex-wrap justify-content-between py-3 mb-4 border-bottom">
<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Interior Design Studio</span>
      </a>
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link <?= $title === 'Home' ? 'active' : '' ?>">Home</a></li>
        <li class="nav-item"><a href="/Project/list" class="nav-link <?= $title === 'Features' ? 'active' : '' ?>">Projects</a></li>
        <li class="nav-item"><a href="/services/list" class="nav-link <?= $title === 'Pricing' ? 'active' : '' ?>">Services</a></li>
        <?php if ($user): ?>
            <li class="nav-item"><a href="/user/profile" class="nav-link">Welcome, <?= htmlspecialchars(User::getFullName($user)) ?></a></li>
            <li class="nav-item"><a href="/user/logout" class="nav-link">Logout</a></li>
        <?php else: ?>
            <li class="nav-item"><a href="/user/login" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="/user/register" class="nav-link">Register</a></li>
        <?php endif; ?>
    </ul>
</header>

<div class="container vh-100">
    <?= $content ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
