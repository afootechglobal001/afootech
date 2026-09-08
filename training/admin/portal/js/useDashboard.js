function _getActivePage(props) {
  const { page = "", divid = "", nav = "" } = props;
  _getActiveLink(divid);
  if (page) {
    sessionStorage.setItem("currentDashboardPage", page);
    _getPage({ page: page, url: trainingAdminPortalMiddlewareUrl });
  }
}

function _getActiveLink(divid) {
  _removeClass();
  $("#" + divid).addClass("active-li");
}

function _removeClass() {
  $(
    "#dashboard, #topDashboard, #adminPage, #studentPage, #reportPage, #settingsPage, #coursePage, #pricingPage",
  ).removeClass("active-li");
}

function _open_li(ids) {
  $("#" + ids + "-sub-li").toggle("slow");
}

function _toggleProfileDiv() {
  $(".toggle").toggle("slow");
}

function _closeProfileDiv(event) {
  if (!$(event.target).closest(".toggle, .right-icon-div").length) {
    $(".toggle").hide("slow");
  }
}
$(document).on("click", _closeProfileDiv);

function select_search() {
  $(".srch-select").toggle("fast");
}

function srch_custom(text) {
  $("#srch-text").html(text);
  $(".custom-srch-div").fadeIn(500);
}

function _closeSearchDiv(event) {
  if (!$(event.target).closest(".srch-select, .text-right").length) {
    $(".srch-select").hide("slow");
  }
}
$(document).on("click", _closeSearchDiv);

function _chevronCollapse(divId) {
  var x = document.getElementById(divId + "num");
  var titleDiv = x.closest(".pages-toggle-title");

  if (x.innerHTML === '&nbsp;<i class="bi-plus"></i>&nbsp;') {
    x.innerHTML = '&nbsp;<i class="bi-dash"></i>&nbsp;';
    $("#" + divId + "answer").addClass("active-li");
    $(titleDiv).addClass("active-toggle");
  } else {
    x.innerHTML = '&nbsp;<i class="bi-plus"></i>&nbsp;';
    $(titleDiv).removeClass("active-toggle");
  }

  $("#" + divId + "answer").slideToggle("slow");
}

function _logOut() {
  sessionStorage.clear();
  window.parent.location.href = trainingAdminUrl;
}

function _confirmLogOut() {
  _showCustomConfirm({
    callback: () => {
      _logOut();
    },
    title: "Confirm Logout Action!",
    message:
      "Are you sure you want to log out? You may miss important notifications or updates until you sign in again.",
    alertType: "warning",
    falseActionBtn: true,
    closeOnOverlayClick: true,
  });
}

function _staffValidationCheck(code) {
  if (code === 401 || code === 403) {
    _logOut();
    return;
  }
}

///// Admin SelectFields ///////////
function _getSelectStatusId(fieldId, statusIds) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
      url: `preset-data/fetch-status?statusId=${statusIds}`,
      accessKey: true,
		})
      .then((response) => {
          $("#searchList_" + fieldId).html("");
        for (let i = 0; i < response.data.length; i++) {
          const id = response.data[i].statusId;
          const value = response.data[i].statusName;
                  
          $("#searchList_" + fieldId).append(`
            <li onclick="
              _clickOption(
                'searchList_${fieldId}',
                '${id}',
                '${value}'
              );
            ">
              ${value}
            </li>
          `);
        }				
		})
		.catch((error) => {
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
		_actionAlert('An unexpected error occurred. Please try again.', false);
  }
}



















