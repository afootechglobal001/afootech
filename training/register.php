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
    <meta property="og:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/training-banner.png" />
    <meta property="og:description"
        content="Join AfooTECH Global ICT Training Centre and learn practical digital skills including software development, networking, UI/UX design, graphics design, and more." />
    <meta name="twitter:title" content="<?php echo $appName ?> | SIWES | IT | Student Registration" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/training-banner.png" />
    <meta name="twitter:description"
        content="Join AfooTECH Global ICT Training Centre and learn practical digital skills including software development, networking, UI/UX design, graphics design, and more." />

</head>

<body>
    <?php include '../alert.php' ?>
    <section class="login-div">
        <?php _leftSideSection($websiteUrl, $appName); ?>

        <div class="login-card-div">
            <div class="form-section" data-aos="fade-in" data-aos-duration="1200">
                <a href="<?php echo $websiteUrl ?>">
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
            });
        </script>
    </section>
    <?php include 'bottom-scripts.php' ?>
</body>

</html>