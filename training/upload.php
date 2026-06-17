<?php include '../config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Upload Passport</title>
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
                        <h1>Upload <span>Passport</span></h1>
                        <p>
                            Upload your passport photograph to complete your SIWES/IT registration with <?php echo $appName ?>.
                        </p>

                        <div class="inner-form">
                            <div class="cam-pix">
                                <div class="btn-container">
                                    <button class="capture-btn" title="Take Picture" onClick="takeSnapShot()"> <i
                                            class="bi-camera-fill"></i> TAKE
                                        PICTURE </button>

                                    <input id="browseImageInput" type="file" style="display:none;"
                                        accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif"
                                        onchange="studentPreview.UpdatePreview(this);" />

                                    <button class="capture-btn" type="button" title="Browse Image"
                                        onclick="document.getElementById('browseImageInput').click()">
                                        <i class="bi bi-cloud-arrow-up"></i>
                                        BROWSE IMAGE
                                    </button>
                                </div>
                                <div class="cam-pix-inner" id="cam-pix">
                                    <img src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" />
                                </div>
                            </div>
                            <div class="issue-text" id="issues_blogPix"></div>
                            
                            <div class="btn-div">
                                <button class="btn back-btn" title="Back to previous" onclick="window.location.href = programDetailsUrl;"><i class="bi-arrow-left"></i> Back</button>
                                <button class="btn" id="submitBtn" title="Proceed" onclick="">Proceed <i class="bi-arrow-right"></i></button>
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