
	<div class='container'>
        <div class='row' style="margin-bottom: 50px;">
            <div class="col-md-4 col-md-offset-4 col-sm-12">
                <img src="<?php echo base_url('assets/images/testing.png');?>" class='img-responsive' alt="" style='margin: 0 auto;'>
            </div>

        </div>

        <div class='row'>
            <div class='col-md-12'>
                <h2 style="text-align: center;">กรุณาเลือกข้อสอบ</h2>
            </div>
            <div class="col-md-8 col-md-offset-2 col-sm-12">
               <div class='list-group' id="testing">
                   <li class='list-group-item' style="font-size: 20px;">กรุณารอสักครู่ ระบบกำลังเรียกข้อสอบมาให้ท่าน</li>
               </div>
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-window-close"></i></button>
                <h4 class="modal-title" id="myModalLabel">แบบข้อสอบ</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <a href="" type="button" class="btn btn-primary" id="gototesting"><i class="fa fa-edit"></i> ทำข้อสอบ</a>
            </div>
            </div>
        </div>
    </div>



    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>
    <script>var b_url = '<?php echo site_url();?>';</script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/script.js"></script>

    <script type="text/javascript">

        $(function() {
            getTesting();
        })
        
        function getTesting()
        {
            var user_id = <?php echo $this->session->userdata('id');?>;
            var token = "<?php echo $this->session->userdata('token');?>";
            var testing = JSON.parse(window.localStorage.getItem('testing'));


            if (testing == null) {
                window.localStorage.removeItem('testing');
                $.ajax({
                    url: '<?php echo $this->config->item('api');?>/api/testing/get',
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    method: 'POST',
                    data: {
                        token: token,
                        user_id: user_id
                    },
                    success: function(res) {
                        window.localStorage.removeItem('testing');
                        window.localStorage.setItem('testing', JSON.stringify(res));
                        $("#testing").html('');
                        if (res.status == true) {
                            $.each(res.testing, function(key, val) {
                                var href = '<?php echo site_url('testing');?>/data/' + val.id + '/' + val.course_id;

                                var html = '<a href="' + href +'" data-toggle="modal" data-remote="false" data-target="#myModal" class="list-group-item"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;' + val.title + '</a>';
                                $("#testing").append(html);
                            });
                        }
                    }
                })
            } else {
                $("#testing").html('');
                $.each(testing.testing, function(key, val) {
                    var href = '<?php echo site_url('testing');?>/data/' + val.id + '/' + val.course_id;
                    var html = '<a href="' + href +'"  data-toggle="modal" data-remote="false" data-target="#myModal" class="list-group-item"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;' + val.title + '</a>';
                    $("#testing").append(html);
                });
            }

        }

        $("#myModal").on('show.bs.modal', function(e) {
           // e.preventDefault();
            var link = $(e.relatedTarget);
            $(".modal-body").html('Loading...');
            $(this).find('.modal-body').load(link.attr('href'));
        });

        $("#gototesting").on('click', function() {
            $(this).prop('disabled', true);
            $(this).html('กรุณารอสักครู่...');
        })

    </script>
    
</body>


</html>