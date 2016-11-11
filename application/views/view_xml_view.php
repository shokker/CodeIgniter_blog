

<h1>XML</h1>

<?php foreach ($xml->children() as $node) : ?>

    <div class="post">
        <div class="post_header"><h2><?= $node->todo ?></h2></div>
        <div class="post_body">
            <div class="text_panel">
                <?= $node->body ?></div>
            <small><?= $node->from ?></small>
            <div class="link_report">


            <?php echo anchor('view_xml/edit_xml/'. $node->id ,'Edit',array('class'=>'link_report_a')); ?>
            </div>
        </div>
    </div>


<?php endforeach; ?>