

<h1>XML</h1>

<h2>New XML</h2>

 <div class="link_report">
<?php echo anchor('view_xml/upload/','Upload',array('class'=>'link_report_a')); ?>
</div>
<?php foreach ($xmls as $xml) : ?>
        <div class="post">
        <div class="post_header">
         <h3><?= anchor('/view_xml/edit_xml/'. $xml->filename, $xml->filename) ?></h3>
            <?= anchor('/view_xml/delete/'. $xml->filename, 'delete') ?>
        </div>
        </div>

<?php endforeach; ?>

<h2>Edited Xml</h2>
<?php foreach($xmls_edit as $xml_edit) : ?>
    <div class="post">
    <div class="post_header">

        <h3><?= anchor('/xml_edit/test-'.$xml_edit->server_name,$xml_edit->filename) ?></h3>
    </div>
    </div>
<?php endforeach; ?>