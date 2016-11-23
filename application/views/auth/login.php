<div class="auth_form">
    <h1>Login</h1>
    <?php
    echo form_open('auth/login'),
    form_email('email',set_value('email'),'placeholder=Email class=form-control'),
    form_password('password','','placeholder="Password" class=form-control'),
    form_submit('submit','Login','class="btn btn-default"'),
    form_close();
    ?>

    <div class="errors">
        <?= validation_errors() ?>
        <?php if($valid_error) : ?>
        <p class="error_message"><?= $valid_error ?></p>
        <?php endif; ?>
    </div>
</div>