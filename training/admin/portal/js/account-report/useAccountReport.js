function _getActiveReportNav(props) {
  const {
    page = "",
    divid = "",
    pageContainer = "getNavPage",
  } = props;
  _getReportActiveNav(divid);
  if (page) {
    _getPage({
      page: page,
      pageContainer: pageContainer,
      url: trainingAdminPortalMiddlewareUrl,
    });
  }
}
function _getReportActiveNav(divid) {
  $(
    "#filterByDate"
  ).removeClass("active");
  $("#" + divid).addClass("active");
}

function _getPaymentStatusNav(props) {
  const {
    page = "",
    divid = "",
    id="",
    pageContainer = "getPaymentNav",
  } = props;
  _getActivePaymentStatusNav(divid);
  if (page) {
    _getPage({
      page: page,
      id: id,
      pageContainer: pageContainer,
      url: trainingAdminPortalMiddlewareUrl,
    });
  }
}
function _getActivePaymentStatusNav(divid) {
  $(".title-nav-back-div ul li").removeClass("active-li");
  $("#" + divid).addClass("active-li");
}

/// Account Custom Revenue Filtering ////////
function _fetchReportRevenueFiltering(filterWith, text) {
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

  _reportRevenueFiltering(dateFrom, dateTo);
}
function _fetchCustomReportRevenueFiltering() {
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

/// Render Account Report Revenue Filtering ///
function _reportRevenueFiltering(dateFrom, dateTo) {
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
        url: `admin/account-reports/fetch-revenue-by-date-range?dateFrom=${dateFrom}&dateTo=${dateTo}`,
        accessKey: true,
      })
      .then((response) => {
        const statistic = response?.statistics;

        // Update custom date from and date to///
        $("#dateFrom").html(response?.dateFrom);
        $("#dateTo").html(response?.dateTo);

        // Update Report Statistics///
        $("#totalRevenue").html("<s>N</s>" + thousandSeperator(response?.totalRevenue));
        $("#sumCreditCardPayments").html("<s>N</s>" + thousandSeperator(statistic.sumCreditCardPayments));
        $("#sumBankTransferPayments").html("<s>N</s>" + thousandSeperator(statistic.sumBankTransferPayments));
        $("#sumPaystackCharges").html("<s>N</s>" + thousandSeperator(statistic.sumPaystackCharges));
        $("#sumPaystackRemittance").html("<s>N</s>" + thousandSeperator(statistic.sumPaystackRemittance));
        $("#countCreditCardPayments").html(statistic.countCreditCardPayments);
        $("#countBankTransferPayments").html(statistic.countBankTransferPayments);

        //// Update Dougnut Chart Revenue ///
        const dataPoints = [
          {
            label: "Credit Card",
            y: Number(statistic.sumCreditCardPayments) || 0,
          },
          {
            label: "Bank Transfer",
            y: Number(statistic.sumBankTransferPayments) || 0,
          },
        ];

        $("#chartContainer1").CanvasJSChart({
          data: [
            {
              type: "doughnut",
              innerRadius: 30,
              indexLabel: "{label} ({y})",
              yValueFormatString: "₦#,##0.00",
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
              showInLegend: "False",
              legendText: "{label}",
              indexLabel: "{label} ({y})",
              yValueFormatString: "#,##0.#" % "",
              indexLabelFontSize: 9,
              dataPoints: [
                {
                  label: "Debit/Credit Card",
                  y: parseInt(statistic.countCreditCardPayments),
                },
                {
                  label: "Bank Transfer",
                  y: parseInt(statistic.countBankTransferPayments),
                },
              ],
            },
          ],
        };
        $("#chartContainer2").CanvasJSChart(options);

        if (response?.data && response?.data.length > 0) {
          _initFetchAccountReportTableData(response);
        } else {
          _showEmptyState({
            container: "acoountReportPageContent",
            message: "No payment records found!",
            colspan: 20,
            paginationContainer: "acoountReportPageContentPaginationControls",
          });
        }
        $("#get-form-more-div").fadeOut(500);
      })
      .catch((error) => {
        _staffValidationCheck(error.response);
        console.error("Error:", error);
        if (error.status==0) {
				  _alertClose();
           _showEmptyState({
            container: "acoountReportPageContent",
            message: "Check your internet connection and try again",
            colspan: 20,
            paginationContainer: "acoountReportPageContentPaginationControls",
          });
        }
      });
    } catch (error) {
      _alertClose();
      console.error("Error:", error);
      _callCatchError(() => _reportRevenueFiltering(dateFrom, dateTo));
  	}
}

