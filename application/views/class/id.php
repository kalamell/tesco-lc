    <div class='container'>
        <div id="scorm" style="display: none; ">
        </div>

        <div id="vdo" style="display: none; ">
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

    <div id="footer" style='display: none;'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-4'>
                    <button class='btn btn-default btn-sm' style="font-size: 20px;" id="document-"><i class='fa fa-chevron-left'></i> เอกสารก่อนหน้า</button> 
                    <button class='btn btn-default btn-sm' style="font-size: 20px;" id="document-"> เอกสารถัดไป <i class='fa fa-chevron-right'></i></button> 
                </div>

                <div class='col-md-4' style="text-align: center;">
                    <button class='btn btn-default' style="font-size: 20px;" id="document-prev"><i class='fa fa-chevron-left'></i> หน้าก่อนหน้า</button> 
                    <button class='btn btn-default' style="font-size: 20px;" id="document-next"> หน้าถัดไป <i class='fa fa-chevron-right'></i></button> 
                </div>

                <div class='col-md-4'>
                    <button class='btn btn-default pull-right' style="font-size: 20px;" id="documents"> <i class='fa fa-folder-open'></i> สารบัญ</button> 
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
                    
                </div>
                
            </div>
        </div>
    </div>

    var base_url = '<?php echo site_url();?>/';
    
    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>
    <script src="<?php echo base_url();?>assets/player.js"></script>
    <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
    
    <script>

    var data = JSON.parse(window.localStorage.getItem('data'));
    $.map(data.format, function(obj) {
        if (obj.id == <?php echo $this->uri->segment(3);?>) {

            $.each(obj.function, function(key, val) {
                if (val.id == <?php echo $this->uri->segment(4);?> ) {  

                    


                    $.each(val.department, function(key_dep, valdep) {
                        if (valdep.id == <?php echo $this->uri->segment(5);?>) {


                            
                            
                            $.each(valdep.course, function(key_course, val_course) {


                                
                                
                                if (val_course.id == <?php echo $this->uri->segment(6);?>) {

                                    console.log(val_course);
                                    

                                    if (val_course.type =='SCORM 1.2') {
                                        $("#scorm").html('<iframe src=" ' + val_course.document[0].file[0].file +'" id="course-content" frameborder="0" height="100%" width="100%" style="height: 800px;"></iframe>');
                                        $("#scorm").show();
                                    }

                                    if (val_course.type == 'Normal') {

                                        $("#pdf").show();
                                        $("#pdf").css({
                                            
                                        });

                                        getDocument(val_course.document);
                                    }
                                }
                            });
                        }
                    });
                }
            });
        }
    });

    var pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null,
            scale = 2,
            canvas = document.getElementById('the-canvas'),
            ctx = canvas.getContext('2d');
        

    function getDocument(documents) {
        $("#footer").show();
        

        // If absolute URL from the remote server is provided, configure the CORS
        // header on that server.
        var url = documents[0].file[0].file;

        

        // The workerSrc property shall be specified.
        PDFJS.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

        
        /**
        * Asynchronously downloads PDF.
        */
        //PDFJS.getDocument(url).then(function(pdfDoc_) {
        //pdfDoc = pdfDoc_;
        //document.getElementById('page_count').textContent = pdfDoc.numPages;
        //renderPage(pageNum);
        //});

        /*
        PDFJS.getDocument({ url: url }, false, null, function(progress) {
            console.log(progress)


            var percent_loaded = (progress.loaded/progress.total)*100;
            console.log(percent_loaded)
        }).then(function(pdfDoc_) {
            pdfDoc = pdfDoc_;
            //document.getElementById('page_count').textContent = pdfDoc.numPages;
            $(".page_count").html(pdfDoc.numPages);
            renderPage(pageNum);
        }).catch(function(err) {
            console.log(err);
        });
        */

        var loadingTask = PDFJS.getDocument(url);
        loadingTask.onProgress = function(progress) {
            $("#footer").hide();
        }
        loadingTask.promise.then(function(pdf) {
            $('.transfer').hide();
            $("#footer").show();
            $("#show_pdf").show();
            pdfDoc = pdf;
            $(".page_count").html(pdfDoc.numPages);
            renderPage(pageNum);
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
    })

    
    </script>
        