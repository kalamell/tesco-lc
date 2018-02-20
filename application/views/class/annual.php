    <div class='container-fluid' id="screen">
        <div class='transfer' style="">
            <img src="<?php echo base_url();?>assets/images/loading_lotus.gif" style='margin: 0 auto; display: block;'>
            <p style="font-size: 16px; color: #fff; text-align: center;">กำลังโหลดข้อมูล...</p>
        </div>


        <div id="scorm" style="display: none; ">
        </div>

        
        

        <div id="footer" style=''>
            <div class='container'>

                


                <div class='row' style="margin-top: 10px;">
                    <div class='col-md-4 col-xs-6' id="left-menu">
                        
                    </div>
        
                    <div class='col-md-4 col-xs-6' id="right-menu">
                    <button class='btn btn-default' style="font-size: 14px; background: grey;    color: #fff;    border: 1px solid #6b6b6b;" id="gotohome"><i class='fa fa-home'></i> <span>หน้าหลัก / Home</span>  </button>  
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- 
        <div class='col-md-4' style="text-align: center;" id="center-menu">
                    <button class='btn btn-default' style="font-size: 14px;" id="document-prev"><i class='fa fa-chevron-left'></i> หน้าก่อนหน้า</button> 
                    <button class='btn btn-default' style="font-size: 14px;" id="document-next"> หน้าถัดไป <i class='fa fa-chevron-right'></i></button> 
                </div>
            -->

    


    <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-close'></i></button>
                    <h4 class="modal-title" id="myModalLabel">สารบัญ</h4>
                </div>
                <div class="modal-body fix" id="list-documents" style="overflow: scroll;">
                    <div class="list-group">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="close_modal"><i class="fa fa-times"></i> ปิดหน้าต่างนี้</button>
                </div>

                
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel2">คำอธิบาย</h4>
            </div>
            <div class="modal-body">
                <h2 style='color: #000;'>เรียนจบเรียบร้อย กรุณารอสักครู่</h2>
            </div>
            
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModalx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title" id="myModalLabel2">คำอธิบาย</h4>
                </div>
                <div class="modal-body">
                    <h2 style='color: #000;'>ขอขอบคุณที่ท่านกลับมาทบทวน</h2>
                </div>

                <!--<div class="modal-footer">
                    <a href="#" class="btn btn-success" id="create_groupx"><i class="fa fa-times"></i> ปิดหน้านี้</a>
                </div>-->
            
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-close'></i></button>
                    
                    <h4 class="modal-title" id="myModalLabel2">คำอธิบาย</h4>
                </div>
                <div class="modal-body">
                    <h2 style='color: #000;'>มีเอกสารชุดถัดไปที่ท่านยังเรียนไม่จบ ต้องการเรียนต่อหรือไม่</h2>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="next_course"><i class="fa fa-user"></i> เริ่มเรียนต่อไป</button>
                    <a href="<?php echo site_url();?>" class="btn btn-success" id="create_group"><i class="fa fa-home"></i> ออกจากระบบ</a>
                </div>
                
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModalExam" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                <h4 class="modal-title" id="myModalExamLabel">ผลการสอบ</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <a href="<?php echo site_url('format/id/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5));?>" type="button" class="btn btn-primary" id=""><i class="fa fa-home"></i> กลับหน้าแรก</a>
            </div>
            </div>
        </div>
    </div>


    
    
    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.211/pdf.min.js"></script>
    <script>var b_url = '<?php echo site_url();?>';</script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/script.js"></script>
    
    <script>

    var base_url = '<?php echo site_url();?>/';
    var course_id = '<?php echo $this->uri->segment(3);?>';
    var class_id = '<?php echo $this->uri->segment(4);?>';
    var user_id = <?php echo $this->session->userdata('id');?>;
    var token = JSON.parse(window.localStorage.getItem('token'));

    //  https://tescolotuslc.com/learningcenter/api/class/get
    var data_course = [];

    $(function() {
        getClass();

        setTimeout(function() {
            checkDocument(0);
        }, 1000);


        $("#gotohome").on('click', function() {
            top.location.href = '<?php echo site_url();?>';
        });
    })

    function getClass() {
        $.ajax({
            url: '<?php echo $this->config->item('api');?>/api/course/get',
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            method: 'POST',
            data: {
                token: token,
                course_id: course_id,
            },
            success: function(res) {
                if (res.status) {
                    var i = 0;
                    $.each(res.data.document, function(k, v) {
                        $.each(v.file, function(k2, v2) {
                            data_course.push({
                                k: i,
                                type: res.data.type,
                                doc_id: v.file[k2].id,
                                title: res.data.document[k].title + '<br><small>' + v2.title + '</span>',
                                //file: v2.file,
                                file: getCover(v2.file),
                                page: 1,
                                read: 0,
                                is_finished: res.data.is_finished
                            })
                            i++;
                        })
                    });
                } else {
                    top.location.href = '<?php echo site_url();?>';
                }
            } 
        })
    }

    function checkDocument(index) 
    {
        var v = data_course[index];
        console.log('type :', v.type);
        var reg = /SCORM/g;
        if (v.type.match(reg)) {
            var file = v.file;
            var file = encodeURI(v.file);
            var file_scorm = file.replace("<?php echo $this->config->item('api');?>/", "https://www.tescolotuslc.com:88/");

           // www.tescolotusl.com/storage/xxx 

            file_scorm = file;

            if (v.type == 'SCORM 1.2') {
                getScorm('1.2');
            } else {
                getScorm('2004');
            }

            $("#scorm").html('<iframe src=" ' + file_scorm +'" id="course-content" allowfullscreen webkitallowfullscreen mozallowfullscreen  frameborder="0" height="100%" width="100%" style=""></iframe>');
            $("#scorm").show();
            $("#center-menu").hide();
           // $("#right-menu").addClass('col-md-offset-4');
            $(".transfer").hide();
        }

        

    }

    function getCover(path) {
        <?php if ($this->config->item('version') == '3.5'):?>
            var file_path = path.replace("<?php echo $this->config->item('api');?>/", "<?php echo $this->config->item('path');?>/");
            //return file_path;
        <?php else:?>
            //return path;
        <?php endif;?>
        path = path.replace("<?php echo $this->config->item('api');?>/", "https://tescolotuslc.com/");
        return path;

    }

    
    function saveComplete() {
        console.log('save complete');
        var token =  JSON.parse(window.localStorage.getItem('token'));



        var data2 = {
            class_id: <?php echo $this->uri->segment(4);?>,
            course_id: <?php echo $this->uri->segment(3);?>,
            scorm_data: "",
        }

        $.ajax({
            url: '<?php echo $this->config->item('api');?>/api/log',
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            method: 'POST',
            data: {
                "token": token,
                "action": 'complete',
                "module": 'class',
                "data": JSON.stringify(data2),
            },
            success: function(res) {
                console.log("SENED COMPLETE");

                window.localStorage.removeItem('scorm-local-default');
            } 
        })
    }

    </script>


    <script src="<?php echo base_url();?>assets/player.js"></script>
    <script type="text/javascript">

    function getScorm(version) {
        if (version == '1.2') {
            var API = new playerAPI12();
            var sendData = false;

            setInterval(function() {



                if (API.LMSGetValue('cmi.core.lesson_status') == 'passed') {
                    if (!sendData) {
                        var token =  JSON.parse(window.localStorage.getItem('token'));

                        sendData = true;

                        var data2 = {
                            class_id: <?php echo $this->uri->segment(4);?>,
                            course_id: <?php echo $this->uri->segment(3);?>,
                            scorm_data: "",
                        }

                        $.ajax({
                            url: '<?php echo $this->config->item('api');?>/api/log',
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded",
                            },
                            method: 'POST',
                            data: {
                                "token": token,
                                "action": 'complete',
                                "module": 'class',
                                "data": JSON.stringify(data2),
                            },
                            success: function(res) {
                                window.localStorage.removeItem('scorm-local-default');
                            } 
                        })
                    }

                }
            }, 1000);
        } else {
            var data_s =  JSON.parse(window.localStorage.getItem('scorm-local-default'));

            console.log('data s :', data_s);

            var API2004 = new playerAPI2004();
            var sendData = false;
            setInterval(function() {
                console.log('data >>>>', API2004.GetValue('cmi.completion_status'), ' - ', API2004.GetValue('cmi.success_status'));

                if (API2004.GetValue('cmi.completion_status') == 'completed') {
                    if (!sendData) {
                        var token =  JSON.parse(window.localStorage.getItem('token'));

                        sendData = true;

                        var data2 = {
                            class_id: <?php echo $this->uri->segment(4);?>,
                            course_id: <?php echo $this->uri->segment(3);?>,
                            scorm_data: "",
                        }

                        $.ajax({
                            url: '<?php echo $this->config->item('api');?>/api/log',
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded",
                            },
                            method: 'POST',
                            data: {
                                "token": token,
                                "action": 'complete',
                                "module": 'class',
                                "data": JSON.stringify(data2),
                            },
                            success: function(res) {
                                console.log("SENED COMPLETE");

                                window.localStorage.removeItem('scorm-local-default');
                            } 
                        })
                    }


                }


            }, 1000);
        }
    }

        
    </script> 
