<div class="report_form">
    <?php
    echo form_open('sendreport/createReport'),
    form_input('title',set_value('title'),'placeholder=Title class=form-control'),
    form_email('email',set_value('email'),'placeholder=Email class=form-control'),
    form_textarea('text','','id="report_textarea" class="form-control"'),
    form_submit('submit','Send Report','class="btn btn-default"'),
    form_close();
    ?>
</div>