/// Render Account Table Data ///
function _renderAccountTableData(data, start) {
  return data
    .map((fetchedData, i) => {
      const no = start + i + 1;

      const payDate = new Date(fetchedData.payDate);
      const newpayDate = payDate.toISOString().split("T")[0];

      const totalSuccessfulFees = fetchedData.totalSuccessfulFees;
      const totalPendingFees = fetchedData.totalPendingFees;
      const totalCancelledFees = fetchedData.totalCancelledFees;

      const viewedPayment =
        fetchedData.paymentViewed === false
          ? `
            <div class="text-div">
              <div class="new-payment animated fadeIn">New</div>
            </div>
          `
          : "";

      return `
        <tr class="tb-row">
          <td>${no}</td>

          <td class="clickable-td"
              title="Click to view payment breakdown"
              onclick="_getForm({
                page: 'revenueBreakdown',
                id: '${newpayDate}',
                url: trainingAdminPortalMiddlewareUrl
              });">

            <div class="text-back-div">
              <div class="icon-div">
                <i class="bi bi-calendar-check-fill"></i>
              </div>

              ${newpayDate}
              ${viewedPayment}
            </div>
          </td>

          <td class="SUCCESSFULSTATUS">
            <s>N</s>${thousandSeperator(totalSuccessfulFees)}
          </td>

          <td class="PENDINGSTATUS">
            <s>N</s>${thousandSeperator(totalPendingFees)}
          </td>

          <td class="CANCLLEDSTATUS">
            <s>N</s>${thousandSeperator(totalCancelledFees)}
          </td>

          <td>
            <button class="btn view-btn"
              title="Click to view payment breakdown"
              onclick="_getForm({
                page: 'revenueBreakdown',
                id: '${newpayDate}',
                url: trainingAdminPortalMiddlewareUrl
              });">
              VIEW DETAILS
            </button>
          </td>
        </tr>
      `;
    })
    .join("");
}

/// Initialize Fetch Account Report Table Data ///
function _initFetchAccountReportTableData(response) {
  const paginator = new Paginator(
    response.data || [],
    _renderAccountTableData,
    "acoountReportPageContentPaginationControls",
    "acoountReportPageContent",
    10
  );

  __paginatorHandlers["acoountReportPageContentPaginationControls"] = paginator;
  paginator.renderPage();
}

/// Load Payments by Status ///
function _loadPaymentsByStatus(newpayDate, statusId) {
  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `admin/account-reports/fetch-revenue-by-date?date=${newpayDate}&statusId=${statusId}`,
      accessKey: true,
    })
    .then((response) => {
      if (response?.data && response?.data.length > 0) {
        _initFetchStatusReportTableData(response);
        $('#date').html(response?.date);
        if (statusId === '5' && response?.data.length > 0) {
          $('#totalByDateAmount').html("<s>N</s>" + thousandSeperator(response?.totalAmount));
          $('#sumCreditCardPaymentsByDate').html("<s>N</s>" + thousandSeperator(response?.statistics?.sumCreditCardPayments));
          $('#sumBankTransferPaymentsByDate').html("<s>N</s>" + thousandSeperator(response?.statistics?.sumBankTransferPayments));
          $('#countCreditCardPaymentsByDate').html(response?.statistics?.countCreditCardPayments);
          $('#countBankTransferPaymentsByDate').html(response?.statistics?.countBankTransferPayments);
          $('#sumPaystackChargesByDate').html("<s>N</s>" + thousandSeperator(response?.statistics?.sumPaystackCharges));
          $('#sumPaystackRemittanceByDate').html("<s>N</s>" + thousandSeperator(response?.statistics?.sumPaystackRemittance));
        }
      } else {
        _showEmptyState({
          container: "acoountStatusReportPageContent",
          message: "No payment records found!",
          colspan: 20,
          paginationContainer: "acoountStatusReportContentPaginationControls",
        });
      }
    })
    .catch((error) => {
      _staffValidationCheck(error.response);
      console.error("Error:", error);
      if (error.status==0) {
        _alertClose();
        _showEmptyState({
          container: "acoountStatusReportPageContent",
          message: "Check your internet connection and try again",
          colspan: 20,
          paginationContainer: "acoountStatusReportContentPaginationControls",
        });
      }
    });
  } catch (error) {
    _alertClose();
    console.error("Error:", error);
    _callCatchError(() => _loadPaymentsByStatus(newpayDate, statusId));
  }
}

