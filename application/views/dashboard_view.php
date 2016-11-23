<h1>DashBoard</h1>



<?= $content_post ?>
<?= $content_reports ?>
<?= $content_users ?>
<ul class="links">
    <li class="link_report">
        <?php echo anchor('posts','Show Posts',array('class'=>'link_report_a')); ?>
    </li>
    <li class="link_report">
        <?php echo anchor('report','Show reports',array('class'=>'link_report_a')); ?>
    </li>
</ul>
