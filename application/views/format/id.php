
	<div class='container-fluid'>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url();?>">Format</a></li>
            <li class="active">?</li>
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

        <hr />

        <div class='row' id="additional">
            <p>Loading...</p>
        </div>
    </div>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>
    <script>var b_url = '<?php echo site_url();?>';</script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/script.js"></script>
    <script>
        

        var data = JSON.parse(window.localStorage.getItem('data'));
        $.map(data.format, function(obj) {
            if (obj.id == <?php echo $this->uri->segment(3);?>) {
                $("li.active").text(obj.title);

                $.each(obj.function, function(key, val) {
                    var html =  '<div class="col-md-2 col-sm-3 col-xs-4 box2">';
                        html += '<a href="<?php echo site_url('format/id/'.$this->uri->segment(3));?>/' + val.id + '" class="box" style="background-color: ' + val.color + '">';
                        html +=  '<img src="' + getCover(val.cover) + '" class="img-responsive"/>';
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

        $("a.btn-back").on('click', function() {
            top.location.href = '<?php echo site_url();?>';
        })


        function getCover(path) {
            <?php if ($this->config->item('version') == '3.5'):?>
                var file_path = path.replace("<?php echo $this->config->item('api');?>/", "<?php echo $this->config->item('path');?>/");
                return file_path;
            <?php else:?>
                return path;
            <?php endif;?>

        }

    </script>
</body>


</html>