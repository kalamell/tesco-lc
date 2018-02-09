    <div class='container-fluid' id="screen">
        <div class='transfer' style="">
            <img src="<?php echo base_url();?>assets/images/loading_lotus.gif" style='margin: 0 auto; display: block;'>
            <p style="font-size: 16px; color: #fff; text-align: center;">กำลังโหลดข้อมูล...</p>
        </div>


        <div id="scorm" style="display: none; ">
        </div>

        <div id="vdo" style="display: none; ">
        </div>


        <div id="html" style="display: none; ">
        </div>



        <div class='container'>

            <div id="pdf" style='display: none; overflow: scroll-x;'>
                
                <div id="show_pdf" style="">
                    <div class='pull-left' style="flex-direction: column; width: 100%; float: left;">
                        <span style='font-size: 16px; color: #fff;'>หน้าที่ : <span style='font-size: 16px; color: #fff;' class="page_num"></span> / <span style='font-size: 16px; color: #fff;' class="page_count"></span></span>
                    </div>

                    <canvas id="the-canvas" style="flex-direction: column; width: 100%; clear: both;"><h1 class='color: #fff; font-size: 16px;'>Loading...</h1></canvas>

                    
                </div>

            </div>
        </div>


        <div id="footer" style=''>
            <div class='container'>

                <div class="row" style="" id="center-menu">
                    <div class='col-md-6 col-xs-6' style="text-align: center;">
                        <button class='btn btn-default pull-left' style="font-size: 14px; margin-right: 10px" id="document-prev"><i class='fa fa-chevron-left'></i> <span>หน้าก่อนหน้า</span></button> 

                        <button class='btn btn-default pull-left' style="font-size: 14px;" id="document-next"> <span>หน้าถัดไป</span> <i class='fa fa-chevron-right'></i></button> 
                    </div>


                    <div class='col-md-6 col-xs-6'>

                        <div class='' style="flex-direction: column; width: 100%; text-align: right;">
                            <span style='font-size: 14px; color: #fff;'>หน้าที่ : <span style='font-size: 14px; color: #fff;' class="page_num"></span> / <span style='font-size: 14px; color: #fff;' class="page_count"></span></span>
                        </div>


                    </div>
                    
                </div>


                <div class='row' style="margin-top: 10px;">
                    <div class='col-md-4 col-xs-6' id="left-menu">
                        <button class='btn btn-default pull-left' style="margin-right: 10px; font-size: 14px; " id="documents-prev"><i class='fa fa-angle-double-left'></i> <span>เอกสารก่อนหน้า</span></button> 

                        <button class='btn btn-default' style="font-size: 14px; " id="documents-next"><span> เอกสารถัดไป</span> <i class='fa fa-angle-double-right'></i></button> 
                    </div>
        
                    <div class='col-md-4 col-xs-6' id="right-menu">
                    <button class='btn btn-default' style="font-size: 14px; background: grey;    color: #fff;    border: 1px solid #6b6b6b;" id="gotohome"><i class='fa fa-home'></i> <span>หน้าหลัก</span>  </button>  
                        <button class='btn btn-default' style="font-size: 14px; margin-right: 10px; background: grey;
    color: #fff;
    border: 1px solid #6b6b6b;" id="documents"><i class='fa fa-list-ul'></i> <span>สารบัญ </span> </button>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- 
        <div class='col-md-4' style="text-align: center;" id="center-menu">
                    <button class='btn btn-default' style="font-size: 14px;" id="document-prev"><i class='fa fa-chevron-left'></i> หน้าก่อนหน้า</button> 
                    <button class='btn btn-default' style="font-size: 14px;" id="document-next"> หน้าถัดไป <i class='fa fa-chevron-right'></i></button> 
                </div>
            -->

    


    <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-close'></i></button>
                    <h4 class="modal-title" id="myModalLabel">สารบัญ</h4>
                </div>
                <div class="modal-body fix" id="list-documents" style="overflow: scroll;">
                    <div class="list-group">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="close_modal"><i class="fa fa-times"></i> ปิดหน้าต่างนี้</button>
                </div>

                
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel2">คำอธิบาย</h4>
            </div>
            <div class="modal-body">
                <h2 style='color: #000;'>เรียนจบเรียบร้อย กรุณารอสักครู่</h2>
            </div>
            
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModalx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title" id="myModalLabel2">คำอธิบาย</h4>
                </div>
                <div class="modal-body">
                    <h2 style='color: #000;'>ขอขอบคุณที่ท่านกลับมาทบทวน</h2>
                </div>

                <!--<div class="modal-footer">
                    <a href="#" class="btn btn-success" id="create_groupx"><i class="fa fa-times"></i> ปิดหน้านี้</a>
                </div>-->
            
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-close'></i></button>
                    
                    <h4 class="modal-title" id="myModalLabel2">คำอธิบาย</h4>
                </div>
                <div class="modal-body">
                    <h2 style='color: #000;'>มีเอกสารชุดถัดไปที่ท่านยังเรียนไม่จบ ต้องการเรียนต่อหรือไม่</h2>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="next_course"><i class="fa fa-user"></i> เริ่มเรียนต่อไป</button>
                    <a href="<?php echo site_url();?>" class="btn btn-success" id="create_group"><i class="fa fa-home"></i> ออกจากระบบ</a>
                </div>
                
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModalExam" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                <h4 class="modal-title" id="myModalExamLabel">ผลการสอบ</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <a href="<?php echo site_url('format/id/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5));?>" type="button" class="btn btn-primary" id=""><i class="fa fa-home"></i> กลับหน้าแรก</a>
            </div>
            </div>
        </div>
    </div>


    
    
    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.211/pdf.min.js"></script>
    <script>var b_url = '<?php echo site_url();?>';</script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/script.js"></script>
    
    <script>

    var base_url = '<?php echo site_url();?>/';

    $("#gotohome").on('click', function() {
        top.location.href = '<?php echo site_url('format/id/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5));?>';
    });

    $(document).on('click', 'a.changeDocument',function() {
        var inx = $(this).attr('data-inx');
        var dis = $(this).hasClass('disabled');

        if (!dis) {
            changeDocument(inx);
            $("#myModal").modal('hide');
            return false;
        }

    })

    var data = JSON.parse(window.localStorage.getItem('data'));
    var step_documents = 0;
    var total_documents = 0;

    var step_documents

    checkCourse();

    var data_course = [];
    var index_course = 0;
    var document_finished_list = [];

    var current_time = 0;
    var duration_time = 0;

    var myindex = 0;

    var sendSuccess = false;

    var isScorm = false;
    var isHtml = false;

    var score = {};

    getData();
    function getData()
    {
        var i = 0;
         $.map(data.format, function(obj) {
            if (obj.id == <?php echo $this->uri->segment(3);?>) {
                $.each(obj.function, function(key, val) {
                    if (val.id == <?php echo $this->uri->segment(4);?> ) {              
                        $.each(val.department, function(key_dep, valdep) {
                            if (valdep.id == <?php echo $this->uri->segment(5);?>) {                  
                                $.each(valdep.course, function(key_course, val_course) {                     
                                    if (val_course.id == <?php echo $this->uri->segment(6);?>) {
                                        total_documents = 0;
                                        $.each(val_course.document, function(k, v) {
                                            $.each(v.file, function(k2, v2) {
                                                data_course.push({
                                                    k: i,
                                                    type: val_course.type,
                                                    doc_id: v.file[k2].id,
                                                    title: val_course.document[k].title + '<br><small>' + v2.title + '</span>',
                                                    file: v2.file,
                                                    page: 1,
                                                    read: 0,
                                                    is_finished: val_course.is_finished
                                                })
                                                i++;
                                            })
                                        });
                                    }
                                });
                            }
                        });
                    }
                });
            }
        });
    }

    setTimeout(function() {
        var disabled = '';
        $.map(data_course,function(v, inx) {


            disabled = data_course.is_finished == false || inx ==0  ? '': 'disabled';
            //onclick="changeDocument(' + inx + ')" 

            disabled = '';


            



            var ext = checkExtension(inx);



            if (ext =='swf' || ext =='html') {
                disabled = '';
            }

            html = '<a href="#" data-inx="' + inx + '" class="list-group-item changeDocument ' + disabled +'"><i class="fa fa-book"></i> ' + v.title + '</a>';


            

            

            $("#list-documents > .list-group").append(html);
        });

        if (data_course.length == 1) {
            $("#documents-next").hide();
        }

        if (data_course.length <= 1) {
            $("#left-menu").hide();
        }

        total_documents = data_course.length;


        checkDocument(0);

        setTimeout(function() {
            $("#myModal").modal('show');

            checkClassSuccess();

        }, 1000);


                



    }, 1000);


   function checkDocument(index)
   {
     var v = data_course[index];


      if (index > 0 && index < total_documents) {
            $("#documents-prev").show();
        }


        
    var reg = /SCORM/g;
    if (v.type.match(reg)) {
        var file = v.file;
        var file = encodeURI(v.file);
        var file_scorm = file.replace("https://backend.tescolotuslc.com/learningcenter/", "https://www.tescolotuslc.com:88/");

       // www.tescolotusl.com/storage/xxx 

        file_scorm = file;

        $("#scorm").html('<iframe src=" ' + file_scorm +'" id="course-content" allowfullscreen webkitallowfullscreen mozallowfullscreen  frameborder="0" height="100%" width="100%" style=""></iframe>');
        $("#scorm").show();
        $("#center-menu").hide();
       // $("#right-menu").addClass('col-md-offset-4');
        $(".transfer").hide();
    }

    if (v.type == 'Normal') {

        $(".transfer").hide();

        var file = encodeURI(v.file);
        var reg = /\.[mp4]+$/g;

       

        if (file.match(reg)) {

            $("#vdo").show();
           

            //$("#vdo").html('<iframe src=" ' + v.document[0].file[0].file +'" id="course-content" frameborder="0" height="100%" width="100%" style=""></iframe>');
        

            $("#vdo").html('<video controls="" id="video-active" autoplay="" name="media"><source src="' + file
            + '" type="video/mp4"></video>');

            $("#footer").show();
            $("#center-menu").hide();

            startTrack();


            //$("#right-menu").addClass('col-md-offset-4');

        } else {
            var reg = /\.[html]+$/g;
            if (file.match(reg)) {
                $("#html").show();
                $("#html").html('<iframe src=" ' + file +'" id="course-content" allowfullscreen webkitallowfullscreen mozallowfullscreen frameborder="0" height="100%" width="100%" style=""></iframe>');
                 $("#center-menu").hide();

                 data_course[index].read = 1;
                 data_course[index].page = 1;

                 checkClassSuccess(false);

              
                
            } else {
                var reg = /\.[swf]+$/g;
                if (file.match(reg)) {
                    $("#html").show();
                    var emb = '<embed width="100%" height="100%" src="' + file + '" />';
                    $("#html").html(emb);
                    $("#center-menu").hide();

                    data_course[index].read = 1;
                    data_course[index].page = 1;
                    checkClassSuccess(false);



                } else {
                    var reg = /\.[jpg]+$/g;

                    if (file.match(reg)) {

                        $("#html").show();
                        $("#html").html('<img src=" ' + file +'"  style="display: flex; width: 90%; margin: 0 auto;" />');
                         $("#center-menu").hide();


                        data_course[index].read = 1;
                        data_course[index].page = 1;
                        checkClassSuccess(false);


                         

                    } else {
                        $("#pdf").show();
                        $("#pdf").css({
                            
                        });
                        $("#center-menu").show();
                      //  $("#right-menu").removeClass('col-md-offset-4');

                        getDocument(v.file, index);
                    }
                }
                
            }
            
        }
    }


   }

    function startTrack() {
        $("#video-active").on("timeupdate", function(event){
            onTrackedVideoFrame(this.currentTime, this.duration);
        });
    }

    function checkExtension(index)
    {
        var v = data_course[index];

        isScorm = false;

        var reg = /SCORM/g;
        if (v.type.match(reg)) {
            isScorm = true;
            return 'scorm';
        }

        if (v.type == 'Normal') {
            var file = encodeURI(v.file);
            var reg = /\.[mp4]+$/g;
            if (file.match(reg)) {
                return 'mp4';

            } else {
                var reg = /\.[html]+$/g;
                if (file.match(reg)) {
                    isHtml = true;
                    return 'html';

                } else {
                    var reg = /\.[swf]+$/g;
                    if (file.match(reg)) {
                        isHtml = true;
                        return 'swf';
                    } else {

                        var reg = /\.[jpg]+$/g;

                        if (file.match(reg)) {

                            return 'image';

                        } else {
                            return 'pdf';
                        }
                    }
                }
                
            }
        }

    }
    function onTrackedVideoFrame(currentTime, duration){
        //$("#current").text(currentTime); //Change #current to currentTime
        //$("#duration").text(duration)
        current_time = currentTime;
        duration_time = duration;

        //console.log(current_time,' - ', duration_time);

        if (current_time == duration_time) {
            data_course[step_documents].page = 1;
            data_course[step_documents].read = 1;
            checkClassSuccess();
        }
    }

    $("#documents-prev").hide();

    $("#next_course").on('click', function() {
        /*
        var size = $("#documents-next").size();
        if (size == 1) {
            $("#documents-next").trigger('click');
        }*/

        $.each(data_course, function(k, v) {
           if (v.read < v.page) {
            changeDocument(k);
            $("#myModal3").modal('hide');
            return false;
           }
        });

        $("#myModal3").modal('hide');
    })


    

    function checkCourse()
    {

    }
    

    function changeDocument(k_index)
    {

       
        var step = k_index;
        index_course = k_index;
        step_documents = k_index;


        myindex = k_index;

        $(".transfer").show();
        $("#scorm").hide();
        $("#scorm").html('');
        $("#vdo").hide();
        $("#vdo").html('');
        $("#pdf").hide();
        checkDocument(k_index);
        $("#myModal").modal('hide');


        if (step <= 0) {
            $("#documents-prev").hide();
            $("#documents-next").show();
        } else {
            $("#documents-prev").show();

            var del_doc = total_documents - 1;

            

            if (step == del_doc) {
                 $("#documents-next").hide();
            }

        }
        

    }

    var pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null,
            scale = 2,
            canvas = document.getElementById('the-canvas'),
            ctx = canvas.getContext('2d');
        

    function getDocument(documents, index, indexfile ) {
         if(index === undefined) {
              index = 0;
           }

         if(indexfile === undefined) {
              indexfile = false;
           }

        $(".transfer").show();

        $("#scorm").hide();
        $("#scorm").html('');

        $("#vdo").hide();
        $("#vdo").html('');

        $("#pdf").hide();


        // If absolute URL from the remote server is provided, configure the CORS
        // header on that server.

        var url = encodeURI(documents);

       
        // The workerSrc property shall be specified.
        PDFJS.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.211/pdf.worker.min.js';

        
        
        var loadingTask = PDFJS.getDocument(url);
        loadingTask.onProgress = function(progress) {
           // $("#footer").hide();
          //  $("#the-canvas").hide();
           //  $('.transfer').show();

        }

        



        loadingTask.promise.then(function(pdf) {
            this._disableRange = true;
            $('.transfer').hide();
            $("#pdf").show();
            $("#the-canvas").show();
            $("#footer").show();
            
            pdfDoc = pdf;
            var numpage = pdfDoc.numPages;
            $(".page_count").html(numpage);


           


            data_course[index].page = numpage;
           

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

        $("#the-canvas").show();
             $('.transfer').hide();
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
        
        //console.log('on next page');

        //console.log(pageNum, pdfDoc.numPages);


        data_course[step_documents].page = pdfDoc.numPages;
        data_course[step_documents].read = pageNum;
        
       
        if (pageNum == pdfDoc.numPages) {
            
            //console.log('next');

            checkClassSuccess();
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

        

        if (step <= 0) {
            $("#documents-prev").hide();
            $("#documents-next").show();
        } else {
            $("#documents-prev").show();

            var del_doc = total_documents - 1;

            if (step < del_doc) {
                 $("#documents-next").show();
            }

        }
        


        if (step_documents <= 0) {
            changeDocument(0);
        } else {
            changeDocument(step);
        }
    })


    $("#documents-next").on('click', function() {
        var step = step_documents + 1;

        if (step > 0 && step < total_documents) {
            $("#documents-prev").show();
        }


        var total_step = total_documents -1;


        if (total_step  == step) {
            $("#documents-next").hide();
        }


        if (step < total_documents) {
            changeDocument(step);
        }

        startTrack();
       
    })

    $("#close_modal").on('click', function() {
        $("#myModal").modal('hide');
    })

    $("#create_groupx").on('click', function() {
        $("#myModalx").modal('hide');
    })


    function checkClassSuccess(status)
    {
         if(status === undefined) {
              status = true;
           }

        var all_total = 0;

        

        //console.log('data course ==', data_course);

        $.each(data_course, function(k, v) {
            //console.log(v.read, '<<< >>> ', v.page);
           if (v.read >= v.page) {
            all_total++;
           }
        });

        //console.log(data_course.length, all_total);

         if (parseInt(data_course.length) == parseInt(all_total)) {

            var token =  JSON.parse(window.localStorage.getItem('token'));

            var data2 = {
                class_id: "<?php echo $this->uri->segment(7);?>",
                course_id: "<?php echo $this->uri->segment(6);?>",
                scorm_data: "",
            }

            
            
            if (!sendSuccess) {

            

                $.ajax({
                    url: 'https://backend.tescolotuslc.com/learningcenter/api/log',
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    method: 'POST',
                    data: {
                        "token": token,
                        "action": 'complete',
                        "module": 'class',
                        "data": JSON.stringify(data2),
                    },
                    success: function(res) {
                        if (res.status == true && status) {
                            listTesting();
                            getAlert();

                        } else {

                            if (status) {
                                $("#myModalx").modal('show');
                                setInterval(function() {
                                    window.top.location.href = '<?php echo site_url('format/id/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5));?>';
                                },3000);
                            }
                        }
                    } 
                })

                sendSuccess = true;
            }

        } else {
            if (!isHtml) {
                var p = data_course[index_course].page;
                var r = data_course[index_course].read;

                //console.log(data_course[index_course]);

                
                if (r >= p) {
                    $("#myModal3").modal('show');
                }
            }
        }
        
        


       

    }


    function listTesting()
    {
        var user_id = <?php echo $this->session->userdata('id');?>;
        var token = "<?php echo $this->session->userdata('token');?>";

        window.localStorage.removeItem('testing');
        $.ajax({
            url: 'https://backend.tescolotuslc.com/learningcenter/api/testing/get',
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
                
                //window.top.location.href = '<?php echo site_url('testing');?>';

                if (!isHtml || !isScorm) {
                    window.top.location.href = '<?php echo site_url('format/id/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5));?>';
                }
            }
        })
    }


    function getAlert()
    {
        ////console.log(isHtml, isScorm);
        if (!isHtml || !isScorm) {
            $("#myModal2").modal('show');
        }

    }


