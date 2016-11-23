<div class="section">
<h1>Posts</h1>
<?php if($this->session->flashdata('report_message')) : ?>
<p class="warning"><?php  echo $this->session->flashdata('report_message'); ?></p>
<?php endif; ?>


<?php foreach ($posts as $post) : ?>
    <div class="post">
        <div class="post_header"><h2><?= $post->title ?></h2></div>
        <div class="post_body">
            <div class="text_panel"><?= word_limiter(auto_typography($post->text),30)?>
            <?= anchor('posts/' . $post->slug,'Read more')?></div>
            <small><?= $post->date ?></small>
        </div>
    </div>


<?php endforeach; ?>
</div>

