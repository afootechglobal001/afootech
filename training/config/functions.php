<?php
function _leftSideSection($websiteUrl, $appName)
{ ?>
    <div class="login-image-div">
        <div class="image-overlay"></div>
        <div class="image-slide-1"></div>
        <div class="image-slide-2"></div>
        <div class="image-slide-3"></div>
        <div class="logo-div">
            <a href="<?php echo $websiteUrl ?>/training">
                <img src="<?php echo $websiteUrl ?>/all-images/images/icon.png" alt="Logo"></a>
        </div>

        <div class="bottom-container">
            <h1>
                <?php echo $appName ?> -
                <span>Registration</span>
            </h1>
            <p>
                Complete your SIWES/IT registration and begin your industrial training journey.
            </p>
        </div>
    </div>
<?php } ?>

<?php
function _mobileHeader($websiteUrl)
{ ?>
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
<?php } ?>