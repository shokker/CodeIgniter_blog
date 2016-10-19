var editor; // use a global for the submit and return data rendering in the examples

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
                "name": "text"
            }
            ]
        } );

        $('#example').DataTable( {
            dom: "Bfrtip",
            ajax: {
                url: "ajax/posts",
                type: "POST"
            },
            serverSide: true,
            columns: [
                { data: "id" },
                { data: "title" },
                { data: "text" },
                { data: "date" }

            ],
            select: true,
            buttons: [
                { extend: "create", editor: editor },
                { extend: "edit",   editor: editor },
                { extend: "remove", editor: editor }
            ]
        } );
});

