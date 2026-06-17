<?php
class allClass
{
    function _leftSideSection($websiteUrl, $appName) { ?>
        <div class="login-image-div">
            <div class="image-overlay"></div>
            <div class="logo-div">
                <a href="<?php echo $websiteUrl ?>">
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
    <?php }
} //end of class
$callclass = new allClass();
?>