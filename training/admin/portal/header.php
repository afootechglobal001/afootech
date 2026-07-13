<?php include 'alert.php' ?>
<header class="fadeInDown animated">
    <div class="header-div-in">
        <div class="header-nav-div">
            <div class="left-nav">
                <ul>
                    <li class="active-li" title="Dashboard" onclick="_getActivePage({page:'dashboard', divid:'topDashboard'});" id="topDashboard"><i class="bi-speedometer2"></i> Dashboard</li>
                </ul>
            </div>

            <div class="right-nav">
                <div class="right-icon-div left-icon-div">
                    <div class="icon-div" onclick="_getActivePage({page:'settingsPage', divid:'settingsPage'});" title="System Settings">
                        <i class="bi-gear"></i>
                    </div>

                    <div class="icon-div bell_notification" onclick="_getActivePage({page:'systemAlert', divid:'systemAlert'});" title="System Alert">
                        <i class="bi-bell"></i>
                        <div>20</div>
                    </div>
                </div>

                <div class="right-icon-div no-border" title="Click To View Profile" onclick="_toggleProfileDiv()">
                    <div class="profile-div">
                        <div class="info-div">
                            <div class="name"><strong id="loginHeaderName">Hon. Emmanuel Paul</strong></div>
                            <div class="role" id="loginRoleName">SUPER ADMIN</div>
                        </div>

                        <div class="img-div" id="profilePix">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="Profile Image" />
                        </div>
                    </div>
                </div>

                <div class="toggle">
                    <div class="toggle-in">
                        <div class="toggle-title">
                            <div class="dp" id="loginProfileName">
                                HE
                            </div>
                            <div class="text">
                                <h2 id="loginUserFullname">
                                    Hon. Emmanuel Paul
                                </h2>
                                <p id="loginUserEmail">
                                    emmanuelpaul@uarconstruction.com
                                </p>
                                <p id="loginUserPhone">
                                    +2348034567890
                                </p>
                            </div>
                        </div>

                        <ul>
                            <li title="Dashboard" onclick="_getActivePage({page:'dashboard', divid:'dashboard'});">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </li>
                            <li title="Administrators" onclick="_getActivePage({page:'adminPage', divid:'adminPage'});">
                                <i class="bi bi-people"></i> Administrators
                            </li>
                            <li title="Services" onclick="_getActivePage({page:'servicePage', divid:'servicePage'});">
                                <i class="bi bi-stack"></i> Services
                            </li>
                            <li title="Portfolio"
                                onclick="_getActivePage({page:'portfolioPage', divid:'portfolioPage'});">
                                <i class="bi bi-images"></i> Portfolio
                            </li>
                            <li class="logOut" title="Log-Out" onclick="_confirmLogOut();">
                                <i class="bi bi-power"></i> Log-Out
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>