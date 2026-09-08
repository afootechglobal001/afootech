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
                <div class="program-wrapper">
                    <div class="program-item" title="SIWES">
                        <div class="title-content program-title-content">
                            <div class="number">1</div>

                            <div class="content-div" onclick="_getForm({page: 'coursesBreakdown', url: trainingAdminPortalMiddlewareUrl});">
                                <div class="left-content">

                                    <div class="icon-div">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>

                                    <div class="text-div">
                                        <h2>
                                            SIWES
                                        </h2>

                                        <p>
                                            Practical work experience designed to bridge the gap between classroom learning and the workplace.
                                        </p>
                                    </div>

                                </div>
                                
                                <div class="nav-cont">
                                    <i class="bi bi-arrow-right-circle-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="program-item" title="INDUSTRIAL TRAINING (IT)">
                        <div class="title-content program-title-content">
                            <div class="number">2</div>

                            <div class="content-div">
                                <div class="left-content">

                                    <div class="icon-div">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>

                                    <div class="text-div">
                                        <h2>
                                            INDUSTRIAL TRAINING (IT)
                                        </h2>

                                        <p>
                                            Gain hands-on industry experience while developing practical skills relevant to your field of study.
                                        </p>
                                    </div>

                                </div>

                                <div class="nav-cont">
                                    <i class="bi bi-arrow-right-circle-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="program-item" title="INTERNSHIP">
                        <div class="title-content program-title-content">
                            <div class="number">3</div>

                            <div class="content-div">
                                <div class="left-content">

                                    <div class="icon-div">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>

                                    <div class="text-div">
                                        <h2>
                                            INTERNSHIP
                                        </h2>

                                        <p>
                                            Build professional experience, strengthen your skills, and prepare for future career opportunities.
                                        </p>
                                    </div>

                                </div>

                                <div class="nav-cont">
                                    <i class="bi bi-arrow-right-circle-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="program-item" title="AFOOTECH DIPLOMA">
                        <div class="title-content program-title-content">
                            <div class="number">4</div>

                            <div class="content-div">
                                <div class="left-content">

                                    <div class="icon-div">
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>

                                    <div class="text-div">
                                        <h2>
                                            AFOOTECH DIPLOMA
                                        </h2>

                                        <p>
                                            A comprehensive diploma program focused on practical skills, professional development, and career growth.
                                        </p>
                                    </div>

                                </div>

                                <div class="nav-cont">
                                    <i class="bi bi-arrow-right-circle-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'coursesBreakdown') { ?>
    <div class="user-profile-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-mortarboard-fill"></i></div>
                <h3 id="pageTitle">SIWES</h3>
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
                            <h3>SIWES PRICING PLAN</h3>
                            <p>
                                Manage and configure <strong>SIWES </strong> pricing plans, including form fees and tuition fees for students.
                            </p>
                        </div>
                    </div>
                    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
                        <div class="tables-content-div">
                            <div class="content-title">
                                <div class="title">
                                    <i class="bi bi-mortarboard-fill"></i>
                                    <p>SIWES</p>
                                </div>
                            </div>

                            <div class="inner-table-content">
                                <div class="program-wrapper">
                                    <div class="program-item" onclick="_chevronCollapse('view1')" title="AI & AUTOMATION PROGRAMMING">
                                        <div class="title-content">
                                            <div class="number">1</div>

                                            <div class="content-div" onclick="">
                                                <div class="left-content">
                                                    <div class="text-div">
                                                        <h2>
                                                            AI & AUTOMATION PROGRAMMING
                                                        </h2>

                                                    </div>
                                                </div>

                                                <div class="nav-wrapper">
                                                    <button class="btn" title="Add New Pricing" onclick="event.stopPropagation(); _getForm({page: 'addPricingForm', layer: 2, url: trainingAdminPortalMiddlewareUrl});">
                                                        <i class="bi bi-tags-fill"></i> ADD PRICING
                                                    </button>
                                               
                                                    <div class="nav-cont toggle-nav" id="view1num">
                                                        <i class="bi bi-chevron-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="open-toggle" id="view1answer" style="display: none;">
                                            <div class="table-div animated fadeIn">
                                                <table class="table" cellspacing="0" style="width:100%">
                                                    <thead>
                                                        <tr class="tb-col">
                                                            <th>sn</th>
                                                            <th>ID</th>
                                                            <th>Duration</th>
                                                            <th>Form Fee (<s>N</s>)</th>
                                                            <th>Tuition Fee (<s>N</s>)</th>
                                                            <th>Last Updated</th>
                                                            <th>Updated By</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id="">
                                                        <tr class="tb-row">
                                                            <td>1</td>

                                                            <td class="clickable-td" title="Click to view course profile" onclick="">
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">D001</div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">1 - 3 MONTHS</div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <strong><s>N</s>5000.00</strong>
                                                            </td>

                                                            <td>
                                                                <strong><s>N</s>10000.00</strong>
                                                            </td>

                                                            <td>
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">
                                                                            <i class="bi bi-calendar2-check"></i> Sep 5, 2026
                                                                        </div>

                                                                        <div class="second-class date-item">
                                                                            <i class="bi bi-clock"></i> 11:30:00 AM
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">
                                                                           John Doe
                                                                        </div>

                                                                        <div class="second-class">
                                                                            john.doe@example.com
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><button class="btn view-btn" title="Click to edit pricing" onclick=""><i class="bi bi-pencil"></i> EDIT</button></td>
                                                        </tr>

                                                        <tr class="tb-row">
                                                            <td>2</td>

                                                            <td class="clickable-td" title="Click to view course profile" onclick="">
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">D002</div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">1 - 6 MONTHS</div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <strong><s>N</s>5000.00</strong>
                                                            </td>

                                                            <td>
                                                                <strong><s>N</s>10000.00</strong>
                                                            </td>

                                                            <td>
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">
                                                                            <i class="bi bi-calendar2-check"></i> Sep 5, 2026
                                                                        </div>

                                                                        <div class="second-class date-item">
                                                                            <i class="bi bi-clock"></i> 11:30:00 AM
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">
                                                                           John Doe
                                                                        </div>

                                                                        <div class="second-class">
                                                                            john.doe@example.com
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><button class="btn" title="Click to edit pricing" onclick=""><i class="bi bi-pencil"></i> EDIT</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="program-item" onclick="_chevronCollapse('view2')" title="BACKEND WEB DEVELOPMENT">
                                        <div class="title-content">
                                            <div class="number">2</div>

                                            <div class="content-div">
                                                <div class="left-content">
                                                    <div class="text-div">
                                                        <h2>
                                                            BACKEND WEB DEVELOPMENT
                                                        </h2>

                                                    </div>
                                                </div>

                                                <div class="nav-wrapper">
                                                    <button class="btn" title="Add New Pricing">
                                                        <i class="bi bi-tags-fill"></i> ADD PRICING
                                                    </button>
                                               
                                                    <div class="nav-cont toggle-nav" id="view2num">
                                                        <i class="bi bi-chevron-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="open-toggle" id="view2answer" style="display: none;">
                                            <div class="table-div animated fadeIn">
                                                <table class="table" cellspacing="0" style="width:100%">
                                                    <thead>
                                                        <tr class="tb-col">
                                                            <th>sn</th>
                                                            <th>ID</th>
                                                            <th>Duration</th>
                                                            <th>Form Fee (<s>N</s>)</th>
                                                            <th>Tuition Fee (<s>N</s>)</th>
                                                            <th>Last Updated</th>
                                                            <th>Updated By</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id="">
                                                        <tr class="tb-row">
                                                            <td>1</td>

                                                            <td class="clickable-td" title="Click to view course profile" onclick="">
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">D001</div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">1 - 3 MONTHS</div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <strong><s>N</s>5000.00</strong>
                                                            </td>

                                                            <td>
                                                                <strong><s>N</s>10000.00</strong>
                                                            </td>

                                                            <td>
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">
                                                                            <i class="bi bi-calendar2-check"></i> Sep 5, 2026
                                                                        </div>

                                                                        <div class="second-class date-item">
                                                                            <i class="bi bi-clock"></i> 11:30:00 AM
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">
                                                                           John Doe
                                                                        </div>

                                                                        <div class="second-class">
                                                                            john.doe@example.com
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><button class="btn" title="Click to edit pricing" onclick=""><i class="bi bi-pencil"></i> EDIT</button></td>
                                                        </tr>

                                                        <tr class="tb-row">
                                                            <td>2</td>

                                                            <td class="clickable-td" title="Click to view course profile" onclick="">
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">D002</div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">1 - 6 MONTHS</div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <strong><s>N</s>5000.00</strong>
                                                            </td>

                                                            <td>
                                                                <strong><s>N</s>10000.00</strong>
                                                            </td>

                                                            <td>
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">
                                                                            <i class="bi bi-calendar2-check"></i> Sep 5, 2026
                                                                        </div>

                                                                        <div class="second-class date-item">
                                                                            <i class="bi bi-clock"></i> 11:30:00 AM
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="text-back-div">
                                                                    <div class="text-div">
                                                                        <div class="first-class">
                                                                           John Doe
                                                                        </div>

                                                                        <div class="second-class">
                                                                            john.doe@example.com
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><button class="btn" title="Click to edit pricing" onclick=""><i class="bi bi-pencil"></i> EDIT</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
    <section class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-credit-card"></i></div>
                <h3>ADD PRICING</h3>
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
                <p>You are about to create a new pricing. Please complete the form below with accurate details to successfully
                    create new pricing.</p>
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
                                                <span id="studentId">
                                                    SIWES
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Course Name:</div>
                                            <div>
                                                <span id="studentInfo">
                                                    AI & AUTOMATION PROGRAMMING
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
                            <div class="text_field_container" id="durationId_container">
                                <script>
                                    textField({
                                        id: 'durationId',
                                        title: 'Duration',
                                        type: 'number',
                                    });
                                </script>
                            </div>

                            <div class="text_field_container" id="formFee_container">
                                <script>
                                    textField({
                                        id: 'formFee',
                                        title: 'Form Fee',
                                        type: 'number',
                                    });
                                </script>
                            </div>

                            <div class="text_field_container" id="tuitionFee_container">
                                <script>
                                    textField({
                                        id: 'tuitionFee',
                                        title: 'Tuition Fee',
                                        type: 'number',
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick=""> <i class="bi-check"></i> SUBMIT
                    </button>
                </div>
            </div>
        </div>
    </section>
<?php } ?>