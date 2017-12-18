    <div class='container'>
        <div id="scorm" style="display: none; ">
        </div>

        <div id="vdo" style="display: none; margin-top: 5%;">
        </div>

        <div id="pdf" style='display: none; overflow: scroll-x;'>
            <div class='transfer' style=""><img src="<?php echo base_url();?>assets/images/loading.gif" style='margin: 0 auto; display: block;'></div>

            <div id="show_pdf" style="display: none;">
                <div class='pull-left' style="flex-direction: column; width: 100%; float: left;">
                    <span style='font-size: 20px; color: #fff;'>หน้าที่ : <span style='font-size: 20px; color: #fff;' class="page_num"></span> / <span style='font-size: 20px; color: #fff;' class="page_count"></span></span>
                </div>

                <canvas id="the-canvas" style="flex-direction: column; width: 100%; clear: both;"><h1 class='color: #fff; font-size: 25px;'>Loading...</h1></canvas>

                <div class='pull-left' style="flex-direction: column; width: 100%; float: left;">
                    <span style='font-size: 20px; color: #fff;'>หน้าที่ : <span style='font-size: 20px; color: #fff;' class="page_num"></span> / <span style='font-size: 20px; color: #fff;' class="page_count"></span></span>
                </div>
            </div>

        </div>
    </div>

    <div id="footer" style=''>
        <div class='container'>
            <div class='row'>
                <div class='col-md-4' id="left-menu">
                    <button class='btn btn-default btn-sm' style="font-size: 20px;" id="documents-prev"><i class='fa fa-chevron-left'></i> เอกสารก่อนหน้า</button> 
                    <button class='btn btn-default btn-sm' style="font-size: 20px;" id="documents-next"> เอกสารถัดไป <i class='fa fa-chevron-right'></i></button> 
                </div>

                <div class='col-md-4' style="text-align: center;" id="center-menu">
                    <button class='btn btn-default' style="font-size: 20px;" id="document-prev"><i class='fa fa-chevron-left'></i> หน้าก่อนหน้า</button> 
                    <button class='btn btn-default' style="font-size: 20px;" id="document-next"> หน้าถัดไป <i class='fa fa-chevron-right'></i></button> 
                </div>

                <div class='col-md-4' id="right-menu">
                    <button class='btn btn-default pull-right' style="font-size: 20px;" id="documents"> สารบัญ <i class='fa fa-list-ul'></i> </button> 
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-close'></i></button>
                    <h4 class="modal-title" id="myModalLabel">สารบัญ</h4>
                </div>
                <div class="modal-body" id="list-documents">
                    <div class="list-group">
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    var base_url = '<?php echo site_url();?>/';
    
    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>
    <script src="<?php echo base_url();?>assets/player.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.211/pdf.min.js"></script>
    
    <script>

    var data = JSON.parse(window.localStorage.getItem('data'));
    var step_documents = 0;
    var total_documents = 0;

    $.map(data.format, function(obj) {
        if (obj.id == <?php echo $this->uri->segment(3);?>) {

            $.each(obj.function, function(key, val) {
                if (val.id == <?php echo $this->uri->segment(4);?> ) {  

                    


                    $.each(val.department, function(key_dep, valdep) {
                        if (valdep.id == <?php echo $this->uri->segment(5);?>) {


                            
                            
                            $.each(valdep.course, function(key_course, val_course) {



                                
                                
                                if (val_course.id == <?php echo $this->uri->segment(6);?>) {
                                    total_documents = val_course.document.length;


                                    var reg = /SCORM/g;
                                    

                                    if (val_course.type.match(reg)) {
                                        $("#scorm").html('<iframe src=" ' + val_course.document[0].file[0].file +'" id="course-content" frameborder="0" height="100%" width="100%" style="height: 800px;"></iframe>');
                                        $("#scorm").show();
                                        $("#center-menu").hide();
                                        $("#right-menu").addClass('col-md-offset-4');
                                    }

                                    if (val_course.type == 'Normal') {

                                        var file = val_course.document[0].file[0].file;
                                        var reg = /\.[mp4]+$/g;

                                        if (file.match(reg)) {

                                            $("#vdo").show();
                                            $("#vdo").html('<iframe src=" ' + val_course.document[0].file[0].file +'" id="course-content" frameborder="0" height="100%" width="100%" style="height: 600px;"></iframe>');
                                            $("#footer").show();
                                            $("#center-menu").hide();
                                            $("#right-menu").addClass('col-md-offset-4');

                                        } else {
                                            $("#pdf").show();
                                            $("#pdf").css({
                                                
                                            });
                                            $("#center-menu").show();
                                            $("#right-menu").removeClass('col-md-offset-4');

                                            getDocument(val_course.document);
                                        }



                                        
                                    }

                                    // list document
                                    $("#list-documents > .list-group").html('');
                                    var html = '';
                                    $.each(val_course.document, function(k, v) {
                                        html = '<a href="#" onclick="changeDocument(' + k + ')" class="list-group-item"><i class="fa fa-book"></i> ' + v.title + '</a>';
                                        $("#list-documents > .list-group").append(html);

                                    });
                                }
                            });
                        }
                    });
                }
            });
        }
    });

    function changeDocument(k_index)
    {
        step_documents = k_index;

        $(".transfer").show();

        $("#scorm").hide();
        $("#scorm").html('');

        $("#vdo").hide();
        $("#vdo").html('');

        $("#pdf").hide();

       $.map(data.format, function(obj) {
            if (obj.id == <?php echo $this->uri->segment(3);?>) {

                $.each(obj.function, function(key, val) {
                    if (val.id == <?php echo $this->uri->segment(4);?> ) {  

                        


                        $.each(val.department, function(key_dep, valdep) {
                            if (valdep.id == <?php echo $this->uri->segment(5);?>) {


                                
                                
                                $.each(valdep.course, function(key_course, val_course) {


                                    
                                    
                                    if (val_course.id == <?php echo $this->uri->segment(6);?>) {

                                        var reg = /SCORM/g;
                                        

                                        if (val_course.type.match(reg)) {
                                            $("#scorm").html('<iframe src=" ' + val_course.document[k_index].file[0].file +'" id="course-content" frameborder="0" height="100%" width="100%" style="height: 800px;"></iframe>');
                                            $("#scorm").show();
                                            $("#center-menu").hide();
                                            $("#right-menu").addClass('col-md-offset-4');
                                        }

                                        if (val_course.type == 'Normal') {

                                            var file = val_course.document[k_index].file[0].file;
                                            var reg = /\.[mp4]+$/g;

                                            if (file.match(reg)) {

                                                $("#vdo").show();
                                                $("#vdo").html('<iframe src=" ' + val_course.document[k_index].file[0].file +'" id="course-content" frameborder="0" height="100%" width="100%" style="height: 600px;"></iframe>');
                                                $("#footer").show();
                                                $("#center-menu").hide();
                                                $("#right-menu").addClass('col-md-offset-4');

                                            } else {
                                                $("#pdf").show();
                                                $("#pdf").css({
                                                    
                                                });
                                                $("#center-menu").show();
                                                $("#right-menu").removeClass('col-md-offset-4');

                                                getDocument(val_course.document, k_index);
                                            }



                                            
                                        }

                                        
                                    }
                                });
                            }
                        });
                    }
                });
            }
        });
       $("#myModal").modal('hide');
    }

    var pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null,
            scale = 2,
            canvas = document.getElementById('the-canvas'),
            ctx = canvas.getContext('2d');
        

    function getDocument(documents, index = 0) {
        $("#footer").show();
        $("#show_pdf").show();
        //$('.transfer').hide();
        setTimeout(function() {
            $('.transfer').hide();
        }, 3000);


        // If absolute URL from the remote server is provided, configure the CORS
        // header on that server.
        var url = documents[index].file[0].file;

        

        // The workerSrc property shall be specified.
        PDFJS.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.211/pdf.worker.min.js';

        
        
        var loadingTask = PDFJS.getDocument(url);
        loadingTask.onProgress = function(progress) {
            //$("#footer").hide();
            
            $("#the-canvas").show();
        }

        



        loadingTask.promise.then(function(pdf) {
            this._disableRange = true;
            $('.transfer').hide();
            $("#the-canvas").show();
            
            pdfDoc = pdf;
            $(".page_count").html(pdfDoc.numPages);
            pageNum = 1;
            queueRenderPage(1);
             $(".page_num").html("1");
        }, function (reason) {
            $('.transfer').hide();
        });


        
    }


    /**
    * Get page info from document, resize canvas accordingly, and render page.
    * @param num Page number.
    */
    function renderPage(num) {
        pageRendering = true;
        // Using promise to fetch the page
        pdfDoc.getPage(num).then(function(page) {
            var viewport = page.getViewport(scale);
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render PDF page into canvas context
            var renderContext = {
            canvasContext: ctx,
            viewport: viewport
            };
            var renderTask = page.render(renderContext);

            // Wait for rendering to finish
            renderTask.promise.then(function() {
            pageRendering = false;
            if (pageNumPending !== null) {
                // New page rendering is pending
                renderPage(pageNumPending);
                pageNumPending = null;
            }
            });
        });

        // Update page counters
        //document.getElementById('page_num').textContent = pageNum;
        $(".page_num").html(pageNum);
    }

    /**
    * If another page rendering in progress, waits until the rendering is
    * finised. Otherwise, executes rendering immediately.
    */
    function queueRenderPage(num) {
    if (pageRendering) {
        pageNumPending = num;
    } else {
        renderPage(num);
    }
    }

    /**
    * Displays previous page.
    */
    function onPrevPage() {
    if (pageNum <= 1) {
        return;
    }
    pageNum--;
    queueRenderPage(pageNum);
    }

    $("#document-prev").on('click', function() {
        onPrevPage();
         $("html, body").animate({ scrollTop: 0 }, 1000);
    })

    $("#document-next").on('click', function() {
        onNextPage();
         $("html, body").animate({ scrollTop: 0 }, 1000);
    })
    //document.getElementById('prev').addEventListener('click', onPrevPage);

    /**
    * Displays next page.
    */
    function onNextPage() {
    if (pageNum >= pdfDoc.numPages) {
        return;
    }
    pageNum++;
    queueRenderPage(pageNum);
    }
    //document.getElementById('next').addEventListener('click', onNextPage);

    $("#documents").on('click', function() {
        $("#myModal").modal('show');
    });

    $("#documents-prev").on('click', function() {
        var step = step_documents - 1;
        if (step_documents <= 0) {
            changeDocument(0);
        } else {
            changeDocument(step);
        }
    })


    $("#documents-next").on('click', function() {
        var step = step_documents + 1;

        console.log(step, total_documents);


        if (step < total_documents) {
            changeDocument(step);
        }
       
    })



    
    </script>
        