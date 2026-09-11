/// Fetch Pricing Programs Data ///
function _fetchPricingProgramsData() {
	try {
		_callFetchEndPoints({
			url: `preset-data/fetch-programs`,
		})
		.then((response) => {
			_initFetchPricingProgramsData(response?.data);
		})
		.catch((error) => {
			_staffValidationCheck(error.response);
			console.error("Error:", error);

			if (error.status == 0) {
				_showEmptyState({
					container: "coursePageContent",
					message: "Check your internet connection and try again",
				});

				_callAjaxError(
					() => _fetchPricingProgramsData(),
					error.message
				);
			} else {
				_showEmptyState({
					container: "coursePageContent",
					message: error.message,
				});
			}
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchPricingProgramsData());
	}
}

/// Render Pricing Programs Data ///
function _initFetchPricingProgramsData(data) {
	const content = data.map((item, start) => {
			
		return `
			<div class="program-item" title="${item?.programName}">
				<div class="title-content program-title-content">
					<div class="number">${start + 1}</div>

					<div class="content-div"
						onclick="_fetchEachPricingProgram('${item?.programId}');">

						<div class="left-content">
							<div class="icon-div">
								<i class="bi bi-mortarboard-fill"></i>
							</div>

							<div class="text-div">
								<h2>
									${item?.programName}
								</h2>

								<p>
									${item?.programDescription}
								</p>
							</div>
						</div>

						<div class="nav-cont">
							<i class="bi bi-arrow-right-circle-fill"></i>
						</div>
					</div>
				</div>
			</div>`
		})
    	.join("");
	$("#pricingProgramsContent").html(content);
}

//// Fetch Each Program Details ////
function _fetchEachPricingProgram(programId) {
    $("#get-form-more-div")
        .css({
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center'
        })
        .fadeIn(500);

    try {
		///// fetch program details //////
        _callFetchEndPoints({
            url: `preset-data/fetch-programs?programId=${programId}`,
        })
        .then((response) => {
            sessionStorage.setItem(
				"getEachProgramDetailsSession",
				JSON.stringify(response?.data?.[0] || {})
			);

			_getForm({
				page: 'coursesBreakdown',
				url: trainingAdminPortalMiddlewareUrl
			});
        })
        .catch((error) => {
            _staffValidationCheck(error.response);
            _alertClose();
            console.error("Error:", error);
            _callAjaxError(
                () => _fetchEachPricingProgram(programId),
                error.message
            );
        });
    } catch (error) {
        _alertClose();
        console.error("Error:", error);
        _callCatchError(
            () => _fetchEachPricingProgram(programId)
        );
    }
}

//// Fetch all Pricing Course Data ////
function _fetchAllPricingCourseData() {
	getEachProgramDetailsSession = JSON.parse(sessionStorage.getItem("getEachProgramDetailsSession") || "{}");
	try {
		_callFetchEndPoints({
			url: `admin/pricing/fetch-all-pricing?programId=${getEachProgramDetailsSession?.programId}`,
			accessKey: true,
		})
		.then((response) => {
			_initFetchAllPricingCourseData(response?.data);
			sessionStorage.setItem("useAlPricingSessionData", JSON.stringify(response));
		})
		.catch((error) => {
			_staffValidationCheck(error.response);
			console.error("Error:", error);

			if (error.status == 0) {
				_showEmptyState({
					container: "pricingCourseContent",
					message: "Check your internet connection and try again",
				});

				_callAjaxError(
					() => _fetchAllPricingCourseData(),
					error.message
				);
			} else {
				_showEmptyState({
					container: "pricingCourseContent",
					message: error.message,
				});
			}
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchAllPricingCourseData());
	}
}

/// Render All Pricing Course Data ///
function _initFetchAllPricingCourseData(data) {
	const content = data.map((item, start) => {
		const viewId = `view${item?.courseId}`;
		const tableId = `pricingTableContent${start + 1}`;
		const pricingRows = item?.durationsData?.length > 0 ? item?.durationsData?.map((pricing, index) => {

			return `
				<tr class="tb-row">
					<td>${index + 1}</td>
					<td class="clickable-td" title="Click to view pricing profile" onclick="event.stopPropagation(); _fetchEachPricingCourse('${pricing?.durationId}');">
						<div class="text-back-div">
							<div class="text-div">
								<div class="first-class">${pricing?.durationId}</div>
							</div>
						</div>
					</td>
					<td>
						<div class="text-back-div">
							<div class="text-div">
								<div class="first-class">
									${pricing?.durationName}
								</div>
							</div>
						</div>
					</td>
					<td>
						<strong>
							<s>N</s>${thousandSeperator(pricing?.formFee)}
						</strong>
					</td>
					<td>
						<strong>
							<s>N</s>${thousandSeperator(pricing?.tuitionFee)}
						</strong>
					</td>
					<td>
						<div class="text-back-div">
							<div class="text-div">
								<div class="first-class">
									<i class="bi bi-calendar2-check"></i>
									${_formatShortDate(pricing?.updatedTime || "00-00-00 00:00:00")}
								</div>

								<div class="second-class date-item">
									<i class="bi bi-clock"></i>
									${_formatTime(pricing?.updatedTime || "00:00:00")}
								</div>
							</div>
						</div>
					</td>
					<td>
						<div class="text-back-div">
							<div class="text-div">
								<div class="first-class">
									${pricing?.createdByData?.fullname || "-----"}
								</div>

								<div class="second-class">
									${pricing?.createdByData?.emailAddress || "-----"}
								</div>
							</div>
						</div>
					</td>
					<td>
						<div class="text-back-div">
							<div class="text-div">
								<div class="first-class">
									${pricing?.updatedByData?.fullname || "-----"}
								</div>

								<div class="second-class">
									${pricing?.updatedByData?.emailAddress || "-----"}
								</div>
							</div>
						</div>
					</td>
					<td><div class="status-div ${pricing?.statusData?.statusName}">${pricing?.statusData?.statusName}</div></td>
					<td>
						<button
							class="btn view-btn"
							title="Click to edit pricing"
							onclick="event.stopPropagation(); _fetchEachPricingCourse('${pricing?.durationId}');">
							<i class="bi bi-pencil"></i> EDIT
						</button>
					</td>
				</tr>
			`;
			}).join('')
			: `
				<tr>
					<td colspan="10">
						<div class="empty-state-div">
							<div class="icon">
								<img src="${websiteUrl}/all-images/images/no-record.png" alt="Warning" />
							</div>
							<p>No pricing found for this course.</p>
							<div>
								<button
									class="btn"
									title="Add New Pricing"
									onclick="event.stopPropagation(); sessionStorage.removeItem('useEachPricingCourseSession'); _getFetchEachCourseWithId('${item?.courseId}')">

									<i class="bi bi-tags-fill"></i>
									ADD PRICING
								</button>
							</div>
						</div>
					</td>
				</tr>
			`;

			return `
			<div
				class="program-item"
				onclick="_chevronCollapse('${viewId}')"
				title="${item?.courseName}">
				<div class="title-content">
					<div class="number">
						${start + 1}
					</div>

					<div class="content-div">
						<div class="left-content">
							<div class="text-div">
								<h2>
									${item?.courseName}
								</h2>
							</div>
						</div>

						<div class="nav-wrapper">
							<button
								class="btn"
								title="Add New Pricing"
								onclick="event.stopPropagation(); sessionStorage.removeItem('useEachPricingCourseSession'); 
								_getFetchEachCourseWithId('${item?.courseId}');">

								<i class="bi bi-tags-fill"></i>
								ADD PRICING
							</button>

							<div
								class="nav-cont toggle-nav"
								id="${viewId}num">

								<i class="bi bi-chevron-down"></i>
							</div>
						</div>
					</div>
				</div>

				<div
					class="open-toggle"
					id="${viewId}answer"
					style="display: none;">
					<div class="table-div animated fadeIn">
						<table
							class="table"
							cellspacing="0"
							style="width:100%">
							<thead>
								<tr class="tb-col">
									<th>sn</th>
									<th>ID</th>
									<th>Duration</th>
									<th>Form Fee (<s>N</s>)</th>
									<th>Tuition Fee (<s>N</s>)</th>
									<th>Last Updated</th>
									<th>Created By</th>
									<th>Updated By</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="${tableId}">
								${pricingRows}
							</tbody>
						</table>
					</div>
				</div>
			</div>
		`;
	}).join("");
	$("#pricingCourseContent").html(content);
	// AUTO-OPEN AFTER RELOAD
	const openId = sessionStorage.getItem("openPricingCourseId");
	if (openId) {
		const viewId = `view${openId}`;

		// open toggle
		_chevronCollapse(viewId);

		// clear after use
		sessionStorage.removeItem("openPricingCourseId");
	}
}

function _getFetchEachCourseWithId(courseId) {
	let storedData = JSON.parse(
		sessionStorage.getItem("useAlPricingSessionData")
	);

	//// Get courses data
	let courses = storedData?.data || [];

	// Get program data
	let programData = storedData?.programData || {};

	// Find selected course
	let course = courses.find((c) => c.courseId === courseId);

	// Build selected course data
	let selectedCourse = {
		courseId: course?.courseId,
		courseName: course?.courseName,

		programId: programData?.programId,
		programName: programData?.programName,
	};

	// Save to session
	sessionStorage.setItem(
		"selectedCourseSession",
		JSON.stringify(selectedCourse)
	);

	_getForm({
		page: 'addPricingForm',
		layer: 2,
		url: trainingAdminPortalMiddlewareUrl
	});
}

///// Fetch each pricing course //// 
function _fetchEachPricingCourse(durationId) {
    $("#get-more-div-secondary").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/pricing/fetch-single-pricing?durationId=${durationId}`,
			accessKey: true,
		})
		.then((response) => {
			const data = response?.data;
			sessionStorage.setItem("useEachPricingCourseSession", JSON.stringify(data));
			_getForm({ page: 'addPricingForm', layer: 2, url: trainingAdminPortalMiddlewareUrl });
			
			//// Build and save selected course data
			let selectedCourse = {
				courseId: data.courseData.courseId,
				courseName: data.courseData.courseName,

				programId: data.programData.programId,
				programName: data.programData.programName,
			};

			sessionStorage.setItem(
				"selectedCourseSession",
				JSON.stringify(selectedCourse)
			);
		})
		.catch((error) => {
			_staffValidationCheck(error.response);
			_alertClose(2);
			console.error("Error:", error);
			_callAjaxError(() => _fetchEachPricingCourse(durationId), error.message); // retry if needed
		});
	} catch (error) {
		_alertClose(2);
		console.error("Error:", error);
		_callCatchError(() => _fetchEachPricingCourse(durationId));
  	}
}

///// Create or Update Pricing Course /////
function _createAndPricingCourse(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const numOfMonths = $('#numOfMonths').val();
		const formFee = $('#formFee').val();
		const tuitionFee = $('#tuitionFee').val();
		const statusId = $('#statusId').val();

		///// empty field validation//////////
		issueCount += _validateEmptyValue("numOfMonths", "NUM OF MONTHS");
		issueCount += _validateEmptyValue("formFee", "FORM FEE");
		issueCount += _validateEmptyValue("tuitionFee", "TUITION FEE");
		issueCount += _validateEmptyValue("statusId", "STATUS");

		///// zero and negative number validation //////////
		if (numOfMonths !== '' && Number(numOfMonths) < 1) {
			issueCount++;
			$('#numOfMonths').addClass('issue');
			$('#issue_numOfMonths').html('Number of months cannot be zero or negative');
		}

		if (formFee !== '' && Number(formFee) < 1) {
			issueCount++;
			$('#formFee').addClass('issue');
			$('#issue_formFee').html('Form fee cannot be zero or negative');
		}

		if (tuitionFee !== '' && Number(tuitionFee) < 1) {
			issueCount++;
			$('#tuitionFee').addClass('issue');
			$('#issue_tuitionFee').html('Tuition fee cannot be zero or negative');
		}

		if (issueCount > 0) return;
		
		// Gather form data //
		const formData = {
			numOfMonths,
			formFee,
			tuitionFee,
			statusId,
		};

		////// confirm action////
		_showCustomConfirm({
			callback: () => {
				_createAndPricingCourseCallback(formData);
			},
			title: "Are you sure?",
			message: 'Are you sure you want to submit? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
			closeOnOverlayClick: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _createAndPricingCourse());
	}
}

///// Save Create or Update Pricing Course Callback /////
function _createAndPricingCourseCallback(formData) {
	selectedCourseSession = JSON.parse(sessionStorage.getItem("selectedCourseSession") || "{}");
	useEachPricingCourseSession = JSON.parse(sessionStorage.getItem("useEachPricingCourseSession") || "{}");

	///// get btn text/////
	const btnText = $("#submitBtn").html();
	_btnDisable("submitBtn", btnText, true);
	
	/// check if update or create ///
	let url = useEachPricingCourseSession?.durationId ? `admin/pricing/update-pricing?programId=${selectedCourseSession?.programId}&courseId=${selectedCourseSession?.courseId}&durationId=${useEachPricingCourseSession?.durationId}` : `admin/pricing/create-pricing?programId=${selectedCourseSession?.programId}&courseId=${selectedCourseSession?.courseId}`;

	//// call endpoint //////
	_callRawEndPoints({
		url,
		formData,
		accessKey: true,
	})
	.then((response) => {
		// SAVE SESSION TO REOPEN ///
    	sessionStorage.setItem("openPricingCourseId", selectedCourseSession?.courseId);
		_showCustomConfirm({
			callback: () => {
				_alertClose(2);
				_fetchAllPricingCourseData();
			},
			title: 'Success!',
			message: response?.message,
			alertType: 'success',
			trueActionBtnText: 'OK, Thanks.',
			closeOnOverlayClick: false,
		});
		_btnDisable("submitBtn", btnText, false);
    })
    .catch((error) => {
		_staffValidationCheck(error.response);
		console.error("Error:", error);
		if (error.status==0) {
			_callAjaxError(() => _createAndPricingCourse(formData), error.message); // retry if needed
			_btnDisable("submitBtn", btnText, false);
		} else {
			_showCustomConfirm({
				title: useEachPricingCourseSession?.durationId ? "Unable to Update Pricing Course" : "Unable to Create Pricing Course",
				message: error.message,
				alertType: "error",
				trueActionBtnText: "OK",
				closeOnOverlayClick: true,
			});
			_btnDisable("submitBtn", btnText, false);
		}
    });
}