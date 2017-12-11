
	<div class='container-fluid'>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url();?>">Format</a></li>
            <li><a class='id' href="<?php echo site_url('format/id/'. $this->uri->segment(3));?>"></a></li>
            <li><a class='sub' href="<?php echo site_url('format/id/'. $this->uri->segment(3).'/'.$this->uri->segment(4));?>"></a></li>
            <li class='active'>active</li>
        </ol>
	</div>

    <div class='container'>
        <div class='row' id="main">
            <p>Loading...</p>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">คำอธิบาย</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>
    <script>
        var data = JSON.parse(window.localStorage.getItem('data'));
        $.map(data.format, function(obj) {
            if (obj.id == <?php echo $this->uri->segment(3);?>) {
                $("a.id").text(obj.title);

                $.each(obj.function, function(key, val) {
                    if (val.id == <?php echo $this->uri->segment(4);?> ) {  
                        $("a.sub").text(val.title);
                        
                        $.each(val.department, function(key_dep, valdep) {
                            if (valdep.id == <?php echo $this->uri->segment(5);?>) {
                                $("li.active").text(valdep.title);
                                
                                $.each(valdep.course, function(key_course, val_course) {
                                    console.log(val_course);
                                    var href = '<?php echo site_url('course');?>/data/' + obj.id + '/' + val.id + '/' + val_course.id;
                                    var html =  '<div class="col-md-2" id="c' + val_course.id +'">';
                                    html += '<a data-toggle="modal" data-remote="false" data-target="#myModal" href="' + href + '" class="book">';
                                    html += '<p>' + val_course.name + '  </p>';
                                    html += '</a>';
                                    html += '</div>';
                                    $(html).appendTo($('#main'));
                                });
                            }
                        });
                    }
                });
            }
        });

        $("#myModal").on('show.bs.modal', function(e) {
            e.preventDefault();
            var link = $(e.relatedTarget);
            $(this).find('.modal-body').load(link.attr('href'));
        })
    </script>
</body>


</html>