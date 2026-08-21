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
                                <th>Date Of Reg.</th>
                                <th>Last Login Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="studentPageContent">
                            <script>
                                _fetchStudentData();
                            </script>

                            <tr>
                                <td colspan="20">
                                    <div class="content-loading-div">
                                        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                                    </div>
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
    <script> getEachStudentDetailsSession = JSON.parse(sessionStorage.getItem("getEachStudentDetailsSession")) || []; </script>
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
                        <div class="img-div" id="studentPixPreview">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="Profile Image">
                        </div>

                        <script>
                            $("#studentPixPreview").html(`<img src="${passportPath}/${getEachStudentDetailsSession?.passport}" alt="${getEachStudentDetailsSession?.fullName} Profile Image">`);
                        </script>
                    </label>

                    <div class="text-back-div">
                        <div class="inner-text">
                            <div class="text-div">
                                <div class="name" id="fullName">
                                    <script>
                                        $("#fullName").html(getEachStudentDetailsSession?.fullName);
                                    </script>
                                </div>

                                <div class="text">
                                    <div>
                                        <div id="studentStatusBtn" class="status-btn"><span id="studentStatusName"></span> </div>
                                    </div>
                                    | LAST LOGIN DATE:
                                    <strong id="lastLoginTime">
                                        <script>
                                            $("#lastLoginTime").html(getEachStudentDetailsSession?.lastLoginTime ? getEachStudentDetailsSession?.lastLoginTime : '00-00-00-00');
                                        </script>
                                    </strong>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        const statusName = getEachStudentDetailsSession?.statusData?.statusName; 
                                        $("#studentStatusName").html(statusName);
                                        $("#studentStatusBtn").addClass(statusName);
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-div">
                <div class="div-in">
                    <ul>
                        <li class="active" title="Programs" id="studentPrograms"
                            onclick="_getActiveStudentPage({divid:'studentPrograms', page: 'studentPrograms', url: trainingAdminPortalMiddlewareUrl});">
                            <i class="bi bi-mortarboard"></i> Programs
                        </li>

                        <li title="My Profile" id="studentProfileDetails"
                            onclick="_getActiveStudentPage({divid:'studentProfileDetails', page: 'studentProfileDetails', url: trainingAdminPortalMiddlewareUrl});">
                            <i class="bi bi-person-bounding-box"></i> Student Profile
                        </li>

                        <li title="Payment History" id="studentPaymentHistory"
                            onclick="_getActiveStudentPage({divid:'studentPaymentHistory', page: 'studentPaymentHistory', url: trainingAdminPortalMiddlewareUrl});">
                            <i class="bi bi-credit-card"></i> Payment History
                        </li>
                    </ul>
                </div>
            </div>

            <div class="field-back-div" data-aos="fade-in" data-aos-duration="1200">
                <div class="field-inner-div" id="getStudentDetails">
                    <script>
                    _getActiveStudentPage({
                        divid: 'studentPrograms',
                        page: 'studentPrograms',
                        url: trainingAdminPortalMiddlewareUrl
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- ////// Student Programs /// -->
<?php if ($page == 'studentPrograms') { ?>
    <div class="main-content-div dash-main-content-div" data-aos="fade-in" data-aos-duration="1200">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-mortarboard"></i>
                    <p>Programs</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="program-container" id="studentProgramsPageContent">
                    <script>
                        _fetchStudentProgramsData();
                    </script>
                       
                    <div class="content-loading-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- ////// Student Programs Details Form/// -->
<?php if ($page == 'studentProgramDetailsForm') { ?>
    <script>
      getEachStudentProgramDetailsSession = JSON.parse(sessionStorage.getItem("getEachStudentProgramDetailsSession"));
    </script>
    <section class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-mortarboard"></i></div>
                <h3>PROGRAM DETAILS</h3>
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
                <p>This section provides a complete breakdown of student program, including program status, duration,
                    and program reference.</p>
            </div>

            <!--  ////////////////////////////////////////////////////////////////////////////////-->
            <div class="form-container">
                <div class="main-content-div form-main-content">
                    <div class="tables-content-div form-content-div">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-mortarboard"></i>
                                <p>Student Institution Details</p>
                            </div>
                        </div>

                        <div class="form-text">
                            <div class="alert alert-success form-alert">
                                <div class="alert-list-div">
                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Student ID:</div>
                                            <div>
                                                <span id="studentId">
                                                    <script>
                                                        $("#studentId").html(getEachStudentProgramDetailsSession?.studentId);
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Institution Class:</div>
                                            <div>
                                                <span id="institutionClass">
                                                    <script>
                                                        $("#institutionClass").html(getEachStudentProgramDetailsSession?.institutionData?.institutionTypeData?.institutionTypeName ?? "");
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Institution Name:</div>
                                            <div>
                                                <span id="institutionName">
                                                    <script>
                                                        $("#institutionName").html(getEachStudentProgramDetailsSession?.institutionData?.institutionName ?? "");
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Department:</div>
                                            <div>
                                                <span id="department">  
                                                    <script>
                                                        $("#department").html(getEachStudentProgramDetailsSession?.institutionData?.departmentName ?? "");
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Student Level:</div>
                                            <div>
                                                <span id="studentLevel">  
                                                    <script>
                                                        $("#studentLevel").html(getEachStudentProgramDetailsSession?.institutionData?.levelData?.levelName ?? "");
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Matric Number:</div>
                                            <div>
                                                <span id="matricNumber">  
                                                    <script>
                                                        $("#matricNumber").html(getEachStudentProgramDetailsSession?.institutionData?.matricNumber ?? "");
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-content-div form-main-content">
                    <div class="tables-content-div form-content-div">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-mortarboard"></i>
                                <p>Training Details</p>
                            </div>
                        </div>

                        <div class="form-text">
                            <div class="alert alert-success form-alert">
                                <div class="alert-list-div">
                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Program:</div>
                                            <div><span id="programName">
                                                    <script>
                                                        $("#programName").html(getEachStudentProgramDetailsSession?.programData?.programName ?? "");
                                                    </script>
                                                </span></div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Course:</div>
                                            <div><span id="courseName">
                                                    <script>
                                                        $("#courseName").html(getEachStudentProgramDetailsSession?.courseData?.courseName ?? "");
                                                    </script>
                                                </span></div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Training Duration:</div>
                                            <div><span id="trainingDuration">
                                                    <script>
                                                        $("#trainingDuration").html(getEachStudentProgramDetailsSession?.durationData?.durationName ?? "");
                                                    </script>
                                                </span></div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Training Status:</div>
                                            <div><span id="trainingStatus">
                                                    <script>
                                                        $("#trainingStatus").html(getEachStudentProgramDetailsSession?.trainingStatusData?.statusName ?? "");
                                                    </script>
                                                </span></div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Certificate Training Status:</div>
                                            <div><span id="certificateStatus">
                                                    <script>
                                                        $("#certificateStatus").html(getEachStudentProgramDetailsSession?.certificateStatusData?.statusName ?? "");
                                                    </script>
                                                </span></div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Training Start Date:</div>
                                            <div><span id="trainingStartDate">
                                                    <script>
                                                        $("#trainingStartDate").html(getEachStudentProgramDetailsSession?.startDate ?? "");
                                                    </script>
                                                </span></div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Training End Date:</div>
                                            <div><span id="trainingEndDate">
                                                    <script>
                                                        $("#trainingEndDate").html(getEachStudentProgramDetailsSession?.endDate ?? "");
                                                    </script>
                                                </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function () {
                        const updatedByData = getEachStudentProgramDetailsSession?.updatedByData??{};

                        let content = "";
                        if (updatedByData && getEachStudentProgramDetailsSession?.trainingStatusData?.statusId === 1) {
                            content += `
                            <div class="main-content-div form-main-content">
                                <div class="tables-content-div form-content-div">
                                    <div class="content-title">
                                        <div class="title">
                                            <i class="bi bi-credit-card"></i>
                                            <p>Student Activated By</p>
                                        </div>
                                    </div>

                                    <div class="form-text">
                                        <div class="alert alert-success form-alert">
                                            <div class="alert-list-div">
                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Staff Full Name:</div>
                                                        <div><span>${updatedByData?.fullname ?? ""}</span></div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Staff Email:</div>
                                                        <div><span>${updatedByData?.emailAddress ?? ""}</span></div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Updated Time:</div>
                                                        <div><span>${getEachStudentProgramDetailsSession?.updatedTime ?? ""}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `;
                        }
                        $('#showStudentActivatedConfirmBy').html(content);
                    });
                </script>

                <div id="showStudentActivatedConfirmBy"></div>
                
                <div class="form-wrapper" id="showForm">
                    <script>
                        $(document).ready(function () {
                            const formStatusId = getEachStudentProgramDetailsSession?.trainingStatusData?.statusId;

                            if (formStatusId === 3) {
                                $("#showForm").html(`
                                    <div class="text_field_container" id="startDate_container"></div>
                                    <div class="text_field_container" id="endDate_container"></div>
                                `);

                                textField({
                                    id: 'startDate',
                                    title: 'Training Start Date',
                                    type: 'date',
                                });
                                textField({
                                    id: 'endDate',
                                    title: 'Training End Date',
                                    type: 'date',
                                });
                            }
                        });
                    </script>
                </div> 

                <div class="btn-div" id="showButton">
                    <script>
                        $(document).ready(function () {
                            let showButton = '';
                            if (getEachStudentProgramDetailsSession?.trainingStatusData?.statusId === 3) {
                                showButton +=
                                `<button class="btn" title="Activate Student" id="activateBtn" onclick="_activateStudentsProgram();"> <i class="bi bi-check2-circle"></i> ACTIVATE STUDENT </button>`; 
                            } else {
                                showButton +=
                                `<button class="btn print-btn" title="Print Student Profile" id="printBtn" onclick="_printStudentProfile();"><i class="bi bi-printer"></i> PRINT STUDENT PROFILE </button>`; 
                            }
                            $("#showButton").html(showButton);
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<!-- ///// Student Profile Details /// -->
<?php if ($page == 'studentProfileDetails') { ?>
    <div class="main-content-div dash-main-content-div" data-aos="fade-in" data-aos-duration="1200">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-people"></i>
                    <p>Bio Data Details</p>
                </div>
            </div>

            <div class="inner-table-content colum-table-content">
                <div class="text_field_container col-1" id="updateFirstName_container">
                    <script>
                        textField({
                            id: 'updateFirstName',
                            title: 'First Name',
                            value: getEachStudentDetailsSession?.firstName,
                        });
                    </script>
                </div>

                <div class="text_field_container col-1" id="updateLastName_container">
                    <script>
                    textField({
                        id: 'updateLastName',
                        title: 'Last Name',
                        value: getEachStudentDetailsSession?.lastName,
                    });
                    </script>
                </div>

                <div class="text_field_container col-1" id="updateEmailAddress_container">
                    <script>
                        textField({
                            id: 'updateEmailAddress',
                            title: 'Email Address',
                            type: 'email',
                            value: getEachStudentDetailsSession?.emailAddress,
                        });
                    </script>
                </div> 

                <div class="text_field_container col-1" id="updatePhoneNumber_container">
                    <script>
                        textField({
                            id: 'updatePhoneNumber',
                            title: 'Phone Number',
                            type: 'tel',
                            value: getEachStudentDetailsSession?.phoneNumber,
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content-div dash-main-content-div" data-aos="fade-in" data-aos-duration="1200">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-people"></i>
                    <p>Student Account Information</p>
                </div>
            </div>

            <div class="inner-table-content colum-table-content">
                <div class="text_field_container col-1" id="studentId_container">
                    <script>
                    textField({
                        id: 'studentId',
                        title: 'Student ID',
                        readonly: true,
                        value: getEachStudentDetailsSession?.studentId,
                    });
                    </script>
                </div>

                <div class="text_field_container col-1" id="createdTime_container">
                    <script>
                    textField({
                        id: 'createdTime',
                        title: 'Date Of Registration',
                        readonly: true,
                        value: getEachStudentDetailsSession?.createdTime,
                    });
                    </script>
                </div>

                <div class="text_field_container col-1" id="lastLogin_container">
                    <script>
                    textField({
                        id: 'lastLogin',
                        title: 'Last Login Date',
                        readonly: true,
                        value: getEachStudentDetailsSession?.lastLogin,
                    });
                    </script>
                </div>

                <div class="text_field_container col-1" id="updateStatusId_container">
                    <script>
                    selectField({
                        id: 'updateStatusId',
                        title: 'Select Status',
                        fieldValue: getEachStudentDetailsSession?.statusData?.statusId ?? '',
                        fieldLabel: getEachStudentDetailsSession?.statusData?.statusName ?? ''
                    });
                    _getSelectStatusId('updateStatusId', '1,2');
                    </script>
                </div>
            </div>
        </div>
    </div>
    
    <div class="form-bottom-btn-div">
        <button class="btn" title="UPDATE STUDENT" id="updateBtn" onclick="_updateStudent()"> UPDATE STUDENT <i
                class="bi-check"></i></button>
    </div>
<?php } ?>

<!-- ////// Student Payment History //// -->
<?php if ($page == 'studentPaymentHistory') { ?>
    <div class="main-content-div dash-main-content-div" data-aos="fade-in" data-aos-duration="1200">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-credit-card"></i>
                    <p>Payment History</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="table-div animated fadeIn">
                    <table class="table" cellspacing="0" style="width:100%">
                        <thead>
                            <tr class="tb-col">
                                <th>sn</th>
                                <th>Payment ID</th>
                                <th>Payment Purpose</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Date Initiated</th>
                                <th>Date Confirmed</th>
                                <th id="actionHeader" style="display:none;">Action</th>
                            </tr>
                        </thead>

                        <tbody id="studentPaymentHistoryPageContent">
                            <script>
                                _fetchStudentPaymentHistory();
                            </script>

                            <tr>
                                <td colspan="20">
                                    <div class="content-loading-div">
                                        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div id="studentPaymentHistoryPaginationControls" class="pagination-div"></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

