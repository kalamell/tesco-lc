
	<div class='container-fluid'>
        
        <div class='row'>
            <div class='col-md-12'>
                <h2 style="" id="title"></h2>
            </div>
        </div>

        <div class='container'>
            <div class='row'>
                <div class='col-md-3' style="background-color: #009688; color: #fff; font-size: 24px; text-align: center;">ข้อ <span id="page">?</span> / <span id="total">?</span></div>
                <div class='col-md-9' id="answer">
                    
                </div>
                
                
            </div>
            <div class='row'>
                <button class='btn btn-success col-md-4 col-md-offset-3' style="display: none; font-size: 22px;" id="answer_prev" style="font-size: 22px;"><i class='fa fa-chevron-circle-left'></i> ข้อก่อนหน้า</button>
                <button class='btn btn-success col-md-4 col-md-offset-6' id="answer_data" style="font-size: 22px;">ตอบ</button>
            </div>

        </div>


    </div>  

    <!-- Modal -->
    <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                <h4 class="modal-title" id="myModalLabel">ตรวจคำตอบ</h4>
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
            console.log(val);
            

            target_percentage = val.target_percentage;

            testing_data = val.question;            
            
            if (val.is_random_question == true) {
                shuffle(testing_data);
            }

            inx = key;
            total_page = val.question.length;
            $("#total").html(total_page);
            $("#title").html(val.title);
            var title = val.question[0].description;
            var type = val.question[0].type;
            var cover = val.question[0].cover;

            $("#answer").append('<h3 class="title-choice">' + title + '</h3>');

            if (cover !== null ) {
                $("#answer").append('<p><a href="' + cover + '" class="fancybox"><img class="img-responsive" style="width: 200px;" src="' + cover + '" /></a></p>');
            }

            if (type == 'abcd') {
                abcd(val.question[0].answer);
            }

            if (type == 'yes/no') {
                yesno(val.question[0].correct_answer);
            }

            return false;
        }
    });

    function abcd(answer) {
        
        var html = '<ol class="abcd">';
        var choice = ['ก.) ','ข.) ', 'ค.) ', 'ง.) ']
        $.each(answer, function(key, val) {
            html +='<li>';
            html +='<label style="cursor: pointer"><input type="radio" name="choice" value="' + val.is_correct + '"/> ' + choice[key] + val.text;
            html +=' >> ' + val.is_correct + '</label>';
            html +='</li>';
        });

        html +='</ol>';

        $("#answer").append(html);

    }

    function yesno(answer) {
        
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
        html +='<label style="cursor: pointer"><input type="radio" name="choice" value="' + ans1 + '"/> ใช่';
        html +=' >> ' + answer + '</label>';
        html +='</li>';

        html +='<li>';
        html +='<label style="cursor: pointer"><input type="radio" name="choice" value="' + ans2 + '"/> ไม่ใช่';
        html +='</label>';
        html +='</li>';

        html +='</ol>';

        $("#answer").append(html);

    }

    function shuffle(array) {
      var random = array.map(Math.random);
      array.sort(function(a, b) {
        return random[array.indexOf(a)] - random[array.indexOf(b)];
      });
    }

    var answer = [];

    $("#answer_prev").on('click', function() {
        if (page > 0) {
            page--;
        }

        if (page>0) {
            $("#page").html(page);
        }

        var k = page;

        $("#answer").html('');

        $.each(testing_data, function(key, val) {
           if (key == k) {
                
                $("#title").html(val.title);
                var title = val.description;
                var type = val.type;
                var cover = val.cover;

                $("#answer").append('<h3 class="title-choice">' + title + '</h3>');

                 if (cover !== null ) {
                    $("#answer").append('<p><a href="' + cover + '" class="fancybox"><img class="img-responsive" style="width: 200px;" src="' + cover + '" /></a></p>');
                }

                if (type == 'abcd') {
                    abcd(val.answer);
                }

                if (type == 'yes/no') {
                    yesno(val.correct_answer);
                }
           }
        })        
    })

    $("#answer_data").on('click', function() {
        if ($('input[type=radio]:checked').size()==0) {
             $("#myModal2").modal('show');
            return false;
        }

        answer.push($('input[type=radio]:checked').val());

        page++;

        if (parseInt(page) > parseInt(total_page)) {
            sendTesting();
            $("#answer_data").prop('disabled', true);
            $("#answer_data").html('กำลังตรวจคำตอบของท่านกรุณารอสักครู่');
            return false;
        }

        $("#page").html(page);

        var k = page - 1;

        $("#answer").html('');

        if (k > 0 ) {
            $("#answer_prev").show();
            $("#answer_data").removeClass('col-md-offset-6');
            $("#answer_data").addClass('col-md-offset-1');
        } else {
            $("#answer_prev").hide();
            $("#answer_data").removeClass('col-md-offset-1');
            $("#answer_data").addClass('col-md-offset-6');
        }


       // console.log(k);

        $.each(testing_data, function(key, val) {
           if (key == k) {
                
                $("#title").html(val.title);
                var title = val.description;
                var type = val.type;
                var cover = val.cover;

                $("#answer").append('<h3 class="title-choice">' + title + '</h3>');

                if (cover !== null ) {
                    $("#answer").append('<p><a href="' + cover + '" class="fancybox"><img class="img-responsive" style="width: 200px;" src="' + cover + '" /></a></p>');
                }

                if (type == 'abcd') {
                    abcd(val.answer);
                }

                if (type == 'yes/no') {
                    yesno(val.correct_answer);
                }
           }
        })        

    });

    function sendTesting()
    {
        $("#myModal").modal('show')     
    }

    $("#myModal").on('show.bs.modal', function(e) {
        var total = 0;
        $.each(answer, function(key, val) {
            
            if (val == 'true') {
                total++;
            }
        });

        var testing_score = parseInt(total) / parseInt(total_page);

        testing_score = testing_score * 100;
        
        var color = 'red';
        var title = 'เสียใจด้วยคุณยังสอบไม่ผ่านวิชานี้';
        var title2 = 'ไม่ผ่านเกณฑ์คะแนน';

        if (parseFloat(testing_score) >= parseFloat(target_percentage)) {
            color = 'green';
            title = 'ยินดีด้วยคุณสอบผ่านวิชานี้';
            title2 = 'ผ่านเกณฑ์คะแนน';
        }

        $(".modal-body").append('<h1 style="text-align: center; font-size: 40px; color:' + color +'">' + title + '</h1>');

        var msg = '<p style="text-align: center; font-size: 30px; font-weight: bold;">คุณทำได้ <font style="color:' + color + '; font-weight: bold;">' + total + '</font> คะแนน จากทั้งหมด <font style="color:' + color + '; font-weight: bold;">' + total_page + '</font> คะแนน คิดเป็น <font style="color:' + color + '; font-weight: bold;">' + testing_score +'%</font></p>';
        $(".modal-body").append(msg);

        msg = '<p style="text-align: center; font-size: 30px; font-weight: bold;">จำนวนคำถามทั้งหมด <font style="color:' + color + '; font-weight: bold;">' + total_page + '</font> ข้อ</p>';
        $(".modal-body").append(msg);

        console.log(target_percentage);

        msg = '<p style="text-align: center; font-size: 30px; font-weight: bold;"><font style="color:' + color + '; font-weight: bold;">' + title2 + ' ' + target_percentage + '%</font></p>';
        $(".modal-body").append(msg);

    });

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
            <div class="modal-body" style="font-size: 24px;">
                กรุณาเลือกคำตอบ
            </div>
            <div class="modal-footer" style="text-align: right;">
                <button type="button" style="" data-dismiss="modal" class="btn btn-success"><i class="fa fa-window-close"></i> ปิด</button>
            </div>
            </div>
        </div>
    </div>

    
</body>


</html>