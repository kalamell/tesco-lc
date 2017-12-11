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
    </script>
        