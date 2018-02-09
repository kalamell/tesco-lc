
	<div class='container-fluid'>
        
        <div class='row'>
            <div class='col-md-12'>
                <h2 style="" id="title"></h2>
            </div>
        </div>

        <div class='container'>
            <div class='row'>
                <div class='col-md-3 col-xs-12' style="background-color: #009688; color: #fff; font-size: 16px; text-align: center;">ข้อ <span id="page">?</span> / <span id="total">?</span></div>
                <div class='col-md-9 col-xs-12'>
                    <div class="row">
                        <div class="col-md-12 col-xs-12 box-main" style="">
                             <div  id="answer"></div>
                        </div>
                    </div>

                    
                </div>
                
                
            </div>
            <div class='row'>
                <button class='btn btn-success col-md-4 col-md-offset-3' style="display: none; font-size: 16px;" id="answer_prev" style="font-size: 16px;"><i class='fa fa-chevron-circle-left'></i> ข้อก่อนหน้า</button>
                <button class='btn btn-success col-md-4 col-md-offset-6' id="answer_data" style="font-size: 16px;">ตอบ</button>
            </div>

        </div>


    </div>  

    <!-- Modal -->
    <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                <h4 class="modal-title" id="myModalLabel">ผลการสอบ</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <a href="<?php echo site_url('testing');?>" type="button" class="btn btn-primary" id=""><i class="fa fa-home"></i> กลับหน้าแรก</a>
            </div>
            </div>
        </div>
    </div>


    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.7/js/jquery.fancybox.min.js"></script>
    <script>var b_url = '<?php echo site_url();?>';</script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/script.js"></script>

    <script type="text/javascript">
    var testing = JSON.parse(window.localStorage.getItem('testing'));
    var page = 1;
    var total_page = 0;
    $("#page").html(page);
    var inx = 0;
    var testing_data = [];
    var target_percentage = 0;  

    $.each(testing.testing, function(key, val) {
        if (val.id == <?php echo $this->uri->segment(3);?>) {
            

           target_percentage = val.target_percentage;

           testing_data = val.question;

          

           if (val.is_random_question == true) {
                shuffle(testing_data);
                console.log('random');
            }


            

            inx = key;
            total_page = val.question.length;
            $("#total").html(total_page);
            $("#title").html(val.title);


            $.each(val.question, function(inx, vq) {

                
                var id = inx + 1;
                var title = vq.description;
                var type = vq.type;
                var cover = vq.cover;
                var weight = vq.weight;
                var question_id = vq.id;
                var active = inx == 0 ? 'active': '';
                $("#answer").append('<div class="box-answer ' + active + '" data-id="' + id + '" id="step-' + id +'"></div>');

                $("#answer #step-" + id ).append('<h3 class="title-choice">' + title + '</h3>');

                if (cover !== null ) {
                    $("#answer #step-" + id ).append('<p><a href="' + cover + '" class="fancybox"><img class="img-responsive" style="width: 200px;" src="' + cover + '" /> <font color="red" style="font-size: 16px;">** คลิกที่รูปเพื่อขยายภาพ</font></a></p>');
                }

                if (vq.is_random_answer == true) {
                    shuffle(vq.answer);
                }

                console.log(vq);


                setTimeout(function() {


                    if (type == 'abcd') {
                        abcd(vq.answer, id, weight, question_id);
                    }

                    if (type == 'yes/no') {
                        yesno(vq.correct_answer, id, weight, question_id);
                    }

                }, 300);
            });

            //return false;
        }
    });

    function abcd(answer, inx, weight, question_id) {
        
        var html = '<ol class="abcd">';
        var choice = ['ก.) ','ข.) ', 'ค.) ', 'ง.) ']
        $.each(answer, function(key, val) {
           console.log(val);
            html +='<li>';
            html +='<label id="choice' + inx + key + '" style="cursor: pointer; padding-bottom: 5px;"><input type="radio" data-question="' + question_id +'" data-type="abcd" data-weight="' + weight +'" id="choice'+inx + key +'" name="choice' + inx + '" value="' + val.is_correct + '"/> ' + choice[key] + val.text;
//            html +='</label>';
            html +=' <<< ' + val.is_correct+'</label>';
            html +='</li>';
        });
        html +='</ol>';
        $("#answer #step-" + inx).append(html);

    }

    function yesno(answer, inx, weight, question_id) {
        
        var html = '<ol class="abcd">';
        var ans1 = 'true';
        var ans2 = 'false';
        if (answer == true) {
            ans1 = 'true';
            ans2 = 'false';
        } else {
            ans1 = 'false';
            ans2 = 'true';
        }
        html +='<li>';
        html +='<label style="cursor: pointer"><input type="radio" data-type="yes/no" data-question="' + question_id +'"  data-weight="' + weight + '" name="choice' + inx + '" value="' + ans1 + '"/> ใช่';
        html +='</label>';
        html +='</li>';

        html +='<li>';
        html +='<label style="cursor: pointer"><input type="radio" data-type="yes/no" data-question="' + question_id +'"  data-weight="' + weight + '"  name="choice' + inx + '" value="' + ans2 + '"/> ไม่ใช่';
        html +='</label>';
        html +='</li>';

        html +='</ol>';

        $("#answer #step-" + inx).append(html);

    }

    function shuffle(array) {
      var random = array.map(Math.random);
      array.sort(function(a, b) {
        return random[array.indexOf(a)] - random[array.indexOf(b)];
      });
    }

    
    $("#answer_prev").on('click', function() {
        if (page>0) {
            page--;
        }

        $("#page").html(page);
        $(".box-answer").removeClass('active');
        $("#step-" + page).addClass('active');

        if (page==1) {
            $("#answer_prev").hide();
            $("#answer_data").removeClass('col-md-offset-1');
            $("#answer_data").addClass('col-md-offset-6');
        }

    })

    $("#answer_data").on('click', function() {
        var id = $(".box-answer.active").data('id');
        if ($('.box-answer.active input[type=radio]:checked').size()==0) {
             $("#myModal2").modal('show');
            return false;
        }

        page++;

        if (page > testing_data.length) {
            sendTesting();
            $("#answer_data").prop('disabled', true);
            $("#answer_data").html('กำลังตรวจคำตอบของท่านกรุณารอสักครู่');
            return false;
        } else {
            if (page <= testing_data.length) {
                $("#page").html(page);
                $(".box-answer").removeClass('active');
                $("#step-" + page).addClass('active');
                $("#answer_prev").show();
                $("#answer_data").removeClass('col-md-offset-6');
                $("#answer_data").addClass('col-md-offset-1');
            }
        }

    });

    function sendTesting()
    {
        $("#myModal").modal('show');

        
    }



    $("#myModal").on('show.bs.modal', function(e) {
        var total = 0;

        var data_choise = [];
        $.each($('input[type=radio]:checked'), function(key, val) {
            var weight = $(val).attr('data-weight');
            var type = $(val).attr('data-type');
            var question_id = $(val).attr('data-question');

            console.log(weight, type, question_id);
            var correct = false;
            if ($(val).val() == 'true') {
                total++;
                correct = true;
            }

            var value = {
                question_id: question_id,
                answer_id: key,
                is_correct: correct,
                type: type,
                weight: weight,
                time_spent: 25
            }
            data_choise.push(value);

        });
        
        var testing_score = parseInt(total) / parseInt(total_page);
        testing_score = testing_score * 100;        
        var color = 'red';
        var title = 'เสียใจด้วยคุณยังสอบไม่ผ่านวิชานี้';
        var title2 = 'ไม่ผ่านเกณฑ์คะแนน';
        var src = "<?php echo base_url('assets/images/TryAgain.png');?>";
        if (parseFloat(testing_score) >= parseFloat(target_percentage)) {
            color = 'green';
            title = 'ยินดีด้วยคุณสอบผ่านวิชานี้';
            title2 = 'ผ่านเกณฑ์คะแนน';
            src = "<?php echo base_url('assets/images/GoodJob.png');?>";
        }


        var img = '<img style="" class="h-img" src="' + src + '" />';
        $(".modal-body").append('<p style="text-align: center;">' + img + '</p>');

        $(".modal-body").append('<h1 class="h-testing" style="text-align: center; color:' + color +'">' + title + '</h1>');

        var msg = '<p style="text-align: center; font-size: 1.2em; font-weight: bold;">คุณทำได้ <font style="color:' + color + '; font-weight: bold;">' + total + '</font> คะแนน จากทั้งหมด <font style="color:' + color + '; font-weight: bold;">' + total_page + '</font> คะแนน คิดเป็น <font style="color:' + color + '; font-weight: bold;">' + testing_score.toFixed(2) +'%</font></p>';
        $(".modal-body").append(msg);

        msg = '<p style="text-align: center; font-size: 1.1em; font-weight: bold;">จำนวนคำถามทั้งหมด <font style="color:' + color + '; font-weight: bold;">' + total_page + '</font> ข้อ</p>';
        $(".modal-body").append(msg);
        msg = '<p style="text-align: center; font-size: 1.1em; font-weight: bold;"><font style="color:' + color + '; font-weight: bold;">' + title2 + ' ' + target_percentage + '%</font></p>';
        $(".modal-body").append(msg);


        var token =  JSON.parse(window.localStorage.getItem('token'));

        var data_val = {
            user_id: "<?php echo $this->session->userdata('id');?>",
            course_id: "<?php echo $this->uri->segment(4);?>",
            testing_id: "<?php echo $this->uri->segment(3);?>",
            target_percentage : target_percentage,
            is_success: true,
            answer_data: data_choise

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
                "module": 'testing',
                "data": JSON.stringify(data_val),
            },
            success: function(res) {
                
                listTesting();
            } 
        }) 



    });

    function listTesting()
    {
        var user_id = <?php echo $this->session->userdata('id');?>;
        var token = "<?php echo $this->session->userdata('token');?>";
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
            }
        })
        
    }

    $(function() {
        $(".fancybox").fancybox();
    })


</script>

<!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-window-close"></i></button>
                <h4 class="modal-title" id="">คำเตือน</h4>
            </div>
            <div class="modal-body" style="font-size: 16px;">
                กรุณาเลือกคำตอบ
            </div>
            <div class="modal-footer" style="text-align: right;">
                <button type="button" style="" data-dismiss="modal" class="btn btn-success"> ตกลง</button>
            </div>
            </div>
        </div>
    </div>

    
</body>


</html>