<div class="auth_form">
    <h1>Register</h1>
    <?php
    echo form_open_multipart('auth/register'),
    form_email('email',set_value('email'),'placeholder=Email class=form-control'),
    form_password('password','','placeholder="Password" class=form-control'),
    form_password('password2','','placeholder="Re-enter Password" class=form-control'),
    form_upload('file','file'),
    form_submit('submit','Register','class="btn btn-default"'),
    form_close();
    ?>

    <div class="errors">
        <?= validation_errors() ?>
        <?= isset($upload_error) ? $upload_error : "" ?>
    </div>
</div>