<?php if ($page == 'userConfiguration') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi bi-gear"></i></div>
            </div>
            <div class="text-div">
                <div class="back-div"><span id="settingsPage" title="Click to return to System Settings" onclick="_getActivePage({page:'settingsPage', divid:'settingsPage'});"><i class="bi-arrow-left"></i>System Settings /</span> Role And Permissions</div>
                <h3>Roles And Permissions</h3>
                <p>Manage user roles and permissions effortlessly. Control system privileges, and maintain secure operations.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" id="searchContent" onkeyup="filters('Content');" placeholder="Search role Here...">
                <i class="bi bi-search"></i>
            </div>
            <button class="btn" title="ADD NEW ROLE" onclick="_getForm({page: 'roleReg', url: adminPortalMiddlewareUrl});">
                <i class="bi-plus-square"></i> ADD NEW ROLE
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-gear"></i>
                    <p>Roles And Permission</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="role-list-back-div" id="rolesContent">
                    <div class="role-list-div" id="role_${item.roleId}" onclick="">
                        <div class="div-in">
                            <div class="icon-div"><i class="bi-shield-fill-check"></i></div>
                            <div class="text-div">
                                <h4>SUPER ADMIN</h4>
                                <p>Has unrestricted access to all modules, including staff administration, client information, system settings, and security controls.</p>
                            </div>
                        </div>
                        <div class="bottom-div">
                            <div class="count-div"><i class="bi-person-circle"></i>&nbsp; <span>1</span> ACTIVE USER</div>
                        </div>
                    </div>

                    <div class="role-list-div" id="role_${item.roleId}" onclick="">
                        <div class="div-in">
                            <div class="icon-div"><i class="bi-person-badge-fill"></i></div>
                            <div class="text-div">
                                <h4>ADMINISTRATORS</h4>
                                <p>Manage daily operations, assign staff, monitor project progress, approve records, and generate operational reports.</p>
                            </div>
                        </div>
                        <div class="bottom-div">
                            <div class="count-div"><i class="bi-person-circle"></i>&nbsp; <span>1</span> ACTIVE USER</div>
                        </div>
                    </div>

                    <div class="role-list-div" id="role_${item.roleId}" onclick="">
                        <div class="div-in">
                            <div class="icon-div"><i class="bi-person-workspace"></i></div>
                            <div class="text-div">
                                <h4>STAFF</h4>
                                <p>Access manage site activities, and collaborate with project managers and administrators.</p>
                            </div>
                        </div>
                        <div class="bottom-div">
                            <div class="count-div"><i class="bi-person-circle"></i>&nbsp; <span>1</span> ACTIVE USER</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php if ($page == 'roleReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-people"></i></div>
                <h3 id="pageTitle">ADD A NEW ROLE</h3>
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
                <p>You are about to <span id="subTitle"></span>. Please complete the form below with accurate details to successfully <span id="subTitle2"></span>.</p>
            </div>

            <div class="main-content-div form-main-content-div">
                <div class="tables-content-div form-table-content-div">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-people"></i>
                            <p>Create Role</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="roleName_container">
                            <script>
                                textField({
                                    id: 'roleName',
                                    title: 'Role Name',
                                });
                            </script>
                        </div>

                        <div class="text_area_container" id="roleDescription_container">
                            <script>
                                textField({
                                    id: 'roleDescription',
                                    title: 'Role Description',
                                    type: 'textarea',
                                });
                            </script>
                        </div>

                        <div class="permission-form-back-div">
                            <div class="title-div">
                                <h4>Permissions</h4>
                                <p>Every user has a default permission to view dashboard overview. You can customized other settings and permissions based on individual privileges</p>
                            </div>

                            <div class="permission-toggle-div">
                                <div class="toggle-title">Dashboard Permissions</div>
                                <div class="fetch-toggle" id="dashboard">
                                    <div class="each-toggle-div">
                                        <span>View Super Admin Dashboard (1)</span>
                                        <label for="role_1" class="switch">
                                            <input type="checkbox" class="child" id="role_1" name="rolePermissionId[]" data-value="1">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>

                                    <div class="each-toggle-div">
                                        <span>View Admin Dashboard (2)</span>
                                        <label for="role_2" class="switch">
                                            <input type="checkbox" class="child" id="role_2" name="rolePermissionId[]" data-value="2">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>

                                    <div class="each-toggle-div">
                                        <span>View Staff Dashboard (3)</span>
                                        <label for="role_3" class="switch">
                                            <input type="checkbox" class="child" id="role_3" name="rolePermissionId[]" data-value="3">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="permission-toggle-div">
                                <div class="toggle-title">Administrative Permissions</div>
                                <div class="fetch-toggle" id="administrative">
                                    <div class="each-toggle-div">
                                        <span>Can Manage Staff (4)</span>
                                        <label for="role_4" class="switch">
                                            <input type="checkbox" class="child" id="role_4" name="rolePermissionId[]" data-value="4">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>

                                    <div class="each-toggle-div">
                                        <span>Can Create Staff (5)</span>
                                        <label for="role_5" class="switch">
                                            <input type="checkbox" class="child" id="role_5" name="rolePermissionId[]" data-value="5">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>

                                    <div class="each-toggle-div">
                                        <span>Can Update Staff (6)</span>
                                        <label for="role_6" class="switch">
                                            <input type="checkbox" class="child" id="role_6" name="rolePermissionId[]" data-value="6">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="permission-toggle-div">
                                <div class="toggle-title">Services Permissions</div>
                                <div class="fetch-toggle" id="services">
                                    <div class="each-toggle-div">
                                        <span>Can Manage Services (7)</span>
                                        <label for="role_7" class="switch">
                                            <input type="checkbox" class="child" id="role_7" name="rolePermissionId[]" data-value="7">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>

                                    <div class="each-toggle-div">
                                        <span>Can Create Services (8)</span>
                                        <label for="role_8" class="switch">
                                            <input type="checkbox" class="child" id="role_8" name="rolePermissionId[]" data-value="8">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>

                                    <div class="each-toggle-div">
                                        <span>Can Update Services (9)</span>
                                        <label for="role_9" class="switch">
                                            <input type="checkbox" class="child" id="role_9" name="rolePermissionId[]" data-value="9">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="permission-toggle-div">
                                <div class="toggle-title">Portfolio Permissions</div>
                                <div class="fetch-toggle" id="portfolio">
                                    <div class="each-toggle-div">
                                        <span>Can Manage Portfolio (10)</span>
                                        <label for="role_10" class="switch">
                                            <input type="checkbox" class="child" id="role_10" name="rolePermissionId[]" data-value="10">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>

                                    <div class="each-toggle-div">
                                        <span>Can Create Portfolio (11)</span>
                                        <label for="role_11" class="switch">
                                            <input type="checkbox" class="child" id="role_11" name="rolePermissionId[]" data-value="11">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>

                                    <div class="each-toggle-div">
                                        <span>Can Update Portfolio (12)</span>
                                        <label for="role_12" class="switch">
                                            <input type="checkbox" class="child" id="role_12" name="rolePermissionId[]" data-value="12">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="permission-toggle-div">
                                <div class="toggle-title">Publish Permissions</div>
                                <div class="fetch-toggle" id="publish">
                                    <div class="each-toggle-div">
                                        <span>Can Manage Publish (13)</span>
                                        <label for="role_13" class="switch">
                                            <input type="checkbox" class="child" id="role_13" name="rolePermissionId[]" data-value="13">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>

                                    <div class="each-toggle-div">
                                        <span>Can Create Blog (14)</span>
                                        <label for="role_14" class="switch">
                                            <input type="checkbox" class="child" id="role_14" name="rolePermissionId[]" data-value="14">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>

                                    <div class="each-toggle-div">
                                        <span>Can Update Blog (15)</span>
                                        <label for="role_15" class="switch">
                                            <input type="checkbox" class="child" id="role_15" name="rolePermissionId[]" data-value="15">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>

                                    <div class="each-toggle-div">
                                        <span>Can Create Faq (16)</span>
                                        <label for="role_16" class="switch">
                                            <input type="checkbox" class="child" id="role_16" name="rolePermissionId[]" data-value="16">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>

                                    <div class="each-toggle-div">
                                        <span>Can Update Faq (17)</span>
                                        <label for="role_17" class="switch">
                                            <input type="checkbox" class="child" id="role_17" name="rolePermissionId[]" data-value="17">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="permission-toggle-div">
                                <div class="toggle-title">Review Permissions</div>
                                <div class="fetch-toggle" id="review">
                                    <div class="each-toggle-div">
                                        <span>Can Manage Review (18)</span>
                                        <label for="role_18" class="switch">
                                            <input type="checkbox" class="child" id="role_18" name="rolePermissionId[]" data-value="18">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>

                                    <div class="each-toggle-div">
                                        <span>Can Update Review (19)</span>
                                        <label for="role_19" class="switch">
                                            <input type="checkbox" class="child" id="role_19" name="rolePermissionId[]" data-value="19">
                                            <span class="slider"></span>
                                            <span class="toggle-label">No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <script>
                                _userRoleCheck();
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" title="SUBMIT" id="submitBtn" onclick="_createUpdateRole();"> <i class="bi-check"></i> SUBMIT </button>
            </div>
        </div>
    </div>
<?php } ?>



