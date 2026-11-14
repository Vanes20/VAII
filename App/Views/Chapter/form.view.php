<?php

/** @var \App\Models\Chapter $chapter */
/** @var \App\Models\Story[] $stories */
/** @var string[] $errors */
/** @var \Framework\Support\LinkGenerator $link */
?>

<main class="library-main">

    <div class="page-title">
        <h1><?= $chapter->getId() ? 'Edit chapter' : 'Create a new chapter' ?></h1>
    </div>

    <?php if (count($errors) > 0) : ?>
        <div class="errors">
            <?php foreach ($errors as $error) : ?>
                <div><?= e($error) ?></div>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <form class="story-form" method="post" action="<?= $link->url('chapter.save') ?>">

        <input type="hidden" name="id" value="<?= $chapter->getId() ?>">

        <label for="storyId">Story</label>
        <select id="storyId" name="storyId" required>
            <option value="">-- select a story --</option>
            <?php foreach ($stories as $story) : ?>
                <option value="<?= $story->getId() ?>"
                    <?= $chapter->getStoryId() === $story->getId() ? 'selected' : '' ?>>
                    <?= e($story->getTitle()) ?>
                </option>
            <?php endforeach ?>
        </select>

        <label for="number">Chapter number</label>
        <input type="number" id="number" name="number" min="1" required
               value="<?= (int)$chapter->getNumber() ?>">

        <label for="title">Title</label>
        <input type="text" id="title" name="title" maxlength="150" required
               value="<?= e($chapter->getTitle()) ?>">

        <label for="content">Content</label>
        <textarea id="content" name="content"><?= e($chapter->getContent()) ?></textarea>

        <div class="form-actions">
            <button type="submit">Save</button>
            <a href="<?= $link->url('chapter.index', $chapter->getStoryId() ? ['storyId' => $chapter->getStoryId()] : []) ?>">Cancel</a>
        </div>

    </form>

</main>