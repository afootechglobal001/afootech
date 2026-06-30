<?php include 'config/constants.php'; ?>
<?php include 'config/functions.php'; ?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html id="other-page-header" lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Contact Us - Software Development & ICT Solutions in Nigeria</title>
    <meta name="description"
        content="Contact AfooTECH Global, a leading software development and ICT training company in Nigeria. Get in touch for web development, mobile apps, UI/UX design, networking, graphics design, and professional tech training services." />
    <meta name="keywords"
        content="AfooTECH contact, AfooTECH Global contact, ICT company Nigeria contact, software development company Nigeria, web development services Nigeria, mobile app development Nigeria, ICT training Nigeria, programming training Nigeria, UI UX design Nigeria, networking services Nigeria, technology solutions Nigeria, request tech consultation" />
    <!-- Open Graph -->
    <meta property="og:title"
        content="<?php echo $appName ?> | Contact Us - ICT Solutions & Software Development" />
    <meta property="og:image"
        content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta property="og:description"
        content="Connect with AfooTECH Global for innovative software solutions, ICT training, and technology services that help businesses and individuals grow through digital transformation." />
    <!-- Twitter -->
    <meta name="twitter:title"
        content="<?php echo $appName ?> | Contact Us - ICT Solutions & Software Development" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image"
        content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta name="twitter:description"
        content="Reach out to AfooTECH Global for software development, ICT training, web solutions, and professional technology services in Nigeria." />
</head>

<body>
    <?php include 'header.php' ?>
    <section class="other-pages" data-aos="fade-in" data-aos-duration="900">
        <video class="other-pages-video" autoplay muted loop playsinline>
            <source src="<?php echo $websiteUrl ?>/all-images/body-pix/video.mp4" type="video/mp4">
        </video>

        <div class="other-pages-back-div">
            <div class="nav-title">
                <ul>
                    <a href="<?php echo $websiteUrl ?>">
                        <li title="Home">Home <i class="bi-caret-right-fill"></i></li>
                    </a>
                    <a href="<?php echo $websiteUrl ?>/contact-us">
                        <li title="Contact Us">Contact Us</li>
                    </a>
                </ul>
            </div>
            <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                <h1 data-aos="fade-in" data-aos-duration="800"><span>Contact Us</span></h1>
                <p>
                    Have a project idea, need a technology solution, or want to improve your digital skills? 
                    Get in touch with <strong><?php echo $appName ?></strong>. Our team is ready to assist you with software development,
                    ICT training, web solutions, and other technology services tailored to your needs.
                </p>
                <?php _otherPagesBtn($websiteUrl); ?>
            </div>
        </div>
    </section>

    <section class="other-pages-main-section">
        <div class="menu-btn-div">
            <div class="btn-div-in">
                <button class="menu-btn active-btn" id="next-nigeria" title="NIGERIA ADDRESS"
                    onclick="_nextContactPage('nigeriaHideDiv','nigeria');">NIGERIA ADDRESS</button>
                <button class="menu-btn" id="next-usa" title="USA ADDRESS"
                    onclick="_nextContactPage('usaHideDiv','usa');">USA ADDRESS</button>
            </div>
        </div>

        <div id="nigeriaHideDiv">
            <section class="map-body-div">
                <div class="map-back-div">
                    <iframe 
                        class="google-map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.290978647154!2d3.664338675818054!3d6.974955617750801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bd74be9b1fd33%3A0x28303dcfe1029790!2sAfooTECH%20Global!5e0!3m2!1sen!2sng!4v1782382855279!5m2!1sen!2sng"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </section>
        </div>

        <div id="usaHideDiv">
            <section class="map-body-div">
                <div class="map-back-div">
                    <iframe 
                        class="google-map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100939.98555103048!2d-122.50764017948534!3d37.75781499657613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan%20Francisco%2C%20CA%2C%20USA!5e0!3m2!1sen!2snp!4v1596444244045!5m2!1sen!2snp"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </section>
        </div>

        <section class="body-div">
            <div class="body-div-in">
                <div class="contact-mail-div" data-aos="fade-in" data-aos-duration="800">
                    <div class="title">
                        <h3><i class="bi bi-envelope-fill"></i> Leave Your Message</h3>
                    </div>
                    <div class="inner-div">
                        <div class="div-in">
                            <div class="text_field_container" id="fullName_container">
                                <script>
                                    textField({
                                        id: 'fullName',
                                        title: 'Full Name'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container" id="email_container">
                                <script>
                                    textField({
                                        id: 'email',
                                        title: 'Email Address',
                                        type: 'email'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container" id="inquiryPhoneNumber_container">
                                <script>
                                    textField({
                                        id: 'inquiryPhoneNumber',
                                        title: 'Enter Your Phone Number',
                                        type: 'tel',
                                        onKeyPressFunction: 'isNumberCheck(event);'
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="div-in right-div-in">
                            <div class="text_field_container" id="subject_container">
                                <script>
                                    textField({
                                        id: 'subject',
                                        title: 'Subject'
                                    });
                                </script>
                            </div>

                            <div class="text_area_container" id="message_container">
                                <script>
                                    textField({
                                        id: 'message',
                                        title: 'Message',
                                        type: 'textarea'
                                    });
                                </script>
                            </div>

                            <button class="btn" id="submitBtn" title="Send Mail" onclick="">Send Mail <i class="bi-send-check"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php' ?>
    </section>
</body>

</html>