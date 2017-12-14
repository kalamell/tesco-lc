    <div id="message_desc" style="padding-bottom: 50px;">
        <p class='description'></p>
    </div>

    

    <div id="users" style="display: none;">
       <h3><i class='fa fa-users'></i> ลงทะเบียนเรียนแบบกลุ่ม</h3>
        <form class="form-inline" id="frm_emp_id">
          <div class="form-group">
            <label for="emp_id" style="font-size: 20px;">เพิ่มผู้เรียน ใส่รหัสพนักงาน&nbsp;&nbsp;&nbsp;</label>
            <input type="text" class="form-control" id="emp_id" placeholder="" autocomplete="off" name="emp_id" style="width: 350px; font-size: 20px;">
          </div>
          
        </form>

        <br>


        <table class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th width="150">รหัสพนักงาน</th>
                    <th>ชื่อ</th>
                    <th width="60">&nbsp;</th>
                </tr>
            </thead>
            <tbody id="data-group">
                <tr>
                    <td><?php echo $this->session->userdata('employee_id');?></td>
                    <td><?php echo $this->session->userdata('name');?></td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
            
        </table>

    </div>

    
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
                                if (val_course.id == <?php echo $this->uri->segment(6);?>) {
                                    console.log(val_course);

                                    $("#myModalLabel").html('หลักสูตร :' + val_course.name);
                                    $("p.description").html('รายละเอียด :<br>' + val_course.description);
                                }
                            });
                        }
                    });
                }
            });
        }
    });

    $(function() {
        var token = JSON.parse(window.localStorage.getItem('token'));
        var format_id = "<?php echo $this->uri->segment("3");?>";
        var sub_id = "<?php echo $this->uri->segment("4");?>";
        var department_id = "<?php echo $this->uri->segment("5");?>";
        var course_id = "<?php echo $this->uri->segment("6");?>";            
        var user_id = <?php echo $this->session->userdata('id');?>;

        var users_group = [user_id];

        $("#create_single").on('click', function() {
           
            var users = [user_id];

            
            $("#create_single").prop('disabled', true);
            $("#create_single").html('กำลังดำเนินการรอสักครู่');   

            /*$.ajax({
                url: 'https://backend.tescolotuslc.com/learningcenter/api/class/create',
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                method: 'POST',
                data: {
                    token: token,
                    course_id: course_id,
                    user_id: user_id,
                    student_id_list: users
                },
                success: function(res) {
                    $("#create_single").html('สร้างหลักสูตรเรียบร้อย กำลังนำทางท่านไป');   
                    console.log(res);
                } 
            })*/
            setTimeout(function() {
                $("#create_single").html('สร้างหลักสูตรเรียบร้อย กำลังนำทางท่านไป'); 
                top.location.href = '<?php echo site_url('classroom/id/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/0001');?>';
            }, 1000);


        })

        $("#create_group").on('click', function() {
           // console.log('group');
           $("#users").show();
           $("#message_desc").hide();
           $("#create_single").hide();

           $("#create_group").hide();
           $("#save_group").show();
        })

        $("#save_group").on('click', function() {
            $("#save_group").prop('disabled', true);
            $("#save_group").html('กำลังดำเนินการรอสักครู่');   
            /*
            $.ajax({
                url: 'https://backend.tescolotuslc.com/learningcenter/api/class/create',
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
                    $("#save_group").html('สร้างหลักสูตรเรียบร้อย กำลังนำทางท่านไป');   
                    console.log(res);
                } 
            })*/
            setTimeout(function() {
                $("#create_single").html('สร้างหลักสูตรเรียบร้อย กำลังนำทางท่านไป'); 
                top.location.href = '<?php echo site_url('classroom/id/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/0001');?>';
            }, 1000);

        })

        $("#emp_id").on('keypress', function(e) {
            var id = $(this).val();
            var userid = '764' + id;
            var regId = /(isobar|admin)/g;
            
            if (id.match(regId)) {
                var userid = id;
            }

            if (e.which == 13) {
                $("#save_group").prop('disabled', true);
                $("tbody#data-group").append('<tr class="add-data"><td colspan="3">กำลังตรวจสอบข้อมูล</td></tr>');
                $.ajax({
                    url: 'https://backend.tescolotuslc.com/learningcenter/api/user/get',
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    method: 'POST',
                    data: {
                        token: token,
                        course_id: course_id,
                        user_company_id: userid,
                    },
                    success: function(res) {
                        $("#save_group").prop('disabled', false);
                        $("tr.add-data").remove();
                        $("#emp_id").val('');
                        $("#emp_id").focus();

                        if (res.status == true) {
                            users_group.push(res.user.id);

                            var html =  '<tr>';
                                html += '<td>' + res.user.company_id + '</td>';
                                html += '<td>' + res.user.firstname + ' ' + res.user.lastname + '</td>';
                                html += '<td><a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></td>';
                                html += '</tr>';

                            setTimeout(function() {
                                $(html).appendTo($("tbody#data-group"));
                            }, 0);
                        }
                    } 
                })
            }

        })

        $("#frm_emp_id").on('submit', function(e) {
            e.preventDefault();
        })

    })
    </script>
        