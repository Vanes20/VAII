<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var string $activePage */
?>
<aside class="sidebar">
    <a href="<?= $link->url('story.index') ?>" class="<?= $activePage === 'stories' ? 'selected' : '' ?>">My Stories</a>
    <a href="<?= $link->url('chapter.index') ?>" class="<?= $activePage === 'chapters' ? 'selected' : '' ?>">Chapters</a>
    <a href="#favorites">My Favorites</a>
    <a href="#profile">Profile</a>
    <a href="<?= $link->url('home.index') ?>">Home</a>
</aside>