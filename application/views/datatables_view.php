<h1>DataTables</h1>
<h2>Posts</h2>
<div class="wrapper">
<a href="" class="editor_create btn btn-default" role="button">New</a>
<table id="example" class="table table-striped table-bordered  responsive"  width="90%" cellspacing="0">
    <thead>
    <tr>

        <th>Title</th>
        <th>Date</th>
        <th>Text</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tfoot>
    <tr>

        <th>Title</th>
        <th>Date</th>
        <th>Text</th>
        <th>Actions</th>
    </tr>
    </tfoot>

</table>
</div>
<h2>Reports</h2>
<div class="wrapper">
<table id="reportsTable" class="table table-striped table-bordered responsive"  width="90%" cellspacing="0">
    <thead>

    <tr>

        <th>Title</th>
        <th>Text</th>
        <th>Author</th>
        <th>Date</th>
        <th>Actions</th>


    </tr>
    </thead>
    <tfoot>
    <tr>

        <th>Title</th>
        <th>Text</th>
        <th>Author</th>
        <th>Date</th>
        <th>Actions</th>


    </tr>
    </tfoot>
</table>
    </div>

<div class="link_report">
    <?php echo anchor('posts','Show Posts',array('class'=>'link_report_a')); ?>
</div>