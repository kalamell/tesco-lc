    
    <div id="scorm">
    </div>

    <div id="vdo">
    </div>

    <div id="pdf">
    </div>
    
    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>
    <script src="<?php echo base_url();?>assets/player.js"></script>
    
    <script>
    var data = JSON.parse(window.localStorage.getItem('data'));
    $.map(data.format, function(obj) {
        if (obj.id == <?php echo $this->uri->segment(3);?>) {

            $.each(obj.function, function(key, val) {
                if (val.id == <?php echo $this->uri->segment(4);?> ) {  
                   
                    

                    $.each(val.department, function(key_dep, valdep) {
                        if (valdep.id == <?php echo $this->uri->segment(5);?>) {
                            
                            
                            $.each(valdep.course, function(key_course, val_course) {
                                console.log(val_course);
                                if (val_course.id == <?php echo $this->uri->segment(6);?>) {
                                    console.log(val_course.type);

                                    if (val_course.type =='SCORM 1.2') {
                                        $("#scorm").html('<iframe src="https://backend.tescolotuslc.com/learningcenter/storage/scorm/2017-10-12/10/80a2/Right Stock Right Place (RSRP)/index_lms.html" id="course-content" frameborder="0" height="100%" width="100%" style="height: 800px;"></iframe>');
                                    }
                                }
                            });
                        }
                    });
                }
            });
        }
    });

    
    </script>
        