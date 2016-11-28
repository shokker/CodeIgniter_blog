<h1>EXPeRiMENt</h1>

<?= form_open('view_xml/edit_proceed_xml/'.$source); ?>
<?= join($xml); ?>
<?= form_submit('submit','edit xml','class="btn btn-default mar_bottom"'),
form_close();
