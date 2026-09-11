<?php if ($page == 'coursePage') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi bi-mortarboard"></i></div>
            </div>
            <div class="text-div">
                <h3>Course Setup</h3>
                <p>Manage course accounts with ease. Assign roles, control access, and oversee activities to keep
                    operations secure and well-organized.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" onkeyup="_filtersCourses(this.value);" placeholder="Search Course Here...">
                <i class="bi bi-search"></i>
            </div>
            <button class="btn" title="ADD NEW COURSE"
                onclick="sessionStorage.removeItem('getEachCourseDetailsSession'); _getForm({page: 'courseReg', url: trainingAdminPortalMiddlewareUrl});">
                <i class="bi-plus-square"></i> ADD NEW COURSE
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-mortarboard"></i>
                    <p>Course Setup</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="table-div animated fadeIn">
                    <table class="table" cellspacing="0" style="width:100%">
                        <thead>
                            <tr class="tb-col">
                                <th>sn</th>
                                <th>Course ID</th>
                                <th>Course Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="coursePageContent">
                            <script>
                                _fetchCourseData();
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
                    <div id="courseContentPaginationControls" class="pagination-div"></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'courseReg') { ?>
    <script>getEachCourseDetailsSession = JSON.parse(sessionStorage.getItem("getEachCourseDetailsSession"));</script>

    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-mortarboard"></i></div>
                <h3>CREATE NEW COURSE</h3>
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
                <p>You are about to create a new course. Please complete the form below with accurate details to successfully
                    create new course.</p>
            </div>

            <div class="main-content-div form-main-content-div">
                <div class="tables-content-div form-table-content-div">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-mortarboard"></i>
                            <p>Course Registration</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="courseName_container">
                            <script>
                                textField({
                                    id: 'courseName',
                                    title: 'Course Name',
                                    value: getEachCourseDetailsSession?.courseName || ''
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="statusId_container">
                            <script>
                            selectField({
                                id: 'statusId',
                                title: 'Select Status',
                                fieldValue: getEachCourseDetailsSession?.statusData?.statusId ?? '',
                                fieldLabel: getEachCourseDetailsSession?.statusData?.statusName ?? ''
                            });
                                _getSelectStatusId('statusId', '1,2');
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" title="SUBMIT" id="submitBtn" onclick="_createAndUpdateCourse();"> <i class="bi-check"></i> SUBMIT
                </button>
            </div>
        </div>
    </div>
<?php } ?>