//http://localhost/tesco-lc/index.php/classroom/id/2/3/3/267/208621
    
    </script>


    <script src="<?php echo base_url();?>assets/player.js"></script>
    <script type="text/javascript">

    var API = new playerAPI12();

    function checkScorm() {
        if (isScorm == true) {
            return true;
        } else {
            return false;
        }
    }


    if (API.LMSInitialize() == 'true') {



        setInterval(function() {
            if (checkScorm()) {
                var mydata = API.data;
                mydata = JSON.parse(window.localStorage.getItem('scorm-local-default'));

                //console.log('data:',mydata["cmi.core.lesson_status"]);

                if (API.LMSFinish() == 'true') {
                   /// top.location.href = '<?php echo site_url('format/id/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5));?>';

                   console.log('true');

                }

                if (API.LMSGetLastError() == '301') {
                    //top.location.href = '<?php echo site_url('format/id/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5));?>';
                }

                if ((mydata["cmi.core.lesson_status"] == 'incomplete' || mydata['cmi.core.lesson_status'] == 'failed')  && isScorm){
                   // ยังเรียนไม่จบ

                   var raw = API.LMSGetValue('cmi.core.score.raw');
                   var min = API.LMSGetValue('cmi.core.score.min');
                   var max = API.LMSGetValue('cmi.core.score.max');
                   score = {
                    raw: raw,
                    min: min,
                    max: max
                   }

                   //console.log(score);
                } else {

                   // //console.log(mydata["cmi.core.lesson_status"]);

                    if (mydata["cmi.core.lesson_status"] == "passed" && isScorm) {
                        data_course[step_documents].page = 1;
                        data_course[step_documents].read = 1;
                        checkClassSuccess(false);
                        //$("#scorm").hide();
                        //$("#scorm").html("");
                    }
                    //$("#scorm").hide();
                    //$("#scorm").html("");

                    /*
                    data_course[step_documents].page = 1;
                    data_course[step_documents].read = 1;
                    checkClassSuccess();

                    //console.log("DATA : ", mydata["cmi.core.lesson_status"])

                    //console.log(step_documents);
                    */

                    return;
                }
            }
        }, 1000);
    }
            
    </script>