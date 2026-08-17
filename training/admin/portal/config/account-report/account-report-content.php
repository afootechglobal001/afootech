<?php if ($page == 'reportPage') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi bi-graph-up-arrow"></i></div>
            </div>
            <div class="text-div">
                <h3>Income/Revenue</h3>
                <p>Track and manage all income and revenue records in one place. Monitor payments, generate financial
                    reports, and gain clear insights into your institution's financial performance with ease.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" onkeyup="" placeholder="Search Report Here...">
                <i class="bi bi-search"></i>
            </div>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="nav-content-back-div">
            <div class="nav-container">
                <ul>
                    <li class="active border" title="Filter Revenue By Date Range" id="filterByDate"
                        onclick="_getActiveReportNav({divid:'filterByDate', page: 'filterByDate', url: trainingAdminPortalMiddlewareUrl});">
                        <i class="bi-calendar2-check"></i> Date Range
                    </li>
                </ul>
            </div>

            <div id="getNavPage">
                <script>
                _getActiveReportNav({
                    divid: 'filterByDate',
                    page: 'filterByDate',
                    url: trainingAdminPortalMiddlewareUrl
                });
                </script>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Filter By Date Revenue Pages -->
<?php if ($page == 'filterByDate') { ?>
    <div class="chart-div-notifications report-chart-div">
        <div class="text-wrapper">
            <div class="text"><i class="bi-graph-up-arrow"></i> Showing Matrix for </div>

            <div class="text text-right" onclick="select_search()">
                <span id="srch-text">Last 30 Days</span>
                <div class="icon-div"><i class="bi-caret-down"></i></div>

                <div class="srch-select alert-srch-select">
                    <div id="srch-today" onclick="_fetchReportRevenueFiltering('srch-today', 'Today');">Today
                    </div>
                    <div id="srch-week" onclick="_fetchReportRevenueFiltering('srch-week', 'This Week');">This
                        Week</div>
                    <div id="srch-7" onclick="_fetchReportRevenueFiltering('srch-7', 'Last 7 Days');">Last 7 Days
                    </div>
                    <div id="srch-month" onclick="_fetchReportRevenueFiltering('srch-month', 'This Month');">This
                        Month</div>
                    <div id="srch-30" onclick="_fetchReportRevenueFiltering('srch-30', 'Last 30 Days');">Last 30 Days
                    </div>
                    <div id="srch-90" onclick="_fetchReportRevenueFiltering('srch-90', 'Last 90 Days');">Last 90 Days
                    </div>
                    <div id="srch-year" onclick="_fetchReportRevenueFiltering('srch-year', 'This Year');">This
                        Year</div>
                    <div id="srch-1year" onclick="_fetchReportRevenueFiltering('srch-1year', 'Last 1 Year');">Last 1
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
                            <input class="text_field bar_cust_text_field" type="text" id="datepickers-to" placeholder="" />
                            <div class="placeholder bar_cust_placeholder"><i class="bi-calendar3"></i> To </div>
                            <div class="issueText" id="issue_to"></div>
                        </div>
                        <button type="button" class="btn" id="applyCustomSearchBtn"
                            onclick="_fetchCustomReportRevenueFiltering();">Apply</button>
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

    <div class="fetch-report-back-div">
        <div class="report-dashbaord-wrapper animated fadeIn">
            <div class="dashboard-statistics-wrapper">
                <div class="left-dashbaord-container">
                    <div class="statistics-chart-back-div">
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

                        <div class="table-div animated fadeIn">
                            <table class="table" cellspacing="0" style="width:100%">
                                <thead>
                                    <tr class="tb-col">
                                        <th>sn</th>
                                        <th>Date</th>
                                        <th>Successful(<s>N</s>)</th>
                                        <th>Pending(<s>N</s>)</th>
                                        <th>Cancelled(<s>N</s>)</th>
                                        <th>View</th>
                                    </tr>
                                </thead>

                                <tbody id="acoountReportPageContent">

                                    <!-- CONTENT GOES HERE -->
                                    <tr>
                                        <td colspan="20">
                                            <div class="content-loading-div">
                                                <img src="<?php echo $websiteUrl ?>/images/spinner.gif" alt="Loading" />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Pagination -->
                            <div id="acoountReportPageContentPaginationControls" class="pagination-div"></div>
                        </div>
                    </div>
                </div>

                <div class="right-dashbaord-container">
                    <div class="matrix-div">
                        <div class="inner-div">
                            <div class="title">
                                <h3>Revenue Matrix</h3>
                            </div>
                            <div id="chartContainer1" style="width:100%; height:200px; margin:auto;"></div>

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
                            $("#chartContainer1").CanvasJSChart(options);
                            </script>
                        </div>
                    </div>

                    <div class="matrix-div">
                        <div class="inner-div">
                            <div class="title">
                                <h3>Payment Channel Matrix</h3>
                            </div>
                            <div id="chartContainer2" style="width:100%; height:200px; margin:auto;"></div>

                            <script type="text/javascript">
                            var options = {
                                title: {
                                    text: "" /*My Performance*/
                                },
                                // data: [{
                                //     type: "pie",
                                //     startAngle: 45,
                                //     showInLegend: "False",
                                //     legendText: "{label}",
                                //     indexLabel: "{label} ({y})",
                                //     yValueFormatString: "#,##0.#" % "",
                                //     dataPoints: [{
                                //             label: "Debit/Credit Card",
                                //             y: 3
                                //         },
                                //         {
                                //             label: "Bank Transfer",
                                //             y: 11
                                //         },
                                //     ]
                                // }]
                            };
                            $("#chartContainer2").CanvasJSChart(options);
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            _fetchReportRevenueFiltering('srch-30', 'Last 30 Days');
        });
    </script>
