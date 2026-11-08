<?php

/** @var \App\Models\Story $story */
/** @var string[] $errors */
/** @var \Framework\Support\LinkGenerator $link */
?>

<main class="library-main">

    <div class="page-title">
        <h1><?= $story->getId() ? 'Edit story' : 'Create a new story' ?></h1>
    </div>

    <?php if (count($errors) > 0) : ?>
        <div class="errors">
            <?php foreach ($errors as $error) : ?>
                <div><?= e($error) ?></div>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <form class="story-form" method="post" action="<?= $link->url('story.save') ?>">

        <input type="hidden" name="id" value="<?= $story->getId() ?>">

        <label for="title">Title</label>
        <input type="text" id="title" name="title" maxlength="150" required
               value="<?= e($story->getTitle()) ?>">

        <label for="description">Description</label>
        <textarea id="description" name="description"><?= e($story->getDescription()) ?></textarea>

        <label for="status">Status</label>
        <select id="status" name="status">
            <option value="draft" <?= $story->getStatus() === 'draft' ? 'selected' : '' ?>>Draft</option>
            <option value="published" <?= $story->getStatus() === 'published' ? 'selected' : '' ?>>Published</option>
        </select>

        <label for="chapters">Chapters</label>
        <input type="number" id="chapters" name="chapters" min="0" required
               value="<?= (int)$story->getChapters() ?>">

        <div class="form-actions">
            <button type="submit">Save</button>
            <a href="<?= $link->url('story.index') ?>">Cancel</a>
        </div>

    </form>

</main>