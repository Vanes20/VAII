<?php

/** @var \App\Models\Story[] $stories */
/** @var \Framework\Support\LinkGenerator $link */
?>

<div class="dashboard">

        <?php $activePage = 'stories'; require __DIR__ . '/../_Shared/_sidebar.php'; ?>

    <main class="library-main">

        <div class="page-title">
            <div>
                <h1>My Stories</h1>
                <p>Manage your drafts and published stories.</p>
            </div>
        </div>

        <section class="library-toolbar">
            <label for="story-filter">Show:</label>
            <select id="story-filter">
                <option>All stories</option>
                <option>Published</option>
                <option>Drafts</option>
            </select>

            <label for="sort">Sort by:</label>
            <select id="sort">
                <option>Recently updated</option>
                <option>Title</option>
            </select>
        </section>

        <section class="owned-stories">

            <?php foreach ($stories as $story) : ?>
                <article class="owned-card">

                    <div class="cover"></div>

                    <div class="owned-info">

                        <div class="title-line">
                            <h2><?= e($story->getTitle()) ?></h2>
                            <span class="<?= $story->isPublished() ? 'published' : 'draft' ?>">
                                <?= $story->isPublished() ? 'Published' : 'Draft' ?>
                            </span>
                        </div>

                        <p><?= e($story->getDescription()) ?></p>

                        <div class="story-stats">
                            <span><?= $story->getChaptersCount() ?> chapters</span>
                            <span><?= $story->isPublished() ? 'Published' : 'Not published' ?></span>
                        </div>

                        <div class="card-actions">
                            <a href="<?= $link->url('story.edit', ['id' => $story->getId()]) ?>" class="btn-primary">
                                Edit story
                            </a>

                            <a href="<?= $link->url('chapter.index', ['storyId' => $story->getId()]) ?>" class="btn-secondary">
                                Chapters
                            </a>

                            <form method="post" action="<?= $link->url('story.delete') ?>">
                                <input type="hidden" name="id" value="<?= $story->getId() ?>">
                                <button type="submit" class="btn-secondary">Delete</button>
                            </form>
                        </div>

                    </div>

                </article>
            <?php endforeach ?>

            <a class="create-story" href="<?= $link->url('story.add') ?>">
                <span class="plus">+</span>
                <strong>Create a new story</strong>
            </a>

        </section>

    </main>

</div>