<h1>Posts</h1>
<?php if($this->session->flashdata('report_message')) : ?>
<p class="warning"><?php  echo $this->session->flashdata('report_message'); ?></p>
<?php endif; ?>


<?php foreach ($posts as $post) : ?>
    <div class="post">
        <div class="post_header"><h2><?= $post->title ?></h2></div>
        <div class="post_body">
            <div class="text_panel"><?= auto_typography($post->text) ?></div>
            <small><?= $post->date ?></small>
        </div>
    </div>


<?php endforeach; ?>
<div class="link">
    <?php echo anchor('posts/addPost','Add post',array('class'=>'link_a')); ?>
</div>
<footer>
    <?= $report_form ?>
    <?php if($this->session->flashdata('error')) : ?>
    <div class="errors"><?= $this->session->flashdata('error')  ?></div>
    <?php endif; ?>
    <div class="footer-info">
        Created by Lukáš Danko | <?php echo anchor('report','Reports'); ?>
    </div>
</footer>
