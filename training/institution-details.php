<?php include '../config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Institution Details</title>
</head>

<body>
    <?php include '../alert.php' ?>
    <section class="login-div">
        <?php $callclass->_leftSideSection($websiteUrl, $appName); ?>

        <div class="login-card-div">
            <div class="form-section" data-aos="fade-in" data-aos-duration="1200">
                <a href="<?php echo $websiteUrl ?>">
                <div class="logo-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="Logo">
                </div></a>

                <div class="form-back-div">
                    <div class="form-div" data-aos="fade-in" data-aos-duration="1200">
                        <h1>Institution <span>Information</span></h1>
                        <p>
                            Provide your institution information to begin your SIWES/IT registration with <?php echo $appName ?>.
                        </p>

                        <div class="inner-form" id="viewLogin">
                            <div class="text_field_container" id="nameOfInstitution_container">
                                <script>
                                    textField({
                                        id: 'nameOfInstitution',
                                        title: 'Name Of Institution'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container" id="department_container">
                                <script>
                                    textField({
                                        id: 'department',
                                        title: 'Department'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container" id="matricNo_container">
                                <script>
                                    textField({
                                        id: 'matricNo',
                                        title: 'Refrence/Matric No',
                                    });
                                </script>
                            </div>
                            
                            <div class="btn-div">
                                <button class="btn back-btn" title="Back to previous" onclick="window.location.href = registerUrl;"><i class="bi-arrow-left"></i> Back</button>
                                <button class="btn" id="submitBtn" title="Proceed" onclick="window.location.href = programDetailsUrl;">Proceed <i class="bi-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-container">
                <p>
                   &copy; <?php echo date('Y'); ?> <?php echo $appName ?> Student Registration. All rights reserved.
                </p>
            </div>  
        </div>
    </section>
    <?php include 'bottom-scripts.php' ?>
</body>

</html>