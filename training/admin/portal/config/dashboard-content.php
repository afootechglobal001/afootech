<?php if ($page == 'dashboard') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi bi-speedometer2"></i></div>
            </div>
            <div class="text-div">
                <h2>Welcome Back, <span id="DashFullname">
                       <script>
                        $("#DashFullname").html(capitalizeFirstLetterOfEachWord(staffLoginData.firstName));
                    </script></span>!</h2>
                <p>Welcome to your dashboard, where you can oversee all your activities, tasks, progress, and updates—helping you stay organized and on track</p>
            </div>
        </div>

        <div class="last-login-card">
            <div class="login-header">
                <div class="login-icon">
                    <i class="bi bi-clock-history"></i>
                </div>

                <div class="login-title">
                    <h3>Last Login</h3>
                    <span class="active-status">
                        <i class="bi bi-circle-fill"></i>
                        Active
                    </span>
                </div>
            </div>

            <div class="login-info">
                <div class="info-item">
                    <i class="bi bi-calendar-event"></i>
                    <span id="lastLoginDate">
                        <script>
                            $("#lastLoginDate").html(_formatShortDate(staffLoginData.lastLoginTime));
                        </script>
                    </span>
                </div>

                <div class="info-item">
                    <i class="bi bi-clock"></i>
                    <span id="lastLoginTime">
                        <script>
                            $("#lastLoginTime").html(_formatTime(staffLoginData.lastLoginTime));
                        </script>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="dashboard-wrapper">
            <div class="left-wrapper">
                <div class="statistics-back-div">
                    <div class="statistics-div" id="adminPage" title="Total Administrator"
                        onclick="_getActivePage({page:'adminPage', divid:'adminPage'});">
                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>Total Administrators</p>
                                <span>All registered administrators</span>
                                <h2 id="totalActiveStaffCount">0</h2>
                            </div>

                            <div class="statistics-icon upcoming">
                                <i class="bi bi-person-bounding-box"></i>
                            </div>
                        </div>
                    </div>

                    <div class="statistics-div" id="studentPage" title="Awaiting Activation"
                        onclick="_getActivePage({page:'studentPage', divid:'studentPage'});">

                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>Awaiting Activation</p>
                                <span>Students Not Yet Started</span>
                                <h2 id="totalAwaitingActivationStudentsCount">0</h2>
                            </div>

                            <div class="statistics-icon pending">
                                <i class="bi bi-person-check"></i>
                            </div>
                        </div>
                    </div>

                    <div class="statistics-div" id="studentPage" title="Active Trainees"
                        onclick="_getActivePage({page:'studentPage', divid:'studentPage'});">
                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>Active Trainees</p>
                                <span>Currently Running Training</span>
                                <h2 id="totalActiveStudentsCount">0</h2>
                            </div>

                            <div class="statistics-icon completed">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>

                    <div class="statistics-div" id="studentPage" title="Completed Training"
                        onclick="_getActivePage({page:'studentPage', divid:'studentPage'});">
                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>Completed Training</p>
                                <span>Past SIWES / IT Students</span>
                                <h2 id="totalCertifiedStudentsCount">0</h2>
                            </div>

                            <div class="statistics-icon">
                                <i class="bi bi-award"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="chart-back-div">
                    <div class="chart-div-notifications top-border-radius">
                        <div class="text-wrapper">
                            <div class="text"><i class="bi-graph-up-arrow"></i> Showing Matrix for </div>

                            <div class="text text-right" onclick="select_search()">
                                <span id="srch-text">Last 30 Days</span>
                                <div class="icon-div"><i class="bi-caret-down"></i></div>

                                <div class="srch-select alert-srch-select">
                                    <div id="srch-today" onclick="_fetchDashBoardRevenueFiltering('srch-today', 'Today');">Today
                                    </div>
                                    <div id="srch-week" onclick="_fetchDashBoardRevenueFiltering('srch-week', 'This Week');">This
                                        Week</div>
                                    <div id="srch-7" onclick="_fetchDashBoardRevenueFiltering('srch-7', 'Last 7 Days');">Last 7 Days
                                    </div>
                                    <div id="srch-month" onclick="_fetchDashBoardRevenueFiltering('srch-month', 'This Month');">This
                                        Month</div>
                                    <div id="srch-30" onclick="_fetchDashBoardRevenueFiltering('srch-30', 'Last 30 Days');">Last 30 Days
                                    </div>
                                    <div id="srch-90" onclick="_fetchDashBoardRevenueFiltering('srch-90', 'Last 90 Days');">Last 90 Days
                                    </div>
                                    <div id="srch-year" onclick="_fetchDashBoardRevenueFiltering('srch-year', 'This Year');">This
                                        Year</div>
                                    <div id="srch-1year" onclick="_fetchDashBoardRevenueFiltering('srch-1year', 'Last 1 Year');">Last 1
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
                                            onclick="_fetchDashboardCustomRevenueFiltering();">Apply</button>
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
                        
                        <div class="revenue-date">
                            <i class="bi-info-circle"></i> Revenue report between <strong id="dateFrom">Loading...</strong> and <strong
                                id="dateTo">Loading...</strong>
                        </div>
                    </div>

                    <div class="trending-back-div">
                        <div class="report-statistics-back-div">
                            <div class="report-statistics-div" id="branch" title="Revenue from All Channels">
                                <div class="statistics-inner-div">
                                    <div class="icon-div active">
                                        <i class="bi bi-cash-stack"></i>
                                    </div>

                                    <div class="report-statistics-text">
                                        <p>Total Revenue</p>
                                        <span>Revenue from All Channels</span>
                                        <h2 id="totalRevenue"><s>N</s>0.00</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="report-statistics-div" id="branch" title="Credit Card">
                                <div class="statistics-inner-div">
                                    <div class="icon-div secondary">
                                        <i class="bi bi-credit-card"></i>
                                    </div>

                                    <div class="report-statistics-text">
                                        <p>Credit Card Revenue</p>
                                        <span>Total Amount Paid via Credit Card</span>
                                        <h2 id="sumCreditCardPayments"><s>N</s>0.00</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="report-statistics-div" title="Bank Transfer Revenue">
                                <div class="statistics-inner-div">
                                    <div class="icon-div">
                                        <i class="bi bi-bank"></i>
                                    </div>

                                    <div class="report-statistics-text">
                                        <p>Bank Transfer Revenue</p>
                                        <span>Total Amount Paid via Bank Transfer</span>
                                        <h2 id="sumBankTransferPayments"><s>N</s>0.00</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="report-statistics-div" title="Number of Card Payments">
                                <div class="statistics-inner-div">
                                    <div class="icon-div active">
                                        <i class="bi bi-wallet"></i>
                                    </div>

                                    <div class="report-statistics-text">
                                        <p>Credit Card Transactions</p>
                                        <span>Number of Card Payments</span>
                                        <h2 id="countCreditCardPayments">0</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="report-statistics-div" title="Bank Transfer Transactions">
                                <div class="statistics-inner-div">
                                    <div class="icon-div active">
                                        <i class="bi bi-bank"></i>
                                    </div>

                                    <div class="report-statistics-text">
                                        <p>Bank Transfer Transactions</p>
                                        <span>Number of Bank Transfer Payments</span>
                                        <h2 id="countBankTransferPayments">0</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="report-statistics-div" title="Paystack Charges">
                                <div class="statistics-inner-div">
                                    <div class="icon-div danger">
                                        <i class="bi bi-receipt-cutoff"></i>
                                    </div>

                                    <div class="report-statistics-text">
                                        <p>Paystack Charges</p>
                                        <span>Total Transaction Charges</span>
                                        <h2 id="sumPaystackCharges"><s>N</s>0.00</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="report-statistics-div" title="Paystack Remittance">
                                <div class="statistics-inner-div">
                                    <div class="icon-div primary">
                                        <i class="bi bi-arrow-left-right"></i>
                                    </div>

                                    <div class="report-statistics-text">
                                        <p>Paystack Remittance</p>
                                        <span>Total Amount Remitted</span>
                                        <h2 id="sumPaystackRemittance"><s>N</s>0.00</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="chartContainer" style="width:100%; height:400px; margin:auto;"></div>
                        <script>
                            $(document).ready(function () {

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

                                    // data: [{
                                    //     type: "splineArea",
                                    //     showInLegend: true,
                                    //     name: "Successful Payment",
                                    //     xValueFormatString: "DD MMM, YYYY",
                                    //     color: "#328ab3",
                                    //     dataPoints: [{
                                    //         x: new Date(2026, 5, 1),
                                    //         y: 45000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 5),
                                    //         y: 62000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 10),
                                    //         y: 38000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 15),
                                    //         y: 90000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 20),
                                    //         y: 70000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 25),
                                    //         y: 120000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 30),
                                    //         y: 95000
                                    //     }
                                    //     ]
                                    // },
                                    // {
                                    //     type: "splineArea",
                                    //     name: "Pending Payment",
                                    //     color: "#f3ad2b",
                                    //     showInLegend: true,
                                    //     dataPoints: [{
                                    //         x: new Date(2026, 5, 1),
                                    //         y: 45000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 5),
                                    //         y: 75000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 10),
                                    //         y: 38000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 15),
                                    //         y: 90000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 20),
                                    //         y: 60000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 25),
                                    //         y: 100000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 30),
                                    //         y: 95000
                                    //     }
                                    //     ]
                                    // },
                                    // {
                                    //     type: "",
                                    //     name: "Cancelled Payment",
                                    //     color: "#C24642",
                                    //     showInLegend: true,
                                    //     dataPoints: [{
                                    //         x: new Date(2026, 5, 1),
                                    //         y: 10000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 5),
                                    //         y: 0
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 10),
                                    //         y: 20000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 15),
                                    //         y: 15000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 20),
                                    //         y: 40000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 25),
                                    //         y: 70000
                                    //     },
                                    //     {
                                    //         x: new Date(2026, 5, 30),
                                    //         y: 50000
                                    //     }
                                    //     ]
                                    // }
                                    // ]
                                });

                                chart.render();

                                function toogleDataSeries(e) {
                                    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
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
                                    // dataPoints: [{
                                    //         label: "SIWES",
                                    //         y: 5
                                    //     },
                                    //     {
                                    //         label: "IT",
                                    //         y: 6
                                    //     },
                                    //     {
                                    //         label: "INTERN",
                                    //         y: 4
                                    //     },
                                    //     {
                                    //         label: "DIPLOMA",
                                    //         y: 5
                                    //     },
                                    // ]
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
                                // dataPoints: [{
                                //         label: "Debit/Credit Card",
                                //         y: 3
                                //     },
                                //     {
                                //         label: "Bank Transfer",
                                //         y: 11
                                //     },
                                // ]
                            }]
                        };
                        $("#chartContainer2").CanvasJSChart(options);
                        </script>
                    </div>
                </div>

                <div class="matrix-div">
                    <div class="inner-div">
                        <div class="title">
                            <h3>Revenue Matrix</h3>
                        </div>
                        <div id="chartContainer3" style="width:100%; height:200px; margin:auto;"></div>

                        <script type="text/javascript">
                        var options = {
                            title: {
                                text: "" /*My Performance*/
                            },
                            // data: [{
                            //     type: "doughnut",
                            //     innerRadius: 30,
                            //     showInLegend: "False",
                            //     legendText: "{label}",
                            //     indexLabel: "{label} ({y})",
                            //     yValueFormatString: "#,##0.#" % "",
                            //     indexLabelFontSize: 9,
                            //     dataPoints: [{
                            //             label: "Credit Card",
                            //             y: 10000
                            //         },
                            //         {
                            //             label: "Bank Transfer",
                            //             y: 10000
                            //         },
                            //     ]
                            // }]
                        };
                        $("#chartContainer3").CanvasJSChart(options);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            _fetchDashBoardRevenueFiltering('srch-30', 'Last 30 Days');
        });
    </script>
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