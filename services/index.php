<?php include '../config/constants.php'; ?>
<?php include '../config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html id="other-page-header" lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include '../meta.php' ?>
    <title><?php echo $appName ?> | Our Services - Software Development & ICT Training in Nigeria</title>
    <meta name="description"
        content="Explore AfooTECH Global's professional services, including web development, mobile app development, software development, UI/UX design, graphics design, networking, cybersecurity, AI solutions, and industry-focused ICT training in Nigeria." />
    <meta name="keywords"
        content="AfooTECH Global services, software development Nigeria, web development company Nigeria, mobile app development Nigeria, custom software development, ICT training Nigeria, programming training, AI solutions Nigeria, artificial intelligence services, cybersecurity services, networking solutions, UI/UX design, graphics design, website development, Android app development, IT consulting, technology company Nigeria, Ogun State ICT company" />
    <!-- Open Graph -->
    <meta property="og:title"
        content="<?php echo $appName ?> | Our Services - Software Development & ICT Training" />
    <meta property="og:image"
        content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta property="og:description"
        content="Discover AfooTECH Global's innovative technology services, including software development, web and mobile app development, AI solutions, cybersecurity, networking, UI/UX design, and professional ICT training." />
    <!-- Twitter -->
    <meta name="twitter:title"
        content="<?php echo $appName ?> | Our Services - Software Development & ICT Training" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image"
        content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta name="twitter:description"
        content="Partner with AfooTECH Global for software development, web and mobile applications, AI, cybersecurity, networking, UI/UX design, graphics design, and hands-on ICT training designed for individuals and businesses." />
</head>

