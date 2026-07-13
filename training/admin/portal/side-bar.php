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
                    <i class="bi bi-person-bounding-box"></i>
                    <span>Administrators</span>
                </div>

                <div class="nav-div" title="Students" id="studentPage"
                    onclick="_getActivePage({page:'studentPage', divid:'studentPage'});">
                    <i class="bi bi-people"></i>
                    <span>Students</span>
                </div>

                <div class="nav-div" title="Report" id="ReportPage"
                    onclick="_getActivePage({page:'ReportPage', divid:'ReportPage'});">
                    <i class="bi bi-graph-up-arrow"></i>
                    <span>Report</span>
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