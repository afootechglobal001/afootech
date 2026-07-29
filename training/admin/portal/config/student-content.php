<?php if ($page == 'studentPage') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div">
                    <i class="bi bi-mortarboard"></i>
                </div>
            </div>

            <div class="text-div">
                <h3>Students</h3>
                <p>
                    Manage SIWES and IT students, monitor payments,
                    activate training programs and track completion.
                </p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" onkeyup="_filterStudents(this.value);" placeholder="Search Student Here...">
                <i class="bi bi-search"></i>
            </div>

            <button class="btn" title="ADD NEW STUDENT" onclick="_getForm({page:'studentReg', url:trainingAdminPortalMiddlewareUrl});">
                <i class="bi-plus-square"></i>
                ADD NEW STUDENT
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-people"></i>
                    <p>Student Management</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="table-div animated fadeIn">
                    <table class="table" cellspacing="0" style="width:100%">
                        <thead>
                            <tr class="tb-col">
                                <th>SN</th>
                                <th>Student Info</th>
                                <th>Contact</th>
                                <th>Institution</th>
                                <th>Program</th>
                                <th>Level</th>
                                <th>Duration</th>
                                <th>Training Status</th>
                                <th>Training Start Date</th>
                                <th>Training End Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="tb-row">
                                <td>1</td>
                                <td class="clickable-td" onclick="_getForm({page:'studentProfile',url:trainingAdminPortalMiddlewareUrl});">
                                    <div class="text-back-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl?>/all-images/images/avatar.jpg">
                                        </div>

                                        <div class="text-div">
                                            <div class="first-class">
                                                John Emmanuel
                                            </div>

                                            <div class="second-class">
                                                SID00320260624110353
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-div">
                                        <div>
                                            07050903886
                                        </div>
                                        <div>
                                            seunemmanuel107@gmail.com
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-div">
                                        <div>
                                            Gateway ICT Polytechnic
                                        </div>
                                        <div>
                                            Computer Science
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-div">
                                        <div>SIWES</div>
                                        <div>Backend Web Development</div>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-div">
                                        <div>
                                            18012211071
                                        </div>
                                        <div>
                                            ND 1
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    1 - 3 MONTHS
                                </td>

                                <td>
                                    <div class="status-div ACTIVE">
                                        ACTIVE
                                    </div>
                                </td>

                                <td>
                                    1st July, 2026 
                                </td>

                                <td>
                                    30th September, 2026.
                                </td>

                                <td>
                                    <button class="btn view-btn"
                                        onclick="_getForm({page:'studentProfile',url:trainingAdminPortalMiddlewareUrl});">
                                        VIEW
                                    </button>
                                </td>
                            </tr>

                            <tr class="tb-row">
                                <td>2</td>
                                <td class="clickable-td">
                                    <div class="text-back-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl?>/all-images/images/avatar.jpg">
                                        </div>

                                        <div class="text-div">
                                            <div class="first-class">
                                                Mary Johnson
                                            </div>

                                            <div class="second-class">
                                                SID00320260624110353
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-div">
                                        <div>
                                            07050903886
                                        </div>
                                        <div>
                                            seunemmanuel107@gmail.com
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-div">
                                        <div>Gateway ICT Polytechnic</div>
                                        <div>Software Engineering</div>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-div">
                                        <div>SIWES</div>
                                        <div>Frontend Web Development</div>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-div">
                                        <div>
                                            18012211071
                                        </div>
                                        <div>
                                            ND 1
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    1 - 3 MONTHS
                                </td>

                                <td>
                                    <div class="status-div PENDING">
                                        PENDING
                                    </div>
                                </td>
                                <td>
                                    Not Started
                                </td>

                                <td>
                                    Not Started
                                </td>
                                <td>
                                    <button class="btn view-btn">
                                        REVIEW
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div id="studentPaginationControls" class="pagination-div"></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'studentProfile') { ?>
    <div class="user-profile-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-person-check-fill"></i></div>
                <h3 id="pageTitle">STUDENT PROFILE</h3>
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
                        <li class="active" title="My Profile" id="studentProfileDetails"
                            onclick="_getActiveStudentPage({divid:'studentProfileDetails', page: 'studentProfileDetails', url: trainingAdminPortalMiddlewareUrl});">
                            <i class="bi-person-bounding-box"></i> Student Profile</li>
                    </ul>
                </div>
            </div>

            <div class="field-back-div">
                <div class="field-inner-div" id="getStudentDetails">
                    <script>
                    _getActiveStudentPage({
                        divid: 'studentProfileDetails',
                        page: 'studentProfileDetails',
                        url: trainingAdminPortalMiddlewareUrl
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'studentProfileDetails') { ?>
    <div class="main-content-div dash-main-content-div">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-people"></i>
                    <p>Bio Data Details</p>
                </div>
            </div>

            <div class="inner-table-content colum-table-content">
                <div class="text_field_container col-3" id="firstName_container">
                    <script>
                    textField({
                        id: 'firstName',
                        title: 'First Name',
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="lastName_container">
                    <script>
                    textField({
                        id: 'lastName',
                        title: 'Last Name',
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="emailAddress_container">
                    <script>
                    textField({
                        id: 'emailAddress',
                        title: 'Email Address',
                        type: 'email',
                    });
                    </script>
                </div> 

                <div class="text_field_container col-3" id="phoneNumber_container">
                    <script>
                    textField({
                        id: 'phoneNumber',
                        title: 'Phone Number',
                        type: 'tel',
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="registrationStatus_container">
                    <script>
                    textField({
                        id: 'registrationStatus',
                        title: 'Registration Status',
                        readonly: true,
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="registrationDate_container">
                    <script>
                    textField({
                        id: 'registrationDate',
                        title: 'Registration Date',
                        readonly: true,
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content-div dash-main-content-div">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-people"></i>
                    <p>Student Institution Details</p>
                </div>
            </div>

            <div class="inner-table-content colum-table-content">
                <div class="text_field_container col-3" id="studentId_container">
                    <script>
                    textField({
                        id: 'studentId',
                        title: 'Student ID',
                        readonly: true,
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="institutionClass_container">
                    <script>
                    selectField({
                        id: 'institutionClass',
                        title: 'Institution Class',
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="institutionName_container">
                    <script>
                    textField({
                        id: 'institutionName',
                        title: 'Institution Name',
                    });
                    </script>
                </div> 

                <div class="text_field_container col-3" id="departmentName_container">
                    <script>
                    textField({
                        id: 'departmentName',
                        title: 'Department',
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="levelId_container">
                    <script>
                    selectField({
                        id: 'levelId',
                        title: 'Student Level',
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="matricNumber_container">
                    <script>
                    textField({
                        id: 'matricNumber',
                        title: 'Matric Number',
                        readonly: true,
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content-div dash-main-content-div">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-people"></i>
                    <p>Training Details</p>
                </div>
            </div>

            <div class="inner-table-content colum-table-content">
                <div class="text_field_container col-3" id="program_container">
                    <script>
                    textField({
                        id: 'program',
                        title: 'Program',
                        readonly: true,
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="courseId_container">
                    <script>
                    selectField({
                        id: 'courseId',
                        title: 'Course',
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="duration_container">
                    <script>
                    textField({
                        id: 'duration',
                        title: 'Training Duration',
                    });
                    </script>
                </div> 

                <div class="text_field_container col-3" id="trainingStatus_container">
                    <script>
                    selectField({
                        id: 'trainingStatus',
                        title: 'Training Status',
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="trainingStartDate_container">
                    <script>
                    textField({
                        id: 'trainingStartDate',
                        title: 'Training Start Date',
                        type: 'date',
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="trainingEndDate_container">
                    <script>
                    textField({
                        id: 'trainingEndDate',
                        title: 'Training End Date',
                        type: 'date',
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content-div dash-main-content-div">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-credit-card"></i>
                    <p>Payment Details</p>
                </div>
            </div>

            <div class="inner-table-content colum-table-content">
                <div class="text_field_container col-3" id="transactionId_container">
                    <script>
                    textField({
                        id: 'transactionId',
                        title: 'Transaction ID',
                        readonly: true,
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="amount_container">
                    <script>
                    textField({
                        id: 'amount',
                        title: 'Amount',
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="paymentPurpose_container">
                    <script>
                    textField({
                        id: 'paymentPurpose',
                        title: 'Payment Purpose',
                    });
                    </script>
                </div> 

                <div class="text_field_container col-3" id="paymentMethod_container">
                    <script>
                    textField({
                        id: 'paymentMethod',
                        title: 'Payment Method',
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="paymentStatus_container">
                    <script>
                    textField({
                        id: 'paymentStatus',
                        title: 'Payment Status',
                    });
                    </script>
                </div>

                <div class="text_field_container col-3" id="paymentDate_container">
                    <script>
                    textField({
                        id: 'paymentDate',
                        title: 'Payment Date',
                        readonly: true,
                    });
                    </script>
                </div>
            </div>
        </div>   
    </div>

    <div class="form-bottom-btn-div">
        <button class="btn" title="ACTIVATE STUDENT" id="activateBtn" onclick=""> ACTIVATE STUDENT <i
                class="bi-check"></i></button>
    </div>
<?php } ?>