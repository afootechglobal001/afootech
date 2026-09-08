function _getActiveStudentPage(props) {
  const { page = "", divid = "", pageContainer = "getStudentDetails" } = props;
  _getStudentPagesActiveLink(divid);
  if (page) {
    _getPage({
      page: page,
      pageContainer: pageContainer,
      url: trainingAdminPortalMiddlewareUrl,
    });
  }
}
function _getStudentPagesActiveLink(divid) {
  $("#studentPrograms, #studentProfileDetails, #studentPaymentHistory").removeClass("active");
  $("#" + divid).addClass("active");
}

//// Filter Students ////
function _filterStudents(value) {
  $("#studentPageContent .tb-row").each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(value.toLowerCase()) > -1
    ? $(this).show()
    : $(this).hide();
  });
}

/// Fetch Student Data ///
function _fetchStudentData() {
	try {
		_callFetchEndPoints({
			url: `admin/students/fetch-students`,
			accessKey: true,
		})
		.then((response) => {
			_initFetchStudentData(response?.data);
		})
		.catch((error) => {
			_staffValidationCheck(error.response);
			console.error("Error:", error);
			if (error.status == 0) {
				_showEmptyState({
					container: "studentPageContent",
					message: "Check your internet connection and try again",
					colspan: 20,
					paginationContainer: "studentPaginationControls",
				});
				_callAjaxError(
					() => _fetchStudentData(),
					error.message
				);
			} else {
				_showEmptyState({
					container: "studentPageContent",
					message: error.message,
					colspan: 20,
					paginationContainer: "studentPaginationControls",
				});
			}
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchStudentData());
	}
}

/// Render Student Data ///
function _renderStudentData(data, start) {
	return data
		.map(
			(item, i) => `
			<tr class="tb-row">
				<td>
					${start + i + 1}
				</td>

				<td class="clickable-td"
					title="Click to view student profile"
					onclick="_fetchEachStudent('${item.studentId}');">

					<div class="text-back-div">
						<div class="name-div">
							${getFirstLettersOfEachWord(item.firstName + ' ' + item.lastName)}
						</div>

						<div class="text-div">
							<div class="first-class">
								${item.firstName} ${item.lastName}
							</div>

							<div class="second-class">
								${item.studentId}
							</div>
						</div>
					</div>
				</td>

				<td>
					<div class="text-div">
						<div>
							${item.phoneNumber}
						</div>
						<div>
							${item.emailAddress}
						</div>
					</div>
				</td>

				<td>
				<div class="text-back-div">
					<div class="text-div">
						<div class="first-class date-item">
							<i class="bi bi-calendar2-check"></i> ${item?.createdTime ? _formatShortDate(item?.createdTime) : "00-00-00"}
						</div>

						<div class="second-class date-item">
							<i class="bi bi-clock"></i> ${item?.createdTime ? _formatTime(item?.createdTime) : "00:00:00"}
						</div>
					</div>
				</div>
				</td>

				<td>
					<div class="text-back-div">
						<div class="text-div">
							<div class="first-class date-item">
								<i class="bi bi-calendar2-check"></i> ${item?.lastLoginTime ? _formatShortDate(item?.lastLoginTime) : "00-00-00"}
							</div>

							<div class="second-class date-item">
								<i class="bi bi-clock"></i> ${item?.lastLoginTime ? _formatTime(item?.lastLoginTime) : "00:00:00"}
							</div>
						</div>
					</div>
				</td>

				<td>
					<div class="status-div ${item.statusData?.statusName}">
						${item.statusData?.statusName}
					</div>
				</td>
				<td>
					<button
						class="btn view-btn"
						title="Click to view student profile"
						onclick="_fetchEachStudent('${item.studentId}');">
						VIEW
					</button>
				</td>
			</tr>
			`
		)
.join("");
}

/// Initialize Fetch Student Data ///
function _initFetchStudentData(data) {
	const paginator = new Paginator(
		data,
		_renderStudentData,
		"studentPaginationControls",
		"studentPageContent",
		10
	);
	__paginatorHandlers["studentPaginationControls"] = paginator;
	paginator.renderPage();
}

//// Fetch Each Student ////
function _fetchEachStudent(studentId) {
    $("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/students/fetch-students?studentId=${studentId}`,
			accessKey: true,
		})
		.then((response) => {
			sessionStorage.setItem("getEachStudentDetailsSession", JSON.stringify(response?.data?.[0]));
			_getForm({page: 'studentProfile', url: trainingAdminPortalMiddlewareUrl});
		 })
		.catch((error) => {
			_staffValidationCheck(error.response);
			_alertClose();
			console.error("Error:", error);
			_callAjaxError(() => _fetchEachStudent(studentId), error.message); // retry if needed
		});
	} catch (error) {
		_alertClose();
		console.error("Error:", error);
		_callCatchError(() => _fetchEachStudent(studentId));
  	}
}

