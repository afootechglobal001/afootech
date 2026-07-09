<?php include '../config/constants.php'; ?>
<?php include '../config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html id="other-page-header" lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include '../meta.php' ?>
    <title><?php echo $appName ?> | ICT Courses - Software Development, AI & Cybersecurity Training</title>
    <meta name="description"
        content="Browse AfooTECH Global's practical ICT courses designed for students, professionals, and businesses. Learn software development, web development, mobile app development, AI, cybersecurity, networking, UI/UX design, graphics design, Python, JavaScript, PHP, and more." />
    <meta name="keywords"
        content="AfooTECH courses, ICT courses Nigeria, software development courses, web development course, mobile app development course, AI course Nigeria, artificial intelligence training, cybersecurity course, networking course, Python course, JavaScript course, PHP course, UI/UX design course, graphics design course, frontend development, backend development, full stack development, programming classes Nigeria, coding bootcamp Nigeria, tech academy Ogun State, ICT training institute Nigeria" />
    <!-- Open Graph -->
    <meta property="og:title"
        content="<?php echo $appName ?> | ICT Courses - Software Development, AI & Cybersecurity Training" />
    <meta property="og:image"
        content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta property="og:description"
        content="Explore industry-focused ICT courses at AfooTECH Global. Gain practical skills in software engineering, AI, cybersecurity, networking, UI/UX design, graphics design, and mobile & web application development." />
    <!-- Twitter -->
    <meta name="twitter:title"
        content="<?php echo $appName ?> | ICT Courses - Software Development, AI & Cybersecurity Training" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image"
        content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta name="twitter:description"
        content="Start your tech career with AfooTECH Global's practical ICT courses. Learn software development, AI, cybersecurity, networking, UI/UX design, graphics design, web development, and mobile app development from experienced instructors." />
</head>

<body>
    <?php include '../header.php' ?>
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
                    <a href="<?php echo $websiteUrl ?>/courses">
                        <li title="Our Featured Courses">Our Featured Courses</li>
                    </a>
                </ul>
            </div>
            <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                <h1 data-aos="fade-in" data-aos-duration="800">
                    <span>Our Featured Courses</span>
                </h1>

                <p>
                    AfooTECH Global offers a range of courses to meet the needs of our clients. From web development to mobile app development, AI solutions, cybersecurity, networking, UI/UX design, graphics design, and hands-on ICT training, we have you covered.
                </p>

                <?php _otherPagesBtn($websiteUrl); ?>
            </div>
        </div>
    </section>

    <section class="other-pages-main-section">
        <section class="body-div">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div service-title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="title-column">
                            <span class="top-title">WHAT WE OFFER</span>
                            <h2>Dive into Our Transformative and Pioneering <span>#Training</span></h2>
                        </div>
                        <a href="<?php echo $websiteUrl?>/training">
                            <button class="btn" title="Apply For Training">Apply For Training <i
                                    class="bi-arrow-right"></i></button></a>
                    </div>

                    <div class="main-service-back-div page-main-service-back-div">
                        <div class="main-service-div page-main-service-div">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/training/frontend-engineer-training.jpg"
                                    alt="Frontend Web Development" />
                            </div>
                            <div class="title">Training</div>
                            <a href="<?php echo $websiteUrl?>/courses/frontend-web-development" title="Apply Now">
                            <div class="content-div">
                                <h3>Frontend Web Development</h3>
                                <p>Learn HTML, CSS, JavaScript, Bootstrap, Tailwind CSS, and React to build modern, responsive websites.</p>
                                <a href="<?php echo $websiteUrl?>/training" title="Apply Now">
                                    <button class="btn">Apply Now <i
                                            class="bi-arrow-right"></i></button>
                                </a>
                            </div></a>
                        </div>
                                  
                        <div class="main-service-div page-main-service-div">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/training/backend-engineer-training.webp"
                                    alt="Backend & Database Programming" />
                            </div>
                            <div class="title">Training</div>
                            <a href="<?php echo $websiteUrl?>" title="Apply Now">
                            <div class="content-div">
                                <h3>Backend & Database Programming</h3>
                                <p>Master PHP, MySQL, APIs, authentication, and server-side development to create secure web applications.</p>
                                <a href="<?php echo $websiteUrl?>" title="Apply Now">
                                    <button class="btn">Apply Now <i
                                            class="bi-arrow-right"></i></button></a>
                            </div></a>
                        </div>
 
                        <div class="main-service-div page-main-service-div">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/training/fullstack-engineer-training.jpg"
                                    alt="Full Stack Engineer" />
                            </div>
                            <div class="title">Training</div>
                            <a href="<?php echo $websiteUrl?>" title="Apply Now">
                            <div class="content-div">
                                <h3>Full Stack Engineer</h2>
                                <p>Become a complete developer by learning frontend, backend, databases, APIs, and deployment.</p>
                                    <a href="<?php echo $websiteUrl?>" title="Apply Now">
                                        <button class="btn">Apply Now <i
                                                class="bi-arrow-right"></i></button></a>
                            </div></a>
                        </div>
  
                        <div class="main-service-div page-main-service-div">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/training/computer-networking-training.webp"
                                    alt="Cybersecurity And Networking" />
                            </div>
                            <div class="title">Training</div>
                            <a href="<?php echo $websiteUrl?>" title="Apply Now">
                            <div class="content-div">
                                <h3>Cybersecurity And Networking</h3>
                                <p>Master networking, cybersecurity, and ethical hacking to secure systems, troubleshoot networks, and build a successful IT career.</p>
                                <a href="<?php echo $websiteUrl?>" title="Apply Now">
                                    <button class="btn">Apply Now <i
                                            class="bi-arrow-right"></i></button></a>
                            </div></a>
                        </div>

                        <div class="main-service-div page-main-service-div">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/training/data-analysis-training.jpg"
                                    alt="Data Analysis" />
                            </div>
                            <div class="title">Training</div>
                            <a href="<?php echo $websiteUrl?>" title="Apply Now">
                            <div class="content-div">
                                <h3>Data Analysis</h3>
                                <p>Analyze data, create visualizations, and gain insights using Python and industry-standard data tools.</p>
                                <a href="<?php echo $websiteUrl?>" title="Apply Now">
                                    <button class="btn">Apply Now <i
                                            class="bi-arrow-right"></i></button></a>
                            </div></a>
                        </div>

                        <div class="main-service-div page-main-service-div">
                            <div class="image-div">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/training/UIUX-training.webp"
                                    alt="UI/UX And Advanced Graphics Design" />
                            </div>
                            <div class="title">Training</div>
                            <a href="<?php echo $websiteUrl?>" title="Apply Now">
                            <div class="content-div">
                                <h3>UI/UX And Advanced Graphics Design</h3>
                                <p>Master UI/UX design, branding, and advanced graphic design tools to create engaging user experiences and visual identities.</p>
                                <a href="<?php echo $websiteUrl?>" title="Apply Now">
                                    <button class="btn">Apply Now <i
                                            class="bi-arrow-right"></i></button></a>
                            </div></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include '../footer.php' ?>
    </section>

</body>

</html>