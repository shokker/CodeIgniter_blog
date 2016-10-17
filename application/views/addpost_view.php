<div class="addPost_form">
    <?php
    echo form_open('posts/addPost'),
    form_input('title',set_value('title'),'placeholder=Title'),
    form_textarea('text'),
    form_submit('submit','Add post')
    ?>


</div>