<?php include '../config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | SIWES | IT | Student Registration</title>
    <meta name="description"
        content="Join AfooTECH Global ICT Training Centre and learn practical digital skills including software development, networking, UI/UX design, graphics design, and more." />
    <meta name="keywords"
        content="SIWES Training centre in Remo, Ogun State, SIWES Placement centre in Remo Ogun State, IT placement centre in Remo Ogun State, Best internship Training centre in Remo, Ogun State, AfooTECH GLOBAL IT SOLUTION, AfooTECH Global, Best ICT training centre in Ogun State, Best ICT training centre in Nigeria, Software development training, Web development training, Web app development training, Android app development training, Programming training, Coding academy in Ogun State, Networking training, Cybersecurity training, UI UX design training, Graphics design training, Digital skills training, IT training centre in Remo, ICT academy Nigeria, Software engineering training, Ogun State, Nigeria, Ode Remo" />
    <meta property="og:title" content="<?php echo $appName ?> | SIWES | IT | Student Registration" />
    <meta property="og:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/training-banner.jpg" />
    <meta property="og:description"
        content="Join AfooTECH Global ICT Training Centre and learn practical digital skills including software development, networking, UI/UX design, graphics design, and more." />
    <meta name="twitter:title" content="<?php echo $appName ?> | SIWES | IT | Student Registration" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/training-banner.jpg" />
    <meta name="twitter:description"
        content="Join AfooTECH Global ICT Training Centre and learn practical digital skills including software development, networking, UI/UX design, graphics design, and more." />

</head>
<script src="https://js.paystack.co/v1/inline.js"></script>
<body>
    <?php include '../alert.php' ?>
    <div class="mobile-header">
        <div class="inner-div">
            <a href="<?php echo $websiteUrl ?>/training">
                <div class="logo">
                    <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="Logo">
                </div>
            </a>

            <div class="social-media-wrapper">
                <a href="tel:(+234) 813 125 2996" title="Call Customer Care">
                    <div class="social-icon"><i class="bi-telephone-outbound-fill"></i></div>
                </a>

                <a href="https://api.whatsapp.com/send?text=Hello AfooTECH Global&amp;phone=+234 812 700 0262"
                    target="_blank" title="Whatsapp">
                    <div class="social-icon"><i class="bi-whatsapp"></i></div>
                </a>
            </div>
        </div>
    </div>

    <section class="login-div">
        <?php _leftSideSection($websiteUrl, $appName); ?>

        <div class="login-card-div">
            <div class="form-section">
                <div class="registration-progress">
                    <div class="steps">
                        <div class="step active" data-page="registerPage">
                            <div class="circle">1</div>
                        </div>

                        <div class="line"></div>

                        <div class="step" data-page="institutionDetailsPage">
                            <div class="circle">2</div>
                        </div>

                        <div class="line"></div>

                        <div class="step" data-page="programDetailsPage">
                            <div class="circle">3</div>
                        </div>

                        <div class="line"></div>

                        <div class="step" data-page="passportPage">
                            <div class="circle">4</div>
                        </div>

                        <div class="line"></div>

                        <div class="step" data-page="summaryPage">
                            <div class="circle">5</div>
                        </div>
                    </div>
                </div>

                <a href="<?php echo $websiteUrl ?>/training">
                    <div class="logo-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="Logo">
                    </div>
                </a>

                <div class="form-back-div">
                    <div id="page-content">
                        <?php include $websitePath . '/training/config/content-page.php'; ?>
                    </div>
                </div>
            </div>

            <div class="footer-container">
                <p>
                    &copy; <?php echo date('Y'); ?> <?php echo $appName ?> Student Registration. All rights reserved.
                </p>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                let savedPage = sessionStorage.getItem("currentAuthPage") ?? "registerPage";

                _getPage({
                    page: savedPage,
                    url: trainingMiddlewareUrl
                });
                _updateProgress(savedPage);
            });
        </script>
    </section>
    <?php include 'bottom-scripts.php' ?>
</body>

</html>