/// Account Custom Revenue Filtering ////////
function _fetchDashBoardRevenueFiltering(filterWith, text) {
  $("#srch-text").html(text);
  $(".custom-srch-div").fadeOut(500);
  let dateFrom;
  const dateTo = new Date().toISOString().split("T")[0];
  if (filterWith === "srch-today") {
    dateFrom = new Date().toISOString().split("T")[0];
  } else if (filterWith === "srch-week") {
    const currentDate = new Date();
    const firstDayOfWeek = new Date(
      currentDate.setDate(currentDate.getDate() - currentDate.getDay())
    )
      .toISOString()
      .split("T")[0];
    dateFrom = firstDayOfWeek;
  } else if (filterWith === "srch-7") {
    /// for last 7 days
    const currentDate = new Date();
    const pastDate = new Date(currentDate.setDate(currentDate.getDate() - 6))
      .toISOString()
      .split("T")[0];
    dateFrom = pastDate;
  } else if (filterWith === "srch-30") {
    /// for last 30 days
    const currentDate = new Date();
    const pastDate = new Date(currentDate.setDate(currentDate.getDate() - 29))
      .toISOString()
      .split("T")[0];
    dateFrom = pastDate;
  } else if (filterWith === "srch-90") {
    /// for last 90 days
    const currentDate = new Date();
    const pastDate = new Date(currentDate.setDate(currentDate.getDate() - 89))
      .toISOString()
      .split("T")[0];
    dateFrom = pastDate;
  } else if (filterWith === "srch-month") {
    const currentDate = new Date();
    const firstDayOfMonth = new Date(
      currentDate.getFullYear(),
      currentDate.getMonth(),
      2
    )
      .toISOString()
      .split("T")[0];
    dateFrom = firstDayOfMonth;
  } else if (filterWith === "srch-year") {
    const currentDate = new Date();
    const firstDayOfYear = new Date(currentDate.getFullYear(), 0, 2)
      .toISOString()
      .split("T")[0];
    dateFrom = firstDayOfYear;
  } else if (filterWith === "srch-1year") {
    /// for last 1 year
    const currentDate = new Date();
    const pastDate = new Date(
      currentDate.setFullYear(currentDate.getFullYear() - 1)
    )
      .toISOString()
      .split("T")[0];
    dateFrom = pastDate;
  }

  _reportDashboardRevenueFiltering(dateFrom, dateTo);
}
function _fetchDashboardCustomRevenueFiltering() {
  let issueCount = 0;

  const dateFrom = $("#datepickers-from").val();
  const dateTo = $("#datepickers-to").val();

  $("#datepickers-from, #datepickers-to").removeClass("issue");
  $("#issue_from, #issue_to").html("");

  if (!dateFrom) {
    $("#issue_from").html("Kindly Provide Start Date To Continue");
    issueCount++;
  }

  if (!dateTo) {
    $("#issue_to").html("Kindly Provide End Date To Continue");
    issueCount++;
  }

  if (issueCount > 0) {
    return;
  }

  _reportRevenueFiltering(dateFrom, dateTo);
}

