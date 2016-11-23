<h1>Reports</h1>
<?php foreach ($reports as $report) : ?>
    <div class="post">
        <div class="report_header"><h2><?= $report->title ?></h2></div>
        <div class="post_body">
            <div class="text_panel"><?= auto_typography($report->text) ?></div>
            <p class="author"><i class="fa fa-user" aria-hidden="true"></i> <?= mailto($report->author,$report->author) ?></p>
            <small><?= $report->date ?></small>
        </div>
    </div>


<?php endforeach; ?>
<div class="link_report">
    <?php echo anchor('posts','Show Posts',array('class'=>'link_report_a')); ?>
</div>