//// Update Student ////
function _updateStudent(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const firstName = $('#updateFirstName').val()?.trim();
		const lastName = $('#updateLastName').val()?.trim();
		const emailAddress = $('#updateEmailAddress').val()?.trim();
		const phoneNumber = $('#updatePhoneNumber').val()?.trim();
		const statusId = $('#updateStatusId').val()?.trim();

		///// empty field validation//////////
		issueCount += _validateEmptyValue("updateFirstName", "FIRST NAME");
		issueCount += _validateEmptyValue("updateLastName", "LAST NAME");
		issueCount += _validateEmail("updateEmailAddress", "EMAIL");
		issueCount += _validateEmptyValue("updatePhoneNumber", "PHONE NUMBER");
		issueCount += _validateEmptyValue("updateStatusId", "STATUS");

		if (issueCount > 0) return;

		// Gather form data
		const formData = {
			firstName,
			lastName,
			emailAddress,
			phoneNumber,
			statusId,
		};

		////// confirm action////
		_showCustomConfirm({
		callback: () => {
			_saveUpdateStudentCallback(formData);
		},
			title: "Are you sure?",
			message: 'Are you sure you want submit? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
			closeOnOverlayClick: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _updateStudent());
	}
}

//// /// Save Update Student Callback /////
function _saveUpdateStudentCallback(formData) {
	let getEachStudentDetailsSession = JSON.parse(sessionStorage.getItem("getEachStudentDetailsSession"));

	///// get btn text/////
	const btnText = $("#updateBtn").html();
	_btnDisable("updateBtn", btnText, true);
	
	//// call endpoint //////
	_callRawEndPoints({
		url: `admin/students/update-student?studentId=${getEachStudentDetailsSession?.studentId}`,
		formData,
		accessKey: true,
	})
    .then((response) => {
		_showCustomConfirm({
			callback: () => {
        		_showLoader("Please wait while we load the student profile...");
				_fetchEachStudent(getEachStudentDetailsSession?.studentId);
				_getActivePage({page:'studentPage', divid:'studentPage'});

				setTimeout(() => {
					_hideLoader();
				}, 2000); // adjust if needed
			},
			title: 'Success!',
			message: response.message,
			alertType: 'success',
			trueActionBtnText: 'OK, Thanks.',
			closeOnOverlayClick: false,
		});
		_btnDisable("updateBtn", btnText, false);
    })
    .catch((error) => {
		_staffValidationCheck(error.response);
		console.error("Error:", error);
		if (error.status==0) {
			_callAjaxError(() => _saveUpdateStudentCallback(formData), error.message); // retry if needed
			_btnDisable("updateBtn", btnText, false);
		} else {
			_showCustomConfirm({
				title: "Unable to update student",
				message: error.message,
				alertType: "error",
				trueActionBtnText: "OK",
				closeOnOverlayClick: true,
			});
			_btnDisable("updateBtn", btnText, false);
		}
    });
}