function _reportDashboardRevenueFiltering(dateFrom, dateTo) {
  $("#get-form-more-div")
    .css({
      display: "flex",
      "justify-content": "center",
      "align-items": "center",
    })
    .fadeIn(500);

    try {
      //// call endpoint //////
      _callFetchEndPoints({
        url: `admin/dashboard/dashboad-statistics?dateFrom=${dateFrom}&dateTo=${dateTo}`,
        accessKey: true,
      })
      .then((response) => {
        const financialStatistic = response?.data?.financialStatistics;
        const systemStatistic = response?.data?.systemStatistics;
        const programData = response?.data?.programData || [];
        const paymentData = response?.data?.paymentData || [];

        // Update custom date from and date to///
        $("#dateFrom").html(response?.dateFrom);
        $("#dateTo").html(response?.dateTo);

        // Update system Statistics///
        $("#totalActiveStaffCount").html(systemStatistic?.totalActiveStaffCount);
        $("#totalAwaitingActivationStudentsCount").html(systemStatistic?.totalAwaitingActivationStudentsCount);
        $("#totalActiveStudentsCount").html(systemStatistic?.totalActiveStudentsCount);
        $("#totalCertifiedStudentsCount").html(systemStatistic?.totalCertifiedStudentsCount);

        // Update Report Statistics///
        $("#totalRevenue").html("<s>N</s>" + thousandSeperator(response?.totalRevenue));
        $("#sumCreditCardPayments").html("<s>N</s>" + thousandSeperator(financialStatistic.sumCreditCardPayments));
        $("#sumBankTransferPayments").html("<s>N</s>" + thousandSeperator(financialStatistic.sumBankTransferPayments));
        $("#sumPaystackCharges").html("<s>N</s>" + thousandSeperator(financialStatistic.sumPaystackCharges));
        $("#sumPaystackRemittance").html("<s>N</s>" + thousandSeperator(financialStatistic.sumPaystackRemittance));
        $("#countCreditCardPayments").html(financialStatistic.countCreditCardPayments);
        $("#countBankTransferPayments").html(financialStatistic.countBankTransferPayments);

        // Update Doughnut Chart For Program Stataistics
          const dataPoints = programData.map((item) => ({
            label: item.programName,
            y: item.activeStudentsCount,
          }));

          $("#chartContainer1").CanvasJSChart({
            data: [
              {
                type: "doughnut", innerRadius: 30, 
                indexLabel: "{label} ({y})", 
                indexLabelFontSize: 9,
                dataPoints: dataPoints,
              },
            ],
          });

        // Update Pie Chart credit and bank transfer ///
        const options = {
          title: {
            text: "",
          },
          data: [
            {
              type: "pie",
              startAngle: 45,
              showInLegend: false,
              legendText: "{label}",
              indexLabel: "{label} ({y})",
              yValueFormatString: "#,##0.#",
              indexLabelFontSize: 9,
              dataPoints: [
                {
                  label: "Debit/Credit Card",
                  y: parseInt(financialStatistic.countCreditCardPayments) || 0,
                },
                {
                  label: "Bank Transfer",
                  y: parseInt(financialStatistic.countBankTransferPayments) || 0,
                },
              ],
            },
          ],
        };
        $("#chartContainer2").CanvasJSChart(options);

        //// Update Dougnut Chart Revenue ///
        const revenueDataPoints = [
          {
            label: "Credit Card",
            y: Number(financialStatistic.sumCreditCardPayments) || 0,
          },
          {
            label: "Bank Transfer",
            y: Number(financialStatistic.sumBankTransferPayments) || 0,
          },
        ];

        $("#chartContainer3").CanvasJSChart({
          data: [
            {
              type: "doughnut",
              innerRadius: 30,
              indexLabel: "{label} ({y})",
              yValueFormatString: "₦#,##0.00",
              indexLabelFontSize: 9,
              dataPoints: revenueDataPoints,
            },
          ],
        });

        const successfulDataPoints = [];
        const pendingDataPoints = [];
        const cancelledDataPoints = [];

        // Update dashboard revenue trend
        if (paymentData && paymentData.length > 0) {
          for (let i = 0; i < paymentData.length; i++) {
            const fetchedData = paymentData[i];

            const payDate = new Date(fetchedData.payDate);

            successfulDataPoints.push({
              x: payDate,
              y: parseFloat(fetchedData.totalSuccessfulFees) || 0
            });

            pendingDataPoints.push({
              x: payDate,
              y: parseFloat(fetchedData.totalPendingFees) || 0
            });

            cancelledDataPoints.push({
              x: payDate,
              y: parseFloat(fetchedData.totalCancelledFees) || 0
            });
          }
        }

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

            data: [
                {
                  type: "splineArea",
                  showInLegend: true,
                  name: "Successful Payment",
                  xValueFormatString: "DD MMM, YYYY",
                  color: "#328ab3",
                  dataPoints: successfulDataPoints
                },
                {
                  type: "splineArea",
                  showInLegend: true,
                  name: "Pending Payment",
                  color: "#f3ad2b",
                  dataPoints: pendingDataPoints
                },
                {
                  type: "splineArea",
                  showInLegend: true,
                  name: "Cancelled Payment",
                  color: "#C24642",
                  dataPoints: cancelledDataPoints
                }
            ]
        });

        chart.render();

        function toogleDataSeries(e) {
          if (typeof e.dataSeries.visible === "undefined" || e.dataSeries.visible) {
              e.dataSeries.visible = false;
          } else {
              e.dataSeries.visible = true;
          }
          chart.render();
        }
        
        $("#get-form-more-div").fadeOut(500);
      })
      .catch((error) => {
        _staffValidationCheck(error.response);
        console.error("Error:", error);
        if (error.status==0) {
				  _alertClose();
        }
      });
    } catch (error) {
      _alertClose();
      console.error("Error:", error);
      _callCatchError(() => _reportRevenueFiltering(dateFrom, dateTo));
  	}
}