<?php if ($page == 'settingsPage') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi bi-gear"></i></div>
            </div>
            <div class="text-div">
                <h3>Global Configurations</h3>
                <p>Manage and configure dashboard settings, global settings and manage users</p>
            </div>
        </div>

        <div class="btn-div">
            <button class="btn" title="LEARN MORE">LEARN MORE</button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-gear"></i>
                    <p>Global Configurations</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="user-managment-back-div" data-aos="fade-in" data-aos-duration="1500">
                    <div class="user-managment-list" onclick="_getPage({page: 'userConfiguration', url: adminPortalMiddlewareUrl});">
                        <div class="inner-div">
                            <div class="icon-div"><img src="<?php echo $websiteUrl ?>/all-images/images/authorization.png" alt="User Role Configurations" /></div>
                            <div class="text-div">
                                <h3>User Role Configurations</h3>
                                <p>User role configurations manage permissions, ensuring secure and efficient access to features.</p>
                            </div>
                        </div>
                    </div>

                    <div class="user-managment-list" onclick="_getForm({page: 'systemSettings', url: adminPortalMiddlewareUrl});">
                        <div class="inner-div">
                            <div class="icon-div"><img src="<?php echo $websiteUrl ?>/all-images/images/blog.png" alt="Blog Category Configurations" /></div>
                            <div class="text-div">
                                <h3>System Configurations</h3>
                                <p>Manage and configure system settings, global settings and manage users</p>
                            </div>
                        </div>
                    </div>

                    <div class="user-managment-list" onclick="_getForm({page: 'changePassword', url: adminPortalMiddlewareUrl});">
                        <div class="inner-div">
                            <div class="icon-div"><img src="<?php echo $websiteUrl ?>/all-images/images/status.png" alt="User Status Configurations" /></div>
                            <div class="text-div">
                                <h3>Change Password</h3>
                                <p>Users can change and upadate their password</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'changePassword') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-shield-lock"></i></div>
                <h3>CHANGE PASSWORD</h3>
            </div>
            <div class="btn-div">
                <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                    <i class="bi bi-x-lg"></i> Close
                </button>
            </div>
        </div>

        <!-- /////////// Title ////////////////////////////// -->
        <div class="container-back-div">
            <div class="form-notification">
                <p>You are about to change your password. Please complete the form below with accurate details to successfully change passoword.</p>
            </div>

            <div class="main-content-div form-main-content-div">
                <div class="tables-content-div form-table-content-div">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-shield-lock"></i>
                            <p>Change Password</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="oldPassword_container">
                            <script>
                                textField({
                                    id: 'oldPassword',
                                    title: 'Enter Your Old Password',
                                    type: 'password'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="newPassword_container">
                            <script>
                                textField({
                                    id: 'newPassword',
                                    title: 'Create New Password',
                                    type: 'password'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="confirmPassword_container">
                            <script>
                                textField({
                                    id: 'confirmPassword',
                                    title: 'Confirm New Passwordd',
                                    type: 'password'
                                });
                            </script>
                        </div>

                        <div class="pswd_info" style="color:#8c8d8d"><em>At least 8 charaters required including upper & lower cases and special characters and numbers.</em></div>
                    </div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" title="CHANGE PASSWORD" id="submitBtn" onclick=""> <i class="bi-check"></i> CHANGE PASSWORD </button>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'systemSettings') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-gear"></i></div>
                <h3>SYSTEM SETTINGS</h3>
            </div>
            <div class="btn-div">
                <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                    <i class="bi bi-x-lg"></i> Close
                </button>
            </div>
        </div>

        <!-- /////////// Title ////////////////////////////// -->
        <div class="container-back-div">
            <div class="form-notification">
                <p>You are about to change your system settings. Please complete the form below with accurate details to successfully change system settings.</p>
            </div>

            <div class="main-content-div form-main-content-div">
                <div class="tables-content-div form-table-content-div">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-gear"></i>
                            <p>System Settings</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="alert alert-success form-alert-div">
                            <span>SYSTEM SETTINGS CONFIGURATION</span>
                            <div class="text_field_back_container">
                                <div class="text_field_container" id="smtpHost_container">
                                    <script>
                                        textField({
                                            id: 'smtpHost',
                                            title: 'SMTP HOST'
                                        });
                                    </script>
                                </div>

                                <div class="text_field_container" id="smtpUsername_container">
                                    <script>
                                        textField({
                                            id: 'smtpUsername',
                                            title: 'SMTP USERNAME'
                                        });
                                    </script>
                                </div>

                                <div class="text_field_container" id="smtpPassword_container">
                                    <script>
                                        textField({
                                            id: 'smtpPassword',
                                            title: 'SMTP PASSWORD',
                                            type: 'password'
                                        });
                                    </script>
                                </div>

                                <div class="text_field_container" id="smtpPort_container">
                                    <script>
                                        textField({
                                            id: 'smtpPort',
                                            title: 'SMTP PORT',
                                            type: 'number'
                                        });
                                    </script>
                                </div>

                                <div class="text_field_container" id="supportEmail_container">
                                    <script>
                                        textField({
                                            id: 'supportEmail',
                                            title: 'SUPPORT EMAIL',
                                            type: 'email'
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" title="UPDATE SYSTEM SETTINGS" id="submitBtn" onclick=""> <i class="bi-check"></i> UPDATE </button>
            </div>
        </div>
    </div>
<?php } ?>