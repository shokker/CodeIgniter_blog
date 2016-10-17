<h1>Posts</h1>
<?php if($this->session->flashdata('report_message')) : ?>
<div class="errors"><?  echo $this->session->flashdata('report_message'); ?></div>
<?php endif; ?>


<?php foreach ($posts as $post) : ?>
    <h2><?= $post->title ?></h2>
    <p class="text_panel"><?= $post->text ?></p>
    <small><?= $post->date ?></small>


<?php endforeach; ?>

<?= $report_form ?>
<div class="errors">
    <?= validation_errors() ?>
</div>
