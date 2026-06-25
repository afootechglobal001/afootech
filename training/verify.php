<?php include '../config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Student OTP Verification</title>
</head>

<body>
    <?php include '../alert.php' ?>
    <?php _mobileHeader($websiteUrl); ?>
    
    <section class="login-div">
        <?php _leftSideSection($websiteUrl, $appName); ?>

        <div class="login-card-div">
            <div class="form-section">
                <a href="<?php echo $websiteUrl ?>/training">
                    <div class="logo-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="Logo">
                    </div>
                </a>

                <div class="form-back-div">
                    <div class="form-div" data-aos="fade-in" data-aos-duration="1200">
                        <h1> OTP <span>Verification</span></h1>
                        <div class="alert alert-success form-alert-div"> <i class="bi-person"></i> Hi, <span id="">Paul Emmanuel</span>,	
                            an <span>OTP</span> has been sent to your email address (<span id="">seunemmanuel107@gmail.com</span>). Kindly check your <strong>INBOX</strong> or <strong>SPAM</strong> to
                            confirm.
                        </div>
                        
                        <div class="inner-form" id="viewOtp">
                            <div class="otp-container" id="otp_container">
                                <script>
                                    otpField({
                                        id: "otp",
                                        length: 6,
                                        onKeyPressFunction: 'isNumberCheck(event);',
                                    });
                                </script>
                            </div>

                            <div class="forgot-container">
                                Didn't get the OTP?
                                <button title="Resend OTP" class="resendOtpBtn" id="resendOtpBtn" onclick=""><strong>Resend OTP</strong></button>
                                <div id="resendCountdown"></div>
                            </div>

                            <div class="btn-div">
                                <button class="btn full-btn" id="verifyBtn" title="Proceed" onclick="window.location.href = studentAcceptanceLetterUrl;">Proceed <i class="bi-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    _counDownOtp(10);
                </script>
            </div>

            <div class="footer-container">
                <p>
                    &copy; <?php echo date('Y'); ?> <?php echo $appName ?> Student Acceptance Letter. All rights reserved.
                </p>
            </div>
        </div>
    </section>
    <?php include 'bottom-scripts.php' ?>
</body>

</html>