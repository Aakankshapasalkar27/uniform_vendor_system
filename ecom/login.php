<?php
require('top.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}
?>
  <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/slider/bg/background.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Login</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-form-wrap mt--60">
                            <div class="col-xs-12">
                                <div class="contact-title">
                                    <h2 class="title__line--6">Login</h2>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <form id="login-form" method="post">
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="login_email" id="login_email" placeholder="Your Email*" style="width:100%">
                                        </div>
                                        <span class="field_error" id="login_email_error"></span>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
                                        </div>
                                        <span class="field_error" id="login_password_error"></span>
                                    </div>
                                    
                                    <div class="contact-btn">
                                        <button type="button" class="fv-btn" onclick="user_login()">Login</button>
                                        <a href="forgot_password.php" class="forgot_password">Forgot Password</a>
                                    </div>
                                </form>
                                <div class="form-output login_msg">
                                    <p class="form-messege field_error"></p>
                                </div>
                            </div>
                        </div> 
                
                </div>
                

                    <div class="col-md-6">
                        <div class="contact-form-wrap mt--60">
                            <div class="col-xs-12">
                                <div class="contact-title">
                                    <h2 class="title__line--6">Register</h2>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <form id="register-form" method="post">
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <!--<input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">-->
<input onkeypress="return Validatename(event);" type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">
                <span id="lblError" style="color:red;"></span>
                                        </div>
                                        <span class="field_error" id="name_error"></span>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="email" name="email" id="email" placeholder="Your Email*" style="width:45%">


                                            <button type="button" class="fv-btn email_sent_otp" onclick="email_sent_otp()">Send OTP</button>


                                            <input type="text" name="email" id="email_otp" placeholder="OTP" style="width:45%" class="email_verify_otp">


                                            <button type="button" class="fv-btn email_verify_otp" onclick="email_verify_otp()">Verify OTP</button>

                                            <span id="email_otp_result"></span>
                                        </div>
                                        <span class="field_error" id="email_error"></span>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
<input onkeypress="return Validatenum(event);" type="text" name="mobile" id="mobile" placeholder="Contact Number*" style="width:100%">
                <span id="lblError2" style="color:red;"></span>                   
                                                
                                        </div>
                                        <span class="field_error" id="mobile_error"></span>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="password" name="password" id="password" placeholder="Your Password*" style="width:100%">
                                        </div>
                                        <span class="field_error" id="password_error"></span>
                                    </div>
                                    
                                    <div class="contact-btn">
                                        <button type="button" class="fv-btn" onclick="user_register()" id="btn_register" disabled>Register</button>
                                    </div>
                                </form>
                                <div class="form-output register_msg">
                                    <p class="form-messege" style="color: red;"></p>
                                </div>
                            </div>
                        </div> 
                
                </div>
                    
            </div>
        </section>
        <input type="hidden" name="" id="is_email_verified"/>
        <script>
            function email_sent_otp(){
                jQuery('#email_error').html('');
                var email=jQuery('#email').val();
                if(email==''){
                    jQuery('#email_error').html('Please enter Email Id');
                }else{
                    jQuery('.email_sent_otp').html('Please wait..');
                    jQuery('.email_sent_otp').attr('disabled',true);
                    jQuery.ajax({
                        url:'send_otp.php',
                        type:'post',
                        data:'email='+email+'&type=email',
                        success:function(result){
                            if(result=='done'){
                                jQuery('#email').attr('disabled',true);
                                jQuery('.email_verify_otp').show();
                                jQuery('.email_sent_otp').hide();
                            }else if(result=='email_present'){
                                jQuery('.email_sent_otp').html('Send OTP');
                                jQuery('.email_sent_otp').attr('disabled',false);
                                jQuery('#email_error').html('Email Id already registered');
                            }else{
                                jQuery('.email_sent_otp').html('Send OTP');
                                jQuery('.email_sent_otp').attr('disabled',false);
                                jQuery('#email_error').html('Please try later');
                            }
                        }
                    });
                    
                }
            }
            function email_verify_otp(){
                jQuery('#email_error').html('');
                var email_otp=jQuery('#email_otp').val();
                if(email_otp==''){
                    jQuery('#email_error').html('Please enter OTP');
                }else{
                    jQuery.ajax({
                        url:'check_otp.php',
                        type:'post',
                        data:'otp='+email_otp+'&type=email',
                        success:function(result){
                            if(result=='done'){
                                jQuery('.email_verify_otp').hide();
                                jQuery('#email_otp_result').html('Email Id verified');
                                jQuery('#is_email_verified').val('1');
                                if(jQuery('#is_email_verified').val()==1){
                                    jQuery('#btn_register').attr('disabled',false);
                                }
                            } else{
                                jQuery('#email_error').html('Please enter valid OTP');
                            }
                        }
                    });
                    
                }
            }

            function Validatename(e) {
            var keyCode = e.keyCode || e.which;
     
            var lblError = document.getElementById("lblError");
            lblError.innerHTML = "";
     
            //Regex for Valid Characters i.e. Alphabets.
            var regex = /^[A-Za-z]+$/;
     
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                lblError.innerHTML = "Only Alphabets allowed.";
            }
     
            return isValid;
        }

        function Validatenum(e) {
        var keyCode = e.keyCode || e.which;
 
        var lblError = document.getElementById("lblError2");
        lblError2.innerHTML = "";
 
        //Regex for Valid Characters i.e. Alphabets.
        var regex = /[0-9]|\./;
 
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            lblError2.innerHTML = "Only numeric values allowed.";
        }
 
        return isValid;
    }

        </script>
       
<?php
require('footer.php');
?>