/// Render Status Report Table Data ///
function _renderStatusReportTableData(data, start) {
  return data.map((item, i) => {
    $('#revenueAlert').removeClass('alert-success alert-failed');
      if (item?.statusData?.statusName === 'SUCCESSFUL') {
        $('#revenueAlert').addClass('alert-success');
      } else {
        $('#revenueAlert').addClass('alert-failed');
    }

    if (item?.statusData?.statusId === 3) {
      $('#actionHeader').show();
    } else {
      $('#actionHeader').hide();
    }
    
    let buttonHtml = '';
    let imageHtml = '';

    if (item?.statusData?.statusId === 5) {
      imageHtml = `
        <div class="image-div general-passport">
          <img src="${passportPath}/${item?.studentData?.passport}" alt="${item?.studentData.firstName || ""} ${item?.studentData.lastName || ""}" />
        </div>
      `;
    }

    if (item?.statusData?.statusId === 3) {
      buttonHtml = `
        <td>
          <div class="btn-div">
            <button class="btn confirm-btn"
              id="refreshBtn_${item?.paymentId}"
              title="Click to confirm payment"
              onclick="_proceedVerifyPaystackTransaction('${item?.paymentId}');">
              <i class="bi-check-circle"></i>
              REFRESH
            </button>
          </div>
        </td>
      `;
    }
    
    return `
      <tr class="tb-row">
        <td>${start + i + 1}</td>
        <td class="clickable-td"
            title="Click to view payment breakdown"
              onclick="_fetchRevenueById('${item?.paymentId}');">
          <div class="text-back-div">
            <div class="text-div">
              <div class="first-class">${item?.paymentId}</div>
              <div class="second-class">${item?.payDate}</div>
            </div>
          </div>
        </td>

        <td>
          <div class="text-back-div">
            ${imageHtml}

            <div class="text-div">
              <div class="first-class">${item?.studentData.firstName || ""} ${item?.studentData.lastName || ""}</div>
              <div class="second-class">${item?.studentData?.studentId}</div>
            </div>
          </div>
        </td>

        <td>
          <div class="text-div">
            <div>${item?.studentData.phoneNumber}</div>
            <div>${item?.studentData.emailAddress || ""}</div>
          </div>
        </td>
        <td><s>N</s>${thousandSeperator(item?.amount)}</td>
        <td><s>N</s>${thousandSeperator(item?.paystackRemittance)}</td>
        <td><s>N</s>${thousandSeperator(item?.paystackCharges)}</td>
        <td>${item?.paymentPurposeData?.paymentPurposeName}</td>
        <td>${item?.paymentMethodData?.paymentMethodName}</td>
        <td>
          <div class="status-div ${item?.statusData?.statusName}">
            ${item?.statusData?.statusName}
          </div>
        </td>
        <td>
          <div class="btn-div">
            <button class="btn view-btn"
              title="Click to view payment breakdown"
              onclick="_fetchRevenueById('${item?.paymentId}');">
              VIEW DETAILS
            </button>
          </div>
        </td>
        ${buttonHtml}
      </tr>
    `;
  }).join("");
}

/// Initialize Fetch Status Report Table Data ///
function _initFetchStatusReportTableData(response) {
  const paginator = new Paginator(
    response.data || [],
    _renderStatusReportTableData,
    "acoountStatusReportContentPaginationControls",
    "acoountStatusReportPageContent",
    10
  );

  __paginatorHandlers["acoountStatusReportContentPaginationControls"] = paginator;
  paginator.renderPage();
}

