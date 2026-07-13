<div class="side-nav-div animated fadeInLeft">
    <div class="div-in">
        <div class="logo-div">
            <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="<?php echo $appName ?> logo" />
        </div>

        <div class="nav-wrapper">
            <div class="nav-back-div">
                <div class="nav-div active-li" title="Dashboard" id="dashboard"
                    onclick="_getActivePage({page:'dashboard', divid:'dashboard'});">
                    <i class="bi-speedometer2"></i>
                    <span>Dashboard</span>
                </div>

                <div class="nav-div" title="Administrators" id="adminPage"
                    onclick="_getActivePage({page:'adminPage', divid:'adminPage'});">
                    <i class="bi bi-people"></i>
                    <span>Administrators</span>
                </div>

                <div class="nav-div" title="Services" id="servicePage"
                    onclick="_getActivePage({page:'servicePage', divid:'servicePage'});">
                    <i class="bi bi-stack"></i>
                    <span>Services</span>
                </div>

                <div class="nav-div" title="Courses" id="coursePage"
                    onclick="_getActivePage({page:'coursePage', divid:'coursePage'});">
                    <i class="bi bi-journal-code"></i>
                    <span>Courses</span>
                </div>

                <div class="nav-div" title="Portfolio" id="portfolioPage"
                    onclick="_getActivePage({page:'portfolioPage', divid:'portfolioPage'});">
                    <i class="bi bi-images"></i>
                    <span>Portfolio</span>
                </div>

                <div class="nav-div" title="Blog" id="blogPage"
                    onclick="_getActivePage({page:'blogPage', divid:'blogPage'});">
                    <i class="bi bi-journal-text"></i>
                    <span>Blog</span>
                </div>

                <div class="nav-div" title="Frequently Asked Questions" id="faqPage"
                    onclick="_getActivePage({page:'faqPage', divid:'faqPage'});">
                    <i class="bi bi-question-circle"></i>
                    <span>FAQ</span>
                </div>

                <div class="nav-div" title="Reviews" id="reviewPage"
                    onclick="_getActivePage({page:'reviewPage', divid:'reviewPage'});">
                    <i class="bi bi-chat-text"></i>
                    <span>Reviews</span>
                </div>
            </div>

            <div class="nav-back-div">
                <div class="nav-div" title="System Settings" id="settingsPage"
                    onclick="_getActivePage({page:'settingsPage', divid:'settingsPage'});">
                    <i class="bi-gear"></i>
                    <span>Settings</span>
                </div>

                <div class="nav-div" title="Log-Out"
                    onclick="_confirmLogOut();">
                    <i class="bi-box-arrow-right"></i>
                    <span>Log-Out</span>
                </div>
            </div>
        </div>
    </div>
</div>