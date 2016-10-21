function format ( d ,name) {
    return '<strong>'+name.toUpperCase()+' Text:</strong><br>'+
        d.text;
}
function removeDT(editor,DT) {
    editor
        .title( 'Delete record' )
        .message( "Are you sure you wish to delete this row?" )
        .buttons( { "label": "Delete", "fn": function () { editor.submit() } } )
        .remove( DT.closest('tr') );

}
function showDetailDT(dt,name,this$) {
    var tr = this$.closest('tr');
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
        row.child( format( row.data(),name ) ).show();

        // Add to the 'open' array
        if ( idx === -1 ) {
            detailRows.push( tr.attr('id') );
        }
    }
}

var editor;
var reportEditor;
var detailRows = [];
// use a global for the submit and return data rendering in the examples


$(function(){

    $('.warning').click(function () {
       $(this).fadeOut();
    });


    //editors
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


    reportEditor = new $.fn.dataTable.Editor( {
        "ajax": "ajax/reports",
        "table": "#reportsTable"

    } );

    //CRUD
    //create new DT
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
    // remove from DT
    $('#example').on( 'click', 'a.editor_remove', function (e) {
        e.preventDefault();
        removeDT(editor,$(this))
    });
    $('#reportsTable').on( 'click', 'a.editor_remove', function (e) {
        e.preventDefault();
        removeDT(reportEditor,$(this))
    });

    // show detail in DT
    $('#example').on( 'click', 'a.details-control', function (e) {
        e.preventDefault();
        showDetailDT(dt,'post',$(this))
    });
    $('#reportsTable').on( 'click', 'a.details-control', function (e) {
        e.preventDefault();
        showDetailDT(dtr,'email',$(this))
    });


    //Tables
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


    var dtr = $('#reportsTable').DataTable( {
        dom: "rtip",
        ajax: {
            url: "ajax/reports",
            type: "POST"
        },
        serverSide: true,
        columns: [
            { data: "title" },
            {
                data: "text",
                visible:false,
                searchable: false},
            { data: "author" },
            { data: "date" },

            {
                data: null,
                className: "center",
                defaultContent: '<a href=""  role="button" class="editor_remove btn btn-danger btn-sm tableEdit"><i class="fa fa-times" aria-hidden="true"></i></a> ' +
                '<a href=""  role="button" class="details-control btn btn-success btn-sm tableEdit"><i class="fa fa-eye" aria-hidden="true"></i></a>'
            }
        ],
        select: true

    } );

});

