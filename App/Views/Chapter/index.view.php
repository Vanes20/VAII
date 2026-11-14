<?php

/** @var \App\Models\Chapter[] $chapters */
/** @var \App\Models\Story|null $story */
/** @var \Framework\Support\LinkGenerator $link */
?>

<div class="dashboard">

    <?php $activePage = 'chapters'; require __DIR__ . '/../_Shared/_sidebar.php'; ?>

    <main class="library-main">

        <div class="page-title">
            <div>
                <?php if ($story !== null) : ?>
                    <h1>Chapters of “<?= e($story->getTitle()) ?>”</h1>
                    <p><a href="<?= $link->url('chapter.index') ?>">Show chapters of all stories</a></p>
                <?php else : ?>
                    <h1>All chapters</h1>
                    <p>Manage chapters of your stories.</p>
                <?php endif ?>
            </div>
        </div>

        <p>
            <a class="btn-add"
               href="<?= $link->url('chapter.add', $story !== null ? ['storyId' => $story->getId()] : []) ?>">
                + New chapter
            </a>
        </p>

        <?php if (count($chapters) > 0) : ?>
            <div class="table-wrap">
                <table class="chapter-table">
                    <thead>
                    <tr>
                        <th>Story</th>
                        <th>#</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($chapters as $chapter) : ?>
                        <tr>
                            <td><?= e($chapter->getStory()?->getTitle()) ?></td>
                            <td><?= $chapter->getNumber() ?></td>
                            <td><?= e($chapter->getTitle()) ?></td>
                            <td class="card-actions">
                                <a href="<?= $link->url('chapter.edit', ['id' => $chapter->getId()]) ?>"
                                   class="btn-primary">Edit</a>
                                <form method="post" action="<?= $link->url('chapter.delete') ?>">
                                    <input type="hidden" name="id" value="<?= $chapter->getId() ?>">
                                    <button type="submit" class="btn-secondary">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p>No chapters yet.</p>
        <?php endif ?>

    </main>

</div>