function format ( d ) {
    return '<strong>Post Text:</strong><br>'+
        d.text;
}
var editor;
var reportEditor;
// use a global for the submit and return data rendering in the examples

$(function(){

    $('.warning').click(function () {
       $(this).fadeOut();
    });


    editor = new $.fn.dataTable.Editor( {
            "ajax": "ajax/posts",
            "table": "#example",
            "fields": [  {
                "label": "Title:",
                "name": "title"
            },  {
                "label": "Text:",
                "type": "textarea",
                "name": "text"
            }
            ]
        } );
    $('a.editor_create').on( 'click', function (e) {
        e.preventDefault();

        editor
            .title( 'Create new record' )
            .buttons( { "label": "Add", "fn": function () { editor.submit() } } )
            .create();
    } );

    // Edit record
    $('#example').on( 'click', 'a.editor_edit', function (e) {
        e.preventDefault();

        editor
            .title( 'Edit record' )
            .buttons( { "label": "Update", "fn": function () { editor.submit() } } )
            .edit( $(this).closest('tr') );
    } );

    // Delete a record
    $('#example').on( 'click', 'a.editor_remove', function (e) {
        e.preventDefault();

        editor
            .title( 'Delete record' )
            .message( "Are you sure you wish to delete this row?" )
            .buttons( { "label": "Delete", "fn": function () { editor.submit() } } )
            .remove( $(this).closest('tr') );
    } );
    //show post text
    var detailRows = [];

    $('#example').on( 'click', 'a.details-control', function (e) {
        e.preventDefault();
        console.log('klikol');
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );

        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();

            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();

            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );


       var dt = $('#example').DataTable( {
            dom: "rtip",
            ajax: {
                url: "ajax/posts",
                type: "POST"
            },
            serverSide: true,
            columns: [
                { data: "title" },
                { data: "date" },
                {
                    data: "text",
                    visible:false,
                    searchable: false},
                {
                    data: null,
                    className: "center",
                    defaultContent: '<a href="" class="editor_edit btn btn-primary btn-sm tableEdit" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> ' +
                    '<a href=""  role="button" class="editor_remove btn btn-danger btn-sm tableEdit"><i class="fa fa-times" aria-hidden="true"></i></a> ' +
                    '<a href=""  role="button" class="details-control btn btn-success btn-sm tableEdit"><i class="fa fa-eye" aria-hidden="true"></i></a>'
                }

            ],
            select: true

        } );

    // reportEditor = new $.fn.dataTable.Editor( {
    //     "ajax": "ajax/reports",
    //     "table": "#reportsTable"
    //
    // } );

    reportEditor = new $.fn.dataTable.Editor( {
        "ajax": "ajax/reports",
        "table": "#reportsTable"

    } );


    $('#reportsTable').DataTable( {
        dom: "Brtip",
        ajax: {
            url: "ajax/reports",
            type: "POST"
        },
        serverSide: true,
        columns: [
            { data: "title" },
            { data: "author" },
            { data: "date" }
        ],
        select: true,
        buttons: [
            { extend: "remove", editor: reportEditor }
        ]
    } );




});

