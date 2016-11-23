<h1>Add Post</h1>

<div class="addPost_form">
    <?php if($db_error) : ?>
        <div class="errors"><?= $db_error ?></div>
    <?php endif; ?>
    <?php
    echo form_open('posts/add'),
    form_input('title',set_value('title'),'placeholder=Title class=form-control'),
    form_textarea('text','','class=form-control'),
    form_submit('submit','Add post','class="btn btn-default"'),
    form_close();
    ?>

    <div class="errors">
        <?= validation_errors() ?>
    </div>


</div>