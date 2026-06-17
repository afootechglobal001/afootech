<?php  include 'alert.php'?>
<header class="animated fadeInDown">
    <div class="header-top-div">
        <div class="header-top-div-in">
            <div class="left-div">  
                <a href="tel:(+234) 813 125 2996" title="Contact Us">         
                <div class="contact dsp-none"><i class="bi-telephone-outbound"></i> (+234) 813 125 2996</div></a>
                <a href="mailto:info@afootech.com" title="Mail Us"> 
                <div class="contact no-border"><i class="bi-envelope"></i> info@afootech.com</div></a>
            </div>

            <div class="right-div">
                <ul>
                    <a href="<?php echo $websiteUrl ?>" title="SIWES/IT">
                    <li class="li">SIWES/IT</li></a>
                    <a href="<?php echo $websiteUrl ?>" title="Frequently Asked Questions">
                    <li>FAQ</li></a>
                    <a href="<?php echo $websiteUrl ?>" title="Contact Us">
                    <li>Contact Us</li></a>  
                    <a href="<?php echo $websiteUrl ?>" title="Gallery">
                    <li>Gallery</li></a>                                
                </ul>
            </div>
        </div>   
    </div>  

    <div class="header-div-in">
        <div class="logo-div">
            <a href="<?php echo $websiteUrl ?>"><img src="<?php echo $websiteUrl?>/all-images/images/logo.png" alt="<?php echo $appName?> Logo"  class="animated zoomIn"/></a>   
        </div>

        <nav>
            <ul>                          
                <a href="<?php echo $websiteUrl ?>" title="Home Page"><li <?php if (($websiteAutoUrl=="$websiteUrl/index")||($websiteAutoUrl=="$websiteUrl/")||($websiteAutoUrl=="$websiteUrl")) {?> class="active" <?php }?>> Home</li></a>        
                <a href="<?php echo $websiteUrl?>" title="About Us">
                    <li class="about <?php if (strstr($websiteAutoUrl, "$websiteUrl/about")) {?> active <?php }?>">
                        About Us
                    </li>
                </a>

                <li id="expand-li" class="<?php if (strstr($websiteAutoUrl, "$websiteUrl/services/")) {?> active <?php }?>">
                    <a href="<?php echo $websiteUrl?>" title="Our Services">
                    <i class="bi-plus"></i> Our Services </a>
                    <ul class="animated fadeIn">
                        <div class="sub-nav-div">
                            <a class="service-div" href="<?php echo $websiteUrl?>" title="Software Development And Training">                             
                                <div class="pix-div"><img src="<?php echo $websiteUrl?>/uploaded_files/services/software-development-project-ideas.webp" alt="Software Project Development"/></div>
                                <li>Software Project Development</li> 
                            </a>                          
                            
                            <a class="service-div" href="<?php echo $websiteUrl?>" title="Web Application Development">   
                                <div class="pix-div"><img src="<?php echo $websiteUrl?>/uploaded_files/services/Web-Application-Development.jpg" alt="Web Application Development"/></div>
                                <li>Web Application Development</li>                               
                            </a>

                            <a class="service-div" href="<?php echo $websiteUrl?>" title="Mobile Application Development">   
                                <div class="pix-div"><img src="<?php echo $websiteUrl?>/uploaded_files/services/Mobile-Application-Development.jpg" alt="Mobile Application Development"/></div>
                                <li>Mobile Application Development</li>                                
                            </a>

                            <a class="service-div" href="<?php echo $websiteUrl?>" title="Networking And Cyber Security">   
                                <div class="pix-div"><img src="<?php echo $websiteUrl?>/uploaded_files/services/Networking-And-Cyber-Security.jpg" alt="Networking And Cyber Security"/></div>
                                <li>Networking And Cyber Security</li>                               
                            </a>

                            <a class="service-div" href="<?php echo $websiteUrl?>" title="Website Search Engine Optimization">   
                                <div class="pix-div"><img src="<?php echo $websiteUrl?>/uploaded_files/services/Search-Engine-Optimization.jpg" alt="Website Search Engine Optimization"/></div>
                                <li>Website Search Engine Optimization (SEO)</li>                             
                            </a>

                            <a class="service-div" href="<?php echo $websiteUrl?>" title="UIUX And Graphics Design">   
                                <div class="pix-div"><img src="<?php echo $websiteUrl?>/uploaded_files/services/UIUX-And-Graphics-Design.jpg" alt="UIUX And Graphics Design"/></div>
                                <li>UIUX And Graphics Design</li>                              
                            </a>                         
                        </div>                          
                    </ul> 
                </li>

                <li id="expand-li" class="training <?php if (strstr($websiteAutoUrl, "$websiteUrl/training")) {?> active <?php }?>">
                    <a href="<?php echo $websiteUrl?>" title="Training">
                    <i class="bi-plus"></i> Training </a>
                    <ul class="animated fadeIn">
                        <div class="sub-nav-div training-sub-nav">
                            <div class="each-container">
                                <a href="<?php echo $websiteUrl?>" title="Frontend Engineer">                             
                                    <li>Frontend Engineer</li> 
                                </a>                          
                                
                                <a href="<?php echo $websiteUrl?>" title="Backend Engineer">   
                                    <li>Backend Engineer</li>                               
                                </a>

                                <a href="<?php echo $websiteUrl?>" title="Full Stack Engineer">   
                                    <li>Full Stack Engineer</li>                               
                                </a>

                                <a href="<?php echo $websiteUrl?>" title="Computer Networking">   
                                    <li>Computer Networking</li>                                
                                </a>  
                            </div>
                            <div class="each-container">
                                <a href="<?php echo $websiteUrl?>" title="Data Analysis">   
                                    <li>Data Analysis</li>                              
                                </a> 

                                <a href="<?php echo $websiteUrl?>" title="UI/UX Training">   
                                    <li>UI/UX Training</li>                             
                                </a>

                                <a href="<?php echo $websiteUrl?>" title="Graphics Design">   
                                    <li>Graphics Design</li>                              
                                </a>
                            </div>  
                            <div class="each-container info-container">
                                <div class="pix-div"><img src="<?php echo $websiteUrl?>/all-images/body-pix/training.png" alt="training"/></div>
                                <p>AfooTECH Global Organize and develop teams based on skill level, business type, and availability, aiming to build ICT capacity within organizations and individuals..</p>
                                <a href="<?php echo $websiteUrl?>">
                                <button class="btn" title="Apply For Training">Apply For Training <i class="bi-arrow-right"></i></button></a> 
                            </div>                        
                        </div>                          
                    </ul> 
                </li>

                <a href="<?php echo $websiteUrl?>" title="Portfolio">
                    <li class="portfolio <?php if (strstr($websiteAutoUrl, "$websiteUrl/portfolio")) {?> active <?php }?>">
                        Portfolio
                    </li>
                </a>
                
                <a href="<?php echo $websiteUrl?>" title="Blog">
                    <li class="blog <?php if (strstr($websiteAutoUrl, "$websiteUrl/blog/")) {?> active <?php }?>">
                        Blog
                    </li>
                </a>
            </ul>         
        </nav>   
        
        <div class="right-nav-div">
            <div class="nav-icon-div"><i class="bi-search"></i></div>  
            <a href="<?php echo $websiteUrl?>/training" title="Apply For Training">
            <button class="btn" title="Apply For Training">Apply For Training <i class="bi-arrow-right"></i></button></a>
            <button class="mobile-btn" onclick="_open_menu()"><i class="bi-text-right"></i></button>
        </div>         
    </div> 
</header>