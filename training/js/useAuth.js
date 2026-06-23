$(function () {
    studentPreview = {
        UpdatePreview: function (obj) {
        if (!window.FileReader) {
            console.error("FileReader is not supported.");
            return;
        }
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById("cam-pix").innerHTML =
                '<img id="passport" src="' + e.target.result + '"/>';
        };
        reader.readAsDataURL(obj.files[0]);
        },
    };
});

//////////////////////////// upload image from webcam ////////////////////////////
Webcam.set({
    width: 270,
    height: 200,
    image_format: "jpeg",
    jpeg_quality: 100
});

function takeSnapShot() {
    $(".webcam-div").fadeIn(500, function () {
        Webcam.attach("#my_camera");
    });
}

function snapPicture() {
    Webcam.snap(function (data_uri) {
        $("#passport").val(data_uri);
        document.getElementById("cam-pix").innerHTML =
            '<img id="passport-preview" src="' + data_uri + '"/>';
        $(".webcam-div").fadeOut(500);
    });
    Webcam.reset();
}

//////////////////////////// end upload image from webcam ////////////////////////////
/// next page function ///
function _getNextPage(props) {
    const { page = "" } = props;
    sessionStorage.setItem("currentAuthPage", page);
    _getPage({ page: page, url: trainingMiddlewareUrl });
}

//// Function Clear SelectField ////
function _clearSelectField(fieldId) {
    // clear actual select value
    $("#" + fieldId).val("");

    // reset displayed option
    $("#" + fieldId).html(`
        <option selected="selected" value="">
            Select here
        </option>
    `);
}

