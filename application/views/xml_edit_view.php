<h1>Edit XML</h1>

<div class="addPost_form">
    <?php if($db_error) : ?>
        <div class="errors"><?= $db_error ?></div>
    <?php endif; ?>
    <?php

    echo form_open('view_xml/edit_xml'),
    form_input('todo',set_value('todo',$xml->note[intval($id)]->todo),'placeholder=Todo class=form-control'),
    form_textarea('body',set_value('body',$xml->note[intval($id)]->body),'class=form-control'),
    form_input('from',set_value('from',$xml->note[intval($id)]->from),'placeholder=From class=form-control'),
    form_submit('submit','edit xml','class="btn btn-default"'),
    form_close();
    ?>

    <div class="errors">
        <?= validation_errors() ?>
    </div>


</div>