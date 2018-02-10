
    
    <div class='container-fluid' id="screen">
        <div class='transfer' style="">
            <img src="<?php echo base_url();?>assets/images/loading_lotus.gif" style='margin: 0 auto; display: block;'>
            <p style="font-size: 16px; color: #fff; text-align: center;">กำลังโหลดข้อมูล / Loading</p>
        </div>
    </div>


    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-window-close"></i></button>
                <h4 class="modal-title" id="myModalLabel">คำอธิบาย / Description</h4>
            </div>
            <div class="modal-body">

                <p class="msg-survey"></p>
                
                <div class="radio">
                    <label>
                        <input type="radio" name="learn" value="Y"> ใช่ / Yes
                    </label>
                    
                </div>

                <div class="radio">
                    <label>
                        <input type="radio" name="learn" value="N"> ไม่ใช่ / No
                    </label>
                </div>

                <div class="form-group" id="msg" style="display: none;">
                    <p>หากตอบไม่ใช่ จงอธิบาย</p>
                    <textarea name="msg" class="form-control" rows="5"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                
                <button type="button" style="width: 200px;" class="btn btn-success" id="save_group2"><i class="fa fa-floppy-o"></i> เข้าสู่บทเรียน</button>
            </div>
            </div>
        </div>
    </div>


    
    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>
    <script>var b_url = '<?php echo site_url();?>';</script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/script.js"></script>
    <script>

        var user_id = <?php echo $this->session->userdata('id');?>;
        var token = JSON.parse(window.localStorage.getItem('token'));
        var users_group = [user_id];
        var course_id = '<?php echo $this->uri->segment(3);?>';
        var class_id = '';
        var survey_id = '';
        var body = '';
        var msg = '';
        
        $(function() {
            setTimeout(function() {
                createClass();
            }, 1000);

            $("input[name=learn]").on('click', function() {
                var val = $(this).val();
                if (val == 'N') {
                    $("#msg").show();
                } else {
                    $("#msg").hide();
                }
            });


            $("#save_group2").on('click', function() {
                var chk = $("input[name=learn]:checked").size();
                if (chk == 0) {
                    alert('กรุณาเลือก choice / Please choose choice');
                } else {

                    var learn = $("input[name=learn]:checked").val();

                    if (learn == 'N') {
                        if ($("textarea[name=msg]").val() == '') {
                            $("textarea[name=msg]").focus();
                            return;
                        } 
                    } 

                    saveSurvey(course_id, class_id, survey_id);

                    //top.location.href = '<?php echo site_url('classroom/annual');?>/'+ course_id + '/' + class_id;

                    
                }

            })

        })

        function createClass() {
            $.ajax({
                url: '<?php echo $this->config->item('api');?>/api/class/create',
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                method: 'POST',
                data: {
                    token: token,
                    course_id: course_id,
                    user_id: user_id,
                    student_id_list: users_group
                },
                success: function(res) {
                    $(".transfer").hide();
                    class_id = res.class_id;
                    if (res.is_survey) {
                        survey_id = res.survey_data[0].id;
                        body = res.survey_data[0].question;

                        $("p.msg-survey").html(body);
                        $("#myModal2").modal('show');

                    }


                    /*$("#save_group").html('สร้างหลักสูตรเรียบร้อย กำลังนำทางท่านไป');   
                    setTimeout(function() {
                        $("#create_single").html('สร้างหลักสูตรเรียบร้อย กำลังนำทางท่านไป'); 
                        top.location.href = '<?php echo site_url('classroom/id/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6));?>/' + res.class_id;
                    }, 1000);*/


                } 
            })
        }

        function saveSurvey(course_id, class_id, survey_id)
        {
            //https://tescolotuslc.com/learningcenter/api/log
            var text = '';
            var learn = $("input[name=learn]:checked").val();

            if (learn == 'N') {
                text = 'N (' + $("textarea").val();
            } else {
                text = 'Y';
            }

            var data_val = {
                user_id: "<?php echo $this->session->userdata('id');?>",
                course_id: course_id,
                survey_id: survey_id,
                answer_data: [ { id: survey_id, answer: body, text: text}]

            }
            $.ajax({
                url: '<?php echo $this->config->item('api');?>/api/log',
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                method: 'POST',
                data: {
                    token: token,
                    action: 'complete',
                    module: 'decoration_survey',
                    data: JSON.stringify(data_val),
                },
                success: function(res) {
                    top.location.href = '<?php echo site_url('classroom/annual');?>/'+ course_id + '/' + class_id;

                } 
            });
        }

        /*

        var link_data = '';

        $("#myModal").on('show.bs.modal', function(e) {
           // e.preventDefault();
            var link = $(e.relatedTarget);
            $("#save_group").hide();
            $("#save_group").prop('disabled', false);
            $("#save_group").html('<i class="fa fa-floppy-o"></i> บันทึก');

            $("#create_single").show();
            $("#create_group").show();
            $("#create_single").prop('disabled', false);
            $("#create_single").html('<i class="fa fa-user"></i> ลงทะเบียนเรียนเดี่ยว');
            $("#create_group").prop('disabled', false);
            $("#create_group").html('<i class="fa fa-users"></i> ลงทะเบียนเรียนกลุ่ม');

            $("#myModal .modal-body").html('Loading...');

            $(this).find('.modal-body').load(link.attr('href'));
        })


        $("#myModal2").on('show.bs.modal', function(e) {
           // e.preventDefault();
            link_data = $(e.relatedTarget);
            
        })



        $('#myModal2').on('hidden.bs.modal', function () {
            $('#myModal').modal('show');
            $("#myModal").find('.modal-body').load(link_data.attr('href'));
        });
        */

    </script>
</body>


</html>