<h1><?= $title ?></h1>

<div class="post">
    <div class="text_panel"><?= auto_typography($text) ?></div>
    <small><?= $date ?></small>
</div>
<div class="link_report">
    <?php echo anchor('posts','Show Posts',array('class'=>'link_report_a')); ?>
</div>