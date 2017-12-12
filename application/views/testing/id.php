
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

                <button class='btn btn-success col-md-4 col-md-offset-6' id="answer_data" style="font-size: 22px;">ตอบ</button>
                
            </div>
        </div>


    </div>  


    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>

    <script type="text/javascript">
    var testing = JSON.parse(window.localStorage.getItem('testing'));
    var page = 1;
    var total_page = 0;
    $("#page").html(page);
    var inx = 0;
    var testing_data = [];

    $.each(testing.testing, function(key, val) {
        if (val.id == <?php echo $this->uri->segment(3);?>) {


            testing_data = val.question;            
            
            if (val.is_random_question == true) {
                shuffle(testing_data);
            }

            inx = key;
            total_page = val.question.length;
            $("#total").html(total_page);
            $("#title").html(val.title);
            var title = val.question[key].description;
            var type = val.question[key].type;
            var cover = val.question[key].cover;

            $("#answer").append('<h3 class="title-choice">' + title + '</h3>');

            if (cover !== null ) {
                $("#answer").append('<p><img class="img-responsive" src="' + cover + '" /></p>');
            }

            if (type == 'abcd') {
                abcd(val.question[key].answer);
            }

            /*
            $.each(val.question[key].answer, function(key_test, val_test) {

                return false;
            });
            */

            return false;
        }
    });

    function abcd(answer) {
        
        var html = '<ol class="abcd">';
        $.each(answer, function(key, val) {
            html +='<li>';
            html +='<label><input type="radio" name="choice' + key +'" value="' + val.is_correct + '"/> ' + val.text;
            html +='</label>';
            html +='</li>';
        });

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

    $("#answer_data").on('click', function() {
        if ($('input[type=radio]:checked').size()==0) {
            alert('กรุณาเลือกคำตอบ');
            return false;
        }

        answer.push($('input[type=radio]:checked').val());

        page++;

        if (page > total_page) {
            sendTesting();
            return false;
        }
        $("#page").html(page);

        var k = page - 1;

sendTesting();


        $("#answer").html('');

        $.each(testing_data, function(key, val) {
           if (key == k) {
                
                $("#title").html(val.title);
                var title = val.description;
                var type = val.type;
                var cover = val.cover;

                $("#answer").append('<h3 class="title-choice">' + title + '</h3>');

                if (cover !== null ) {
                    $("#answer").append('<p><img class="img-responsive" src="' + cover + '" /></p>');
                }

                if (type == 'abcd') {
                    abcd(val.answer);
                }
           }
        })        

    });

    function sendTesting()
    {
        console.log(answer);        
    }


</script>
    
</body>


</html>