<?php } ?>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php if ($page == 'revenueBreakdown') { ?>
    <div class="user-profile-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi-graph-up-arrow"></i></div>
                <h3 id="pageTitle">REVENUE BREAKDOWN</h3>
            </div>
            <div class="btn-div">
                <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                    <i class="bi bi-x-lg"></i> Close
                </button>
            </div>
        </div>

        <div class="profile-content-div">
            <div class="field-back-div">
                <div class="field-inner-div report-field-inner-div">
                    <div class="content-wrapper animated fadeIn">
                        <div class="header-div">
                            <div class="title-nav-back-div">
                                <div class="nav-ul-div">
                                    <ul>
                                        <li class="active-li" title="Successful Status" id="successfulPage"
                                            onclick="_getPaymentStatusNav({divid:'successfulPage', page: 'successfulPage', id: '<?php echo $id; ?>', url: trainingAdminPortalMiddlewareUrl});">
                                            <img src="<?php echo $websiteUrl ?>/all-images/images/tick-mark.png"
                                                alt="Successful Icon" /> SUCCESSFUL
                                        </li>
                                        <li title="Pending Status" id="pendingPage"
                                            onclick="_getPaymentStatusNav({divid:'pendingPage', page: 'pendingPage', id: '<?php echo $id; ?>', url: trainingAdminPortalMiddlewareUrl});">
                                            <img src="<?php echo $websiteUrl ?>/all-images/images/load.png"
                                                alt="Pending Icon" />
                                            PENDING
                                        </li>
                                        <li title="Cancel Status" id="cancelledPage"
                                            onclick="_getPaymentStatusNav({divid:'cancelledPage', page: 'cancelledPage', id: '<?php echo $id; ?>', url: trainingAdminPortalMiddlewareUrl});">
                                            <img src="<?php echo $websiteUrl ?>/all-images/images/close.png"
                                                alt="Cancelled Icon" /></i> CANCELLED
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="content-container" id="getPaymentNav">
                            <script>
                            _getPaymentStatusNav({
                                divid: 'successfulPage',
                                page: 'successfulPage',
                                id: '<?php echo $id; ?>',
                                url: trainingAdminPortalMiddlewareUrl
                            });
                            sessionStorage.setItem("sessionPayDate", '<?php echo $id; ?>');
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- ///// Success Page //// -->
<?php if ($page == 'successfulPage') { ?>
    <div id="revenueAlert" class="alert top-alert-div report-alert animated fadeIn">
        <div>
            <i class="bi-graph-up-arrow"></i>
            Successful Transactions On <span id="date"></span>
        </div>

        <div class="btn-container">
            <button class="btn"><i class="bi-printer"></i> PRINT</button>
            <button class="btn"><i class="bi-file-earmark-excel"></i> EXPORT</button>
        </div>
    </div>

    <div class="report-statistics-back-div">
        <div class="report-statistics-div" id="branch" title="Revenue from All Channels">
            <div class="statistics-inner-div">
                <div class="icon-div active">
                    <i class="bi bi-cash-stack"></i>
                </div>

                <div class="report-statistics-text">
                    <p>Total Revenue</p>
                    <span>Revenue from All Channels</span>
                    <h2 id="totalByDateAmount"><s>N</s>0.00</h2>
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
                    <h2 id="sumCreditCardPaymentsByDate"><s>N</s>0.00</h2>
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
                    <h2 id="sumBankTransferPaymentsByDate"><s>N</s>0.00</h2>
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
                    <h2 id="countCreditCardPaymentsByDate">0</h2>
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
                    <h2 id="countBankTransferPaymentsByDate">0</h2>
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
                    <h2 id="sumPaystackChargesByDate"><s>N</s>0.00</h2>
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
                    <h2 id="sumPaystackRemittanceByDate"><s>N</s>0.00</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="table-div animated fadeIn">
        <table class="table" cellspacing="0" style="width:100%">
            <thead>
                <tr class="tb-col">
                    <th>sn</th>
                    <th>Transaction ID</th>
                    <th>Student Info</th>
                    <th>Contact</th>
                    <th>Amount</th>
                    <th>Charges</th>
                    <th>Remittance</th>
                    <th>Payment Purpose</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>View</th>
                    <th id="actionHeader" style="display:none;">Action</th>
                </tr>
            </thead>

            <tbody id="acoountStatusReportPageContent">
                <script>
                    $(document).ready(function() {
                        const newpayDate = "<?php echo $id; ?>";
                        _loadPaymentsByStatus(newpayDate, '5',);
                    });
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
        <div id="acoountStatusReportContentPaginationControls" class="pagination-div"></div>
    </div>
<?php } ?>

<!-- ///// Pending Page //// -->
<?php if ($page == 'pendingPage') { ?>
    <div id="revenueAlert" class="alert top-alert-div animated fadeIn">
        <div>
            <i class="bi-graph-up-arrow"></i>
            Pending Transactions On <span id="date"></span>
        </div>

        <div class="btn-container">
            <button class="btn"><i class="bi-printer"></i> PRINT</button>
            <button class="btn"><i class="bi-file-earmark-excel"></i> EXPORT</button>
        </div>
    </div>

    <div class="table-div animated fadeIn">
        <table class="table" cellspacing="0" style="width:100%">
            <thead>
                <tr class="tb-col">
                    <th>sn</th>
                    <th>Transaction ID</th>
                    <th>Student Info</th>
                    <th>Contact</th>
                    <th>Amount</th>
                    <th>Charges</th>
                    <th>Remittance</th>
                    <th>Payment Purpose</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>View</th>
                    <th id="actionHeader" style="display:none;">Action</th>
                </tr>
            </thead>

            <tbody id="acoountStatusReportPageContent">
                <script>
                    $(document).ready(function() {
                        const newpayDate = "<?php echo $id; ?>";
                        _loadPaymentsByStatus(newpayDate, '3',);
                    });
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
        <div id="acoountStatusReportContentPaginationControls" class="pagination-div"></div>
    </div>
<?php } ?>

<!-- ///// Cancel Page //// -->
<?php if ($page == 'cancelledPage') { ?>
    <div id="revenueAlert" class="alert top-alert-div animated fadeIn">
        <div>
            <i class="bi-graph-up-arrow"></i>
            Cancelled Transactions On <span id="date"></span>
        </div>

        <div class="btn-container">
            <button class="btn"><i class="bi-printer"></i> PRINT</button>
            <button class="btn"><i class="bi-file-earmark-excel"></i> EXPORT</button>
        </div>
    </div>

    <div class="table-div animated fadeIn">
        <table class="table" cellspacing="0" style="width:100%">
            <thead>
                <tr class="tb-col">
                    <th>sn</th>
                    <th>Transaction ID</th>
                    <th>Student Info</th>
                    <th>Contact</th>
                    <th>Amount</th>
                    <th>Charges</th>
                    <th>Remittance</th>
                    <th>Payment Purpose</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>View</th>
                    <th id="actionHeader" style="display:none;">Action</th>
                </tr>
            </thead>

            <tbody id="acoountStatusReportPageContent">
                <script>
                    $(document).ready(function() {
                        const newpayDate = "<?php echo $id; ?>";
                        _loadPaymentsByStatus(newpayDate, '4');
                    });
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
        <div id="acoountStatusReportContentPaginationControls" class="pagination-div"></div>
    </div>
<?php } ?>

<?php if ($page == 'paymentBreakDownForm') { ?>
    <script>
      getPaymentDetailsSession = JSON.parse(sessionStorage.getItem("getPaymentDetailsSession"));
    </script>
    <section class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-credit-card"></i></div>
                <h3>TRANSACTION DETAILS</h3>
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
                <p>This section provides a complete breakdown of your transaction, including payment status, amount paid,
                    and transaction reference.</p>
            </div>

            <!--  ////////////////////////////////////////////////////////////////////////////////-->
            <div class="form-container">
                <div class="main-content-div form-main-content">
                    <div class="tables-content-div form-content-div">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-people"></i>
                                <p>Student Details</p>
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
                                                        $("#studentId").html(getPaymentDetailsSession?.studentData?.studentId);
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Full Name:</div>
                                            <div>
                                                <span id="studentInfo">
                                                    <script>
                                                        $("#studentInfo").html(getPaymentDetailsSession?.studentData?.firstName + ' ' + getPaymentDetailsSession?.studentData?.lastName);
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Email Address:</div>
                                            <div>
                                                <span id="studentEmailAddress">
                                                    <script>
                                                        $("#studentEmailAddress").html(getPaymentDetailsSession?.studentData?.emailAddress);
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Phone Number:</div>
                                            <div>
                                                <span id="studentPhoneNumber">
                                                    <script>
                                                        $("#studentPhoneNumber").html(getPaymentDetailsSession?.studentData?.phoneNumber);
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
                                <i class="bi bi-credit-card"></i>
                                <p>Payment Details</p>
                            </div>
                        </div>

                        <div class="form-text">
                            <div class="alert alert-success form-alert">
                                <div class="alert-list-div">
                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Payment Id:</div>
                                            <div><span id="paymentId">
                                                    <script>
                                                        $("#paymentId").html(getPaymentDetailsSession?.paymentId);
                                                    </script>
                                                </span></div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Payment Purpose:</div>
                                            <div><span id="paymentPurposeName">
                                                    <script>
                                                        $("#paymentPurposeName").html(getPaymentDetailsSession?.paymentPurposeData?.paymentPurposeName);
                                                    </script>
                                                </span></div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Payment Method:</div>
                                            <div><span id="paymentMethodName">
                                                    <script>
                                                        $("#paymentMethodName").html(getPaymentDetailsSession?.paymentMethodData?.paymentMethodName);
                                                    </script>
                                                </span></div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Status:</div>
                                            <div><span id="statusName">
                                                    <script>
                                                        $("#statusName").html(getPaymentDetailsSession?.statusData?.statusName);
                                                    </script>
                                                </span></div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Date Initiated:</div>
                                            <div><span id="createdTime">
                                                    <script>
                                                        $("#createdTime").html(getPaymentDetailsSession?.createdTime);
                                                    </script>
                                                </span></div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Date Confirmed:</div>
                                            <div><span id="payDate">
                                                    <script>
                                                        $("#payDate").html(getPaymentDetailsSession?.payDate);
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
                        const confirmedByData = getPaymentDetailsSession?.confirmedByData;

                        let content = "";
                        if (confirmedByData) {
                            content += `
                                <div class="alert alert-success form-alert">
                                <span>Payment Confirmed By:</span>
                                <div class="alert-list-div">
                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Staff Id:</div>
                                            <div><span>${confirmedByData?.staffId}</span></div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Staff FullName:</div>
                                            <div><span>${confirmedByData?.fullName}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `;
                        }
                        $('#showPaymentConfirmBy').html(content);
                    });
                </script>

                <div id="showPaymentConfirmBy"></div>

                <div class="main-content-div form-main-content">
                    <div class="tables-content-div form-content-div">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-credit-card"></i>
                                <p>Amount Paid</p>
                            </div>
                        </div>

                        <div class="form-text">
                            <div class="alert alert-success form-alert">
                                <div class="alert-list-div">
                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Total Amount:</div>
                                            <div>
                                                <span class="total-amount" id="totalAmount">
                                                    <script>
                                                        $("#totalAmount").html('<s>N</s>'+ (thousandSeperator(getPaymentDetailsSession?.amount)));
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

                <script>
                    $(document).ready(function () {
                        const paystackCharges = getPaymentDetailsSession?.paystackCharges;

                        let paystackContentContent = "";
                        if (paystackCharges > 0) {
                            paystackContentContent += `
                                <div class="main-content-div form-main-content">
                                    <div class="tables-content-div form-content-div">
                                        <div class="content-title">
                                            <div class="title">
                                                <i class="bi bi-credit-card"></i>
                                                <p>Paystack Details</p>
                                            </div>
                                        </div>

                                        <div class="form-text">
                                            <div class="alert alert-success form-alert">
                                                <div class="alert-list-div">
                                                    <div class="alert-list-back-div">
                                                        <div class="alert-list">
                                                            <div>Paystack ID:</div>
                                                            <div><span>
                                                                    ${getPaymentDetailsSession?.paystackId}
                                                                </span></div>
                                                        </div>
                                                    </div>

                                                    <div class="alert-list-back-div">
                                                        <div class="alert-list">
                                                            <div>Paystack Charges:</div>
                                                            <div><span>
                                                                      <s>N</s>${thousandSeperator(getPaymentDetailsSession?.paystackCharges)}
                                                                </span></div>
                                                        </div>
                                                    </div>

                                                    <div class="alert-list-back-div">
                                                        <div class="alert-list">
                                                            <div>Paystack Remittance:</div>
                                                            <div><span class="total-amount">
                                                                      <s>N</s>${thousandSeperator(getPaymentDetailsSession?.paystackRemittance)}
                                                                </span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        }
                        $('#showPaystackDetails').html(paystackContentContent);
                    });
                </script>
                <div id="showPaystackDetails"></div>

                <div class="btn-div" id="showPrintReceiptButton">
                    <script>
                        $(document).ready(function () {
                            let showButton = '';
                            if (getPaymentDetailsSession?.statusData?.statusId === 5) {
                                showButton +=
                                `<button class="btn" title="PRINT RECEIPT" id="printBtn" onclick=""> <i class="bi-printer"></i> PRINT RECEIPT </button>`; 
                            }
                            $("#showPrintReceiptButton").html(showButton);
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if ($page == 'resendRecieptSelectForm') { ?>
    <div class="caption-div animated zoomIn">
        <div class="title-div">
            <div class="title"><i class="bi-folder-symlink-fill"></i> RESEND PAYMENT RECIEPT</div>
            <button class="close-btn" onclick="_alertClose(<?php echo $modalLayer ?>);" title="Close"><i
                    class="bi-x-lg"></i></button>
        </div>

        <div class="div-in animated fadeIn">
            <div class="alert alert-success form-alert"> <i class="bi-person"></i> Hello, You’re about to continue with this
                operation.
                Please provide the required <span>Name</span>, and <span>Email</span>, to proceed.
            </div>

            <div class="text_field_container" id="parentFullname_container">
                <script>
                textField({
                    id: 'parentFullname',
                    title: 'Reciever Name'
                });
                </script>
            </div>

            <div class="text_field_container" id="recieptParentEmail_container">
                <script>
                textField({
                    id: 'recieptParentEmail',
                    title: 'Reciever Email'
                });
                </script>
            </div>

            <button class="btn" id="proceedBtn" title="Resend Reciept" onclick="_resendPaymentReciept();">RESEND <i
                    class="bi-reply-all"></i>
            </button>
        </div>
    </div>
<?php } ?>