/// Filter Courses ////
function _filtersCourses(value) {
  $("#coursePageContent .tb-row").each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(value.toLowerCase()) > -1
    ? $(this).show()
    : $(this).hide();
  });
}

///// Create or Update Course /////
function _createAndUpdateCourse(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const courseName = $('#courseName').val();
		const statusId = $('#statusId').val();

		///// empty field validation//////////
		issueCount += _validateEmptyValue("courseName", "COURSE NAME");
		issueCount += _validateEmptyValue("statusId", "STATUS");

		if (issueCount > 0) return;

		// Gather form data //
		const formData = {
			courseName,
			statusId,
		};

		////// confirm action////
		_showCustomConfirm({
			callback: () => {
				_createAndUpdateCourseCallback(formData);
			},
			title: "Are you sure?",
			message: 'Are you sure you want to submit? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
			closeOnOverlayClick: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _createAndUpdateCourse());
	}
}

///// Save Create or Update Course Callback /////
function _createAndUpdateCourseCallback(formData) {
	///// get btn text/////
	const btnText = $("#submitBtn").html();
	_btnDisable("submitBtn", btnText, true);
	
	//// call endpoint //////
	_callRawEndPoints({
		url: `admin/course/create-course`,
		formData,
		accessKey: true,
	})
    .then((response) => {
		_showCustomConfirm({
			callback: () => {
				_alertClose();
				_getActivePage({page:'coursePage', divid:'coursePage'});
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
			_callAjaxError(() => _createAndUpdateCourse(formData), error.message); // retry if needed
			_btnDisable("submitBtn", btnText, false);
		} else {
		_showCustomConfirm({
			title: "Unable to Create Course",
			message: error.message,
			alertType: "error",
			trueActionBtnText: "OK",
			closeOnOverlayClick: true,
		});
		_btnDisable("submitBtn", btnText, false);
		}
    });
}

/// Fetch Course Data ///
function _fetchCourseData() {
	try {
		const dummyResponse = {
			data: [
				{
					courseId: "C001",
					courseName: "AI & AUTOMATION PROGRAMMING",
					updatedTime: "2026-09-05 10:30:00",
					updatedByData: {
						staffName: "John Doe",
						staffEmail: "john.doe@example.com"
					},
					statusData: {
						statusName: "ACTIVE"
					}
				},
				{
					courseId: "C002",
					courseName: "FRONT-END DEVELOPMENT",
					updatedTime: "2026-09-04 14:15:00",
					updatedByData: {
						staffName: "Jane Smith",
						staffEmail: "jane.smith@example.com"
					},
					statusData: {
						statusName: "ACTIVE"
					}
				},
				{
					courseId: "C003",
					courseName: "BACKEND WEB DEVELOPMENT",
					updatedTime: "2026-09-03 09:45:00",
					updatedByData: {
						staffName: "Michael Brown",
						staffEmail: "michael.brown@example.com"
					},
					statusData: {
						statusName: "ACTIVE"
					}
				},
				{
					courseId: "C004",
					courseName: "UI/UX & ADVANCED GRAPHIC DESIGNING",
					updatedTime: "2026-09-02 16:20:00",
					updatedByData: {
						staffName: "Sarah Williams",
						staffEmail: "sarah.williams@example.com"
					},
					statusData: {
						statusName: "ACTIVE"
					}
				}
			]
		};

		// Use dummy data
		_initFetchCourseData(dummyResponse.data);


		// ============================================================
		// REAL API ENDPOINT
		// Uncomment when backend endpoint is ready
		// ============================================================

		/*
		_callFetchEndPoints({
			url: `admin/course/fetch-course`,
			accessKey: true,
		})
		.then((response) => {
			_initFetchCourseData(response.data);
		})
		.catch((error) => {
			_staffValidationCheck(error.response);
			console.error("Error:", error);

			if (error.status == 0) {
				_showEmptyState({
					container: "coursePageContent",
					message: "Check your internet connection and try again",
					colspan: 20,
					paginationContainer: "courseContentPaginationControls",
				});

				_callAjaxError(
					() => _fetchCourseData(),
					error.message
				);
			} else {
				_showEmptyState({
					container: "coursePageContent",
					message: error.message,
					colspan: 20,
					button: `
						<button class="btn"
							title="ADD NEW COURSE"
							onclick="sessionStorage.removeItem('useEachCourseSession'); _getForm({page: 'courseReg', url: adminPortalMiddlewareUrl});">
							<i class="bi-plus-square"></i> ADD NEW COURSE
						</button>
					`,
					paginationContainer: "courseContentPaginationControls",
				});
			}
		});
		*/

	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchCourseData());
	}
}

/// Render Course Data ///
function _renderCourseData(data, start) {
  return data
    .map(
      (item, i) => `
	  	<tr class="tb-row">
			<td>${start + i + 1}</td>
			<td class="clickable-td" title="Click to view course profile" onclick="_fetchEachCourse('${item.courseId}');">
				<div class="text-back-div">
					<div class="text-div">
						<div class="first-class">${item.courseId}</div>
					</div>
				</div>
			</td>
			<td>
				<div class="text-back-div">
					<div class="text-div">
						<div class="first-class">${item.courseName}</div>
					</div>
				</div>
			</td>
			<td>
				<div class="text-back-div">
					<div class="text-div">
						<div class="first-class">
							<i class="bi bi-calendar2-check"></i> ${_formatShortDate(item?.updatedTime || "00-00-00 00:00:00")}
						</div>

						<div class="second-class date-item">
							<i class="bi bi-clock"></i> ${_formatTime(item?.updatedTime || "00:00:00")}
						</div>
					</div>
				</div>
			</td>
			<td>
				<div class="text-back-div">
					<div class="text-div">
						<div class="first-class">
							${item?.updatedByData?.staffName || "-----"}
						</div>

						<div class="second-class">
							${item?.updatedByData?.staffEmail || "-----"}
						</div>
					</div>
				</div>
			</td>
			<td><div class="status-div ${item.statusData?.statusName}">${item.statusData?.statusName}</div></td>
			<td><button class="btn view-btn" title="Click to view course profile" onclick="_fetchEachCourse('${item.courseId}');">VIEW</button></td>
		</tr>`
    )
    .join("");
}

/// Initialize Fetch Course Data ///
function _initFetchCourseData(data) {
  const paginator = new Paginator(
    data,
    _renderCourseData,
    "courseContentPaginationControls",
    "coursePageContent",
    10
  );
  __paginatorHandlers["courseContentPaginationControls"] = paginator;
  paginator.renderPage();
}

//// Fetch Each Course ////
function _fetchEachCourse(courseId) {
    $("#get-form-more-div")
        .css({
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center'
        })
        .fadeIn(500);

    try {

        // ============================================================
        // DUMMY COURSE DATA
        // ============================================================

		const dummyCourses = {
			data: {
				courseId: "C001",
				courseName: "AI & AUTOMATION PROGRAMMING",
				courseDescription: "A beginner-friendly introduction to web development, covering HTML, CSS, JavaScript and basic web development concepts.",
				updatedTime: "2026-09-05 10:30:00",
				updatedByData: {
					staffName: "John Doe",
					staffEmail: "john.doe@example.com"
				},
				statusData: {
					statusId: 1,
					statusName: "ACTIVE"
				}
			},
		}

        sessionStorage.setItem(
            "getEachCourseDetailsSession",
            JSON.stringify(dummyCourses?.data || {})
        );

        // ============================================================
        // OPEN COURSE FORM
        // ============================================================

        _getForm({
            page: 'courseReg',
            url: trainingAdminPortalMiddlewareUrl
        });


        // ============================================================
        // REAL API ENDPOINT
        // Uncomment this when backend endpoint is ready
        // ============================================================

        /*
        _callFetchEndPoints({
            url: `admin/course/fetch-course?courseId=${courseId}`,
            accessKey: true,
        })
        .then((response) => {

            sessionStorage.setItem(
                "getEachCourseDetailsSession",
                JSON.stringify(response?.data?.[0] || {})
            );

            _getForm({
                page: 'courseReg',
                url: trainingAdminPortalMiddlewareUrl
            });

        })
        .catch((error) => {

            _staffValidationCheck(error.response);

            _alertClose();

            console.error("Error:", error);

            _callAjaxError(
                () => _fetchEachCourse(courseId),
                error.message
            );

        });
        */

    } catch (error) {

        _alertClose();

        console.error("Error:", error);

        _callCatchError(
            () => _fetchEachCourse(courseId)
        );
    }
}