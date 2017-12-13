<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <title>TESCO LOTUS LEARNING CENTER</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/font.css">
    
    <link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css>
    <style>
    #app{font-family:Avenir,Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;text-align:center;color:#2c3e50;margin-top:60px}h1[data-v-5c2dff86],h2[data-v-5c2dff86]{font-weight:400}ul[data-v-5c2dff86]{list-style-type:none;padding:0}li[data-v-5c2dff86]{display:inline-block;margin:0 10px}a[data-v-5c2dff86]{color:#42b983}*{box-sizing:border-box;outline:none}body{background-color:#29363f}.checkbox label,.radio label,a{color:#fff}.panel-info,.panel-info>.panel-heading{background-color:transparent;border:0}img{margin:0 auto}
    .forget {
        display: none;
    }
    h4, li { color: #fff; font-size: 18px;}
    .input-group ul { margin: 0px; padding: 0px; }
    li { 
        margin: 0px; padding: 0px;
        margin-left: 20px;
        margin-bottom: 10px;
    }
    .boxto {
        background-color: rgba(211, 211, 211, 0.1);
        padding: 20px;
    }

    input[type=text], input[type=password], label, button[type=submit] {
        font-size: 20px;
    }

    * {
        font-family: 'kittithada_light_45_fregular';
    }

    .modal-title { font-size: 22px; }
    .modal-body { font-size: 20px; }


    </style>
</head>

<body>
    <div class="container">
        <div id="loginbox" class="mainbox col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2" style="margin-top: 50px;">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title"><img src="<?php echo base_url();?>assets/images/logo.44be407.png" class="img-responsive" style="width: 250px;"></div>
                </div>
                <div class="panel-body" style="padding-top: 30px;">
                    <div id="login-alert" class="alert alert-danger col-sm-12" style="display: none;"></div>
                    <?php echo form_open('auth/login', array('id' => 'loginform', 'role' => 'form', 'class' => 'form-horizontal'));?>
                        <div class="input-group" style="margin-bottom: 25px;"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" name="username" value="" placeholder="รหัสพนักงาน" autocomplete="off" class="form-control">
                        </div>
                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" name="password" placeholder="รหัสผ่าน" class="form-control">
                        </div>
                        <div class="input-group" style="margin-bottom: 10px;">
                            <div class="checkbox">
                                <label>
                                    <input id="chkShowPassword1" type="checkbox" name="showpass" value="1"> แสดงรหัสผ่าน
                                </label>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 10px;">
                            <div class="col-sm-12">
                                <button id="btn-login" type="submit" class="col-sm-12 btn btn-success" style="padding-top: 10px; padding-bottom: 10px;">Login </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div><a href="#" class='lnk-forget' style="font-size: 20px;">
                                            ลืมรหัสผ่าน
                                        </a></div>
                            </div>
                        </div>
                    </form>
                    <!---->
                </div>
            </div>
        </div>

        <div id="loginbox" class="forget col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2" style="margin-top: 50px;">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title"><img src="<?php echo base_url();?>assets/images/logo.44be407.png" class="img-responsive" style="width: 250px;"></div>
                </div>
                <div class="panel-body" style="padding-top: 30px;">
                    <div id="login-alert2" class="alert alert-danger col-sm-12" style="display: none;"></div>
        
                    <?php echo form_open('auth/checkotp', array('id' => 'forgetform', 'role' => 'form', 'class' => 'form-horizontal'));?>
                        <div class="input-group" style="margin-bottom: 25px;"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username2" type="text" name="username" value="" placeholder="รหัสพนักงาน" autocomplete="off" class="form-control">
                        </div>

                        <div class="input-group" style="margin-bottom: 25px;"><span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                            <input id="mobileshow" type="text" name="mobileshow" value="" readonly placeholder="เบอร์โทรศัพท์" class="form-control">
                            <input id="mobile" type="hidden" name="mobile" value="" readonly placeholder="เบอร์โทรศัพท์" class="form-control">
                        </div>
                        <div class="input-group" style='margin-top: 20px; width: 100%; background: #fff; margin-bottom: 5px;'>
                            <img src="" id="capt" style='width: 100%; height: 80px; filter: blur(1px)' class="img-responsive">
                        </div>
                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="" type="text" name="captcha" placeholder="กรุณากรอกรหัสตัวเลขที่เห็นด้านบนที่นี่" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group" style="margin-top: 10px;">
                            <div class="col-sm-6">
                                <button id="btn-refresh" type="button" class="col-sm-12 btn btn-success" style="font-size: 20px; padding-top: 10px; padding-bottom: 10px;">เปลี่ยนตัวเลข </button>
                            </div>
                            <div class="col-sm-6">
                                <button id="btn-login2" type="submit" class="col-sm-12 btn btn-success" style="padding-top: 10px; padding-bottom: 10px;">ส่ง OTP </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div><a href="#" class='lnk-login' style="font-size: 20px;">
                                            กลับไปเข้าระบบใหม่
                                        </a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="loginbox" class="confirm col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2" style="margin-top: 50px; display: none;">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title"><img src="<?php echo base_url();?>assets/images/logo.44be407.png" class="img-responsive" style="width: 250px;"></div>
                </div>
                <div class="panel-body" style="padding-top: 30px;">
                    <div id="login-alert3" class="alert alert-danger col-sm-12" style="display: none;"></div>
                    <?php echo form_open('auth/confirm', array('id' => 'optreset', 'role' => 'form', 'class' => 'form-horizontal'));?>
                        <div class="input-group" style="margin-bottom: 25px;"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username3" type="text" name="username3" value="" placeholder="รหัสพนักงาน" autocomplete="off" class="form-control">
                        </div>
                        <div class="input-group" style="margin-bottom: 25px;"><span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                            <input id="otp" type="text" name="otp" value="" placeholder="เลข OTP ที่ได้รับจากมือถือ" autocomplete="off" class="form-control">
                        </div>
                        <div class="input-group" style="margin-bottom: 25px; "><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="new-password" type="password" name="new_password" placeholder="รหัสผ่านใหม่" class="form-control">
                        </div>
                        <div class="input-group" style=""><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="confirm-password" type="password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน" class="form-control">
                        </div>
                        <div class="input-group" style="margin-bottom: 10px;">
                            <div class="checkbox">
                                <label>
                                    <input id="chkShowPassword2" type="checkbox" name="showpass" value="1"> แสดงรหัสผ่าน
                                </label>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 10px;">
                            <div class="col-sm-12">
                                <button id="btn-login3" type="submit" class="col-sm-12 btn btn-success" style="padding-top: 10px; padding-bottom: 10px;">Login </button>
                            </div>
                        </div>

                        <div class='input-group boxto'>
                            <h4>นโยบายการตั้งรหัสผ่าน</h4>
                            <ul>
                                <li>รหัสผ่านต้องประกอบไปด้วย ตัวอักษรพิมพ์ใหญ่, ตัวอักษรตัวพิมพ์เล็ก, ตัวอักษรตัวเลข, ตัวอักษรพิเศษ (A-Z, a-z, 0-9, !"#$%)</li>
                                <li>รหัสผ่านต้องมีความยาวต่ำสุด 8 ตัวอักษร และสูงสุด 18 ตัวอักษร</li>
                                <li>รหัสผ่านต้องไม่ซ้ำกับรหัสผ่านล่าสุด 3 ครั้งสุดท้าย</li>
                            </ul>
                        </div>
                        
                    </form>
                    <!---->
                </div>
            </div>
        </div>
    </div>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js></script>
    <script src="https://use.fontawesome.com/a764165cf7.js"></script>
    <script>
        $(function() {

            window.localStorage.removeItem('token');
            window.localStorage.removeItem('data');
            window.localStorage.removeItem('welcome');

            $("#login-username").on('focus', function() {
                $("a.lnk-forget").hide();
                $("#btn-login").prop('disabled', true);
                
            });
                            

            $("a.lnk-forget").hide();
            $("#btn-login").prop('disabled', true);

            /*
            $("#login-username").on('blur', function() {
                if ($(this).val() != '') {
                    getStatusLogin();
                } else {
                    $(this).focus();
                }
            })
            */


            $("#login-password").on('focus', function() {
                if ($("#login-username").val() != '') {
                    getStatusLogin();
                } else {
                    $("#login-username").focus();
                }
            })
            
            
            $("a.lnk-forget").on('click', function(e) {
                e.preventDefault();
                if ($("#login-username").val()=='') {
                    $("#login-username").focus();
                    return false;
                }
                
                getCaptcha();

                $(".mainbox").hide();
                $(".forget").show();
            });

            $("#chkShowPassword1").on('click', function() {
                var type = $("#login-password").attr('type') == 'password' ? 'text' : 'password';
                $("#login-password").attr("type", type);
            });

            $("#chkShowPassword2").on('click', function() {
                var type = $("#new-password").attr('type') == 'password' ? 'text' : 'password';
                $("#new-password").attr("type", type);
                $("#confirm-password").attr("type", type);
            });

            $("form#loginform").on('submit', function(e){
                e.preventDefault();
                if ($("#login-username").val() == '') {
                    $("#login-username").focus();
                    return false;
                }
                if ($("#login-password").val() == '') {
                    $("#login-password").focus();
                    return false;
                }
                login();
            });

            $("form#forgetform").on('submit', function(e) {
                e.preventDefault();
                if ($("input[name=captcha]").val() == '' ) {
                    $("input[name=captcha]").focus();
                    return false;
                }

                $.post($("form#forgetform").attr('action'), { captcha: $("input[name=captcha]").val() }, function(res) {
                    if (res.status == false) {
                        /*$("#login-alert2").html('คุณกรอกเลขผิด');
                        $("#login-alert2").show();
                        */
                        //alert('คุณกรอกเลขผิด');
                        getCaptcha();
                        setTimeout(function() {
                            $("#login-alert2").fadeOut();
                            $("input[name=captcha]").val('');
                        }, 3000);
                    } else {
                        sendOtp();
                    }
                }, 'json');
            })

            $("form#optreset").on('submit', function(e) {
                e.preventDefault();
                var newpass = $("#new-password");
                var confirm = $("#confirm-password");

                if (newpass.val() !== confirm.val()) {
                    /*
                    $("#login-alert3").html('รหัสผ่านทั้งสองอันไม่ถูกต้อง');
                    $("#login-alert3").show();
                    */
                    //alert('รหัสผ่านทั้งสองอันไม่ถูกต้อง');
                    getCaptcha();
                    setTimeout(function() {
                        $("#login-alert3").fadeOut();
                    }, 3000);
                    return false;
                } else {
                    resetPassword();
                }
            });

            $("a.lnk-login").on('click', function(e) {
                e.preventDefault();
                $(".mainbox").show();
                $(".forget").hide();
            });

            $("#btn-refresh").on('click', function() {
                getCaptcha();
            });
        });

        function getCaptcha()
        {
            $.get('<?php echo site_url('auth/getcaptcha');?>', function(res) {
                $("img#capt").attr('src', '<?php echo base_url();?>assets/captcha/' + res + '.jpg');
            });
        }

        function resetPassword()
        {
            var id = $("#login-username3").val();
            var userid = '764' + id;
            var otp = $("#otp").val();
            var password = $("#new-password").val();
            var regId = /(isobar|admin)/g;
            
            if (id.match(regId)) {
                var userid = id;
            }

            $("#btn-login3").prop('disabled', true);
            $("#btn-login3").html('กำลังดำเนินการรอสักครู่');   

            $.ajax({
                url: 'https://backend.tescolotuslc.com/learningcenter/api/otp/login',
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                method: 'POST',
                data: {
                    employee_id: userid,
                    otp: otp,
                    password: password
                },
                success: function(res) {
                    if (res.status == false) {
                        
                        if (res.code =='1001') {
                            getAlert("โปรดใส่ รหัสพนักงานและรหัสผ่านอีกครั้ง")
                        }

                        if (res.code =='1005') {
                            getAlert("โปรดตั้งรหัสผ่านตามนโยบาย");
                            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                        }

                        if (res.code =='1004') {
                            getAlert("โปรดใส่รหัส OTP ใหม่อีกครั้ง หรือขอรหัส OTP ใหม่");
                            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                        }

                        /*$("#login-alert3").html(res.error_msg);
                        $("#login-alert3").show();
                        */
                        $("#btn-login3").prop('disabled', false);
                        $("#btn-login3").html('Login');   
                    } else {
                        //console.log(res);
                        $("#btn-login3").html('กำลังเข้าสู่ระบบ');    
                        $.post('<?php echo site_url('auth/setaccount');?>', {
                            'user_id': res.user_id,
                            'employee_id': userid,
                            'firstname': res.firstname,
                            'lastname': res.lastname,
                            'fullname': res.user.usage,
                            'token': res.token
                        }, function() {
                            window.localStorage.setItem('token', JSON.stringify(res.token));
                            window.localStorage.setItem('data', JSON.stringify(res.data));
                            window.localStorage.setItem('welcome', JSON.stringify(res.welcome));
                            setTimeout(function() {
                                window.top.location.reload();
                            }, 1000);
                            
                        });
                        
                    }
                } 
            })
        }

        function login()
        {
            var username = $("#login-username").val();
            var password = $("#login-password").val();

            $("#btn-login").prop('disabled', true);
            $("#btn-login").html('กำลังดำเนินการ');

            var id = $("#login-username").val();
            var userid = '764' + id;
            var regId = /(isobar|admin)/g;
            
            if (id.match(regId)) {
                var userid = id;
            }



            $.ajax({
                url: 'https://backend.tescolotuslc.com/learningcenter/api/login',
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                method: 'POST',
                data: {
                    username: username,
                    password: password
                },
                success: function(res) {
                    if (res.status == false) {
                        $("#btn-login").prop('disabled', false);
                        $("#btn-login").html('เข้าสู่ระบบ');
                        if (res.code == '1001') {
                            /*
                            $("#login-alert").show();
                            $("#login-alert").html(res.error_msg);
                            */

                            getAlert('โปรดใส่ รหัสพนักงานและรหัสผ่านใหม่อีกครั้ง');
                            setTimeout(function() {
                                $("#login-alert").fadeOut();
                                $("#login-username").focus();
                            }, 2000);
                        }
                        if (res.code == '1002') {
                            /*
                            $("#login-alert").show();
                            $("#login-alert").html(res.error_msg);
                            */
                            //alert(res.error_msg);
                            getAlert(res.error_msg);

                            setTimeout(function() {
                                $("#login-alert").fadeOut();
                                $("#login-username").focus();
                            }, 2000);
                        }

                        if (res.code == '1003') {
                            /*
                            $("#login-alert").show();
                            $("#login-alert").html(res.error_msg);
                            */
                            //alert(res.error_msg);
                            getAlert('กรุณาตรวจสอบ รหัส OTP ใหม่อีกครั้ง');

                            setTimeout(function() {
                                $("#login-alert").fadeOut();
                                $("#login-username").focus();
                            }, 2000);
                        }

                        if (res.code == '1004') {
                            /*
                            $("#login-alert").show();
                            $("#login-alert").html(res.error_msg);
                            */
                            //alert(res.error_msg);
                            getAlert(res.error_msg);

                            setTimeout(function() {
                                $("#login-alert").fadeOut();
                                $("#login-username").focus();
                            }, 2000);
                        }
                    } else {
                        //console.log(res);
                        $("#btn-login").html('กำลังเข้าสู่ระบบ');    
                        $.post('<?php echo site_url('auth/setaccount');?>', {
                            'user_id': res.user_id,
                            'employee_id': userid,
                            'firstname': res.firstname,
                            'lastname': res.lastname,
                            'fullname': res.user.usage,
                            'token': res.token
                        }, function() {
                            window.localStorage.setItem('token', JSON.stringify(res.token));
                            window.localStorage.setItem('data', JSON.stringify(res.data));
                            window.localStorage.setItem('welcome', JSON.stringify(res.welcome));
                            setTimeout(function() {
                                window.top.location.reload();
                            }, 1000);
                            
                        });
                        
                    }
                }
            })
        }

        function getStatusLogin()
        {
            var id = $("#login-username").val();
            var userid = '764' + id;
            var regId = /(isobar|admin)/g;

            if (id.match(regId)) {
                var userid = id;
            }

            $.ajax({
                url: 'https://backend.tescolotuslc.com/learningcenter/api/GetLoginStatus',
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                method: 'POST',
                data: {
                    employee_id: userid
                },
                success: function(res) {
                    if (res.status == false) {
                        /*
                        $("#login-alert").show();
                        $("#login-alert").html(res.error_msg);
                        */
                        //alert(res.error_msg);
                        getAlert(res.error_msg);

                        setTimeout(function() {
                            $("#login-alert").fadeOut();
                            $("#login-username").focus();
                        }, 2000);
                    } else {
                        $("#login-username2").val(id);
                        $("#login-username3").val(id);
                        var mobile = res.telephone;
                        var top = mobile.substring(0, 6);

                        $("#mobile").val(res.telephone);
                        $("#mobileshow").val(top + 'XXXX');



                        if (res.is_first_time_login == true) {
                            getCaptcha();
                            $(".mainbox").hide();
                            $(".forget").show();
                        } else {
                            if (res.is_locked == true) {
                                //$("#login-alert").show();
                                //$("#login-alert").html('ท่านใส่รหัสผิดเกินกว่า 5 ครั้ง กรุณาติดต่อผู้ดูแลระบบ');
                                getAlert('ท่านใส่รหัสผิดเกินกว่า 5 ครั้ง กรุณาติดต่อผู้ดูแลระบบ');
                                setTimeout(function() {
                                    $("#login-alert").fadeOut();
                                    $("#login-username").focus();
                                }, 2000);
                                $("a.lnk-forget").hide();
                                $("#btn-login").prop('disabled', true);
                            } else {
                                if (res.is_telephone_existed == false) {
                                    //$("#login-alert").show();
                                    //$("#login-alert").html('รหัสพนักงานนี้ยังไม่มีหมายเลขโทรศัพท์ กรุณาติดต่อผู้ดูแลระบบ');
                                    getAlert('รหัสพนักงานนี้ยังไม่มีหมายเลขโทรศัพท์ กรุณาติดต่อผู้ดูแลระบบ');
                                    setTimeout(function() {
                                        $("#login-alert").fadeOut();
                                        $("#login-username").focus();
                                    }, 2000);
                                    $("a.lnk-forget").hide();
                                    $("#btn-login").prop('disabled', true);
                                } else {
                                    $("a.lnk-forget").show();
                                    $("#btn-login").prop('disabled', false);
                                }
                            }
                        }
                    }
                }
            })
        }

        function sendOtp() 
        {
            //http://backend.tescolotuslc.com/learningcenter/api/otp/get

            var id = $("#login-username").val();
            var userid = '764' + id;
            var regId = /(isobar|admin)/g;

            if (id.match(regId)) {
                var userid = id;
            }

           
            $.ajax({
                url: 'https://backend.tescolotuslc.com/learningcenter/api/otp/get',
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                method: 'POST',
                data: {
                    employee_id: userid
                },
                success: function(res) {
                    if (res.status == true) {
                        $(".forget").hide();
                        $(".confirm").show();
                    } else {
                        window.location.href.reload();
                    }
                }
            });

        }

        function getAlert(msg, error = false)
        {
            $("#myModal").modal('show');

            if (error == false) {
                msg = '<fon color="red">' + msg + '</p>';
                $(".modal-header").css('background-color', '#999');
                $(".modal-title").css('color', '#fff');
                $(".close").css('color', '#fff');
            }
            $(".modal-body").html(msg);
        }

        $("#myModal").on('show.bs.modal', function () {

        })
    </script>

    <!-- Modal -->
    <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header"  style="background-color: #49a232">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa  fa-times-circle'></i></button>
                <h4 class="modal-title" id="myModalLabel" style="color: #000;">ข้อความ</h4>
            </div>
            <div class="modal-body">
                
            </div>
           
            </div>
        </div>
    </div>


</body>

</html>