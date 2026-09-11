<?php if ($page == 'pricingPage') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div">
                    <i class="fa-solid fa-tags"></i>
                </div>
            </div>

            <div class="text-div">
                <h3>Pricing Setup</h3>
                <p>
                    Manage pricing plans with ease. Create, update, and organize
                    course pricing plans while keeping your training fees
                    accurate and well-managed.
                </p>
            </div>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-tags-fill"></i>
                    <p>Pricing Setup</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="program-wrapper" id="pricingProgramsContent">
                    <script>
                        _fetchPricingProgramsData();
                    </script>
                   
                    <div class="content-loading-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'coursesBreakdown') { ?>
    <script> getEachProgramDetailsSession = JSON.parse(sessionStorage.getItem("getEachProgramDetailsSession")) || {}; </script>
    <div class="user-profile-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-mortarboard-fill"></i></div>
                <h3 id="pageTitle"><script>$("#pageTitle").html(getEachProgramDetailsSession?.programName || "")</script></h3>
            </div>
            <div class="btn-div">
                <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                    <i class="bi bi-x-lg"></i> Close
                </button>
            </div>
        </div>

        <div class="profile-content-div">
            <div class="field-back-div">
                <div class="field-inner-div plan-field-inner-div">
                    <div class="modal-title">
                        <div class="icon-div"><i class="bi bi-mortarboard-fill"></i></div>
                        <div class="content">
                            <h3><span id="programName"><script>$("#programName").html(getEachProgramDetailsSession?.programName || "")</script></span> PRICING PLAN</h3>
                            <p>
                                Manage and configure <strong><span id="programName2"><script>$("#programName2").html(getEachProgramDetailsSession?.programName || "")</script></span></strong> pricing plans, including form fees and tuition fees for students.
                            </p>
                        </div>
                    </div>
                    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
                        <div class="tables-content-div">
                            <div class="content-title">
                                <div class="title">
                                    <i class="bi bi-mortarboard-fill"></i>
                                    <p id="programName3"><script>$("#programName3").html(getEachProgramDetailsSession?.programName || "")</script></p>
                                </div>
                            </div>

                            <div class="inner-table-content">
                                <div class="program-wrapper" id="pricingCourseContent">
                                    <script>
                                        _fetchAllPricingCourseData();
                                    </script>

                                    <div class="content-loading-div">
                                        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'addPricingForm') { ?>
    <script>
        selectedCourseSession = JSON.parse(sessionStorage.getItem("selectedCourseSession"));
    </script>

    <script> useEachPricingCourseSession = JSON.parse(sessionStorage.getItem("useEachPricingCourseSession")) || {}; 
        $('#coursePageTitle').html(useEachPricingCourseSession?.durationId ? 'UPDATE PRICING' : 'ADD NEW PRICING');
        $('#subTitle, #subTitle2').html(useEachPricingCourseSession?.durationId ? 'update this pricing' : 'create new pricing');
    </script>
    <section class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-credit-card"></i></div>
                <h3 id="coursePageTitle"></h3>
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
                <p>You are about to <span id="subTitle"></span>. Please complete the form below with accurate details to successfully
                    <span id="subTitle2"></span>.</p>
            </div>

            <!--  ////////////////////////////////////////////////////////////////////////////////-->
            <div class="form-container">
                <div class="main-content-div form-main-content">
                    <div class="tables-content-div form-content-div">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-credit-card"></i>
                                <p>Course Details</p>
                            </div>
                        </div>

                        <div class="form-text">
                            <div class="alert alert-success form-alert">
                                <div class="alert-list-div">
                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Program:</div>
                                            <div>
                                                <span id="formProgramName">
                                                    <script>$("#formProgramName").html(selectedCourseSession?.programName ?? "")</script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Course Name:</div>
                                            <div>
                                                <span id="formCourseName">
                                                    <script>$("#formCourseName").html(selectedCourseSession?.courseName ?? "")</script>
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
                    <div class="tables-content-div form-table-content-div">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-credit-card"></i>
                                <p>Pricing Configuration</p>
                            </div>
                        </div>

                        <div class="form-container">
                            <div class="text_field_container" id="numOfMonths_container">
                                <script>
                                    textField({
                                        id: 'numOfMonths',
                                        title: 'Number of Months',
                                        type: 'number',
                                        value: useEachPricingCourseSession?.numOfMonths ?? '',
                                    });
                                </script>
                            </div>

                            <div class="text_field_container" id="formFee_container">
                                <script>
                                    textField({
                                        id: 'formFee',
                                        title: 'Form Fee',
                                        type: 'number',
                                        value: useEachPricingCourseSession?.formFee ?? '',
                                    });
                                </script>
                            </div>

                            <div class="text_field_container" id="tuitionFee_container">
                                <script>
                                    textField({
                                        id: 'tuitionFee',
                                        title: 'Tuition Fee',
                                        type: 'number',
                                        value: useEachPricingCourseSession?.tuitionFee ?? '',
                                    });
                                </script>
                            </div>

                            <div class="text_field_container" id="statusId_container">
                                <script>
                                    selectField({
                                        id: 'statusId',
                                        title: 'Select Status',
                                        fieldValue: useEachPricingCourseSession?.statusData?.statusId ?? '',
                                        fieldLabel: useEachPricingCourseSession?.statusData?.statusName ?? ''
                                    });
                                    _getSelectStatusId('statusId', '1,2');
                            </script>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick="_createAndPricingCourse();"> <i class="bi-check"></i> SUBMIT
                    </button>
                </div>
            </div>
        </div>
    </section>
<?php } ?>