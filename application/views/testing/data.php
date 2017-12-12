<p class='msg' style="font-size: 22px;"> ? </p>
<p class='score'  style="font-size: 22px;"> ? </p>

<br><br><br>

<script type="text/javascript">
	var testing = JSON.parse(window.localStorage.getItem('testing'));
	$.each(testing.testing, function(key, val) {
       if (val.id == <?php echo $this->uri->segment(3);?>) {
       	$("p.msg").html(val.description);
       	$("p.score").html('จำนวนคำถาม ' + val.question.length +' ข้อ เกณฑ์คะแนน ' + val.target_percentage + '%');
       	var href = '<?php echo site_url();?>/testing/id/' + val.id;
       	$("#gototesting").attr('href', href);
       	$("#myModalLabel").html(val.title);
       }
    });
</script>