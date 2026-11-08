<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storylib</title>
    <link rel="stylesheet" href="<?= $link->asset('css/styles.css') ?>">
</head>

<body>

<header class="site-header">

    <div class="header-top">

        <a href="<?= $link->url('home.index') ?>" class="brand">STORYLIB</a>

        <form class="search">
            <label>
                <input type="search" placeholder="Search stories...">
            </label>
            <button type="submit">⌕</button>
        </form>

        <a href="<?= $link->url('story.index') ?>" class="avatar">👤</a>

    </div>

    <nav class="main-nav">
        <a href="<?= $link->url('home.index') ?>">HOME</a>
        <a href="<?= $link->url('home.index') ?>#top-stories">TOP STORIES</a>
        <a href="<?= $link->url('home.index') ?>#popular">ALL GENRES</a>
    </nav>

</header>

<?= $contentHTML ?>

</body>
</html>