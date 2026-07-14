<?php
function _otherPagesBtn($websiteUrl)
{ ?>
<div class="other-pages-btn-div">
    <a href="<?php echo $websiteUrl ?>/training">
        <button class="btn" title="Apply For Training">Apply For Training <i class="bi-arrow-right"></i></button></a>

    <a href="<?php echo $websiteUrl ?>/training">
        <button class="btn right-btn" title="SIWES/IT Program"><strong>SIWES/IT Program</strong> <i
                class="bi-arrow-right"></i></button></a>
</div>
<?php } ?>

<?php
function _otherPagesTitleContent($props)
{
    global $websiteUrl, $appName;

    $title = $props['title'] ?? '';
    $highlight = $props['highlight'] ?? '';
    $description = $props['description'] ?? '';
    $image = $props['image'] ?? '/all-images/images/default.png';
    $breadcrumbs = $props['breadcrumbs'] ?? [];
    ?>
<div class="other-pages-back-div">
    <div class="nav-title">
        <ul>
            <?php foreach ($breadcrumbs as $breadcrumb): ?>
            <a href="<?php echo $breadcrumb['url']; ?>">
                <li title="<?php echo htmlspecialchars($breadcrumb['title']); ?>">
                    <?php echo htmlspecialchars($breadcrumb['title']); ?>

                    <?php if (!$breadcrumb['last']) { ?>
                    <span><i class="bi-caret-right-fill"></i></span>
                    <?php } ?>
                </li>
            </a>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="main-content-back-div">
        <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
            <h1 data-aos="fade-in" data-aos-duration="800">
                <?php echo htmlspecialchars($title); ?>
                <?php if ($highlight) { ?>
                <span><?php echo htmlspecialchars($highlight); ?></span>
                <?php } ?>
            </h1>

            <p>
                <?php echo htmlspecialchars($description); ?>
            </p>

            <?php _otherPagesBtn($websiteUrl); ?>
        </div>

        <div class="image-div">
            <img src="<?php echo $websiteUrl . $image; ?>"
                alt="<?php echo htmlspecialchars($appName . ' ' . $title); ?>">
        </div>
    </div>
</div>
<?php
}

function _clientCarousel()
{
    global $websiteUrl;
    ?>
    <section class="client-body-div">
        <div class="client-body-div-in">
            <div class="logo-slider">
                <div class="box"><img src="<?php echo $websiteUrl?>/uploaded_files/clients/leaderstutors.png"
                        alt="Leaders Tutors Logo"></div>
                <div class="box"><img src="<?php echo $websiteUrl?>/uploaded_files/clients/1stclassic.png"
                        alt="1Stclassic Logo"></div>
                <div class="box"><img src="<?php echo $websiteUrl?>/uploaded_files/clients/4-seasons.png"
                        alt="4-seasons Logo"></div>
                <div class="box"><img src="<?php echo $websiteUrl?>/uploaded_files/clients/cityOne.png"
                        alt="cityOne Logo"></div>
                <div class="box"><img src="<?php echo $websiteUrl?>/uploaded_files/clients/valuehandlers.png"
                        alt="Valuehandlers Logo"></div>
                <div class="box"><img src="<?php echo $websiteUrl?>/uploaded_files/clients/agrohandlers.jpeg"
                        alt="Agrohandlers Logo"></div>
                <div class="box"><img src="<?php echo $websiteUrl?>/uploaded_files/clients/myexamconnect.png"
                        alt="MyExamconnect Logo"></div>
                <div class="box"><img src="<?php echo $websiteUrl?>/uploaded_files/clients/cglconnectlogistscis.png"
                        alt="Connect Global LogisticsLogo"></div>
                <div class="box"><img src="<?php echo $websiteUrl?>/uploaded_files/clients/advancedbreed.png"
                        alt="Advancedbreed Logo"></div>
                <div class="box"><img src="<?php echo $websiteUrl?>/uploaded_files/clients/compeer.png"
                        alt="Compeer Medical College Logo"></div>
                <div class="box"><img src="<?php echo $websiteUrl?>/uploaded_files/clients/firstheritageculture.png"
                        alt="First Culture Logo"></div>
                <div class="box"><img src="<?php echo $websiteUrl?>/uploaded_files/clients/cyrus.png"
                        alt="Cyrus Johnson Logo"></div>
            </div>
        </div>
        <script>
        $('.logo-slider').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 0,
            speed: 3000,
            infinite: true,
            cssEase: 'linear',
            arrows: false,
            pauseOnHover: false,
            pauseOnFocus: false,
            variableWidth: true
        });
        </script>
    </section>
<?php } ?>