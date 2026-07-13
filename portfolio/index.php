<?php include '../config/constants.php'; ?>
<?php include '../config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html id="other-page-header" lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include '../meta.php' ?>
    <title><?php echo $appName ?> | Our Portfolio - Software Development & Technology Projects</title>
    <meta name="description"
        content="Explore AfooTECH Global's portfolio of innovative technology projects, including web applications, mobile apps, software solutions, UI/UX designs, graphics design, AI solutions, cybersecurity implementations, and digital transformation projects." />
    <meta name="keywords"
        content="AfooTECH portfolio, software development portfolio, web development projects, mobile app portfolio, UI/UX design portfolio, graphics design portfolio, AI projects Nigeria, cybersecurity projects, website design portfolio, custom software solutions, technology projects Nigeria, IT company portfolio, application development, digital solutions, software engineering projects, Ogun State tech company" />
    <!-- Open Graph -->
    <meta property="og:title"
        content="<?php echo $appName ?> | Our Portfolio - Software Development & Technology Projects" />
    <meta property="og:image"
        content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta property="og:description"
        content="View AfooTECH Global's portfolio featuring successful web development, mobile applications, custom software, UI/UX design, AI, cybersecurity, and digital innovation projects." />
    <!-- Twitter -->
    <meta name="twitter:title"
        content="<?php echo $appName ?> | Our Portfolio - Software Development & Technology Projects" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image"
        content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta name="twitter:description"
        content="Discover AfooTECH Global's completed technology projects and innovative solutions in software development, web and mobile applications, AI, UI/UX design, cybersecurity, and digital transformation." />
</head>

