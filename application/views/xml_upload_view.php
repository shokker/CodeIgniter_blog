<div class="auth_form">
    <h1>Upload XML</h1>
    <?php
    echo form_open_multipart('view_xml/do_upload'),
    form_upload('file','file'),
    form_submit('submit','Upload XML','class="btn btn-default"'),
    form_close();
    ?>

    <div class="errors">
        <?= validation_errors() ?>
        <?= isset($upload_error) ? $upload_error : "" ?>
    </div>
</div>