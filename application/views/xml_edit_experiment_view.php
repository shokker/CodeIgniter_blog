<h1>EXPeRiMENt</h1>

<?= form_open('view_xml/edit_proceed_xml/'.$source); ?>
<?= join($xml); ?>
<div id='toolbar'>
    <div class='wrapper text-center'>
        <div class="btn-group mar_bottom">
            <?= form_submit('edit','edit xml','class="btn btn-default "')?>
            <?= form_submit('save','save as XML','class="btn btn-default "')?>
            <?= form_submit('database','save to DB','class="btn btn-default "')?>
        </div>
    </div>
</div>
<?= form_close(); ?>



