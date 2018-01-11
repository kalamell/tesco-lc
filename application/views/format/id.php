
	<div class='container-fluid'>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url();?>">Format</a></li>
            <li class="active">?</li>
        </ol>
	</div>

    <div class='container'>
        <div class='row' id="main">
            <p>Loading...</p>
        </div>

        <hr />

        <div class='row' id="additional">
            <p>Loading...</p>
        </div>
    </div>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>
    <script>
        var data = JSON.parse(window.localStorage.getItem('data'));
        $.map(data.format, function(obj) {
            if (obj.id == <?php echo $this->uri->segment(3);?>) {
                $("li.active").text(obj.title);

                $.each(obj.function, function(key, val) {
                    var html =  '<div class="col-md-2 col-sm-3 col-xs-6">';
                        html += '<a href="<?php echo site_url('format/id/'.$this->uri->segment(3));?>/' + val.id + '" class="box" style="background-color: ' + val.color + '">';
                        html +=  '<img src="' + val.cover + '" class="img-responsive"/>';
                        html += '<p>' + val.title + ' <br>( ' + val.department.length + ' )</p>';
                        html += '</a>';
                        html += '</div>';
                    
                    if (val.subject_type =='main subject') {
                        $(html).appendTo($('#main'));
                    } else {
                        $(html).appendTo($('#additional'));
                    }
                });
            }
        });

    </script>
</body>


</html>