<body>
    <?php include '../header.php' ?>
    <section class="other-pages" data-aos="fade-in" data-aos-duration="900">
        <?php
            _otherPagesTitleContent([
                'title' => 'Our',
                'highlight' => 'Services',
                'description' => 'AfooTECH Global offers a range of services to meet the needs of our clients. From web development to mobile app development, AI solutions, cybersecurity, networking, UI/UX design, graphics design, and hands-on ICT training, we have you covered.',
                'image' => '/all-images/images/other-pg-image.png',
                'breadcrumbs' => [
                    [
                        'title' => 'Home',
                        'url' => $websiteUrl,
                        'last' => false
                    ],
                    [
                        'title' => 'Our Services',
                        'url' => $websiteUrl . '/services',
                        'last' => true
                    ]
                ]
            ]);
        ?>
    </section>

    <section class="other-pages-main-section">
        <?php _clientCarousel(); ?>
        
        <section class="body-div net-bg-br">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="title-column">
                            <span class="top-title">WHAT WE DO</span>
                            <h2>Boost Your Business With Our Diverse <span>#Services</span></h2>
                        </div>
                        <a href="<?php echo $websiteUrl?>/training">
                            <button class="btn" title="Apply For Training">Apply For Training <i class="bi-arrow-right"></i></button></a>
                    </div>

                    <div class="service-back-div" id="allServicePageContent">
                        <div class="service-div" data-aos="fade-up" data-aos-duration="1200">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/services/software-development-project-ideas.webp" alt="Software Project Development" />
                            </div>
                            <div class="icon-div">
                                <img src="<?php echo $websiteUrl ?>/all-images/images/icon.png"
                                    alt="<?php echo $appName ?> Icon" />
                            </div>
                            <a href="<?php echo $websiteUrl ?>/services/software-project-development">
                            <div class="text-div">
                                <h3>Software Project Development</h3>
                                <p>
                                    AfooTECH Global provides software project development services to help clients create and launch successful software products.
                                    We offer a range of services...
                                </p>
                                    
                                <button class="btn">Read More <i class="bi bi-arrow-right-short"></i></button>
                            </div></a>
                        </div>

                        <div class="service-div" data-aos="fade-up" data-aos-duration="1200">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/services/Web-Application-Development.jpg" alt="Web Application Development" />
                            </div>
                            <div class="icon-div">
                                <img src="<?php echo $websiteUrl ?>/all-images/images/icon.png"
                                    alt="<?php echo $appName ?> Icon" />
                            </div>
                            <a href="<?php echo $websiteUrl ?>/services/software-project-development">
                            <div class="text-div">
                                <h3>Web Application Development</h3>
                                <p>
                                    AfooTECH Global provides web application development services to help clients create and launch successful web products.
                                    We offer a range of services...
                                </p>
                                    
                                <button class="btn">Read More <i class="bi bi-arrow-right-short"></i></button>
                            </div></a>
                        </div>

                        <div class="service-div" data-aos="fade-up" data-aos-duration="1200">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/services/Mobile-Application-Development.jpg" alt="Mobile Application Development" />
                            </div>

                            <div class="icon-div">
                                <img src="<?php echo $websiteUrl ?>/all-images/images/icon.png"
                                    alt="<?php echo $appName ?> Icon" />
                            </div>

                            <a href="<?php echo $websiteUrl ?>/services/software-project-development">
                            <div class="text-div">
                                <h3>Mobile Application Development</h3>
                                <p>
                                    AfooTECH Global provides mobile application development services to help clients create and launch successful mobile products.
                                    We offer a range of services...
                                </p>
                                    
                                <button class="btn">Read More <i class="bi bi-arrow-right-short"></i></button>
                            </div></a>
                        </div>

                        <div class="service-div" data-aos="fade-up" data-aos-duration="1200">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/services/Networking-And-Cyber-Security.jpg" alt="Networking And Cyber Security" />
                            </div>

                            <div class="icon-div">
                                <img src="<?php echo $websiteUrl ?>/all-images/images/icon.png"
                                    alt="<?php echo $appName ?> Icon" />
                            </div>
                            
                            <a href="<?php echo $websiteUrl ?>/services/software-project-development">
                            <div class="text-div">
                                <h3>Networking And Cyber Security</h3>
                                <p>
                                    AfooTECH Global provides networking and cyber security services to help clients create and launch successful networking products.
                                    We offer a range of services...
                                </p>
                                    
                                <button class="btn">Read More <i class="bi bi-arrow-right-short"></i></button>
                            </div></a>
                        </div>

                        <div class="service-div" data-aos="fade-up" data-aos-duration="1200">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/services/Search-Engine-Optimization.jpg" alt="Website Search Engine Optimization (SEO)" />
                            </div>

                            <div class="icon-div">
                                <img src="<?php echo $websiteUrl ?>/all-images/images/icon.png"
                                    alt="<?php echo $appName ?> Icon" />
                            </div>
                            
                            <a href="<?php echo $websiteUrl ?>/services/software-project-development">
                            <div class="text-div">
                                <h3>Website Search Engine Optimization (SEO)</h3>
                                <p>
                                    AfooTECH Global provides website search engine optimization services to help clients create and launch successful website products.
                                    We offer a range of services...
                                </p>
                                    
                                <button class="btn">Read More <i class="bi bi-arrow-right-short"></i></button>
                            </div></a>
                        </div>

                        <div class="service-div" data-aos="fade-up" data-aos-duration="1200">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/services/UIUX-And-Graphics-Design.jpg" alt="UIUX And Graphics Design" />
                            </div>

                            <div class="icon-div">
                                <img src="<?php echo $websiteUrl ?>/all-images/images/icon.png"
                                    alt="<?php echo $appName ?> Icon" />
                            </div>
                            
                            <a href="<?php echo $websiteUrl ?>/services/software-project-development">
                            <div class="text-div">
                                <h3>UIUX And Graphics Design</h3>
                                <p>
                                    AfooTECH Global provides UIUX and graphics design services to help clients create and launch successful website products.
                                    We offer a range of services...
                                </p>
                                    
                                <button class="btn">Read More <i class="bi bi-arrow-right-short"></i></button>
                            </div></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <section class="body-div net-bg-tr">
            <div class="body-div-in">
                <div class="faq-wrapper" data-aos="fade-in" data-aos-duration="1200">
                    <div class="faq-content-div" data-aos="fade-up" data-aos-duration="1200">
                        <div class="title-div">
                            <div class="title-column">
                                <span class="top-title">FAQ</span>
                                <h2>Frequently Asked <span>Questions</span></h2>
                            </div>
                        </div>

                        <div class="faq-toggle-back" id="indexFaqPageContent">
                            <div class="faq-toggle" id="faq1">
                                <div class="title-text" onclick="_collapse('faq1')">
                                    <div class="quest-text-div">
                                        <div class="icon-div"><i class="bi-question"></i></div>
                                        <h3>What is AfooTECH Global?</h3>
                                    </div>
                                    <div class="expand-div" id="faq1num">
                                        <i class="bi bi-plus"></i>
                                    </div>
                                </div>
                                <div class="answer-div" id="faq1answer" style="display: none;">
                                    <p>AfooTECH Global is a software development company that provides training services, web development, mobile app development, AI, cybersecurity, networking, UI/UX design, graphics design, admissions, and technology solutions.
                                    </p>
                                </div>
                            </div>

                            <div class="faq-toggle" id="faq2">
                                <div class="title-text" onclick="_collapse('faq2')">
                                    <div class="quest-text-div">
                                        <div class="icon-div"><i class="bi-question"></i></div>
                                        <h3>What services does AfooTECH Global offer?</h3>
                                    </div>
                                    <div class="expand-div" id="faq2num">
                                        <i class="bi bi-plus"></i>
                                    </div>
                                </div>
                                <div class="answer-div" id="faq2answer" style="display: none;">
                                    <p>AfooTECH Global offers a wide range of services, including training services, web development, mobile app development, AI, cybersecurity, networking, UI/UX design, graphics design, admissions, and technology solutions.
                                    </p>
                                </div>
                            </div>

                            <div class="faq-toggle" id="faq3">
                                <div class="title-text" onclick="_collapse('faq3')">
                                    <div class="quest-text-div">
                                        <div class="icon-div"><i class="bi-question"></i></div>
                                        <h3>What is AfooTECH Global's mission?</h3>
                                    </div>
                                    <div class="expand-div" id="faq1num">
                                        <i class="bi bi-plus"></i>
                                    </div>
                                </div>
                                <div class="answer-div" id="faq3answer" style="display: none;">
                                    <p>AfooTECH Global's mission is to provide high-quality software development services to clients, helping them build and maintain successful software products.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <a href="<?php echo $websiteUrl ?>/faq" title="Read More FAQ">
                            <button class="btn" title="Read More FAQ">Read More <i
                                    class="bi-arrow-right"></i></button></a>
                    </div>

                    <div class="image-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/auth-slide-1.jpeg"
                            alt="Frequently Asked Questions" />
                    </div>
                </div>
            </div>
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

        <?php include '../footer.php' ?>
    </section>

</body>

</html>