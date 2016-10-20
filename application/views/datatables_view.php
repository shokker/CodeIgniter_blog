<h1>DataTables</h1>
<h2>Posts</h2>
<table id="example" class="display" width="90%" cellspacing="0">

    <thead>
    <tr>
        <th>Title</th>
        <th>Date</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Title</th>
        <th>Date</th>
    </tr>
    </tfoot>
</table>
<h2>Reports</h2>
<table id="reportsTable" class="display" width="90%" cellspacing="0">
    <thead>

    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Date</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Date</th>
    </tr>
    </tfoot>
</table>

<div class="link_report">
    <?php echo anchor('posts','Show Posts',array('class'=>'link_report_a')); ?>
</div>