

<h1>XML</h1>

 <div class="link_report">
<?php echo anchor('view_xml/upload/','Upload',array('class'=>'link_report_a')); ?>
</div>
<?php foreach ($xmls as $xml) : ?>
    <div>
        <a href=""> <!-- sem pojde link kde tento subor otovrim v editore -->
        <?= $xml->filename?></a></div>



<?php endforeach; ?>