<?php include 'config/constants.php';?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Best Software Development & ICT Training Company in Ogun State, Nigeria</title>
    <meta name="description"
        content="AfooTECH Global: Leading Software development & ICT Training company in Ogun State, Nigeria. We offer software development (web/app), networking, UI/UX, graphics design, and training." />
    <meta name="keywords"
        content="AfooTECH GLOBAL IT SOLUTION, AfooTECH Global, Best ICT company in Remo North Ogun State, Best ICT company in Ogun State, Best ICT company in Nigeria, Software project development, Software project development training centre in nigeria, Web app development, Web app development training centre in nigeria, Android app development, Android app development training centre in nigeria, Networking and security, Networking and security training centre in nigeria, IT training, UI/UX design training, UI/UX design training centre in nigeria, Ogun State, Nigeria, Ode remo" />

    <meta property="og:title"
        content="<?php echo $appName ?> | Best Software Development & ICT Training Company in Ogun State, Nigeria" />
    <meta property="og:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta property="og:description"
        content="AfooTECH Global: Leading Software development & ICT Training company in Ogun State, Nigeria. We offer software development (web/app), networking, UI/UX, graphics design, and training." />

    <meta name="twitter:title"
        content="<?php echo $appName ?> | Best Software Development & ICT Training Company in Ogun State, Nigeria" />
    <meta name="twitter:card" content="<?php echo $appName ?>" />
    <meta name="twitter:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta name="twitter:description"
        content="AfooTECH Global: Leading Software development & ICT Training company in Ogun State, Nigeria. We offer software development (web/app), networking, UI/UX, graphics design, and training." />
</head>

