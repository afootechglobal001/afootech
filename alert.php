<div class="all-alert-back-div">
    <div class="success-alert-div animated fadeInDown">
        <div class="icon"><i class="bi-check-all"></i></div>
        <div class="text">
            <p>PASSWORD RESET SUCCESSFUL! Check your email to confirm.</p>
        </div>
    </div>
</div>

<div id="get-form-more-div">
    <div class="alert-loading-div">
        <div class="icon"><img src="<?php echo $websiteUrl ?>/all-images/images/loading.gif" width="20px"
                alt="Loading" /></div>
        <div class="text">
            <p>LOADING...</p>
        </div>
    </div>
</div>

<div id="get-more-div-secondary">
    <div class="alert-loading-div">
        <div class="icon"><img src="<?php echo $websiteUrl ?>/all-images/images/loading.gif" width="20px"
                alt="Loading" /></div>
        <div class="text">
            <p>LOADING...</p>
        </div>
    </div>
</div>

<div id="customConfirmModal" class="modal-overlay" style="display:none;"></div>
<div id="globalLoader" class="modal-preloader modal-overlay" style="display:none;">
    <div>
        <div class="spinner"></div>
        <p id="globalLoaderText">Locking result, please wait...</p>
    </div>
</div>

<div class="webcam-div">
    <div class="div-in">
        <div class="webcam-div-in">
            <div id="my_camera"></div>
            <button class="btn" type="button" onClick="snapPicture()"><i class="fa fa-camera"></i> Take Snapshot </button>
        </div>
    </div>
</div>

<div class="sidenavdiv">

    <div class="live-chat-back-div">

        <a href="tel:(+234) 813 125 2996" title="Call Customer Care">
            <div class="chat-div">
                <div class="icon-div" style="background:#008040;"><i class="bi-telephone-outbound"></i></div>
                <div class="text">(+234) 813 125 2996</div>
                <br clear="all" />
            </div>
        </a>
        <a href="https://api.whatsapp.com/send?text=Hello AfooTECH Global&amp;phone=+234 812 700 0262" target="_blank"
            title="Whatsapp">
            <div class="chat-div">
                <div class="icon-div" style="background:#25D366;"><i class="bi-whatsapp"></i></div>
                <div class="text">(+234) 812 700 0262</div>
                <br clear="all" />
            </div>
        </a>

        <a href="https://web.facebook.com/afootechglobal" target="_blank" title="Facebook">
            <div class="chat-div">
                <div class="icon-div" style="background:#2980b9;"><i class="bi-facebook"></i></div>
                <div class="text">Facebook Page </div>
                <br clear="all" />
            </div>
        </a>

        <a href="https://twitter.com/" target="_blank" title="Twitter">
            <div class="chat-div">
                <div class="icon-div" style="background:#3498db;"><i class="bi-twitter"></i></div>
                <div class="text">Twitter Page</div>
                <br clear="all" />
            </div>
        </a>

        <a href="https://www.instagram.com/" target="_blank" title="Instagram">
            <div class="chat-div">
                <div class="icon-div" style="background-image: linear-gradient(to right,#03F, #F0F);"><i
                        class="bi-instagram"></i></div>
                <div class="text">Instagram Page</div>
                <br clear="all" />
            </div>
        </a>

    </div>


    <div class="index-menu-back-div">
        <div class="top-div">
            <div class="logo-div">
                <a href="<?php echo $websiteUrl?>"><img src="<?php echo $websiteUrl?>/all-images/images/logo.png"
                        alt="<?php echo $appName?> Logo" class="animated zoomIn" /></a>
            </div>
        </div>

        <div class="div-in">
            <div class="div">
                <a href="<?php echo $websiteUrl;?>" title="Home Page">
                    <li <?php if ($page=='index.php') {?> id="active-li" <?php }?>><i class="bi-house"></i> Home Page
                    </li>
                </a>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl ?>/about" title="About Us">
                    <li <?php if ($page=='about.php') {?> id="active-li" <?php }?>><i class="bi-building"></i> About Us
                    </li>
                </a>
            </div>

            <div class="div">
                <li onclick="_open_li('services')"><i class="bi-graph-up-arrow"></i> Our Services <i class="bi-plus"
                        id="side-expand"></i></li>
                <div class="sub-li" id="services-sub-li">
                    <a href="<?php echo $websiteUrl?>" title="Software Project Development">
                        <li>Software Project Development</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>" title="Web Application Development">
                        <li>Web Application Development</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>" title="Android Application Development">
                        <li>Android Application Development</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>" title="Networking And Security">
                        <li>Networking And Security</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>" title="Software Development Training">
                        <li>Software Development Training</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>" title="UIUX / Graphics Design Training">
                        <li>UIUX / Graphics Design Training</li>
                    </a>
                </div>
            </div>

            <div class="div">
                <li onclick="_open_li('training')"><i class="bi-graph-up-arrow"></i> Training <i class="bi-plus"
                        id="side-expand"></i></li>
                <div class="sub-li" id="training-sub-li">
                    <a href="<?php echo $websiteUrl?>" title="Frontend Engineer">
                        <li>Frontend Engineer</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>" title="Backend Engineer">
                        <li>Backend Engineer</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>" title="Full Stack Engineer">
                        <li>Full Stack Engineer</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>" title="omputer Networking">
                        <li>Computer Networking</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>" title="Data Analysis">
                        <li>Data Analysis</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>" title="UI/UX Training">
                        <li>UI/UX Training</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>" title="Graphics Design Training">
                        <li>Graphics Design Training</li>
                    </a>
                </div>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl;?>" title="Portfolio">
                    <li <?php if ($page=='blog') {?> id="active-li" <?php }?>><i class="bi-chat-dots-fill"></i>
                        Portfolio</li>
                </a>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl;?>" title="Frequently Asked Questions">
                    <li <?php if ($page=='faq') {?> id="active-li" <?php }?>><i class="bi-patch-question"></i>
                        Frequently Asked Question</li>
                </a>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl;?>" title="Contact Us">
                    <li <?php if ($page=='contact') {?> id="active-li" <?php }?>><i class="bi-telephone-inbound"></i>
                        Contact Us</li>
                </a>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl;?>" title="Gallery">
                    <li <?php if ($page=='gallery') {?> id="active-li" <?php }?>><i class="bi-images"></i> Gallery</li>
                </a>
            </div>

            <div class="div primary">
                <a href="<?php echo $websiteUrl;?>/training" title="Apply For Training">
                    <li class="training-li" <?php if ($page=='training') {?> id="active-li" <?php }?>><i
                            class="bi-person-circle"></i> Apply For Training</li>
                </a>
            </div>

            <div class="div secondary">
                <a href="<?php echo $websiteUrl;?>/training" title="Apply For SIWES/IT Program">
                    <li class="student-li" <?php if ($page=='training') {?> id="active-li" <?php }?>><i
                            class="bi-person-circle"></i> SIWES/IT Program</li>
                </a>
            </div>
        </div>

    </div>
    <div class="sidenavdiv-in" onclick="_close_side_nav()"></div>
</div>