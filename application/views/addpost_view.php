<div class="addPost_form">
    <?php if($db_error) : ?>
        <div class="errors"><? $db_error ?></div>
    <?php endif; ?>
    <?php
    echo form_open('posts/addPost'),
    form_input('title',set_value('title'),'placeholder=Title'),
    form_textarea('text'),
    form_submit('submit','Add post')
    ?>

    <div class="errors">
        <?= validation_errors() ?>
    </div>


</div>