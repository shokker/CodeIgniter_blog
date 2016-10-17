<h1>Posts</h1>


<?php foreach ($posts as $post) : ?>
    <h2><?= $post->title ?></h2>
    <p class="text_panel"><?= $post->text ?></p>
    <small><?= $post->date ?></small>


<?php endforeach; ?>

<?= $report_form ?>
