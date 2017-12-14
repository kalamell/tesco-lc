    <div class='container'>
        <div id="scorm" style="display: none; ">
        </div>

        <div id="vdo" style="display: none; ">
        </div>

        <div id="pdf" style='display: none; overflow: scroll;'>
            <div class='pull-left'>
                <button id="prev" class='btn btn-sm btn-info'>ก่อนหน้า</button>
                <button id="next" class='btn btn-sm btn-info'>ถัดไป</button>
                <br>
                <span style='font-size: 20px; color: #fff;'>หน้าที่ : <span style='font-size: 20px; color: #fff;' id="page_num"></span> / <span style='font-size: 20px; color: #fff;' id="page_count"></span></span>
            </div>
            <canvas id="the-canvas"><h1 class='color: #fff; font-size: 25px;'>Loading...</h1></canvas>
        </div>
    </div>

    <div id="footer" style='display: none;'>
        <button class='btn btn-info' id="document-prev">เอกสารก่อนหน้า</button> 
        <button class='btn btn-info' id="document-next"> เอกสารถัดไป </button> 
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
                                console.log(val_course);
                                
                                if (val_course.id == <?php echo $this->uri->segment(6);?>) {
                                    

                                    if (val_course.type =='SCORM 1.2') {
                                        $("#scorm").html('<iframe src=" ' + val_course.document[0].file[0].file +'" id="course-content" frameborder="0" height="100%" width="100%" style="height: 800px;"></iframe>');
                                        $("#scorm").show();
                                    }

                                    if (val_course.type == 'Normal') {

                                        getDocument(val_course.document);
                                        console.log(val_course);
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
            scale = 1.5,
            canvas = document.getElementById('the-canvas'),
            ctx = canvas.getContext('2d');
        

    function getDocument(documents) {
        $("#footer").show();
        console.log(documents);

        // If absolute URL from the remote server is provided, configure the CORS
        // header on that server.
        var url = documents[0].file[0].file;

        

        // The workerSrc property shall be specified.
        PDFJS.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

        
        /**
        * Asynchronously downloads PDF.
        */
        PDFJS.getDocument(url).then(function(pdfDoc_) {
        pdfDoc = pdfDoc_;
        document.getElementById('page_count').textContent = pdfDoc.numPages;

        // Initial/first page rendering
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
        document.getElementById('page_num').textContent = pageNum;
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
    document.getElementById('prev').addEventListener('click', onPrevPage);

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
    document.getElementById('next').addEventListener('click', onNextPage);

    

    
    </script>
        