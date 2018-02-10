    <div class='container-fluid' id="screen">
        <div class='transfer' style="">
            <img src="<?php echo base_url();?>assets/images/loading_lotus.gif" style='margin: 0 auto; display: block;'>
            <p style="font-size: 16px; color: #fff; text-align: center;">กำลังโหลดข้อมูล...</p>
        </div>


        <div id="scorm" style="display: none; ">
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
    var course_id = '<?php echo $this->uri->segment(3);?>';
    var class_id = '<?php echo $this->uri->segment(4);?>';
    var user_id = <?php echo $this->session->userdata('id');?>;
    var token = JSON.parse(window.localStorage.getItem('token'));

    //  https://tescolotuslc.com/learningcenter/api/class/get

    $(function() {
        getClass();
    })

    function getClass() {
        $.ajax({
            url: '<?php echo $this->config->item('api');?>/api/class/get',
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            method: 'POST',
            data: {
                token: token,
                course_id: course_id,
            },
            success: function(res) {
                console.log(res);
            } 
        })
    }
    
    </script>


    <script type="text/javascript">
        var API = {};
        (function ($) {
            
            $(document).ready(setupScormApi());

            function setupScormApi() {
                API.LMSInitialize = LMSInitialize;
                API.LMSGetValue = LMSGetValue;
                API.LMSSetValue = LMSSetValue;
                API.LMSCommit = LMSCommit;
                API.LMSFinish = LMSFinish;
                API.LMSGetLastError = LMSGetLastError;
                API.LMSGetDiagnostic = LMSGetDiagnostic;
                API.LMSGetErrorString = LMSGetErrorString;

               // window.open("<?php echo $this->config->item('api');?>/storage/document/2018/02/09/07/228e/FM%20Wastewater%20Treatment%20(EN%20sub)%20-%20Storyline%20output/story.html", "popupname","resizable,scrollbars,status");
            }
            function LMSInitialize(initializeInput) {
                displayLog("LMSInitialize: " + initializeInput);
                return true;
            }
            function LMSGetValue(varname) {
                displayLog("LMSGetValue: " + varname);
                return "";
            }
            function LMSSetValue(varname, varvalue) {
                displayLog("LMSSetValue: " + varname + "=" + varvalue);
                return "";
            }
            function LMSCommit(commitInput) {
                displayLog("LMSCommit: " + commitInput);
                return true;
            }
            function LMSFinish(finishInput) {
                displayLog("LMSFinish: " + finishInput);
                top.location.href = '<?php echo site_url('format/id/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5));?>';
                return true;
            }
            function LMSGetLastError() {
                displayLog("LMSGetLastError: ");
                return 0;
            }
            function LMSGetDiagnostic(errorCode) {
                displayLog("LMSGetDiagnostic: " + errorCode);
                return "";
            }
            function LMSGetErrorString(errorCode) {
                displayLog("LMSGetErrorString: " + errorCode);
                return "";
            }
            function displayLog(textToDisplay){
                /*
                var loggerWindow = document.getElementById("logDisplay");
                var item = document.createElement("div");
                item.innerText = textToDisplay;
                loggerWindow.appendChild(item);
                */

                console.log(textToDisplay);
            }
        })(jQuery);


        
    </script>