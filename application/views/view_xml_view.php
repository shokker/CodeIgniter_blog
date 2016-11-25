

<h1>XML</h1>

<h2>New XML</h2>

 <div class="link_report">
<?php echo anchor('view_xml/upload/','Upload',array('class'=>'link_report_a')); ?>
</div>
<?php foreach ($xmls as $xml) : ?>
        <div class="post">
        <div class="post_header">
         <h3><?= anchor('/view_xml/edit_xml/'. $xml->filename, $xml->filename) ?></h3>
        </div>
        </div>

<?php endforeach; ?>

<h2>Edited Xml</h2>
<?php foreach(glob($xml_directory.'/*.*') as $file) : ?>
    <div class="post">
    <div class="post_header">

        <h3><?= anchor($file, explode('/',$file)[1]) ?></h3>
    </div>
    </div>
<?php endforeach; ?>