<?php if ($page == 'updateRole') { ?>
    <script>
        getEachRoleDetails = JSON.parse(sessionStorage.getItem("getEachRoleDetails"));
    </script>

    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-people"></i></div>
                <h3 id="roleName">
                    <script>
                        $("#roleName").html(getEachRoleDetails.roleName);
                    </script>
                </h3>
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
                <div class="title">Role Description</div>
                <p id="roleDescription">
                    <script>
                        $("#roleDescription").html(capitalizeFirstLetterOfEachWord(getEachRoleDetails.roleDescription));
                    </script>
                </p>
            </div>

            <div id="user-details">
                <div class="main-content-div form-main-content-div">
                    <div class="tables-content-div form-table-content-div">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-people"></i>
                                <p>Permissions</p>
                            </div>
                        </div>

                        <div class="form-container">
                            <div class="fetched-permission-back-div">
                                <div id="fetchedPermission">
                                    <script>
                                        $(document).ready(function() {
                                            let text = '';

                                            for (let i = 0; i < getEachRoleDetails.rolePermissions.length; i++) {
                                                const rolePermissionName = getEachRoleDetails.rolePermissions[i].rolePermissionName;

                                                text +=
                                                    `<div class="fetched-permission-div">
                                                    <span>${rolePermissionName}</span>
                                                </div>`;
                                            }
                                            $("#fetchedPermission").html(text);
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>

                        <div class="details-div">
                            <div class="details-list">
                                <div class="title">Created By:</div>
                                <div class="each-details-back-list">
                                    <div class="each-details-list">
                                        <div>Full Name:</div>
                                        <span id="fullName">
                                            <script>
                                                $("#fullName").html(capitalizeFirstLetterOfEachWord(getEachRoleDetails.createdBy[0].fullname));
                                            </script>
                                        </span>
                                    </div>

                                    <div class="each-details-list">
                                        <div>Email Address:</div>
                                        <span id="emailAddress">
                                            <script>
                                                $("#emailAddress").html(getEachRoleDetails.createdBy[0].emailAddress);
                                            </script>
                                        </span>
                                    </div>

                                    <div class="each-details-list">
                                        <div>Date Created:</div>
                                        <span id="createdTime">
                                            <script>
                                                $("#createdTime").html(getEachRoleDetails.createdTime);
                                            </script>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="details-list">
                                <div class="title">Updated By:</div>
                                <div class="each-details-back-list">
                                    <div class="each-details-list">
                                        <div>Full Name:</div>
                                        <span id="fullName2">
                                            <script>
                                                $("#fullName2").html(capitalizeFirstLetterOfEachWord(getEachRoleDetails.updatedBy[0]?.fullname ?? ''));
                                            </script>
                                        </span>
                                    </div>

                                    <div class="each-details-list">
                                        <div>Email Address:</div>
                                        <span id="emailAddress2">
                                            <script>
                                                $("#emailAddress2").html(getEachRoleDetails.updatedBy[0]?.emailAddress ?? '');
                                            </script>
                                        </span>
                                    </div>

                                    <div class="each-details-list">
                                        <div>Date Updated:</div>
                                        <span id="updatedTime">
                                            <script>
                                                $("#updatedTime").html(getEachRoleDetails.updatedTime);
                                            </script>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-div" id="btnDiv"></div>
            <script>
                $(document).ready(function() {
                    let showButton = '';
                    showButton =
                        `<button class="btn" title="Edit User Role" id="edit_btn" onclick="_getForm({page: 'roleReg', url: adminPortalLocalUrl});">
                                    <i class="bi-check"></i> Edit User Role
                                </button>`;
                    if (getEachRoleDetails.userCount === "0") {
                        showButton +=
                            `<button class="btn delete-btn" title="Delete User Role" id="delete_btn_${getEachRoleDetails.roleId}" onclick="_deleteRole('${getEachRoleDetails.roleId}');">
                                    <i class="bi-trash3"></i> Delete User Role
                                </button>`;
                    }

                    $("#btnDiv").html(showButton);
                });
            </script>
        </div>
    </div>
<?php } ?>