//// Fetch payment revenue by ID ////
function _fetchRevenueById(paymentId) {
    $("#get-more-div-secondary").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/account-reports/fetch-revenue-by-id?paymentId=${paymentId}`,
			accessKey: true,
		})
		.then((response) => {
			sessionStorage.setItem("getPaymentDetailsSession", JSON.stringify(response?.data));
			_getForm({page: 'paymentBreakDownForm', layer:2, url: trainingAdminPortalMiddlewareUrl});
		 })
		.catch((error) => {
			_staffValidationCheck(error.response);
			_alertClose(2);
			console.error("Error:", error);
			_callAjaxError(() => _fetchRevenueById(paymentId), error.message); // retry if needed
		});
	} catch (error) {
		_alertClose(2);
		console.error("Error:", error);
		_callCatchError(() => _fetchRevenueById(paymentId));
  	}
}

//// Print payment breakdown receipt ////
function _printPaymentBreakDownReciept() {
  let getPaymentDetailsSession = JSON.parse(sessionStorage.getItem("getPaymentDetailsSession"));

  if (getPaymentDetailsSession) {
		sessionStorage.setItem("printGeneralPaymentRecieptBreakdownSession", JSON.stringify(getPaymentDetailsSession));
		window.open(`${websiteUrl}/training/print-payment-receipt`, '_blank');
  }
}

///// Export ///
function exportAccountTableToExcel(tableID, filename) {
  var dataType = 'application/vnd.ms-excel';
    var $table = $('#' + tableID);
    var removedImages = [];

    // Temporarily remove all images from the table
    $table.find('img').each(function () {
        var $img = $(this);
        removedImages.push({
            parent: $img.parent(),
            nextSibling: $img.next(),
            element: $img
        });
        $img.remove();
    });

    // Convert table to HTML
    var tableHTML = $table.prop('outerHTML').replace(/ /g, '%20').replace(/#/g, '%23');

    // Specify file name
    filename = filename ? filename + '.xls' : 'excel_data.xls';

    // Create download link
    var $downloadLink = $('<a></a>');
    $('body').append($downloadLink);

    if (window.navigator.msSaveOrOpenBlob) {
        var blob = new Blob(['\ufeff', tableHTML], { type: dataType });
        window.navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        $downloadLink.attr('href', 'data:' + dataType + ', ' + tableHTML);
        $downloadLink.attr('download', filename);
        $downloadLink[0].click();
    }

    // Restore the removed images
    $.each(removedImages, function (i, item) {
        if (item.nextSibling.length) {
            item.element.insertBefore(item.nextSibling);
        } else {
            item.parent.append(item.element);
        }
    });

    // Clean up
    $downloadLink.remove();
}

/// Proceed Verify Paystack Transaction ///
function _proceedVerifyPaystackTransaction(paymentId) {
  try {
    ///// get btn text/////
	  const btnText = $(`#refreshBtn_${paymentId}`).html();
    _btnDisable(`refreshBtn_${paymentId}`, btnText, true);

		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/account-reports/verify-paystack-transaction?paymentId=${paymentId}`,
			accessKey: true,
		})
		.then((response) => {
      const paymentId = response?.paymentId; 
      const secretKey = response?.secretKey;
    
      _verifyPaystackTransaction(paymentId, secretKey, btnText);
		})
		.catch((error) => {
			_staffValidationCheck(error.response);
			console.error("Error:", error);
      _callAjaxError(() => _proceedVerifyPaystackTransaction(paymentId), error.message); // retry if needed
      _btnDisable(`refreshBtn_${paymentId}`, btnText, false);
		});
	} catch (error) {
		_alertClose();
		console.error("Error:", error);
    _callCatchError(() => _proceedVerifyPaystackTransaction(paymentId));
    _btnDisable(`refreshBtn_${paymentId}`, btnText, false);
  }
}

function _verifyPaystackTransaction(paymentId, secretKey, btnText) {
  let sessionPayDate = sessionStorage.getItem("sessionPayDate");
  $.ajax({
    url: `https://api.paystack.co/transaction/verify/${paymentId}`,
    type: "GET",
    headers: {
      "Authorization": "Bearer " + secretKey,
      "Content-Type": "application/json"
    },
    success: function (data) {
      if (data.status === true && data.data.status === "success") {
        const paystackId = $.trim(data?.data?.id);
        const paystackCharges = $.trim(data?.data?.fees);
        _callVerifyPaymentSuccess(paymentId, paystackId, paystackCharges, btnText);
      } else {
        _callVerifyPaymentCancelled(paymentId);
        _showCustomConfirm({
          title: "Transaction Not Successful!",
          message: "This transaction was not successful and has been automatically cancelled by the system.",
          alertType: "error",
          falseActionBtn: true,
          trueActionBtnText: "View Cancelled Payments",
          falseActionBtnText: "Stay Here",
          closeOnOverlayClick: false,
          trueActionCallback: () => {
            _getPaymentStatusNav({
              divid: 'cancelledPage',
              page: 'cancelledPage',
              id: sessionPayDate,
              url: trainingAdminPortalMiddlewareUrl
            });
          },
          falseActionCallback: () => {
            _getPaymentStatusNav({
              divid: 'pendingPage',
              page: 'pendingPage',
              id: sessionPayDate,
              url: trainingAdminPortalMiddlewareUrl
            });
          },
        });
        $(`#refreshBtn_${paymentId}`).html(btnText).prop("disabled", false);
      }
    },
    error: function (xhr, status, error) {
      console.error("Error:", error);
        _callVerifyPaymentCancelled(paymentId);
        _showCustomConfirm({
            title: "Transaction Not Successful!",
            message: "This transaction was not successful and has been automatically cancelled by the system.",
            alertType: "error",
            falseActionBtn: true,
            trueActionBtnText: "View Cancelled Payments",
            falseActionBtnText: "Stay Here",
            closeOnOverlayClick: false,
            trueActionCallback: () => {
              _getPaymentStatusNav({
                divid: 'cancelledPage',
                page: 'cancelledPage',
                id: sessionPayDate,
                url: trainingAdminPortalMiddlewareUrl
              });
            },
            falseActionCallback: () => {
              _getPaymentStatusNav({
                divid: 'pendingPage',
                page: 'pendingPage',
                id: sessionPayDate,
                url: trainingAdminPortalMiddlewareUrl
              });
            },
        });
      $(`#refreshBtn_${paymentId}`).html(btnText).prop("disabled", false);
    }
  });
}

