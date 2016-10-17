<div class="report_form">


    <?php


    echo form_open('report/createReport'),
    form_input('title',set_value('title'),'placeholder=Title'),
    form_email('email',set_value('email'),'placeholder=Email'),
    form_textarea('text'),
    form_submit('submit','Send Report'); ?>
</div>