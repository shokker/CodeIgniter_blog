<h1><?= $title ?></h1>

<div class="post">
    <div class="text_panel"><?= auto_typography($text) ?></div>
    <small><?= $date ?></small>
</div>
<div class="link_report">
    <?php echo anchor('posts','Show Posts',array('class'=>'link_report_a')); ?>
</div>
<div class="link_report">
    <?php echo anchor('#','DOwnload PDF',array('class'=>'link_report_a','id'=>"create_pdf")); ?>
</div>
<script>

    $(function () {
        $('#create_pdf').on('click',function (e) {
            e.preventDefault();
            var doc = new jsPDF('p', 'mm', 'letter');
            pageHeight= doc.internal.pageSize.height;
            doc.fromHTML($('h1').get(0),15,10);
            var source = $('.text_panel').text();
            var splitTitle = doc.splitTextToSize(source, 180);
            var pageHeight= doc.internal.pageSize.height-30;
            var line = 50;
            for (i=0;i < splitTitle.length;i++){
                if (line<pageHeight){
                    doc.text(15, line, splitTitle[i]);
                    line +=8;
                }
                else{
                    doc.addPage();
                    line = 30;
                    doc.text(15, line, splitTitle[i]);
                    line +=8;
                }

            }
            console.log(splitTitle);
//            doc.text(15, 45, splitTitle);
//            doc.text(source,20,40);
            doc.save('test.pdf');
            console.log('lolo');
        })

    })
</script>