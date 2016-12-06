<h1>EXPeRiMENt</h1>
<h2><?=$source ?></h2>
<?= form_open('view_xml/edit_proceed_xml/'.$source,array('id'=>"MyForm")); ?>
<?= form_label('name of file', 'filename'); ?>
<?= form_input('filename','','placeholder="file name" class="form-control header_form" id="filename"'); ?>
<?= join($xml); ?>
<div id='toolbar'>
    <div class='wrapper text-center'>
        <div class="btn-group mar_bottom">
            <?= form_submit('edit','edit xml','class="btn btn-default " ')?>
            <?= form_submit('save','save as XML','class="btn btn-default "')?>
            <?= form_submit('database','save to DB','class="btn btn-default " id="database_form"')?>
        </div>
    </div>
</div>
<?= form_close(); ?>
<script>
    $(function () {
        console.log('click');
        $('#database_form').on('click',function (e) {
            e.preventDefault();
            console.log('clikc');
            $.post( "/view_xml/database", $( "#MyForm" ).serialize() );


        });
    })
</script>