/// Fetch Student Programs Data ///
function _fetchStudentProgramsData() {
	getEachStudentDetailsSession = JSON.parse(sessionStorage.getItem("getEachStudentDetailsSession"));
	try {
		_callFetchEndPoints({
			url: `admin/students/fetch-student-programs?studentId=${getEachStudentDetailsSession?.studentId}`,
			accessKey: true,
		})
		.then((response) => {
			_renderStudentProgramsData(response?.data);
		})
		.catch((error) => {
			_staffValidationCheck(error.response);
			console.error("Error:", error);
			if (error.status == 0) {
				_showEmptyState({
					container: "studentProgramsPageContent",
					message: "Check your internet connection and try again",
				});
				_callAjaxError(() => _fetchStudentProgramsData(), error.message);
			} else {
				_showEmptyState({
					container: "studentProgramsPageContent",
					message: error.message,
				});
			}
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchStudentProgramsData());
	}
}

/// Render Student Programs Data ///
function _renderStudentProgramsData(data) {
	const content = data
		.map((item) => {
			let buttonHtml = "";

			if (item?.trainingStatusData?.statusId === 3) {
				buttonHtml = `
					<button title="Activate Student" class="btn commence-btn" onclick="_fetchEachStudentProgramDetails('${item?.studentId}', '${item?.studentProgramId}');">
						<i class="bi bi-check2-circle"></i> ACTIVATE
					</button>
				`;
			} else {
				buttonHtml = `
					<button title="View Program Details" class="btn done-btn" onclick="_fetchEachStudentProgramDetails('${item?.studentId}', '${item?.studentProgramId}');">
						<i class="bi bi-eye-fill"></i> VIEW DETAILS
					</button>
				`;
			}

			return `
				<div class="program-card">
					<div class="program-card-top">
						<div class="program-details">
							<div class="icon-div ${item?.trainingStatusData?.statusName ?? ""}">
								<i class="bi bi-mortarboard"></i>
							</div>

							<div class="content">
								<h3>${item?.programData?.programName ?? ""}</h3>

								<p class="task-id">
									Duration:
									<span>${item?.durationData?.durationName ?? ""}</span>
								</p>
							</div>
						</div>

						<div class="program-status ${item?.trainingStatusData?.statusName ?? ""}">
							${item?.trainingStatusData?.statusName ?? ""}
						</div>
					</div>

					<div class="program-content">
						<div class="program-title-wrapper">
							<div class="program-title">
								${item?.courseData?.courseName ?? ""}
							</div>

							<div class="program-date-wrapper">
								<div class="program-date">
									<div class="icon-div ${item?.trainingStatusData?.statusName ?? ""}">
										<i class="bi bi-calendar2-check-fill"></i>
									</div>

									<div class="date-content">
										<div>Start Date:</div>
										<span>
											${_formatShortDate(item?.startDate)}
										</span>
									</div>
								</div>

								<div class="program-date no-border">
									<div class="icon-div ${item?.trainingStatusData?.statusName ?? ""}">
										<i class="bi bi-calendar2-check-fill"></i>
									</div>

									<div class="date-content">
										<div>End Date:</div>
										<span>
											${_formatShortDate(item?.endDate)}
										</span>
									</div>
								</div>
							</div>
						</div>

						<div class="program-actions">
							${buttonHtml}
						</div>
					</div>
				</div>
			`;
		})
		.join("");
	$("#studentProgramsPageContent").html(content);
}

//// Fetch Each Student Program Details ////
function _fetchEachStudentProgramDetails(studentId, studentProgramId) {
	$("#get-more-div-secondary").css({ 'display': 'flex', 'justify-content': 'center', 'align-items': 'center' }).fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/students/fetch-student-programs?studentId=${studentId}&studentProgramId=${studentProgramId}`,
			accessKey: true,
		})
		.then((response) => {
			sessionStorage.setItem("getEachStudentProgramDetailsSession", JSON.stringify(response?.data?.[0]));
			_getForm({page: 'studentProgramDetailsForm', layer: 2, url: trainingAdminPortalMiddlewareUrl});
		 })
		.catch((error) => {
			_staffValidationCheck(error.response);
			_alertClose();
			console.error("Error:", error);
			_callAjaxError(() => _fetchEachStudentProgramDetails(studentId, studentProgramId), error.message); // retry if needed
		});
	} catch (error) {
		_alertClose();
		console.error("Error:", error);
		_callCatchError(() => _fetchEachStudentProgramDetails(studentId, studentProgramId));
  	}
}

//// Activate Students Program////
function _activateStudentsProgram(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const startDate = $('#startDate').val().trim();
		const endDate = $('#endDate').val().trim();

		///// empty field validation//////////
		issueCount += _validateEmptyValue("startDate", "TRAINING START DATE");
		issueCount += _validateEmptyValue("endDate", "TRAINING END DATE");

		if (issueCount > 0) return;

		// Gather form data
		const formData = {
			startDate,
			endDate,
		};

		////// confirm action////
		_showCustomConfirm({
		callback: () => {
			_saveActivateStudentsProgramCallback(formData);
		},
			title: "Are you sure?",
			message: 'Are you sure you want activate the program? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
			closeOnOverlayClick: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _activateStudentsProgram());
	}
}

//// /// Save Activate Students Program Callback /////
function _saveActivateStudentsProgramCallback(formData) {
	let getEachStudentProgramDetailsSession = JSON.parse(sessionStorage.getItem("getEachStudentProgramDetailsSession"));

	///// get btn text/////
	const btnText = $("#activateBtn").html();
	_btnDisable("activateBtn", btnText, true);
	
	//// call endpoint //////
	_callRawEndPoints({
		url: `admin/students/activate-student-program?studentId=${getEachStudentProgramDetailsSession?.studentId}&studentProgramId=${getEachStudentProgramDetailsSession?.studentProgramId}`,
		formData,
		accessKey: true,
	})
	.then((response) => {
		_alertClose(2);
		_showCustomConfirm({
			callback: () => {
        		_showLoader("Please wait while we load the student profile...");
				_fetchEachStudent(getEachStudentProgramDetailsSession?.studentId);
				_getActivePage({page:'studentPage', divid:'studentPage'});

				setTimeout(() => {
					_hideLoader();
				}, 3000); // adjust if needed
			},
			title: 'Success!',
			message: response.message,
			alertType: 'success',
			trueActionBtnText: 'OK, Thanks.',
			closeOnOverlayClick: false,
		});
		_btnDisable("activateBtn", btnText, false);
    })
    .catch((error) => {
		_staffValidationCheck(error.response);
		console.error("Error:", error);
		if (error.status==0) {
			_callAjaxError(() => _saveActivateStudentsProgramCallback(formData), error.message); // retry if needed
			_btnDisable("activateBtn", btnText, false);
		} else {
			_showCustomConfirm({
				title: "Unable to activate student program",
				message: error.message,
				alertType: "error",
				trueActionBtnText: "OK",
				closeOnOverlayClick: true,
			});
			_btnDisable("activateBtn", btnText, false);
		}
    });
}

//// Print Student Profile////
function _printStudentProfile(){
	try {
		////// confirm action////
		_showCustomConfirm({
		callback: () => {
			_printStudentProfileCallback();
		},
			title: "Are you sure?",
			message: 'Are you sure you want print the student profile? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
			closeOnOverlayClick: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _printStudentProfile());
	}
}

//// /// Save Print Student Profile Callback /////
function _printStudentProfileCallback() {
	let getEachStudentProgramDetailsSession = JSON.parse(sessionStorage.getItem("getEachStudentProgramDetailsSession"));

	///// get btn text/////
	const btnText = $("#printBtn").html();
	_btnDisable("printBtn", btnText, true);
	
	//// call endpoint //////
	_callFetchEndPoints({
		url: `admin/students/print-program-student-profile?studentId=${getEachStudentProgramDetailsSession?.studentId}&studentProgramId=${getEachStudentProgramDetailsSession?.studentProgramId}`,
		accessKey: true,
	})
	.then((response) => {
		_showCustomConfirm({
			title: 'Success!',
			message: response?.message,
			alertType: 'success',
			trueActionBtnText: 'OK, Thanks.',
			closeOnOverlayClick: true,
		});
		_btnDisable("printBtn", btnText, false);
    })
    .catch((error) => {
		_staffValidationCheck(error.response);
		console.error("Error:", error);
		if (error.status==0) {
			_callAjaxError(() => _printStudentProfileCallback(), error.message); // retry if needed
			_btnDisable("printBtn", btnText, false);
		} else {
			_showCustomConfirm({
				title: "Unable to print student profile",
				message: error.message,
				alertType: "error",
				trueActionBtnText: "OK",
				closeOnOverlayClick: true,
			});
			_btnDisable("printBtn", btnText, false);
		}
    });
}

/// Fetch Student Payment History ///
function _fetchStudentPaymentHistory() {
	let getEachStudentDetailsSession = JSON.parse(sessionStorage.getItem("getEachStudentDetailsSession"));
	
	try {
		_callFetchEndPoints({
			url: `admin/account-reports/students/payment-history?studentId=${getEachStudentDetailsSession?.studentId}`,
			accessKey: true,
		})
		.then((response) => {
			_initFetchStudentPaymentHistory(response?.paymentData);
		})
		.catch((error) => {
			_staffValidationCheck(error.response);
			console.error("Error:", error);
			if (error.status == 0) {
				_showEmptyState({
					container: "studentPaymentHistoryPageContent",
					message: "Check your internet connection and try again",
					colspan: 20,
					paginationContainer: "studentPaymentHistoryPaginationControls",
				});
				_callAjaxError(
					() => _fetchStudentPaymentHistory(),
					error.message
				);
			} else {
				_showEmptyState({
					container: "studentPaymentHistoryPageContent",
					message: error.message,
					colspan: 20,
					paginationContainer: "studentPaymentHistoryPaginationControls",
				});
			}
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchStudentPaymentHistory());
	}
}

/// Render Student Payment History ///
function _renderStudentPaymentHistory(paymentData, start) {
	return paymentData
		.map((item, i) => {
			let buttonHtml = "";

			if (item?.statusData?.statusId === 5) {
				buttonHtml = `
					<td>
						<button
							class="btn view-btn"
							title="Resend Receipt"
							id="resendReciept_${item?.paymentId}"
							onclick="_rePrintReciept('${item?.studentId}', '${item?.studentProgramId}', '${item?.paymentId}')">
							RESEND RECEIPT
						</button>
					</td>
				`;
			}

			if (item?.statusData?.statusId === 5) {
				$('#actionHeader').show();
			} else {
				$('#actionHeader').hide();
			}

			return `
			<tr class="tb-row">
				<td>
					${start + i + 1}
				</td>

				<td>
					${item?.paymentId}
				</td>

				<td>
					${item?.paymentPurposeData?.paymentPurposeName}
				</td>

				<td>
					<strong><s>N</s>${thousandSeperator(item?.amount)}</strong>
				</td>

				<td>
					${item?.paymentMethodData?.paymentMethodName}
				</td>

				<td>
					<div class="status-div ${item?.statusData?.statusName}">
						${item?.statusData?.statusName}
					</div>
				</td>

				<td>
				<div class="text-back-div">
					<div class="text-div">
						<div class="first-class date-item">
							<i class="bi bi-calendar2-check"></i> ${_formatShortDate(item?.createdTime || "00-00-00 00:00:00")}
						</div>

						<div class="second-class date-item">
							<i class="bi bi-clock"></i> ${_formatTime(item?.createdTime || "00:00:00")}
						</div>
					</div>
				</div>
				</td>

				<td>
				<div class="text-back-div">
					<div class="text-div">
						<div class="first-class date-item">
							<i class="bi bi-calendar2-check"></i> ${_formatShortDate(item.payDate || "00-00-00 00:00:00")}
						</div>

						<div class="second-class date-item">
							<i class="bi bi-clock"></i> ${_formatTime(item.payDate || "00:00:00")}
						</div>
					</div>
				</div>
				</td>
				${buttonHtml}
			</tr>
			`
		})
	.join("");
}

/// Initialize Student Payment History ///
function _initFetchStudentPaymentHistory(paymentData) {
	const paginator = new Paginator(
		paymentData,
		_renderStudentPaymentHistory,
		"studentPaymentHistoryPaginationControls",
		"studentPaymentHistoryPageContent",
		10
	);

	__paginatorHandlers["studentPaymentHistoryPaginationControls"] = paginator;
	paginator.renderPage();
}

//// Print Student Payment Receipt ///
function _rePrintReciept(studentId, studentProgramId, paymentId){
		try {
		////// confirm action////
		_showCustomConfirm({
			callback: () => {
			_printStudentPaymentReceiptCallback(studentId, studentProgramId, paymentId);
		},
			title: "Are you sure?",
			message: 'Are you sure you want resend the student payment receipt? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
			closeOnOverlayClick: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _rePrintReciept(studentId, studentProgramId, paymentId));
	}
}

//// /// Save Print Student Payment Receipt Callback /////
function _printStudentPaymentReceiptCallback(studentId, studentProgramId, paymentId) {	
	///// get btn text/////
	const btnText = $(`#resendReciept_${paymentId}`).text();
	_btnDisable(`resendReciept_${paymentId}`, btnText, true);
	
	//// call endpoint //////
	_callFetchEndPoints({
		url: `admin/account-reports/students/reprint-payment-receipt?studentId=${studentId}&studentProgramId=${studentProgramId}&paymentId=${paymentId}`,
		accessKey: true,
	})
	.then((response) => {
		_showCustomConfirm({
			title: 'Success!',
			message: response?.message,
			alertType: 'success',
			trueActionBtnText: 'OK, Thanks.',
			closeOnOverlayClick: true,
		});
		_btnDisable(`resendReciept_${paymentId}`, btnText, false);
    })
    .catch((error) => {
		_staffValidationCheck(error.response);
		console.error("Error:", error);
		if (error.status==0) {
			_callAjaxError(() => _printStudentPaymentReceiptCallback(studentId, studentProgramId, paymentId), error.message); // retry if needed
			_btnDisable(`resendReciept_${paymentId}`, btnText, false);
		} else {
			_showCustomConfirm({
				title: "Unable to resend student payment receipt",
				message: error.message,
				alertType: "error",
				trueActionBtnText: "OK",
				closeOnOverlayClick: true,
			});
			_btnDisable(`resendReciept_${paymentId}`, btnText, false);
		}
    });
}