//// Get Institution Type Preset Data ////
function _getSelectInstitutionType(fieldId) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `preset-data/fetch-institution-types`,
		})
        .then((response) => {
            $("#searchList_" + fieldId).html("");
			for (let i = 0; i < response.data.length; i++) {
				const id = response.data[i].institutionTypeId;
                const value = response.data[i].institutionTypeName;
                
				$("#searchList_" + fieldId).append(`
                <li onclick="
                  _clickOption(
                    'searchList_${fieldId}',
                    '${id}',
                    '${value}'
                  );
                  _getSelectInstitutionLevelByType();
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

//// Proceed Get Institution Level Preset Data////
function _getSelectInstitutionLevelByType() {
    // clear previous level selection completely
    _clearSelectField("levelId");
    _getSelectInstitutionLevel("levelId");
}

//// Get Institution Level By Institutional Type Preset Data ////
function _getSelectInstitutionLevel(fieldId) {
    const institutionTypeId = $("#institutionTypeId").val(); 
    // always reset before loading
    $("#"+fieldId).val("");
    $("#searchList_" + fieldId).html("");

	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `preset-data/fetch-institution-levels?institutionTypeId=${institutionTypeId}`,
		})
        .then((response) => {
            $("#searchList_" + fieldId).html("");
			for (let i = 0; i < response.data.length; i++) {
				const id = response.data[i].levelId;
				const value = response.data[i].levelName;
				$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\');">'+ value +'</li>');
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

//// Get Programs Preset Data ////
function _getSelectPrograms(fieldId) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `preset-data/fetch-programs`,
		})
        .then((response) => {
            $("#searchList_" + fieldId).html("");
			for (let i = 0; i < response.data.length; i++) {
				const id = response.data[i].programId;
                const value = response.data[i].programName;
                
				$("#searchList_" + fieldId).append(`
                <li onclick="
                  _clickOption(
                    'searchList_${fieldId}',
                    '${id}',
                    '${value}'
                  );
                  _getSelectDurationByCourseAndProgram(${fieldId});
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

//// Get Courses Preset Data ////
function _getSelectCourse(fieldId) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `preset-data/fetch-courses`,
		})
        .then((response) => {
            $("#searchList_" + fieldId).html("");
			for (let i = 0; i < response.data.length; i++) {
				const id = response.data[i].courseId;
                const value = response.data[i].courseName;
                
				$("#searchList_" + fieldId).append(`
                <li onclick="
                  _clickOption(
                    'searchList_${fieldId}',
                    '${id}',
                    '${value}'
                  );
                  _getSelectDurationByCourseAndProgram();
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

//// Proceed Get Duration Preset Data////
function _getSelectDurationByCourseAndProgram() {
    // clear previous duration selection completely
    _clearSelectField("durationId");
    _getSelectProgramCourseDuration("durationId");
}

//// Get Institution Level By Institutional Type Preset Data ////
function _getSelectProgramCourseDuration(fieldId) {
    const programId = $("#programId").val();
    const courseId = $("#courseId").val();

    if (programId === "" || courseId === "") {
        return;
    }

    // clear old session immediately
    localStorage.removeItem("getSelectedProgramCourseDurationSession");

    // always reset before loading
    $("#"+fieldId).val("");
    $("#searchList_" + fieldId).html("");

	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `preset-data/fetch-program-course-duration?programId=${programId}&courseId=${courseId}`,
		})
        .then((response) => {
            $("#searchList_" + fieldId).html("");
			for (let i = 0; i < response.data.length; i++) {
				const id = response.data[i].durationId;
                const value = response.data[i].durationName;
                const trainingAmount = response.data[i].trainingAmount;
                const trainingAmountText = `<s>N</s>${thousandSeperator(trainingAmount)}`;

				$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + ' (' + trainingAmountText + ')' + '\');">' + value + ' (' + trainingAmountText + ')' + '</li>');
            }	
            /// Set Selected Program, Course And Duration response in session ///
            localStorage.setItem(
            "getSelectedProgramCourseDurationSession",
            JSON.stringify(response)
            );
		})
		.catch((error) => {
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
		_actionAlert('An unexpected error occurred. Please try again.', false);
  	}
}

//// Get Payment Method Preset Data ////
function _getSelectPaymentMethod(fieldId) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `preset-data/fetch-payment-method`,
		})
        .then((response) => {
            $("#searchList_" + fieldId).html("");
			for (let i = 0; i < response.data.length; i++) {
				const id = response.data[i].paymentMethodId;
                const value = response.data[i].paymentMethodName;
                
				$("#searchList_" + fieldId).append(`
                <li onclick="
                  _clickOption(
                    'searchList_${fieldId}',
                    '${id}',
                    '${value}'
                  );">
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

//// Proceed Student Bio-Data ///
function _proceedStudentBioData() {
    try {
        let issueCount = 0;
        const firstName = $("#firstName").val().trim();
        const lastName = $("#lastName").val().trim();
        const emailAddress = $("#emailAddress").val().trim();
        const phoneNumber = $("#phoneNumber").val().trim();

        ///// empty field validation//////////
        issueCount += _validateEmptyValue("firstName", "FIRST NAME");
        issueCount += _validateEmptyValue("lastName", "LAST NAME");
        issueCount += _validateEmptyValue("emailAddress", "EMAIL ADDRESS");
        issueCount += _validateEmail("emailAddress", "EMAIL ADDRESS");
        issueCount += _validateEmptyValue("phoneNumber", "PHONE NUMBER");

        if (issueCount > 0) return;

        // Get existing session
        let studentSession = 
            JSON.parse(localStorage.getItem("studentCompleteBioDataSession")) || {};

        // Merge instead of replace
        studentSession = {
            ...studentSession,
            firstName,
            lastName,
            emailAddress,
            phoneNumber
        };

        /// Set the student data in session ///
        localStorage.setItem(
        "studentCompleteBioDataSession",
        JSON.stringify(studentSession)
        );

        //// Get Next Page ////
        _getNextPage({page: 'institutionDetailsPage'});
    } catch (error) {
        console.error("Error:", error);
        _callCatchError(() => _proceedStudentBioData()); 
    }
}

//// Proceed Institution Information ///
function _proceedInstitutionInformation() {
   /// Get Student Bio-Data session first ///
   studentSession = JSON.parse(localStorage.getItem("studentCompleteBioDataSession")) || {};
    
    try {
        let issueCount = 0;
        const institutionTypeId = $("#institutionTypeId").val().trim();
        const nameOfInstitution = $("#nameOfInstitution").val().trim();
        const department = $("#department").val().trim();
        const levelId = $("#levelId").val().trim();
        const matricNo = $("#matricNo").val().trim();

        // Get the selected text (name)
        const institutionTypeName = $("#institutionTypeId option:selected").text();
        const levelName = $("#levelId option:selected").text();

        ///// empty field validation//////////
        issueCount += _validateEmptyValue("institutionTypeId", "INSTITUTION TYPE");
        issueCount += _validateEmptyValue("nameOfInstitution", "INSTITUTION");
        issueCount += _validateEmptyValue("department", "DEPARTMENT");
        issueCount += _validateEmptyValue("levelId", "LEVEL");
        issueCount += _validateEmptyValue("matricNo", "MATRIC NUMBER");

        if (issueCount > 0) return;

        /// Merge with institution data ///
        studentSession = {
            ...studentSession,
            institutionTypeId,
            institutionTypeName,
            nameOfInstitution,
            department,
            levelId,
            levelName,
            matricNo,
        };

        /// Set the student data in session ///
        localStorage.setItem(
        "studentCompleteBioDataSession",
        JSON.stringify(studentSession)
        );

        //// Get Next Page ////
        _getNextPage({page: 'programDetailsPage'});
    } catch (error) {
        console.error("Error:", error);
        _callCatchError(() => _proceedInstitutionInformation()); 
    }
}

//// Proceed Program Data ///
function _proceedProgramDetailsData() {
    /// Get Student Bio-Data and institution session first ///
    studentSession = JSON.parse(localStorage.getItem("studentCompleteBioDataSession")) || {};
    
    try {
        let issueCount = 0;
        const programId = $("#programId").val().trim();
        const courseId = $("#courseId").val().trim();
        const durationId = $("#durationId").val().trim();

        ///// empty field validation//////////
        issueCount += _validateEmptyValue("programId", "PROGRAM");
        issueCount += _validateEmptyValue("courseId", "COURSE");
        issueCount += _validateEmptyValue("durationId", "DURATION");

        if (issueCount > 0) return;

        /// Merge with institution data ///
        studentSession = {
            ...studentSession,
            programId,
            courseId,
            durationId,
        };

        /// Set the student data in session ///
        localStorage.setItem(
        "studentCompleteBioDataSession",
        JSON.stringify(studentSession)
        );

        //// Get Next Page ////
        _getNextPage({page: 'passportPage'});
    } catch (error) {
        console.error("Error:", error);
        _callCatchError(() => _proceedProgramDetailsData()); 
    }
}

//// Proceed Program Data ///
function _proceedPassportData() {
    studentSession = JSON.parse(localStorage.getItem("studentCompleteBioDataSession")) || {};

    try {
        let issueCount = 0;
        const passportImg = document.querySelector("#cam-pix img");
        const passport = passportImg?.src || "";
        const defaultPassport = `${websiteUrl}/uploaded_files/passport/sample.jpg`;

        ///// Check passport ///////
        if (!passport || passport === defaultPassport) {
            $("#issues_passport").html("PASSPORT IS REQUIRED").fadeIn();
            $("#issueBorder").addClass("issue-border");
            issueCount++;
        } else {
            $("#issues_passport").html("");
            $("#issueBorder").removeClass("issue-border");
        }

        if (issueCount > 0) return;

        /// Merge with institution data ///
        studentSession = {
            ...studentSession,
            passport,
        };

        localStorage.setItem(
            "studentCompleteBioDataSession",
            JSON.stringify(studentSession)
        );

        //// Get Next Page ////
        _getNextPage({
            page: "summaryPage"
        });
    } catch (error) {
        console.error("Error:", error);
        _callCatchError(() => _proceedPassportData());
    }
}

//// Proceed to Payment ////
function _proceedToPayment() {
    studentSession = JSON.parse(localStorage.getItem("studentCompleteBioDataSession")) || {};
    const firstName = studentSession?.firstName;
    const lastName = studentSession?.lastName;
    const emailAddress = studentSession?.emailAddress;
    const phoneNumber = studentSession?.phoneNumber;
    const institutionTypeId = studentSession?.institutionTypeId;
    const nameOfInstitution = studentSession?.nameOfInstitution;
    const department = studentSession?.department;
    const levelId = studentSession?.levelId;
    const matricNo = studentSession?.matricNo;
    const programId = studentSession?.programId;
    const courseId = studentSession?.courseId;
    const durationId = studentSession?.durationId;
    const passport = studentSession?.passport;

    try {
        let issueCount = 0;
        const paymentMethodId = $("#paymentMethodId").val().trim();
        
        ///// empty field validation//////////
        issueCount += _validateEmptyValue("paymentMethodId", "PAYMENT METHOD");

        if (issueCount > 0) return;

       // Gather form data
        const formData = {
            firstName,
            lastName,
            emailAddress,
            phoneNumber,
            institutionTypeId,
            nameOfInstitution,
            department,
            levelId,
            matricNo,
            programId,
            courseId,
			durationId,
            passport,
            paymentMethodId,
		};

        ////// confirm action////
		_showCustomConfirm({
		callback: () => {
			console.log(formData);
		},
			title: "Are you sure?",
			message: 'Are you sure you want to continue? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
			closeOnOverlayClick: true,
        });
        
    } catch (error) {
        console.error("Error:", error);
        _callCatchError(() => _proceedToPayment());
    }
}
 // _showCustomConfirm({
    //     title: "Registration Successful!",
    //     message: 'Registration Successful!, Kindly Check your email for acknowlegdement letter.',
    //     alertType: "success",
    //     trueActionBtnText: "OK",
    //     closeOnOverlayClick: true,
    // });