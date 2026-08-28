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
                            <div class="name"><strong id="loginHeaderName"><script>
                                        $("#loginHeaderName").html(capitalizeFirstLetterOfEachWord(staffLoginData?.firstName + " " + staffLoginData?.lastName));
                                    </script></strong></div>
                            <div class="role" id="loginRoleName"><script>
                                    $("#loginRoleName").html(staffLoginData?.roleData?.roleName);
                                </script></div>
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
                                <script>
                                    $("#loginProfileName").html(getFirstLettersOfEachWord(staffLoginData?.firstName + " " + staffLoginData?.lastName));
                                </script>
                            </div>
                            <div class="text">
                                <h2 id="loginUserFullname">
                                    <script>
                                        $("#loginUserFullname").html(capitalizeFirstLetterOfEachWord(staffLoginData?.firstName + " " + staffLoginData?.lastName));
                                    </script>
                                </h2>
                                <p id="loginUserEmail">
                                    <script>
                                        $("#loginUserEmail").html(staffLoginData?.emailAddress);
                                    </script>
                                </p>
                                <p id="loginUserPhone"></p>
                                    <script>
                                        $("#loginUserPhone").html(staffLoginData?.phoneNumber);
                                    </script>
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
                            <li title="Students" onclick="_getActivePage({page:'studentPage', divid:'studentPage'});">
                                <i class="bi bi-people"></i> Students
                            </li>
                            <li title="Report"
                                onclick="_getActivePage({page:'reportPage', divid:'reportPage'});">
                                <i class="bi bi-graph-up-arrow"></i> Report
                            </li>
                            <li title="Settings"
                                onclick="_getActivePage({page:'settingsPage', divid:'settingsPage'});">
                                <i class="bi bi-gear"></i> Settings
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