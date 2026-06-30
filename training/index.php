<?php include '../config/constants.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | SIWES | IT Training</title>
    <meta name="description"
        content="Join AfooTECH Global ICT Training Centre and learn practical digital skills including software development, networking, UI/UX design, graphics design, and more." />
    <meta name="keywords"
        content="SIWES Training centre in Remo, Ogun State, SIWES Placement centre in Remo Ogun State, IT placement centre in Remo Ogun State, Best internship Training centre in Remo, Ogun State, AfooTECH GLOBAL IT SOLUTION, AfooTECH Global, Best ICT training centre in Ogun State, Best ICT training centre in Nigeria, Software development training, Web development training, Web app development training, Android app development training, Programming training, Coding academy in Ogun State, Networking training, Cybersecurity training, UI UX design training, Graphics design training, Digital skills training, IT training centre in Remo, ICT academy Nigeria, Software engineering training, Ogun State, Nigeria, Ode Remo" />
    <meta property="og:title" content="<?php echo $appName ?> | SIWES | IT Training" />
    <meta property="og:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/training-banner.jpg" />
    <meta property="og:description"
        content="Join AfooTECH Global ICT Training Centre and learn practical digital skills including software development, networking, UI/UX design, graphics design, and more." />
    <meta name="twitter:title" content="<?php echo $appName ?> | SIWES | IT Training" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/training-banner.jpg" />
    <meta name="twitter:description"
        content="Join AfooTECH Global ICT Training Centre and learn practical digital skills including software development, networking, UI/UX design, graphics design, and more." />
</head>

<body>
    <?php include '../alert.php' ?>
    <section class="training-section">
        <?php include 'slide.php' ?>
        <div class="slide-overlay">
            <div class="training-header">
                <div class="logo-div animated fadeIn">
                    <a href="<?php echo $websiteUrl ?>">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="Logo"></a>
                </div>

                <div class="social-media-wrapper">
                    <a href="tel:(+234) 813 125 2996" title="Call Customer Care">
                        <div class="social-icon"><i class="bi-telephone-outbound-fill"></i></div>
                    </a>

                    <a href="https://api.whatsapp.com/send?text=Hello AfooTECH Global&amp;phone=+234 812 700 0262"
                        target="_blank" title="Whatsapp">
                        <div class="social-icon whatsapp"><i class="bi-whatsapp"></i></div>
                    </a>
                </div>
            </div>

            <div class="content-wrapper">
                <div class="content-div" data-aos="fade-in" data-aos-duration="1000">
                    <h1>Welcome to AfooTECH Global <span>Diploma, SIWES & IT</span> Programs</h1>
                    <p class="description">
                        Apply for any of the available training programs listed below and start your journey into a
                        future-ready tech career.
                    </p>

                    <div class="program-wrapper">
                        <div class="program-cont">
                            <div class="icon">
                                <i class="bi bi-robot"></i>
                            </div>
                            <div class="content">
                                <h4 title="AI And Automation Programming">AI And Automation Programming</h4>
                            </div>
                        </div>

                        <div class="program-cont program-div-1">
                            <div class="icon icon-1">
                                <i class="bi bi-code-slash"></i>
                            </div>
                            <div class="content">
                                <h4 title="Frontend Web Development">Frontend Web Development</h4>
                            </div>
                        </div>

                        <div class="program-cont program-div-2">
                            <div class="icon icon-2">
                                <i class="bi bi-code-slash"></i>
                            </div>
                            <div class="content">
                                <h4 title="Backend And Database Programming">Backend & Database Programming</h4>
                            </div>
                        </div>

                        <div class="program-cont program-div-3">
                            <div class="icon icon-3">
                                <i class="bi bi-pen"></i>
                            </div>
                            <div class="content">
                                <h4 title="UI/UX And Advanced Graphics Desig">UI/UX And Advanced Graphics Design</h4>
                            </div>
                        </div>

                        <div class="program-cont program-div-4">
                            <div class="icon icon-4">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div class="content">
                                <h4 title="Cybersecurity And Networking">Cybersecurity And Networking</h4>
                            </div>
                        </div>
                    </div>

                    <div class="btn-div">
                        <a href="<?php echo $websiteUrl ?>/training/register">
                            <button class="btn" id="submitBtn" title="Proceed To Registration" onclick="">Proceed To
                                Registration<i class="bi-arrow-right"></i></button></a>
                            <button class="btn right-btn" title="Print Acceptance Letter" onclick="_getForm({page: 'proceedAcceptanceLetterForm', url: trainingMiddlewareUrl})"><strong>Print Acceptance
                                    Letter</strong> <i class="bi-arrow-right"></i></button>
                    </div>
                </div>
            </div>

            <div class="bottom-container">
                <h3>
                    <?php echo $appName ?> -
                    <span id="pageTitle">ICT Programs</span>
                </h3>
                <p>
                    Empowering future-ready IT professionals with skills, tools, and confidence.
                </p>

                <script type="text/javascript">
                    // List of sentences
                    var _CONTENT = [
                        "Practical Learning",
                        "Expert Mentors",
                        "Build Real Projects"
                    ];
                    // Current sentence being processed
                    var _PART = 0;
                    // Character number of the current sentence being processed 
                    var _PART_INDEX = 0;
                    // Element that holds the text
                    var _ELEMENT = document.querySelector("#pageTitle");
                    // Implements typing effect
                    function Type() {
                        var text = _CONTENT[_PART].substring(0, _PART_INDEX + 1);
                        _ELEMENT.innerHTML = text;
                        _PART_INDEX++;

                        // If full sentence has been displayed then start to delete the sentence after some time
                        if (text === _CONTENT[_PART]) {
                            clearInterval(_INTERVAL_VAL);
                            setTimeout(function () {
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
                            setTimeout(function () {
                                _INTERVAL_VAL = setInterval(Type, 50);
                            }, 100);
                        }
                    }
                    // Start the typing effect on load
                    _INTERVAL_VAL = setInterval(Type, 50);
                </script>
            </div>
        </div>
    </section>
    <?php include '../bottom-scripts.php' ?>
</body>

</html>