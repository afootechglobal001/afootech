<?php if ($page == 'dashboard') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi bi-speedometer2"></i></div>
            </div>
            <div class="text-div">
                <h2>Welcome Back, <span id="DashFullname">
                       Paul</span>!</h2>
                <p>Welcome to your dashboard, where you can oversee all your activities, tasks, progress, and updates—helping you stay organized and on track</p>
            </div>
        </div>

        <div class="dashboard-right-wrapper">
            <div>
                <p><span><i class="bi-clock"></i> Last Login Date </span></p>
            </div>
            <div><strong id="lastLoginTime">
                    2023-12-12 12:00:00
                </strong></div>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="dashboard-wrapper">
            <div class="left-wrapper">
                <div class="statistics-back-div">
                    <div class="statistics-div" id="applicantPage" title="Total Applicants"
                        onclick="_getActivePage({page:'studentPage', divid:'studentPage'});">
                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>Total Applicants</p>
                                <span>All Students Who Registered</span>
                                <h2 id="totalApplicantCount">150</h2>
                            </div>

                            <div class="statistics-icon upcoming">
                                <i class="bi bi-person-plus"></i>
                            </div>
                        </div>
                    </div>

                    <div class="statistics-div" id="pendingPage" title="Awaiting Activation"
                        onclick="_getActivePage({page:'pendingPage', divid:'pendingPage'});">

                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>Awaiting Activation</p>
                                <span>Students Not Yet Started</span>
                                <h2 id="pendingStudentCount">40</h2>
                            </div>

                            <div class="statistics-icon pending">
                                <i class="bi bi-person-check"></i>
                            </div>
                        </div>
                    </div>

                    <div class="statistics-div" id="activePage" title="Active Trainees"
                        onclick="_getActivePage({page:'activePage', divid:'activePage'});">
                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>Active Trainees</p>
                                <span>Currently Running Training</span>
                                <h2 id="activeStudentCount">80</h2>
                            </div>

                            <div class="statistics-icon completed">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>

                    <div class="statistics-div" id="completedPage" title="Completed Training"
                        onclick="_getActivePage({page:'completedPage', divid:'completedPage'});">
                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>Completed Training</p>
                                <span>Past SIWES / IT Students</span>
                                <h2 id="completedStudentCount">20</h2>
                            </div>

                            <div class="statistics-icon">
                                <i class="bi bi-award"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="chart-back-div">
                    <div class="chart-div-notifications top-border-radius">
                        <div class="text"><i class="bi-graph-up-arrow"></i> Showing Matrix for </div>

                        <div class="text text-right" onclick="select_search()">
                            <span id="srch-text">Last 30 Days</span>
                            <div class="icon-div"><i class="bi-caret-down"></i></div>

                            <div class="srch-select alert-srch-select">
                                <div id="srch-today" onclick="_fetchRevenueFiltering('srch-today', 'Today');">Today
                                </div>
                                <div id="srch-week" onclick="_fetchRevenueFiltering('srch-week', 'This Week');">This
                                    Week</div>
                                <div id="srch-7" onclick="_fetchRevenueFiltering('srch-7', 'Last 7 Days');">Last 7 Days
                                </div>
                                <div id="srch-month" onclick="_fetchRevenueFiltering('srch-month', 'This Month');">This
                                    Month</div>
                                <div id="srch-30" onclick="_fetchRevenueFiltering('srch-30', 'Last 30 Days');">Last 30 Days
                                </div>
                                <div id="srch-90" onclick="_fetchRevenueFiltering('srch-90', 'Last 90 Days');">Last 90 Days
                                </div>
                                <div id="srch-year" onclick="_fetchRevenueFiltering('srch-year', 'This Year');">This
                                    Year</div>
                                <div id="srch-1year" onclick="_fetchRevenueFiltering('srch-1year', 'Last 1 Year');">Last 1
                                    Year</div>
                                <div onclick="srch_custom('Custom Search')">Custom Search</div>
                            </div>
                        </div>

                        <div class="text">
                            <div class="custom-srch-div">
                                <div class="custom-srch-div-in">
                                    <div class="text_field_container dash_field_container">
                                        <input class="text_field bar_cust_text_field" type="text" id="datepickers-from"
                                            placeholder="" />
                                        <div class="placeholder bar_cust_placeholder"><i class="bi-calendar3"></i> From
                                        </div>
                                        <div class="issueText" id="issue_from"></div>
                                    </div>

                                    <div class="text_field_container dash_field_container">
                                        <input class="text_field bar_cust_text_field" type="text" id="datepickers-to"
                                            placeholder="" />
                                        <div class="placeholder bar_cust_placeholder"><i class="bi-calendar3"></i> To </div>
                                        <div class="issueText" id="issue_to"></div>
                                    </div>
                                    <button type="button" class="btn" id="applyCustomSearchBtn"
                                        onclick="_fetchCustomRevenueFiltering();">Apply</button>
                                </div>
                            </div>
                        </div>


                        <script language="javascript">
                        $('#datepickers-from').datetimepicker({
                            lang: 'en',
                            timepicker: false,
                            format: 'Y-m-d',
                            formatDate: 'Y-M-d',
                        });

                        $('#datepickers-to').datetimepicker({
                            lang: 'en',
                            timepicker: false,
                            format: 'Y-m-d',
                            formatDate: 'Y-M-d',
                        });
                        </script>
                    </div>

                    <div class="trending-back-div">
                        <div class="revenue-div">
                            <p>Revenue from <span id="dateFrom">January 18 2025</span> - <span id="dateTo">February 17
                                    2025</span></p>
                            <div class="fund-div">
                                <h3>
                                    <p id="sumCreditCardPayments"><s>N</s> 0.00</p><span>Credit Card</span>
                                </h3>
                                <h3>
                                    <p id="sumBankTransferPayments"><s>N</s> 0.00</p><span>Bank Transfer</span>
                                </h3>
                            </div>
                        </div>

                        <div id="chartContainer" style="width:100%; height:400px; margin:auto;"></div>
                        <script>
                            $(document).ready(function() {

                                var chart = new CanvasJS.Chart("chartContainer", {
                                    animationEnabled: true,
                                    theme: "light2",

                                    axisX: {
                                        valueFormatString: "DD MMM",
                                        crosshair: {
                                            enabled: true,
                                            snapToDataPoint: true
                                        }
                                    },

                                    axisY: {
                                        title: "",
                                        includeZero: true,
                                        crosshair: {
                                            enabled: true
                                        }
                                    },

                                    toolTip: {
                                        shared: true
                                    },

                                    legend: {
                                        cursor: "pointer",
                                        verticalAlign: "bottom",
                                        horizontalAlign: "left",
                                        dockInsidePlotArea: true,
                                        itemclick: toogleDataSeries
                                    },

                                    data: [{
                                        type: "column",
                                        showInLegend: true,
                                        name: "Revenue",
                                        xValueFormatString: "DD MMM, YYYY",
                                        color: "#328ab3",

                                        dataPoints: [
                                            { x: new Date(2026, 5, 1), y: 45000 },
                                            { x: new Date(2026, 5, 5), y: 62000 },
                                            { x: new Date(2026, 5, 10), y: 38000 },
                                            { x: new Date(2026, 5, 15), y: 90000 },
                                            { x: new Date(2026, 5, 20), y: 70000 },
                                            { x: new Date(2026, 5, 25), y: 120000 },
                                            { x: new Date(2026, 5, 30), y: 95000 }
                                        ]
                                    }]
                                });

                                chart.render();


                                function toogleDataSeries(e) {
                                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                                        e.dataSeries.visible = false;
                                    } else {
                                        e.dataSeries.visible = true;
                                    }

                                    chart.render();
                                }

                            });
                        </script>
                    </div>
                </div>
            </div>

            <div class="right-wrapper">
                <div class="matrix-div">
                    <div class="inner-div">
                        <div class="title">
                            <h3>Student Program Matrix</h3>
                        </div>
                        <div id="chartContainer1" style="width:100%; height:200px; margin:auto;"></div>

                        <script type="text/javascript">
                        var options = {
                            title: {
                                text: "" /*My Performance*/
                            },
                            data: [{
                                type: "doughnut",
                                innerRadius: 30,
                                showInLegend: "False",
                                legendText: "{label}",
                                indexLabel: "{label} ({y})",
                                yValueFormatString: "#,##0.#" % "",
                                indexLabelFontSize: 9,
                                dataPoints: [{
                                        label: "SIWES",
                                        y: 5
                                    },
                                    {
                                        label: "IT",
                                        y: 6
                                    },
                                    {
                                        label: "INTERN",
                                        y: 4
                                    },
                                    {
                                        label: "DIPLOMA",
                                        y: 5
                                    },
                                ]
                            }]
                        };
                        $("#chartContainer1").CanvasJSChart(options);
                        </script>
                    </div>
                </div>

                <div class="matrix-div">
                    <div class="inner-div">
                        <div class="title">
                            <h3>Payment Method Distribution</h3>
                        </div>
                        <div id="chartContainer2" style="width:100%; height:200px; margin:auto;"></div>

                        <script type="text/javascript">
                        var options = {
                            title: {
                                text: "" /*My Performance*/
                            },
                            data: [{
                                type: "pie",
                                startAngle: 45,
                                showInLegend: "False",
                                legendText: "{label}",
                                indexLabel: "{label} ({y})",
                                yValueFormatString: "#,##0.#" % "",
                                dataPoints: [{
                                        label: "Debit/Credit Card",
                                        y: 3
                                    },
                                    {
                                        label: "Bank Transfer",
                                        y: 11
                                    },
                                ]
                            }]
                        };
                        $("#chartContainer2").CanvasJSChart(options);
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
                        <p>Recent Pending Student Registrations</p>
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
                                                EMMANUEL PAUL
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
                                        <button class="btn view-btn"
                                            onclick="_getForm({page:'studentProfile',url:trainingAdminPortalMiddlewareUrl});">
                                            REVIEW
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
                                                EMMANUEL PAUL
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
                                                EMMANUEL PAUL
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
                                        <button class="btn view-btn"
                                            onclick="_getForm({page:'studentProfile',url:trainingAdminPortalMiddlewareUrl});">
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
    </div>
<?php } ?>

<?php if ($page == 'logoutConfirmForm') { ?>
    <div class="caption-success-div animated zoomIn">
        <div class="div-in">
            <div class="img"><img src="<?php echo $websiteUrl ?>/all-images/images/warning.gif" /></div>
            <h2>Are you sure to log-out?</h2>
            Please, confirm your log-out action.
            <div class="btn-div">
                <button class="btn" onclick="_logOut();">YES</button>
                <button class="btn no-btn" onclick="_alertClose(<?php echo $modalLayer ?>);">NO</button>
            </div>
        </div>
    </div>
<?php } ?>