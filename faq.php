<?php include 'config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html id="other-page-header" lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Frequently Asked Questions (FAQ) - Software Development & ICT Training</title>
    <meta name="keywords"
        content="<?php echo $appName ?> FAQ, AfooTECH Global FAQ, software development FAQ, ICT training FAQ, programming courses Nigeria, web development questions, mobile app development FAQ, AI training FAQ, cybersecurity training FAQ, networking training FAQ, UI/UX design FAQ, graphics design FAQ, coding bootcamp Nigeria, tech training questions, software company Nigeria" />
    <meta name="description"
        content="Find answers to frequently asked questions about AfooTECH Global's software development services, ICT training programs, web and mobile app development, AI, cybersecurity, networking, UI/UX design, graphics design, admissions, and technology solutions." />
    <!-- Open Graph -->
    <meta property="og:title"
        content="<?php echo $appName ?> | Frequently Asked Questions (FAQ) - Software Development & ICT Training" />
    <meta property="og:image"
        content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta property="og:description"
        content="Get answers to common questions about AfooTECH Global's software development services, ICT courses, professional training, project delivery, and technology solutions." />
    <!-- Twitter -->
    <meta name="twitter:title"
        content="<?php echo $appName ?> | Frequently Asked Questions (FAQ) - Software Development & ICT Training" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image"
        content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta name="twitter:description"
        content="Explore frequently asked questions about software development, ICT training, AI, cybersecurity, web development, mobile apps, networking, and technology services at AfooTECH Global." />
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
                    <a href="<?php echo $websiteUrl ?>/faq">
                        <li title="Frequently Asked Questions">Frequently Asked Questions</li>
                    </a>
                </ul>
            </div>
            <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                <h1 data-aos="fade-in" data-aos-duration="800"><span>Frequently Asked Questions</span></h1>
                <p>
                    Find answers to common questions about AfooTECH Global's software development services, ICT training programs, web and mobile app development, AI, cybersecurity, networking, UI/UX design, graphics design, admissions, and technology solutions.
                </p>
                <?php _otherPagesBtn($websiteUrl); ?>
            </div>
        </div>
    </section>

    <section class="other-pages-main-section">
        <section class="body-div blog-bg">
            <div class="body-div-in">
                <div class="page-back-div">
                    <div class="right-div sticky-div">
                        <div class="div-in">
                            <h3>SEARCH</h3>
                            <div class="text_field_container">
                                <input class="text_field" id="searchContent" onkeyup="_filtersPages(this.value, 'faqPageContent', 'faq-title');" type="text" placeholder="" />
                                <div class="placeholder">Type Here To Search</div>
                            </div>
                        </div>

                        <div class="div-in">
                            <h3>TAG LIST</h3>

                            <ul id="catId">
                                <li>ICT Training</li>
                                <li>AI & Automation</li>
                                <li>Cybersecurity</li>
                                <li>UI/UX Design</li>
                                <li>Networking</li>
                                <li>Web Development</li>
                                <li>Software Development</li>
                            </ul>
                        </div>
                    </div>

                    <div class="left-div">
                        <div class="general-faq-div" id="faqPageContent">
                            <div class="faq-title" id="faq1">
                                <div class="inner-title-div" onclick="_collapse('faq1')">
                                    <h2>What is AfooTECH Global?</h2>

                                    <div class="expand-div" id="faq1num">
                                        &nbsp;<i class="bi-plus"></i>&nbsp;
                                    </div>
                                </div>
                                <div class="faq-answer-div" id="faq1answer" style="display: none;">
                                    <p>
                                        AfooTECH Global is a software development company that provides training services, web development, mobile app development, AI, cybersecurity, networking, UI/UX design, graphics design, admissions, and technology solutions.
                                        <br />
                                        We offer a range of services to help you build and maintain your software products, from concept to deployment.
                                    </p>
                                </div>
                            </div>

                            <div class="faq-title" id="faq2">
                                <div class="inner-title-div" onclick="_collapse('faq2')">
                                    <h2>What services does AfooTECH Global offer?</h2>

                                    <div class="expand-div" id="faq2num">   
                                        &nbsp;<i class="bi-plus"></i>&nbsp;
                                    </div>
                                </div>
                                <div class="faq-answer-div" id="faq2answer" style="display: none;">
                                    <p>
                                        AfooTECH Global offers a wide range of services, including training services, web development, mobile app development, AI, cybersecurity, networking, UI/UX design, graphics design, admissions, and technology solutions.
                                        <br />
                                        We help you build and maintain your software products, from concept to deployment.
                                    </p>
                                </div>
                            </div>

                            <div class="faq-title" id="faq3">
                                <div class="inner-title-div" onclick="_collapse('faq3')">
                                    <h2>What is AfooTECH Global's mission?</h2>

                                    <div class="expand-div" id="faq3num">   
                                        &nbsp;<i class="bi-plus"></i>&nbsp;
                                    </div>
                                </div>
                                <div class="faq-answer-div" id="faq3answer" style="display: none;">
                                    <p>
                                        AfooTECH Global's mission is to provide high-quality software development services to clients, helping them build and maintain successful software products.
                                        <br />
                                        We help you build and maintain your software products, from concept to deployment.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php include 'footer.php' ?>
    </section>
</body>

</html>