<body>
    <?php include '../header.php' ?>
    <section class="other-pages" data-aos="fade-in" data-aos-duration="900">
        <div class="other-pages-back-div">
            <div class="nav-title">
                <ul>
                    <a href="<?php echo $websiteUrl ?>">
                        <li title="Home">Home <span><i class="bi-caret-right-fill"></i></span></li>
                    </a>
                    <a href="<?php echo $websiteUrl ?>/portfolio">
                        <li title="Our Portfolio">Our Portfolio</li>
                    </a>
                </ul>
            </div>

            <div class="main-content-back-div">
                <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                    <h1 data-aos="fade-in" data-aos-duration="800">
                        Our <span>Portfolio</span>
                    </h1>
                    <p>
                        Our portfolio highlights innovative solutions we've built for businesses, organizations, and individuals. From custom software and responsive websites to mobile applications, AI-powered systems, cybersecurity solutions, and creative digital designs, every project demonstrates our dedication to excellence, innovation, and client success.
                    </p>
                    <?php _otherPagesBtn($websiteUrl); ?>
                </div>

                <div class="image-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/images/about-right-image.png" alt="International Exam">
                </div>
            </div>
        </div>
    </section>

    <section class="other-pages-main-section">
        <section class="body-div net-bg-tr">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="title-column">
                            <span class="top-title">OUR PORTFOLIOS</span>
                            <h2>Explore Our Creative And Innovative <span>#Portfolios</span></h2>
                        </div>
                        <a href="<?php echo $websiteUrl?>/contact-us" title="Get In Touch">
                            <button class="btn" title="Get In Touch">Get In Touch <i
                                    class="bi-arrow-right"></i></button></a>
                    </div>

                   
                    <div class="potfolio-div">
                        <div class="image-div">
                            <img src="<?php echo $websiteUrl?>/uploaded_files/projects/leaderstutors-website.png"
                                alt="leaders Tutors Website" />
                        </div>

                        <div class="content-div">
                            <div class="div-in">
                                <h2>Leaders Tutors Website & Mobile App</h2>
                                <p> The is where education meets innovation! Our cutting-edge
                                    application redefines the learning experience with a dynamic
                                    Education Video Learning system.</p>
                                <a href="https://leaderstutors.com" title="Leaders Tutors Website"
                                    target="_blank">
                                    <button class="btn">Visit Website <i
                                            class="bi-arrow-right"></i></button></a>
                            </div>
                        </div>
                    </div>

                    <div class="potfolio-div">
                        <div class="content-div">
                            <div class="div-in">
                                <h2>CityOne Limousine & Car Service</h2>
                                <p>CityOne Limousine & Car Service offers personalized limousines
                                    transportation service with professional integrity. We handle
                                    limousine transfer services from all Airports to City Tours or
                                    special events.</p>
                                <a href="https://www.cityonelimo.com" title="Cityonelimo Website"
                                    target="_blank">
                                    <button class="btn">Visit Website <i
                                            class="bi-arrow-right"></i></button></a>
                            </div>
                        </div>

                        <div class="image-div">
                            <img src="<?php echo $websiteUrl?>/uploaded_files/projects/cityonelimo-website.png"
                                alt="Cityonelimo Website" />
                        </div>
                    </div>
                               
                    <div class="potfolio-div">
                        <div class="image-div">
                            <img src="<?php echo $websiteUrl?>/uploaded_files/projects/valuehandlers-website.png"
                                alt="Valuehandlers Website" />
                        </div>

                        <div class="content-div">
                            <div class="div-in">
                                <h2>Valuehandlers Ship to Nigeria by Airfreight & Sea Shipping</h2>
                                <p>We pick up from over 80 countries and deliver to Nigeria.</p>
                                <a href="https://www.valuehandlers.com" title="Valuehandlers Website"
                                    target="_blank">
                                    <button class="btn">Visit Website <i
                                            class="bi-arrow-right"></i></button></a>
                            </div>
                        </div>
                    </div>
                               
                    <div class="potfolio-div">
                        <div class="content-div">
                            <div class="div-in">
                                <h2>CGL Logistics, Trucking and Shipping Services</h2>
                                <p>Connect Global Logistics provides a hassle free and expedited
                                    Transportation and Logistics Service within INDIANAPOLIS environs
                                    and nation wide.</p>
                                <a href="https://cgllogisticsnow.com"
                                    title="Connect Global Logistics Website" target="_blank">
                                    <button class="btn">Visit Website <i
                                            class="bi-arrow-right"></i></button></a>
                            </div>
                        </div>

                        <div class="image-div">
                            <img src="<?php echo $websiteUrl?>/uploaded_files/projects/connect-global-logistics-website.png"
                                alt="Connect Global Logistics Website" />
                        </div>
                    </div>

                    <div class="potfolio-div">
                        <div class="image-div">
                            <img src="<?php echo $websiteUrl?>/uploaded_files/projects/1stculturetour-website.png"
                                alt="1stculturetour Website" />
                        </div>

                        <div class="content-div">
                            <div class="div-in">
                                <h2>First Heritage Culture & Hospitality Limited</h2>
                                <p>First Heritage Culture Hospitality & Limited, your gateway to
                                    unforgettable tour experiences. We are passionate about curating
                                    tourism that go beyond the ordinary.</p>
                                <a href="https://1stculturetour.com" title="1stculturetour Website"
                                    target="_blank">
                                    <button class="btn">Visit Website <i
                                            class="bi-arrow-right"></i></button></a>
                            </div>
                        </div>
                    </div>

                    <div class="potfolio-div">
                        <div class="content-div">
                            <div class="div-in">
                                <h2>Online Retail MarketPlace for Groceries, Food & Home essentials</h2>
                                <p>Agrohandlers is an online store for retail and bulk Nigerian food
                                    items and groceries. Shop fresh food ingredients and consumables
                                    from Lagos bulk marketplaces.</p>
                                <a href="https://www.agrohandlers.com" title="Agrohanlders Website"
                                    target="_blank">
                                    <button class="btn">Visit Website <i
                                            class="bi-arrow-right"></i></button></a>
                            </div>
                        </div>

                        <div class="image-div">
                            <img src="<?php echo $websiteUrl?>/uploaded_files/projects/agrohanlders-website.png"
                                alt="Agrohanlders Website" />
                        </div>
                    </div>

                    <div class="potfolio-div">
                        <div class="image-div">
                            <img src="<?php echo $websiteUrl?>/uploaded_files/projects/advanced-breed-school-website.png"
                                alt="Advanced Breed School Website" />
                        </div>

                        <div class="content-div">
                            <div class="div-in">
                                <h2>Advanced Breed Group of Schools</h2>
                                <p>Advanced Breed Group of Schools is a one-stop school. We are an
                                    academic giant in providing the best in quality education to your
                                    child.</p>
                                <a href="https://www.advancedbreedgroupofschool.com"
                                    title="Advanced Breed School Website" target="_blank">
                                    <button class="btn">Visit Website <i
                                            class="bi-arrow-right"></i></button></a>
                            </div>
                        </div>
                    </div>

                    <div class="potfolio-div">
                        <div class="content-div">
                            <div class="div-in">
                                <h2>e-stockmax Application</h2>
                                <p>e-stockmax Application is a product developed and owned by AfooTECH
                                    Global to solve stock shops record keeping.</p>
                                <a href="https://estockmax.com/pharmacy/marituspharmacy/"
                                    title="estockmax App" target="_blank">
                                    <button class="btn">Visit Website <i
                                            class="bi-arrow-right"></i></button></a>
                            </div>
                        </div>

                        <div class="image-div">
                            <img src="<?php echo $websiteUrl?>/uploaded_files/projects/estockmax-app.png"
                                alt="estockmax App" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include '../footer.php' ?>
    </section>

</body>

</html>