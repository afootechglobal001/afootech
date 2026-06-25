<?php if ($page == 'registerPage') { ?>
    <script>
        studentSession = JSON.parse(localStorage.getItem("studentCompleteBioDataSession")) || {};
    </script>

    <div class="form-div" data-aos="fade-in" data-aos-duration="1200">
        <h1>Welcome <span>Student!</span></h1>
        <p>
            Create your account and register for your SIWES/IT program with <?php echo $appName ?>.
        </p>

        <div class="inner-form" id="viewLogin">
            <div class="row-wrapper">
                <div class="text_field_container" id="firstName_container">
                    <script>
                        textField({
                            id: 'firstName',
                            title: 'First Name',
                            value: studentSession?.firstName ?? ''
                        });
                    </script>
                </div>

                <div class="text_field_container" id="lastName_container">
                    <script>
                        textField({
                            id: 'lastName',
                            title: 'Last Name',
                            value: studentSession?.lastName ?? ''
                        });
                    </script>
                </div>
            </div>

            <div class="text_field_container" id="emailAddress_container">
                <script>
                    textField({
                        id: 'emailAddress',
                        title: 'Email Address',
                        type: 'email',
                        value: studentSession?.emailAddress ?? ''
                    });
                </script>
            </div>

            <div class="text_field_container" id="phoneNumber_container">
                <script>
                    textField({
                        id: 'phoneNumber',
                        title: 'Phone Number',
                        value: studentSession?.phoneNumber ?? ''
                    });
                </script>
            </div>

            <div class="btn-div">
                <button class="btn full-btn" id="submitBtn" title="Proceed"
                    onclick="_proceedStudentBioData();">Proceed <i
                        class="bi bi-arrow-right-circle"></i></button>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'institutionDetailsPage') { ?>
    <script>
        studentSession = JSON.parse(localStorage.getItem("studentCompleteBioDataSession")) || {};
    </script>

    <div class="form-div">
        <h1>Institution <span>Information</span></h1>
        <p>
            Provide your institution information to begin your SIWES/IT registration with <?php echo $appName ?>.
        </p>

        <div class="inner-form">
            <div class="text_field_container" id="institutionTypeId_container">
                <script>
                    selectField({
                        id: 'institutionTypeId',
                        title: 'Select Institution Type',
                        fieldValue: studentSession?.institutionTypeId ?? '',
                        fieldLabel: studentSession?.institutionTypeName ?? ''
                    });
                    _getSelectInstitutionType('institutionTypeId');
                </script>
            </div>

            <div class="text_field_container" id="institutionName_container">
                <script>
                    textField({
                        id: 'institutionName',
                        title: 'Name Of Institution',
                        value: studentSession?.institutionName ?? ''
                    });
                </script>
            </div>

            <div class="text_field_container" id="departmentName_container">
                <script>
                    textField({
                        id: 'departmentName',
                        title: 'Department',
                        value: studentSession?.departmentName ?? ''
                    });
                </script>
            </div>

            <div class="text_field_container" id="levelId_container">
                <script>
                    selectField({
                        id: 'levelId',
                        title: 'Select Current Level',
                        fieldValue: studentSession?.levelId ?? '',
                        fieldLabel: studentSession?.levelName ?? ''
                    });
                </script>
            </div>

            <div class="text_field_container" id="matricNumber_container">
                <script>
                    textField({
                        id: 'matricNumber',
                        title: 'Refrence/Matric No',
                        value: studentSession?.matricNumber ?? ''
                    });
                </script>
            </div>

            <div class="btn-div">
                <button class="btn back-btn" title="Back to previous" onclick="_getNextPage({page: 'registerPage'});"><i
                        class="bi bi-arrow-left-circle"></i> Back</button>
                <button class="btn" id="submitBtn" title="Proceed"
                    onclick="_proceedInstitutionInformation();">Proceed <i
                        class="bi bi-arrow-right-circle"></i></button>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'programDetailsPage') { ?>
    <script>
        getSelectedProgramCourseDurationSession = JSON.parse(localStorage.getItem("getSelectedProgramCourseDurationSession")) || {};
    </script>

    <div class="form-div" data-aos="fade-in" data-aos-duration="1200">
        <h1>Program <span>Information</span></h1>
        <p>
            Select your preferred program to continue your SIWES/IT registration with <?php echo $appName ?>.
        </p>

        <div class="inner-form" id="viewLogin">
            <div class="text_field_container" id="programId_container">
                <script>
                    selectField({
                        id: 'programId',
                        title: 'Select Program',
                        fieldValue: getSelectedProgramCourseDurationSession?.programData?.[0]?.programId || '',
                        fieldLabel: getSelectedProgramCourseDurationSession?.programData?.[0]?.programName || ''
                    });
                    _getSelectPrograms('programId');
                </script>
            </div>

            <div class="text_field_container" id="courseId_container">
                <script>
                    selectField({
                        id: 'courseId',
                        title: 'Select Course',
                        fieldValue: getSelectedProgramCourseDurationSession?.courseData?.[0]?.courseId ?? '',
                        fieldLabel: getSelectedProgramCourseDurationSession?.courseData?.[0]?.courseName ?? ''
                    });
                    _getSelectCourse('courseId');
                </script>
            </div>

            <div class="text_field_container" id="durationId_container">
                <script>
                    $(document).ready(function() {
                        const selectedDuration = getSelectedProgramCourseDurationSession?.data?.find(
                            item => item.durationId == getSelectedProgramCourseDurationSession?.data?.[0]?.durationId
                        );

                        selectField({
                            id: 'durationId',
                            title: 'Select Duration',
                            fieldValue: selectedDuration?.durationId ?? '',
                            fieldLabel: (selectedDuration?.durationName ?? '') + ' (<s>N</s>' + thousandSeperator(selectedDuration?.formFee ?? 0) +')'
                        });
                    });
                </script>
            </div>

            <div class="btn-div">
                <button class="btn back-btn" title="Back to previous"
                    onclick="_getNextPage({page: 'institutionDetailsPage'});"><i class="bi bi-arrow-left-circle"></i>
                    Back</button>
                <button class="btn" id="submitBtn" title="Proceed" onclick="_proceedProgramDetailsData();">Proceed
                    <i class="bi bi-arrow-right-circle"></i></button>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'passportPage') { ?>
    <script>
        studentSession = JSON.parse(localStorage.getItem("studentCompleteBioDataSession")) || {};
    </script>

    <div class="form-div" data-aos="fade-in" data-aos-duration="1200">
        <h1>Upload <span>Passport</span></h1>
        <p>
            Upload your passport photograph to complete your SIWES/IT registration with <?php echo $appName ?>.
        </p>

        <div class="inner-form">
            <div class="cam-pix" id="issueBorder">
                <div class="btn-container">
                    <button class="capture-btn" title="Take Picture" onClick="takeSnapShot()"> <i
                            class="bi-camera-fill"></i> TAKE
                        PICTURE </button>

                    <input id="browseImageInput" type="file" style="display:none;"
                        accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif"
                        onchange="studentPreview.UpdatePreview(this);" />

                    <button class="capture-btn" type="button" title="Browse Image"
                        onclick="document.getElementById('browseImageInput').click()">
                        <i class="bi bi-cloud-arrow-up"></i>
                        BROWSE IMAGE
                    </button>
                </div>

                <div class="cam-pix-inner" id="cam-pix">
                    <img id="passportPreview" src="<?php echo $websiteUrl ?>/uploaded_files/studentPassport/sample.jpg" alt="Profile Image"/>
                </div>

                <script>
                    $(document).ready(function(){
                        const passport = studentSession?.passport ? studentSession.passport : "<?php echo $websiteUrl ?>/uploaded_files/studentPassport/sample.jpg";
                        $("#passportPreview").attr("src", passport).attr("alt", "Profile Image");
                    });
                </script>
            </div>
            <div class="issue-text" id="issues_passport"></div>
            
            <div class="btn-div">
                <button class="btn back-btn" title="Back to previous"
                    onclick="_getNextPage({page: 'programDetailsPage'});"><i class="bi bi-arrow-left-circle"></i>
                    Back</button>
                <button class="btn" id="submitBtn" title="Proceed" onclick="_proceedPassportData();">Proceed
                    <i class="bi bi-arrow-right-circle"></i></button>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'summaryPage') { ?>
    <script>
        studentSession = JSON.parse(localStorage.getItem("studentCompleteBioDataSession")) || {};
        getSelectedProgramCourseDurationSession = JSON.parse(localStorage.getItem("getSelectedProgramCourseDurationSession")) || {};
    </script>

    <div class="form-div" data-aos="fade-in" data-aos-duration="1200">
        <h1>Registration <span>Review</span></h1>
        <p>
            Kindly review your submitted information to ensure everything is accurate before completing your SIWES registration.
        </p>

        <div class="inner-form">
            <div class="alert alert-success form-alert-div">
                <div class="alert-list-div">
                    <div class="alert-list-back-div">
                        <div class="alert-list">
                            <div>FullName:</div>
                            <div>
                                <span id="fullName">
                                    <script>
                                        $("#fullName").html(studentSession?.firstName + ' ' + studentSession?.lastName);
                                    </script>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="alert-list-back-div">
                        <div class="alert-list">
                            <div>Email Address:</div>
                            <div>
                                <span id="emailAddress">
                                    <script>
                                        $("#emailAddress").html(studentSession?.emailAddress);
                                    </script>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="alert-list-back-div">
                        <div class="alert-list">
                            <div>Phone Number:</div>
                            <div>
                                <span id="phoneNumber">
                                    <script>
                                        $("#phoneNumber").html(studentSession?.phoneNumber);
                                    </script>
                                </span>
                            </div>
                        </div>
                    </div>    
                    
                    <div class="alert-list-back-div">
                        <div class="alert-list">
                            <div>Program:</div>
                            <div>
                                <span id="programName">
                                    <script>
                                        $("#programName").html(getSelectedProgramCourseDurationSession?.programData?.[0]?.programName);
                                    </script>
                                </span>
                            </div>
                        </div>
                    </div> 

                    <div class="alert-list-back-div">
                        <div class="alert-list">
                            <div>Course:</div>
                            <div>
                                <span id="courseName">
                                    <script>
                                        $("#courseName").html(getSelectedProgramCourseDurationSession?.courseData?.[0]?.courseName);
                                    </script>
                                </span>
                            </div>
                        </div>
                    </div> 

                    <div class="alert-list-back-div">
                        <div class="alert-list">
                            <div>Duration:</div>
                            <div>
                                <span id="durationName">
                                    <script>
                                        $("#durationName").html(getSelectedProgramCourseDurationSession?.data?.[0]?.durationName);
                                    </script>
                                </span>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>

            <div class="alert alert-success form-alert-div">
                <span><i class="bi-pencil-square"></i> Note:</span>
                Kindly note that a registration fee of (<strong><span style="font-size:14px;" id="formFee"><s>N</s>
                    <script>
                        $("#formFee").html('<s>N</s>' + thousandSeperator(getSelectedProgramCourseDurationSession?.data?.[0]?.formFee));
                    </script></span></strong>) will be required before completing your registration.
            </div>

            <div class="text_field_container" id="paymentMethodId_container">
                <script>
                selectField({
                    id: 'paymentMethodId',
                    title: 'Select Payment Method'
                });
                _getSelectPaymentMethod('paymentMethodId');
                </script>
            </div>

            <div class="btn-div">
                <button class="btn back-btn" title="Back to previous"
                    onclick="_getNextPage({page: 'passportPage'});"><i class="bi bi-arrow-left-circle"></i>
                    Back</button>
                <button class="btn full-btn" id="submitBtn" title="Proceed to Payment"
                    onclick="_proceedToPayment();">Proceed to Payment <i class="bi bi-credit-card"></i></button>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'proceedAcceptanceLetterForm') { ?>
    <div class="caption-div animated fadeIn">
        <div class="caption-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-printer"></i></div>
                <h3>PRINT ACCEPTANCE LETTER</h3>
            </div>

            <div class="btn-div">
                <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                    <i class="bi bi-x-lg"></i> Close
                </button>
            </div>
        </div>
        <!-- /////////// Title ////////////////////////////// -->
        <div class="caption-notification">
            <p>
                Please provide your registered <strong>Email Address</strong> to continue with your acceptance letter printing.
                Your details will be verified before you can proceed.
            </p>
        </div>

        <div class="caption-body">
            <div class="text_field_container" id="proceedEmailAddress_container">
                <script>
                    textField({
                        id: 'proceedEmailAddress',
                        title: 'Email Address',
                        type: 'email',
                    });
                </script>
            </div>

            <div class="btn-div">
                <button class="btn" id="proceedBtn" title="Proceed" onclick="window.location.href = studentOtpVerificationUrl;">Proceed <i
                        class="bi bi-arrow-right-circle"></i></button>
            </div>
        </div>
    </div>
<?php } ?>