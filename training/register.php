<?php include '../config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Student Registration</title>
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
                        <h1>Welcome <span>Student!</span></h1>
                        <p>
                            Create your account and register for your SIWES/IT program with <?php echo $appName ?>.
                        </p>

                        <div class="inner-form" id="viewLogin">
                            <div class="row-wrapper">
                                <div class="text_field_container" id="firstName_container">
                                    <script>
                                        textField({
                                            id: 'firstName',
                                            title: 'First Name'
                                        });
                                    </script>
                                </div>

                                <div class="text_field_container" id="lastName_container">
                                    <script>
                                        textField({
                                            id: 'lastName',
                                            title: 'Last Name'
                                        });
                                    </script>
                                </div>
                            </div>

                            <div class="text_field_container" id="emailAddress_container">
                                <script>
                                    textField({
                                        id: 'emailAddress',
                                        title: 'Email Address',
                                        type: 'email'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container" id="phoneNumber_container">
                                <script>
                                    textField({
                                        id: 'phoneNumber',
                                        title: 'Phone Number'
                                    });
                                </script>
                            </div>

                            <div class="btn-div">
                                <button class="btn full-btn" id="submitBtn" title="Proceed" onclick="window.location.href = institutionDetailsUrl;">Proceed <i class="bi-arrow-right"></i></button>
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