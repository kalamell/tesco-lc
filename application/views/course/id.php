
	<div class='container-fluid'>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url();?>">Format</a></li>
            <li><a class='id' href="<?php echo site_url('format/id/'. $this->uri->segment(3));?>"></a></li>
            <li><a class='sub' href="<?php echo site_url('format/id/'. $this->uri->segment(3).'/'.$this->uri->segment(4));?>"></a></li>
            <li class='active'>active</li>
        </ol>
	</div>


    <div class="container-fluid">
        <div class='row'>
            <div class='col-md-12'>
                <a class="btn btn-success btn-back" href="#" style="font-size: 30px; color: #fff;    background-color: #019b79;    border-color: #019b79;"><</a>
            </div>
        </div>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-window-close"></i></button>
                <h4 class="modal-title" id="myModalLabel">คำอธิบาย</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="create_single"><i class="fa fa-user"></i> ลงทะเบียนเรียนเดี่ยว</button>
                <?php 
                if ($this->uri->segment(4) != 65):?>
                    <button type="button" class="btn btn-success" id="create_group"><i class="fa fa-users"></i> ลงทะเบียนเรียนกลุ่ม</button>
                <?php endif;?>
                <button type="button" style="display: none; width: 200px;" class="btn btn-success" id="save_group"><i class="fa fa-floppy-o"></i> บันทึก</button>
            </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-window-close"></i></button>
                <h4 class="modal-title" id="myModalLabel">คำอธิบาย</h4>
            </div>
            <div class="modal-body">
                <p>ในช่วงที่ผ่านมา คุณได้ปฏิบัติงานอย่างถูกต้องใช่หรือไม่ ? </p>
                <div class="radio">
                    <label>
                        <input type="radio" name="learn" value="Y"> ใช่
                    </label>
                    
                </div>

                <div class="radio">
                    <label>
                        <input type="radio" name="learn" value="N"> ไม่ใช่
                    </label>
                </div>

                <div class="form-group" id="msg" style="display: none;">
                    <p>หากตอบไม่ใช่ จงอธิบาย</p>
                    <textarea name="msg" class="form-control" rows="5"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                
                <button type="button" style="width: 200px;" class="btn btn-success" id="save_group2"><i class="fa fa-floppy-o"></i> บันทึก</button>
            </div>
            </div>
        </div>
    </div>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>
    <script>var b_url = '<?php echo site_url();?>';</script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/script.js"></script>
    <script>

        $("a.btn-back").on('click', function() {
            top.location.href = '<?php echo site_url('format/id/'.$this->uri->segment(3).'/'.$this->uri->segment(4));?>';
        });

        $("input[name=learn]").on('click', function() {
            var val = $(this).val();
            if (val == 'N') {
                $("#msg").show();
            } else {
                $("#msg").hide();
            }
        });


        $("#save_group2").on('click', function() {
            var learn = $("input[name=learn]:checked").val();

            if (learn == 'N') {
                if ($("textarea[name=msg]").val() == '') {
                    $("textarea[name=msg]").focus();
                } else {
                    $("textarea").val('');
                    $("#myModal2").modal('hide');
                }
            } else {

                console.log('xx');
                $("#myModal2").modal('hide');
            }
        })


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
                                    var href = '<?php echo site_url('course');?>/data/' + obj.id + '/' + val.id + '/' + valdep.id + '/' + val_course.id;
                                    var html =  '<div class="col-md-2 col-sm-3  col-xs-6 box2" id="c' + val_course.id +'">';
                                    var target = "<?php echo $this->uri->segment(4) == '65' ? '#myModal2': '#myModal';?>";
                                    html += '<a data-toggle="modal" data-remote="false" data-target="' + target + '" href="' + href + '" class="book">';
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

    </script>
</body>


</html>