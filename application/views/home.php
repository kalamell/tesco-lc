
	<div class='container'>
		<div class='row'>
			<div class="col-md-4 col-md-offset-4 col-sm-12">
				<img src="<?php echo base_url('assets/images/header.png');?>" class='img-responsive' alt="" style='margin: 0 auto;'>
			</div>
		</div>

		<div class='row'>
			<div class='col-md-4'>
				<h2>เลือกฟอร์แมท ( Format ) ของคุณ</h2>
				<div class='list-group' id="format">
				</div>

			</div>

			<div class='col-md-8'>
				<h2>ความเคลื่อนไหววันนนี้</h2>

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				
				</div>
			</div>
		</div>
	</div>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>
    <script>
		var data = JSON.parse(window.localStorage.getItem('data'));
		var welcome = JSON.parse(window.localStorage.getItem('welcome'));
		$("div.list-group").html('<a href="#" class="list-group-item">Loading...</a>');

		if (data == null) {
			top.location.href = '<?php echo site_url('auth/logout');?>';
		}

		setTimeout(function() {
			$("div.list-group").html('');
			$.each(data.format, function(key, value) {
				var title = value.title;
				var id = value.id;
				var html = '<a href="<?php echo site_url();?>/format/id/' + id + '" class="list-group-item"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;' + title + '</a>';
				$(html).appendTo($("#format"));
			});
		}, 0);

		$.each(welcome, function(key, value) {
			var name = value.name;
			var desc = value.description;
			var html =  '<div class="panel panel-default">';
				html += '<div class="panel-heading" role="tab" id="heading' + key + '">';
				html += '<h4 class="panel-title">'
				html += '<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse' + key + '" aria-expanded="true" aria-controls="collapse' + key + '"><i class="glyphicon glyphicon-tree-deciduous"></i> ' + name + '</a></h4>';
				html += '</div>';
				html += '<div id="collapse' + key +'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' + key + '">';
				html += '<div class="panel-body">' + desc + '</div></div></div>';
			$("#accordion").append(html);

		});

		
		
	</script>
</body>

</html>