<body>
    <?php include 'header.php'?>

    <section class="slide-section">
        <div class="slide-div">
            <div class="content-back-div">
                <div class="image-content-div animated fadeInLeft">
                    <div class="moving-object top-moving-object">
                        <div class="div-in">
                            <div class="text-div">
                                <span>646+</span>
                                <h4>Students</h4>
                            </div>
                            <div class="img-back-div">
                                <div class="img-div">
                                    <img src="<?php echo $websiteUrl?>/all-images/body-pix/multiple_img.png"
                                        alt="AfooTECH Global Students" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="moving-object bottom-moving-object">
                        <div class="div-in">
                            <div class="text-div">
                                <span>1.8k+</span>
                                <h4>Success Stories</h4>
                            </div>
                        </div>
                    </div>
                    <div class="cg-carousel">
                        <div class="cg-carousel__container full" id="js-carousel_1">
                            <div class="cg-carousel__track js-carousel__track">

                                <div class="cg-carousel__slide js-carousel__slide">
                                    <img src="<?php echo $websiteUrl?>/all-images/body-pix/slider_img_1.png"
                                        alt="AfooTECH Global I.T Solution" />
                                </div>

                                <div class="cg-carousel__slide js-carousel__slide">
                                    <img src="<?php echo $websiteUrl?>/all-images/body-pix/slider_img_2.png"
                                        alt="CAfooTECH Global I.T Solution" />
                                </div>

                                <div class="cg-carousel__slide js-carousel__slide">
                                    <img src="<?php echo $websiteUrl?>/all-images/body-pix/slider_img_3.png"
                                        alt="AfooTECH Global I.T Solution" />
                                </div>

                                <div class="cg-carousel__slide js-carousel__slide">
                                    <img src="<?php echo $websiteUrl?>/all-images/body-pix/slider_img_4.png"
                                        alt="AfooTECH Global I.T Solution" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-content-div animated fadeIn">
                    <div>
                        <h1>AfooTECH Global IT Solution</h1>
                    </div>
                    <h2>Leading the Future of Tech <span>#</span><span class="type-text" id="page-title"></span></h2>
                    <p>AfooTECH Global simplifies daily operations through technology, making them accessible to all. We
                        develop teams based on skill levels and business needs, aiming to build ICT capacity for
                        individuals and organizations.</p>

                    <div class="btn-div">
                        <a href="<?php echo $websiteUrl?>/siwes-it">
                            <button class="btn" title="Apply For Training">Apply For Training <i
                                    class="bi-arrow-right"></i></button></a>
                        <a href="<?php echo $websiteUrl?>/siwes-it">
                            <button class="btn right-btn" title="SIWES/IT Program"><strong>SIWES/IT Program</strong> <i
                                    class="bi-arrow-right"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        // List of sentences
        var _CONTENT = ["Education", "Innovation", "Hands On", "Sciences", "Research"];
        // Current sentence being processed
        var _PART = 0;
        // Character number of the current sentence being processed 
        var _PART_INDEX = 0;
        // Element that holds the text
        var _ELEMENT = document.querySelector("#page-title");
        // Implements typing effect
        function Type() {
            var text = _CONTENT[_PART].substring(0, _PART_INDEX + 1);
            _ELEMENT.innerHTML = text;
            _PART_INDEX++;

            // If full sentence has been displayed then start to delete the sentence after some time
            if (text === _CONTENT[_PART]) {
                clearInterval(_INTERVAL_VAL);
                setTimeout(function() {
                    _INTERVAL_VAL = setInterval(Delete, 2);
                }, 5000);
            }
        }
        // Implements deleting effect
        function Delete() {
            var text = _CONTENT[_PART].substring(0, _PART_INDEX - 1);
            _ELEMENT.innerHTML = text;
            _PART_INDEX--;

            // If sentence has been deleted then start to display the next sentence
            if (text === '') {
                clearInterval(_INTERVAL_VAL);

                // If last sentence then display the first one, else move to the next
                if (_PART == (_CONTENT.length - 1))
                    _PART = 0;
                else
                    _PART++;
                _PART_INDEX = 0;

                // Start to display the next sentence after some time
                setTimeout(function() {
                    _INTERVAL_VAL = setInterval(Type, 50);
                }, 100);
            }
        }
        // Start the typing effect on load
        _INTERVAL_VAL = setInterval(Type, 50);
        </script>

        <script>
        window['carousel_options_1'] = ({
            items: 4,
            margin: 30,
            loop: true,
            dots: true,
            autoplayHoverPause: true,
            smartSpeed: 650,
            autoplay: true,
            breakpoints: {
                768: {
                    slidesPerView: 1,
                },
                1024: {
                    slidesPerView: 1,
                }

            }
        });
        _call_carousel(1)
        </script>
    </section>

    <section class="index-content-div">
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

        <section class="body-div net-bg-br">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div>
                            <span class="top-title">WHAT WE DO</span>
                            <h2>Boost Your Business With Our Diverse <span>#Services</span></h2>
                        </div>
                        <a href="#">
                            <button class="btn" title="Explore All Services">Explore All Services <i
                                    class="bi-arrow-right"></i></button></a>
                    </div>

                    <div class="program-back-div" data-aos="fade-up" data-aos-duration="1000">

                        <div class="program-div">
                            <a href="<?php echo $websiteUrl?>" title="Software Development And Training">
                                <div class="inner-div">
                                    <div class="icon-div">
                                        <img src="<?php echo $websiteUrl?>/all-images/images/project-development.png"
                                            alt="Software project development" />
                                    </div>

                                    <div class="program-text-div">
                                        <h3>Software Project Development</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="program-div program-div-1">
                            <a href="<?php echo $websiteUrl?>" title="Web Application Development">
                                <div class="inner-div">
                                    <div class="icon-div">
                                        <img src="<?php echo $websiteUrl?>/all-images/images/application-development.png"
                                            alt="Web application development" />
                                    </div>

                                    <div class="program-text-div">
                                        <h3>Web Application Development</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="program-div program-div-2">
                            <a href="<?php echo $websiteUrl?>" title="Mobile Application Development">
                                <div class="inner-div">
                                    <div class="icon-div">
                                        <img src="<?php echo $websiteUrl?>/all-images/images/app-development.png"
                                            alt="Mobile application development" />
                                    </div>

                                    <div class="program-text-div">
                                        <h3>Mobile Application Development</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="program-div program-div-3">
                            <a href="<?php echo $websiteUrl?>" title="Networking And Cyber Security">
                                <div class="inner-div">
                                    <div class="icon-div">
                                        <img src="<?php echo $websiteUrl?>/all-images/images/security-system.png"
                                            alt="Networking and security" />
                                    </div>

                                    <div class="program-text-div">
                                        <h3>Networking And Cyber Security</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="program-div program-div-4">
                            <a href="<?php echo $websiteUrl?>" title="Website Search Engine Optimization (SEO)">
                                <div class="inner-div">
                                    <div class="icon-div">
                                        <img src="<?php echo $websiteUrl?>/all-images/images/seo.png"
                                            alt="Website Search Engine Optimization (SEO)" />
                                    </div>

                                    <div class="program-text-div">
                                        <h3>Website Search Engine Optimization (SEO)</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="program-div program-div-5">
                            <a href="<?php echo $websiteUrl?>" title="UIUX And Graphics Design">
                                <div class="inner-div">
                                    <div class="icon-div">
                                        <img src="<?php echo $websiteUrl?>/all-images/images/uiu-design.png"
                                            alt="UIUX/graphics design training" />
                                    </div>

                                    <div class="program-text-div">
                                        <h3>UIUX And Graphics Design</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="body-div net-bg-tr">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div>
                            <span class="top-title">OUR PORTFOLIOS</span>
                            <h2>Explore Our Creative And Innovative <span>#Portfolios</span></h2>
                        </div>
                        <a href="#" title="Explore All Portfolios">
                            <button class="btn" title="Explore All Portfolios">Explore All Portfolios <i
                                    class="bi-arrow-right"></i></button></a>
                    </div>

                    <div class="cg-carousel">
                        <div class="cg-carousel__container" id="js-carousel_2">
                            <div class="cg-carousel__track js-carousel__track">

                                <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                    data-aos-duration="1200">
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
                                </div>

                                <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                    data-aos-duration="1200">
                                    <div class="potfolio-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl?>/uploaded_files/projects/cityonelimo-website.png"
                                                alt="Cityonelimo Website" />
                                        </div>

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
                                    </div>
                                </div>

                                <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                    data-aos-duration="1200">
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
                                </div>

                                <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                    data-aos-duration="1200">
                                    <div class="potfolio-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl?>/uploaded_files/projects/connect-global-logistics-website.png"
                                                alt="Connect Global Logistics Website" />
                                        </div>

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
                                    </div>
                                </div>

                                <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                    data-aos-duration="1200">
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
                                </div>

                                <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                    data-aos-duration="1200">
                                    <div class="potfolio-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl?>/uploaded_files/projects/agrohanlders-website.png"
                                                alt="Agrohanlders Website" />
                                        </div>

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
                                    </div>
                                </div>

                                <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                    data-aos-duration="1200">
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
                                </div>

                                <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                    data-aos-duration="1200">
                                    <div class="potfolio-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl?>/uploaded_files/projects/estockmax-app.png"
                                                alt="estockmax App" />
                                        </div>

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-div">
                        <button class="btn" title="Previous" id="js-carousel__prev_2"><i
                                class="bi-chevron-double-left"></i></button>
                        <button class="btn" title="Next" id="js-carousel__next_2"><i
                                class="bi-chevron-double-right"></i></button>
                    </div>
                </div>
            </div>
            <script>
            window['carousel_options_2'] = ({
                items: 4,
                margin: 30,
                loop: true,
                dots: true,
                autoplayHoverPause: true,
                smartSpeed: 650,
                autoplay: true,
                breakpoints: {
                    700: {
                        slidesPerView: 1,
                    },
                    900: {
                        slidesPerView: 1,
                    },
                    1300: {
                        slidesPerView: 1,
                    }

                }
            });
            _call_carousel(2);
            </script>
        </section>

        <section class="body-div net-bg-bl">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div service-title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div>
                            <span class="top-title">WHAT WE OFFER</span>
                            <h2>Dive into Our Transformative and Pioneering <span>#Training</span></h2>
                        </div>
                        <a href="#">
                            <button class="btn" title="Explore All Training">Explore All Training <i
                                    class="bi-arrow-right"></i></button></a>
                    </div>

                    <div class="main-service-back-div">
                        <div class="cg-carousel">
                            <div class="cg-carousel__container" id="js-carousel_3">
                                <div class="cg-carousel__track js-carousel__track">

                                    <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                        data-aos-duration="1200">
                                        <div class="main-service-div">
                                            <div class="image-div">
                                                <img src="<?php echo $websiteUrl?>/uploaded_files/training/frontend-engineer-training.jpg"
                                                    alt="Frontend Engineer" />
                                            </div>
                                            <div class="title">Training</div>
                                            <div class="content-div">
                                                <h3>Frontend Engineer</h3>
                                                <a href="<?php echo $websiteUrl?>" title="Apply Now">
                                                    <button class="btn">Apply Now <i
                                                            class="bi-arrow-right"></i></button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                        data-aos-duration="1200">
                                        <div class="main-service-div">
                                            <div class="image-div">
                                                <img src="<?php echo $websiteUrl?>/uploaded_files/training/backend-engineer-training.webp"
                                                    alt="Backend Engineer" />
                                            </div>
                                            <div class="title">Training</div>
                                            <div class="content-div">
                                                <h3>Backend Engineer</h3>
                                                <a href="<?php echo $websiteUrl?>" title="Apply Now">
                                                    <button class="btn">Apply Now <i
                                                            class="bi-arrow-right"></i></button></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                        data-aos-duration="1200">
                                        <div class="main-service-div">
                                            <div class="image-div">
                                                <img src="<?php echo $websiteUrl?>/uploaded_files/training/fullstack-engineer-training.jpg"
                                                    alt="Full Stack Engineer" />
                                            </div>
                                            <div class="title">Training</div>
                                            <div class="content-div">
                                                <h3>Full Stack Engineer</h2>
                                                    <a href="<?php echo $websiteUrl?>" title="Apply Now">
                                                        <button class="btn">Apply Now <i
                                                                class="bi-arrow-right"></i></button></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                        data-aos-duration="1200">
                                        <div class="main-service-div">
                                            <div class="image-div">
                                                <img src="<?php echo $websiteUrl?>/uploaded_files/training/computer-networking-training.webp"
                                                    alt="Computer Networking" />
                                            </div>
                                            <div class="title">Training</div>
                                            <div class="content-div">
                                                <h3>Computer Networking</h3>
                                                <a href="<?php echo $websiteUrl?>" title="Apply Now">
                                                    <button class="btn">Apply Now <i
                                                            class="bi-arrow-right"></i></button></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                        data-aos-duration="1200">
                                        <div class="main-service-div">
                                            <div class="image-div">
                                                <img src="<?php echo $websiteUrl?>/uploaded_files/training/data-analysis-training.jpg"
                                                    alt="Data Analysis" />
                                            </div>
                                            <div class="title">Training</div>
                                            <div class="content-div">
                                                <h3>Data Analysis</h3>
                                                <a href="<?php echo $websiteUrl?>" title="Apply Now">
                                                    <button class="btn">Apply Now <i
                                                            class="bi-arrow-right"></i></button></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                        data-aos-duration="1200">
                                        <div class="main-service-div">
                                            <div class="image-div">
                                                <img src="<?php echo $websiteUrl?>/uploaded_files/training/UIUX-training.webp"
                                                    alt="UI/UX Training" />
                                            </div>
                                            <div class="title">Training</div>
                                            <div class="content-div">
                                                <h3>UI/UX Training</h3>
                                                <a href="<?php echo $websiteUrl?>" title="Apply Now">
                                                    <button class="btn">Apply Now <i
                                                            class="bi-arrow-right"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                        data-aos-duration="1200">
                                        <div class="main-service-div">
                                            <div class="image-div">
                                                <img src="<?php echo $websiteUrl?>/uploaded_files/training/graphics-design-training.jpg"
                                                    alt="Graphics Design Training" />
                                            </div>
                                            <div class="title">Training</div>
                                            <div class="content-div">
                                                <h3>Graphics Design Training</h2>
                                                    <a href="<?php echo $websiteUrl?>" title="Apply Now">
                                                        <button class="btn">Apply Now <i
                                                                class="bi-arrow-right"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-btn-div">
                    <button class="btn" title="Previous" id="js-carousel__prev_3"><i
                            class="bi-chevron-double-left"></i></button>
                    <button class="btn" title="Next" id="js-carousel__next_3"><i
                            class="bi-chevron-double-right"></i></button>
                </div>
            </div>
            <script>
            window['carousel_options_3'] = ({
                items: 4,
                margin: 30,
                loop: true,
                dots: true,
                autoplayHoverPause: true,
                smartSpeed: 650,
                autoplay: true,
                breakpoints: {
                    700: {
                        slidesPerView: 3,
                    },
                    900: {
                        slidesPerView: 4,
                    },
                    1300: {
                        slidesPerView: 4,
                    }

                }
            });
            _call_carousel(3);
            </script>
        </section>

        <section class="body-div net-bg-tl">
            <div class="body-div-in">
                <div class="about-back-div">
                    <div class="about-div">
                        <div class="about-content-div values-content-div" data-aos="fade-up" data-aos-duration="1000">
                            <div><span class="top-title">OUR STATUS VALUES</span></div>
                            <h2>Exploring Our Status <span>#Values</span></h2>
                            <p>Explore our status values to learn about the guiding principles that shape our approach
                                to tech education and community.</p>

                            <div class="progress-back-div">
                                <div class="progress-container">
                                    <div class="progress-item">
                                        <span class="title">Case study success</span>
                                        <div class="progress-bar">
                                            <div class="progress-per" data-text="90">90</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-item">
                                        <span class="title">Happy student</span>
                                        <div class="progress-bar">
                                            <div class="progress-per" data-text="75">75</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-item">
                                        <span class="title">Engaging</span>
                                        <div class="progress-bar">
                                            <div class="progress-per" data-text="93">93</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-item">
                                        <span class="title">Student Community</span>
                                        <div class="progress-bar">
                                            <div class="progress-per" data-text="63">63</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="image-div" data-aos="fade-in" data-aos-duration="1200">
                            <div class="moving-object top-moving-object">
                                <div class="div-in">
                                    <div class="text-div">
                                        <span>2k+</span>
                                        <h4>Student</h4>
                                    </div>
                                    <div class="img-back-div">
                                        <div class="img-div">
                                            <img src="<?php echo $websiteUrl?>/all-images/body-pix/multiple_img.png"
                                                alt="Slide Image" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="moving-object bottom-moving-object">
                                <div class="div-in">
                                    <div class="text-div">
                                        <span>5.8k</span>
                                        <h4>Success Courses</h4>
                                    </div>
                                </div>
                            </div>
                            <img src="<?php echo $websiteUrl?>/all-images/body-pix/status_image.png" alt="About Us" />
                        </div>
                    </div>
                </div>
            </div>
            <script>
            _progressBar();
            </script>
        </section>

        <section class="body-div testimonial-body-div">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="testimonial-back-div">
                        <div class="image-left-div">
                            <img src="<?php echo $websiteUrl?>/all-images/body-pix/testimonial-body.png"
                                alt="Afootech Testimonial" />
                        </div>

                        <div class="right-content-div">
                            <div class="inner-content">
                                <div class="star-div">
                                    <i class="bi-quote"></i>
                                </div>
                                <div class="cg-carousel">
                                    <div class="cg-carousel__container" id="js-carousel_4">
                                        <div class="cg-carousel__track js-carousel__track">

                                            <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                                data-aos-duration="1200">
                                                <div class="testimonial-div">
                                                    <div class="div-in">
                                                        <p>"Afootech Global IT Solution helped us turn our vision into
                                                            reality. When we thought our tech goals were out of reach,
                                                            their team introduced us to innovative solutions that
                                                            transformed our business. They made what seemed impossible,
                                                            possible."</p>
                                                        <div class="profile-div">
                                                            <div class="img-div">
                                                                <img src="<?php echo $websiteUrl?>/uploaded_files/testimonies/semako.jpg"
                                                                    alt="Semako Emmanuel" />
                                                            </div>
                                                            <div class="right-text">
                                                                <h4>Semako Emmanuel</h4>
                                                                <span>Diploma Student</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                                data-aos-duration="1200">
                                                <div class="testimonial-div">
                                                    <div class="div-in">
                                                        <p>"As an Information Technology student at the National Open
                                                            University, I joined Afootech Global for my Industrial
                                                            Training. This has been a highly rewarding experience, as
                                                            the company has not only provided me with hands-on practical
                                                            skills but also deepened my theoretical understanding. The
                                                            company's expertise in bringing out the best in its students
                                                            further motivated me to enroll in their diploma training
                                                            program after my IT."</p>
                                                        <div class="profile-div">
                                                            <div class="img-div">
                                                                <img src="<?php echo $websiteUrl?>/uploaded_files/testimonies/barry.jpg"
                                                                    alt="Barry Job" />
                                                            </div>
                                                            <div class="right-text">
                                                                <h4>Barry Job</h4>
                                                                <span>Diploma Student</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                                data-aos-duration="1200">
                                                <div class="testimonial-div">
                                                    <div class="div-in">
                                                        <p>"The Software and web development diploma training at
                                                            AfooTECH Global Ict solutions. I'm grateful for the
                                                            opportunities AfooTECH Global I.T solution has made me
                                                            experience on projects that align with my passion and
                                                            interests. The sense of purpose and fulfillment I get from
                                                            my work is greater"</p>
                                                        <div class="profile-div">
                                                            <div class="img-div">
                                                                <img src="<?php echo $websiteUrl?>/uploaded_files/testimonies/oluwaseun.jpg"
                                                                    alt="Oluwaseun Michael" />
                                                            </div>
                                                            <div class="right-text">
                                                                <h4>Oluwaseun Michael</h4>
                                                                <span>IT Student</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                                data-aos-duration="1200">
                                                <div class="testimonial-div">
                                                    <div class="div-in">
                                                        <p>"The Software and Web Development diploma training at
                                                            AfooTECH Global I.T Solution exceeded my expectations,
                                                            blending theory with hands-on experience that prepared me
                                                            for real-world challenges. It helped me discover my
                                                            potential and build confidence. Thank you, AfooTECH, for
                                                            turning my passion into a successful career."</p>
                                                        <div class="profile-div">
                                                            <div class="img-div">
                                                                <img src="<?php echo $websiteUrl?>/uploaded_files/testimonies/ayobami.jpg"
                                                                    alt="Ayobami Samson" />
                                                            </div>
                                                            <div class="right-text">
                                                                <h4>Ayobami Samson</h4>
                                                                <span>Diploma Student</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                                data-aos-duration="1200">
                                                <div class="testimonial-div">
                                                    <div class="div-in">
                                                        <p>"Studying at Afootech Global was a transformative experience.
                                                            The diploma program in software development equipped me with
                                                            industry-relevant skills and knowledge. I gained confidence,
                                                            skills, and a solid foundation for my future career. Thank
                                                            you, Afootech Global!"</p>
                                                        <div class="profile-div">
                                                            <div class="img-div">
                                                                <img src="<?php echo $websiteUrl?>/uploaded_files/testimonies/opeyemi.jpg"
                                                                    alt="Ogunleye Opeyemi" />
                                                            </div>
                                                            <div class="right-text">
                                                                <h4>Ogunleye Opeyemi</h4>
                                                                <span>Diploma Student</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                                data-aos-duration="1200">
                                                <div class="testimonial-div">
                                                    <div class="div-in">
                                                        <p>"AfooTECH Global and IT Solution was truly enlightening. The
                                                            knowledgeable team of experts helped me delve into the
                                                            intricate world of programming, both software and website
                                                            development. The company expanded my skills and also ignited
                                                            a passion for innovation within me, because as her motto
                                                            implies creative and innovative. Thank you for empowering me
                                                            to embrace the endless possibilities of the tech industry!"
                                                        </p>
                                                        <div class="profile-div">
                                                            <div class="img-div">
                                                                <img src="<?php echo $websiteUrl?>/uploaded_files/testimonies/mike.jpg"
                                                                    alt="Michael Candy" />
                                                            </div>
                                                            <div class="right-text">
                                                                <h4>Michael Candy</h4>
                                                                <span>Diploma Student</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                                data-aos-duration="1200">
                                                <div class="testimonial-div">
                                                    <div class="div-in">
                                                        <p>"Reflecting on my journey with Afootech Global IT solution, I
                                                            am incredibly grateful for the role the company's learning
                                                            and development programs have played in helping me achieve
                                                            my dreams. When I first joined Afootech Global IT solution ,
                                                            I had ambitious goals for my career in the tech industry.
                                                            Thanks to the company’s unwavering support and resources, I
                                                            am now living those dreams"</p>
                                                        <div class="profile-div">
                                                            <div class="img-div">
                                                                <img src="<?php echo $websiteUrl?>/uploaded_files/testimonies/francis.jpg"
                                                                    alt="Bamirin Francis" />
                                                            </div>
                                                            <div class="right-text">
                                                                <h4>Bamirin Francis</h4>
                                                                <span>Diploma Student</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                                data-aos-duration="1200">
                                                <div class="testimonial-div">
                                                    <div class="div-in">
                                                        <p>"I had the opportunity to work with AfooTech during my SIWES
                                                            program, which was pivotal for my academic and professional
                                                            growth. After completing my SIWES, I lost focus on my career
                                                            goals, but AfooTech helped me regain my direction and
                                                            motivated me to pursue my ambitions. Thanks to their support
                                                            and guidance, I now feel more confident about achieving my
                                                            goals in the near future."</p>
                                                        <div class="profile-div">
                                                            <div class="img-div">
                                                                <img src="<?php echo $websiteUrl?>/uploaded_files/testimonies/orchid.jpg"
                                                                    alt="Awokoya Nurudeen Oluwatobiloba" />
                                                            </div>
                                                            <div class="right-text">
                                                                <h4>Awokoya Nurudeen Oluwatobiloba</h4>
                                                                <span>Diploma Student</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                                data-aos-duration="1200">
                                                <div class="testimonial-div">
                                                    <div class="div-in">
                                                        <p>"A very BIG thanks to AfooTech Global and IT Solution for
                                                            giving me the opportunity to learn Web and Software
                                                            Development, and ever since I have been learning there, my
                                                            way of reasoning has totally changed to something GREAT,
                                                            which is helping me in my Studies and in some other aspects,
                                                            once again THANK YOU"</p>
                                                        <div class="profile-div">
                                                            <div class="img-div">
                                                                <img src="<?php echo $websiteUrl?>/uploaded_files/testimonies/iyanu.jpg"
                                                                    alt="Osindero Iyanu" />
                                                            </div>
                                                            <div class="right-text">
                                                                <h4>Osindero Iyanu</h4>
                                                                <span>Diploma Student</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left"
                                                data-aos-duration="1200">
                                                <div class="testimonial-div">
                                                    <div class="div-in">
                                                        <p>"Before joining AfooTech's UI/UX training program, I had a
                                                            passion for design but lacked the skills and confidence to
                                                            bring my ideas to life. Through AfooTech's comprehensive
                                                            training, I gained hands-on experience, I Learned thinking
                                                            and problem-solving strategies, Collaborated with peers on
                                                            real-world projects and communication skill. Thank you,
                                                            AfooTech, for empowering me to turn my passion into a
                                                            career."</p>
                                                        <div class="profile-div">
                                                            <div class="img-div">
                                                                <img src="<?php echo $websiteUrl?>/uploaded_files/testimonies/blessing.jpg"
                                                                    alt="Paul Blessing" />
                                                            </div>
                                                            <div class="right-text">
                                                                <h4>Paul Blessing</h4>
                                                                <span>UI/UX Diploma Student</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-div">
                                    <button class="btn" title="Previous" id="js-carousel__prev_4"><i
                                            class="bi-chevron-double-left"></i></button>
                                    <button class="btn" title="Next" id="js-carousel__next_4"><i
                                            class="bi-chevron-double-right"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <script>
            window['carousel_options_4'] = ({
                items: 4,
                margin: 30,
                loop: true,
                dots: true,
                autoplayHoverPause: true,
                smartSpeed: 650,
                autoplay: true,
                breakpoints: {
                    700: {
                        slidesPerView: 1,
                    },
                    900: {
                        slidesPerView: 1,
                    },
                    1300: {
                        slidesPerView: 1,
                    }

                }
            });
            _call_carousel(4);
            </script>
        </section>

        <section class="body-div light-body">
            <div class="body-div-in">
                <div class="about-back-div">
                    <div class="about-div">
                        <div class="image-div" data-aos="fade-in" data-aos-duration="1200">
                            <img src="<?php echo $websiteUrl?>/all-images/body-pix/about.png" alt="About Us" />
                        </div>
                        <div class="about-content-div" data-aos="fade-up" data-aos-duration="1000">
                            <div><span class="top-title">ABOUT US</span></div>
                            <h2>Leverage Our Expertise in Technology to Achieve Business <span>#Excellence</span> </h2>
                            <p>Welcome to AfooTECH Global, your go-to for software development, web/app solutions,
                                networking, security, and ICT training. We simplify business operations and empower
                                individuals with essential tech skills.</p>
                            <div class="about-details-back-div">
                                <div class="text-div" data-aos="fade-in" data-aos-duration="1200">
                                    <div>
                                        <div class="top-div">
                                            <h4>OUR VISION</h4>
                                        </div>
                                    </div>
                                    <p>AfooTECH Global simplifies daily operations through technology, making them
                                        accessible to all. We develop teams based on skill levels and business needs,
                                        aiming to build ICT capacity for individuals and organizations.</p>
                                </div>

                                <div class="text-div mission-text" data-aos="fade-in" data-aos-duration="1200">
                                    <div>
                                        <div class="top-div mission-top">
                                            <h4>OUR MISSION</h4>
                                        </div>
                                    </div>
                                    <p>Our mission at AfooTECH Global is to deliver innovative technology solutions,
                                        empower individuals with ICT skills, and simplify business operations through
                                        software development and expert training programs.</p>
                                </div>

                            </div>
                            <div>
                                <a href="<?php echo $websiteUrl?>" title="Learn More">
                                    <button class="btn" title="Learn More">Learn More <i
                                            class="bi-arrow-right"></i></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="body-div team-bg">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div center-title" data-aos="fade-in" data-aos-duration="1200">
                        <span class="top-title center-top-title">OUR TEAM</span>
                        <h2>Meet Our Expert Instructor</h2>
                    </div>

                    <div class="team-back-div">
                        <div class="team-div" data-aos="fade-in" data-aos-duration="1000">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/team/mike-afolabi.jpg"
                                    alt="Mike Afolabi" />
                            </div>
                            <div class="icon-div">
                                <i class="bi-share"></i>
                            </div>
                            <div id="media">
                                <ul>
                                    <a href="https://api.whatsapp.com/" target="_blank" title="Whatsapp">
                                        <li><i class="bi-whatsapp"></i></li>
                                    </a>
                                    <a href="https://www.facebook.com/" target="_blank" title="Facebook">
                                        <li class="li"><i class="bi-facebook"></i></li>
                                    </a>
                                    <a href="https://twitter.com/" target="_blank" title="Twitter">
                                        <li class="li"><i class="bi-twitter"></i></li>
                                    </a>
                                    <a href="https://www.linkedin.com/" target="_blank" title="Linkedin">
                                        <li class="li"><i class="bi-linkedin"></i></li>
                                    </a>
                                    <a href="https://www.pinterest.com/" target="_blank" title="Pinterest">
                                        <li class="li"><i class="bi-pinterest"></i></li>
                                    </a>
                                </ul>
                            </div>
                            <div class="content-div mobile-content">
                                <h3>Engr. Mike Afolabi</h3>
                                <p>CEO/General Manager</p>
                            </div>
                        </div>


                        <div class="team-div" data-aos="fade-in" data-aos-duration="1000">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/team/victoria-afolabi.jpg"
                                    alt="victoria afolabi" />
                            </div>
                            <div class="icon-div">
                                <i class="bi-share"></i>
                            </div>
                            <div id="media">
                                <ul>
                                    <a href="https://api.whatsapp.com/" target="_blank" title="Whatsapp">
                                        <li><i class="bi-whatsapp"></i></li>
                                    </a>
                                    <a href="https://www.facebook.com/" target="_blank" title="Facebook">
                                        <li class="li"><i class="bi-facebook"></i></li>
                                    </a>
                                    <a href="https://twitter.com/" target="_blank" title="Twitter">
                                        <li class="li"><i class="bi-twitter"></i></li>
                                    </a>
                                    <a href="https://www.linkedin.com/" target="_blank" title="Linkedin">
                                        <li class="li"><i class="bi-linkedin"></i></li>
                                    </a>
                                    <a href="https://www.pinterest.com/" target="_blank" title="Pinterest">
                                        <li class="li"><i class="bi-pinterest"></i></li>
                                    </a>
                                </ul>
                            </div>
                            <div class="content-div mobile-content">
                                <h3>Victoria I.T</h3>
                                <p>HR / Accountant</p>
                            </div>
                        </div>

                        <div class="team-div" data-aos="fade-in" data-aos-duration="1000">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/team/emmanuel-paul.jpg"
                                    alt="Paul Emmanuel" />
                            </div>
                            <div class="icon-div">
                                <i class="bi-share"></i>
                            </div>
                            <div id="media">
                                <ul>
                                    <a href="https://api.whatsapp.com/" target="_blank" title="Whatsapp">
                                        <li><i class="bi-whatsapp"></i></li>
                                    </a>
                                    <a href="https://www.facebook.com/" target="_blank" title="Facebook">
                                        <li class="li"><i class="bi-facebook"></i></li>
                                    </a>
                                    <a href="https://twitter.com/" target="_blank" title="Twitter">
                                        <li class="li"><i class="bi-twitter"></i></li>
                                    </a>
                                    <a href="https://www.linkedin.com/" target="_blank" title="Linkedin">
                                        <li class="li"><i class="bi-linkedin"></i></li>
                                    </a>
                                    <a href="https://www.pinterest.com/" target="_blank" title="Pinterest">
                                        <li class="li"><i class="bi-pinterest"></i></li>
                                    </a>
                                </ul>
                            </div>
                            <div class="content-div mobile-content2">
                                <h3>Paul Emmanuel</h3>
                                <p>Branch Manager</p>
                            </div>
                        </div>

                        <div class="team-div" data-aos="fade-in" data-aos-duration="1000">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/team/abayomi-taiwo.jpg"
                                    alt="Afolabi Abayomi Taiwo" />
                            </div>
                            <div class="icon-div">
                                <i class="bi-share"></i>
                            </div>
                            <div id="media" class="animated fadeIn">
                                <ul>
                                    <a href="https://api.whatsapp.com/" target="_blank" title="Whatsapp">
                                        <li><i class="bi-whatsapp"></i></li>
                                    </a>
                                    <a href="https://www.facebook.com/" target="_blank" title="Facebook">
                                        <li class="li"><i class="bi-facebook"></i></li>
                                    </a>
                                    <a href="https://twitter.com/" target="_blank" title="Twitter">
                                        <li class="li"><i class="bi-twitter"></i></li>
                                    </a>
                                    <a href="https://www.linkedin.com/" target="_blank" title="Linkedin">
                                        <li class="li"><i class="bi-linkedin"></i></li>
                                    </a>
                                    <a href="https://www.pinterest.com/" target="_blank" title="Pinterest">
                                        <li class="li"><i class="bi-pinterest"></i></li>
                                    </a>
                                </ul>
                            </div>
                            <div class="content-div">
                                <h3>Abayomi Taiwo</h3>
                                <p>Senior Developer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br clear="all" />

        <section class="body-div blog-body-div">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div>
                            <span class="top-title">LATEST INSIGHTS</span>
                            <h2>Our Latest News And <span>#Articles</span></h2>
                        </div>
                        <a href="" title="Explore All Blogs">
                            <button class="btn" title="Explore All Blogs">Explore All Blogs <i
                                    class="bi-arrow-right"></i></button></a>
                    </div>

                    <div class="blog-back-div">
                        <div class="blog-div" data-aos="fade-in" data-aos-duration="1000">
                            <div class="blog-inner-div">
                                <div class="image-div">
                                    <img src="<?php echo $websiteUrl?>/uploaded_files/blog/blog_1.jpg" alt="Blog" />
                                </div>

                                <div class="text-div">
                                    <div class="count"><i class="bi-calendar3"></i> 01 Aug, 2024 <span>|</span> <i
                                            class="bi-eye-fill"></i> 250 VIEWS</div>
                                    <h3>Maximizing Business Efficiency Through Custom Software Development</h3>

                                    <a href="<?php echo $websiteUrl?>" title="Read More">
                                        <button class="btn" title="Read More">Read More <i
                                                class="bi-arrow-right"></i></button></a>
                                </div>
                            </div>
                        </div>

                        <div class="blog-div" data-aos="fade-in" data-aos-duration="1000">
                            <div class="blog-inner-div">
                                <div class="image-div">
                                    <img src="<?php echo $websiteUrl?>/uploaded_files/blog/blog_2.png" alt="Blog" />
                                </div>

                                <div class="text-div">
                                    <div class="count"><i class="bi-calendar3"></i> 01 Aug, 2024 <span>|</span> <i
                                            class="bi-eye-fill"></i> 50 VIEWS</div>
                                    <h3>Enhancing Digital Transformation with Scalable Cloud Solutions for Modern
                                        Enterprises</h3>

                                    <a href="<?php echo $websiteUrl?>" title="Read More">
                                        <button class="btn" title="Read More">Read More <i
                                                class="bi-arrow-right"></i></button></a>
                                </div>
                            </div>
                        </div>

                        <div class="blog-div" data-aos="fade-in" data-aos-duration="1000">
                            <div class="blog-inner-div">
                                <div class="image-div">
                                    <img src="<?php echo $websiteUrl?>/uploaded_files/blog/blog_3.jpeg" alt="Blog" />
                                </div>

                                <div class="text-div">
                                    <div class="count"><i class="bi-calendar3"></i> 01 Aug, 2024 <span>|</span> <i
                                            class="bi-eye-fill"></i> 200 VIEWS</div>
                                    <h3>Leveraging Cutting-Edge Cybersecurity Strategies to Protect Your Business in a
                                        Digital World</h3>

                                    <a href="<?php echo $websiteUrl?>" title="Read More">
                                        <button class="btn" title="Read More">Read More <i
                                                class="bi-arrow-right"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php'?>
    </section>
</body>

</html>