function _callVerifyPaymentSuccess(paymentId, paystackId, paystackCharges, btnText) {
 let sessionPayDate = sessionStorage.getItem("sessionPayDate");
  try {
    const formData = {
      paymentId: paymentId,
      paystackId: paystackId,
      paystackCharges: paystackCharges,
    };
    
    $.ajax({
      type: "POST",
      url: `${endPoint}/parent/payment/payment-success`,
      data: JSON.stringify(formData),
      dataType: "json",
      cache: false,
      headers: getAuthHeaders(),
      processData: false,
      success: function (data) {
        if (data.success) {
          _showCustomConfirm({
            title: "Transaction Successful!",
            message: data.message,
            alertType: "success",
            falseActionBtn: true,
            trueActionBtnText: "View Successful Payments",
            falseActionBtnText: "Stay Here",
            closeOnOverlayClick: false,
            trueActionCallback: () => {
              _getPaymentStatusNav({
                divid: 'successfulPage',
                page: 'successfulPage',
                id: sessionPayDate,
                url: trainingAdminPortalMiddlewareUrl
              });
            },
            falseActionCallback: () => {
              _getPaymentStatusNav({
                divid: 'pendingPage',
                page: 'pendingPage',
                id: sessionPayDate,
                url: trainingAdminPortalMiddlewareUrl
              });
            },
        });
        } else {
          _actionAlert(data.message, false);
          $(`#refreshBtn_${paymentId}`).html(btnText).prop("disabled", false);
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  } catch (error) {
    console.log(error);
  }
}

function _callVerifyPaymentCancelled(paymentId) {
  try {
    const formData = {
      paymentId: paymentId,
    };

    $.ajax({
      type: "POST",
      url: `${endPoint}/parent/payment/payment-cancelled`,
      data: JSON.stringify(formData),
      dataType: "json",
      cache: false,
      headers: getAuthHeaders(),
      processData: false,
      success: function () {},
      error: function (error) {
        console.log(error);
      },
    });
  } catch (error) {
    console.log(error);
  }
}