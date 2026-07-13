<?php if ($page == 'adminPage') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi bi-people"></i></div>
            </div>
            <div class="text-div">
                <h3>Administrators</h3>
                <p>Manage administrator accounts with ease. Assign roles, control access, and oversee activities to keep
                    operations secure and well-organized.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" onkeyup="_filtersStaffs(this.value);" placeholder="Search Staff Here...">
                <i class="bi bi-search"></i>
            </div>
            <button class="btn" title="ADD NEW STAFF"
                onclick="_getForm({page: 'staffReg', url: trainingAdminPortalMiddlewareUrl});">
                <i class="bi-plus-square"></i> ADD NEW STAFF
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-people"></i>
                    <p>Administrators</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="table-div animated fadeIn">
                    <table class="table" cellspacing="0" style="width:100%">
                        <thead>
                            <tr class="tb-col">
                                <th>sn</th>
                                <th>User Name</th>
                                <th>Contact</th>
                                <th>Role</th>
                                <th>Last Login</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="tb-row">
                                <td>1</td>
                                <td class="clickable-td" title="Click to view staff profile" onclick="_getForm({page: 'staffProfile', url: trainingAdminPortalMiddlewareUrl});">
                                    <div class="text-back-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl?>/all-images/images/avatar.jpg"
                                                alt="John Anderson" />
                                        </div>
                                        <div class="text-div">
                                            <div class="first-class">John Anderson</div>
                                            <div class="second-class">STF001</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-div">
                                        <div>john.anderson@company.com</div>
                                        <div>+234 803 123 4567</div>
                                    </div>
                                </td>
                                <td>Administrator</td>
                                <td>2023-12-12 12:00:00</td>
                                <td>
                                    <div class="status-div ACTIVE">ACTIVE</div>
                                </td>
                                <td><button class="btn view-btn"
                                        onclick="_getForm({page: 'staffProfile', url: trainingAdminPortalMiddlewareUrl});">VIEW</button>
                                </td>
                            </tr>

                            <tr class="tb-row">
                                <td>2</td>
                                <td class="clickable-td" title="Click to view staff profile">
                                    <div class="text-back-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl?>/all-images/images/avatar.jpg"
                                                alt="Sarah Williams" />
                                        </div>
                                        <div class="text-div">
                                            <div class="first-class">Sarah Williams</div>
                                            <div class="second-class">STF002</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-div">
                                        <div>sarah.williams@company.com</div>
                                        <div>+234 805 234 5678</div>
                                    </div>
                                </td>
                                <td>Staff</td>
                                <td>2023-12-12 08:56:00</td>
                                <td>
                                    <div class="status-div ACTIVE">ACTIVE</div>
                                </td>
                                <td><button class="btn view-btn">VIEW</button></td>
                            </tr>

                            <tr class="tb-row">
                                <td>3</td>
                                <td class="clickable-td" title="Click to view staff profile">
                                    <div class="text-back-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl?>/all-images/images/avatar.jpg"
                                                alt="Michael Johnson" />
                                        </div>
                                        <div class="text-div">
                                            <div class="first-class">Michael Johnson</div>
                                            <div class="second-class">STF003</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-div">
                                        <div>michael.johnson@company.com</div>
                                        <div>+234 806 345 6789</div>
                                    </div>
                                </td>
                                <td>Accountant</td>
                                <td>2023-12-12 10:09:00</td>
                                <td>
                                    <div class="status-div ACTIVE">ACTIVE</div>
                                </td>
                                <td><button class="btn view-btn">VIEW</button></td>
                            </tr>

                            <tr class="tb-row">
                                <td>4</td>
                                <td class="clickable-td" title="Click to view staff profile">
                                    <div class="text-back-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl?>/all-images/images/avatar.jpg"
                                                alt="Emily Brown" />
                                        </div>
                                        <div class="text-div">
                                            <div class="first-class">Emily Brown</div>
                                            <div class="second-class">STF004</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-div">
                                        <div>emily.brown@company.com</div>
                                        <div>+234 807 456 7890</div>
                                    </div>
                                </td>
                                <td>Staff</td>
                                <td>2023-12-12 11:23:00</td>
                                <td>
                                    <div class="status-div ACTIVE">ACTIVE</div>
                                </td>
                                <td><button class="btn view-btn">VIEW</button></td>
                            </tr>

                            <tr class="tb-row">
                                <td>5</td>
                                <td class="clickable-td" title="Click to view staff profile">
                                    <div class="text-back-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl?>/all-images/images/avatar.jpg"
                                                alt="David Wilson" />
                                        </div>
                                        <div class="text-div">
                                            <div class="first-class">David Wilson</div>
                                            <div class="second-class">STF005</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-div">
                                        <div>david.wilson@company.com</div>
                                        <div>+234 808 567 8901</div>
                                    </div>
                                </td>
                                <td>Administrator</td>
                                <td>2023-12-12 12:00:00</td>
                                <td>
                                    <div class="status-div ACTIVE">ACTIVE</div>
                                </td>
                                <td><button class="btn view-btn">VIEW</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div id="staffPaginationControls" class="pagination-div"></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'staffReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-person-bounding-box"></i></div>
                <h3>CREATE NEW STAFF</h3>
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
                <p>You are about to create a new staff. Please complete the form below with accurate details to successfully
                    create new staff.</p>
            </div>

            <div class="main-content-div form-main-content-div">
                <div class="tables-content-div form-table-content-div">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-person-bounding-box"></i>
                            <p>Basic Information</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="fullName_container">
                            <script>
                            textField({
                                id: 'fullName',
                                title: 'Full Name'
                            });
                            </script>
                        </div>

                        <div class="text_field_container" id="emailAddress_container">
                            <script>
                            textField({
                                id: 'emailAddress',
                                title: 'Email Address',
                                type: 'email'
                            });
                            </script>
                        </div>

                        <div class="text_field_container" id="mobileNumber_container">
                            <script>
                            textField({
                                id: 'mobileNumber',
                                title: 'Phone Number',
                                type: 'tel',
                                onKeyPressFunction: 'isNumberCheck(event);'
                            });
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-content-div form-main-content-div">
                <div class="tables-content-div form-table-content-div">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-person-bounding-box"></i>
                            <p>Administrative Information</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="roleId_container">
                            <script>
                            selectField({
                                id: 'roleId',
                                title: 'Select Role'
                            });
                            //_getSelectRole('roleId');
                            </script>
                        </div>

                        <div class="text_field_container" id="statusId_container">
                            <script>
                            selectField({
                                id: 'statusId',
                                title: 'Select Status'
                            });
                            // _getSelectStatusId('statusId', '1,2');
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" title="SUBMIT" id="submitBtn" onclick="_createStaff();"> <i class="bi-check"></i> SUBMIT
                </button>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'staffProfile') { ?>
    <div class="user-profile-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-person-check-fill"></i></div>
                <h3 id="pageTitle">STAFF PROFILE</h3>
            </div>
            <div class="btn-div">
                <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                    <i class="bi bi-x-lg"></i> Close
                </button>
            </div>
        </div>

        <div class="profile-content-div">
            <div class="bg-img">
                <div class="mini-profile">
                    <label>
                        <div class="img-div" id="current_user_passport1">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="Profile Image">
                        </div>
                    </label>

                    <div class="text-back-div">
                        <div class="inner-text">
                            <div class="text-div">
                                <div class="name" id="fullName">
                                    Hon. Emmanuel Paul
                                </div>

                                <div class="text">
                                    <div>
                                        <div id="statusBtn" class="status-btn ACTIVE"><span id="statusName">ACTIVE</span>
                                        </div>
                                    </div>
                                    | LAST LOGIN DATE:
                                    <strong id="lastLoginTime">
                                        2023-12-12 12:00:00
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-div">
                <div class="div-in">
                    <ul>
                        <li class="active" title="My Profile" id="staffProfileDetails"
                            onclick="_getActiveStaffPage({divid:'staffProfileDetails', page: 'staffProfileDetails', url: trainingAdminPortalMiddlewareUrl});">
                            <i class="bi-person-bounding-box"></i> Staff Profile</li>
                    </ul>
                </div>
            </div>

            <div class="field-back-div">
                <div class="field-inner-div" id="getStaffDetails">
                    <script>
                    _getActiveStaffPage({
                        divid: 'staffProfileDetails',
                        page: 'staffProfileDetails',
                        url: trainingAdminPortalMiddlewareUrl
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- For Staffs Modal Pages -->
<?php if ($page == 'staffProfileDetails') { ?>
    <div class="user-in">
        <div class="title">STAFF BASIC INFORMATION</div>

        <div class="profile-segment-div">
            <div class="text_field_container col-3" id="updateFullName_container">
                <script>
                textField({
                    id: 'updateFullName',
                    title: 'First Name',
                });
                </script>
            </div>

            <div class="text_field_container col-3" id="updateMobileNumber_container">
                <script>
                textField({
                    id: 'updateMobileNumber',
                    title: 'Phone Number',
                    type: 'tel',
                });
                </script>
            </div>

            <div class="text_field_container col-3" id="updateEmailAddress_container">
                <script>
                textField({
                    id: 'updateEmailAddress',
                    title: 'Email Address',
                    type: 'email',
                });
                </script>
            </div>
        </div>
    </div>

    <div class="user-in">
        <div class="title">STAFF ACCOUNT INFORMATION</div>
        <div class="profile-segment-div">
            <div class="text_field_container col-3" id="staffId_container">
                <script>
                textField({
                    id: 'staffId',
                    title: 'Staff ID',
                    readonly: true
                });
                </script>
            </div>

            <div class="text_field_container col-3" id="createdTime_container">
                <script>
                textField({
                    id: 'createdTime',
                    title: 'Date Of Registration',
                    readonly: true
                });
                </script>
            </div>

            <div class="text_field_container col-3" id="lastLogin_container">
                <script>
                textField({
                    id: 'lastLogin',
                    title: 'Last Login Date',
                    readonly: true
                });
                </script>
            </div>
        </div>
    </div>

    <div class="user-in">
        <div class="title">ADMINISTRATIVE INFORMATION</div>

        <div class="profile-segment-div">
            <div class="text_field_container col-1" id="updateRoleId_container">
                <script>
                selectField({
                    id: 'updateRoleId',
                    title: 'Select Role',
                });
                //_getSelectRole('updateRoleId');
                </script>
            </div>

            <div class="text_field_container col-1" id="updateStatusId_container">
                <script>
                selectField({
                    id: 'updateStatusId',
                    title: 'Select Status',
                });
                //_getSelectStatusId('updateStatusId', '1,2');
                </script>
            </div>
        </div>
        <div class="btn-div">
            <button class="btn" title="UPDATE PROFILE" id="updateBtn" onclick=""> UPDATE PROFILE <i
                    class="bi-check"></i></button>
        </div>
    </div>
<?php } ?>