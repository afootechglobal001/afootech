<?php include '../config/constants.php'; ?>
<?php include '../config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html id="other-page-header" lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include '../meta.php' ?>
    <title><?php echo $appName ?> | Gallery - Projects, ICT Training & Technology Events</title>
    <meta name="description"
        content="Explore the AfooTECH Global gallery featuring software development projects, web and mobile applications, ICT training sessions, AI workshops, cybersecurity practicals, networking labs, UI/UX design classes, graphics design projects, coding bootcamps, student activities, and technology events." />
    <meta name="keywords"
        content="<?php echo $appName ?> gallery, AfooTECH Global gallery, software development gallery, ICT training gallery, web development projects, mobile app development, AI workshop gallery, cybersecurity training, networking practicals, UI/UX design gallery, graphics design portfolio, coding bootcamp, technology events, student projects, hackathon gallery, software engineering, programming classes Nigeria, tech company gallery, Ogun State ICT training" />
    <!-- Open Graph -->
    <meta property="og:title"
        content="<?php echo $appName ?> | Gallery - Projects, ICT Training & Technology Events" />
    <meta property="og:image"
        content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta property="og:description"
        content="Browse photos and highlights from AfooTECH Global's software projects, ICT training programs, AI workshops, cybersecurity practicals, networking sessions, student achievements, and technology events." />
    <!-- Twitter -->
    <meta name="twitter:title"
        content="<?php echo $appName ?> | Gallery - Projects, ICT Training & Technology Events" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image"
        content="<?php echo $websiteUrl ?>/all-images/plugin-pix/afootech-banner.jpg" />
    <meta name="twitter:description"
        content="Take a look inside AfooTECH Global through our gallery of innovative software projects, hands-on ICT training, coding bootcamps, AI and cybersecurity workshops, student success stories, and technology events." />
</head>

<body>
    <?php include '../header.php' ?>
    <section class="other-pages" data-aos="fade-in" data-aos-duration="900">
        <?php
            _otherPagesTitleContent([
                'title' => 'Our',
                'highlight' => 'Gallery',
                'description' => 'Explore moments from AfooTECH Global software development projects, ICT training programs, coding bootcamps, AI and cybersecurity workshops, networking practicals, UI/UX design sessions, student achievements, technology events, and digital innovations.',
                'image' => '/all-images/images/other-pg-image.png',
                'breadcrumbs' => [
                    [
                        'title' => 'Home',
                        'url' => $websiteUrl,
                        'last' => false
                    ],
                    [
                        'title' => 'Our Gallery',
                        'url' => $websiteUrl . '/gallery',
                        'last' => true
                    ]
                ]
            ]);
        ?>
    </section>

    <section class="others-pg-content-div">
        <section class="body-div net-bg-br">
            <div class="body-div-in">
                <div class="page-back-div portfolio-pages-back-div">
                    <div class="right-div sticky-div" data-aos="fade-up" data-aos-duration="900">
                        <div class="div-in">
                            <h3>SEARCH</h3>
                            <div class="text_field_container">
                                <input class="text_field" id="searchContent" onkeyup="_filtersPages(this.value, 'allProjectContainer', 'portfolio-card');" type="text" placeholder="" />
                                <div class="placeholder">Type Here To Search</div>
                            </div>
                        </div>

                        <div class="div-in">
                            <h3>CATEGORY LIST</h3>

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
                        <div class="portfolio-back-div" id="allProjectContainer" data-aos="fade-up" data-aos-duration="900">
                            <div class="portfolio-card" onclick="_getForm({page:'galleryDetails', url:siteMiddlewareUrl});">
                                <div class="title ">Training</div>
                                <div class="image-div">
                                    <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_2.jpg" alt="Blog" />
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title" title="Frontend Development Class">Frontend Development Class</h3>
                                    <div class="portfolio-meta">
                                        <div class="location"><i class="bi bi-calendar3"></i> <span>May 15, 2026</span></div>
                                        <div class="location"><i class="bi bi-images"></i> <span>10</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="portfolio-card">
                                <div class="title ">Training</div>
                                <div class="image-div">
                                    <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_3.jpg" alt="Blog" />
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title" title="Frontend Development Class">Student Project Presentation</h3>
                                    <div class="portfolio-meta">
                                        <div class="location"><i class="bi bi-calendar3"></i> <span>May 25, 2026</span></div>
                                        <div class="location"><i class="bi bi-images"></i> <span>15</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="portfolio-card">
                                <div class="title ">Training</div>
                                <div class="image-div">
                                    <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_4.jpg" alt="Blog" />
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title" title="Frontend Development Class">UI/UX Design Session</h3>
                                    <div class="portfolio-meta">
                                        <div class="location"><i class="bi bi-calendar3"></i> <span>June 2, 2026</span></div>
                                        <div class="location"><i class="bi bi-images"></i> <span>25</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="portfolio-card">
                                <div class="title ">Training</div>
                                <div class="image-div">
                                    <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_2.jpg" alt="Blog" />
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title" title="Frontend Development Class">Frontend Development Class</h3>
                                    <div class="portfolio-meta">
                                        <div class="location"><i class="bi bi-calendar3"></i> <span>May 15, 2026</span></div>
                                        <div class="location"><i class="bi bi-images"></i> <span>10</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php include '../footer.php' ?>
    </section>
</body>

</html>