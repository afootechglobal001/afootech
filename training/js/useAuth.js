$(function () {


    studentPreview = {


        UpdatePreview: function(obj){


            if(!window.FileReader){

                console.error("FileReader not supported");
                return;

            }


            let reader = new FileReader();



            reader.onload = function(e){


                $("#passportPreview")
                    .attr("src", e.target.result)
                    .attr("alt","Profile Image");


            };


            reader.readAsDataURL(obj.files[0]);


        }

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

function snapPicture(){


    Webcam.snap(function(data_uri){



        $("#passportPreview")
            .attr("src", data_uri)
            .attr("alt","Profile Image");



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
    _updateProgress(page);
}

//// Update Progress ////
function _updateProgress(page){
    let steps = $(".step");
    let lines = $(".line");

    let currentStep = steps.index(
        steps.filter(`[data-page="${page}"]`)
    );

    if(currentStep < 0){
        currentStep = 0;
    }
    steps.removeClass("active done");
    // reset lines
    lines.removeClass("active");
    steps.each(function(index){
        if(index < currentStep){
            $(this).addClass("done");
        }

        if(index === currentStep){
            if(index === steps.length - 1){
                $(this).addClass("done");
            }else{
                $(this).addClass("active");
            }
        }
    });

    // activate connecting lines
    lines.each(function(index){
        if(index < currentStep){
            $(this).addClass("active");
        }
    });
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
                const formFee = response.data[i].formFee;
                const trainingAmountText = `<s>N</s>${thousandSeperator(formFee)}`;

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
        _getNextPage({ page: 'institutionDetailsPage' });
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
        const institutionName = $("#institutionName").val().trim();
        const departmentName = $("#departmentName").val().trim();
        const levelId = $("#levelId").val().trim();
        const matricNumber = $("#matricNumber").val().trim();

        // Get the selected text (name)
        const institutionTypeName = $("#institutionTypeId option:selected").text();
        const levelName = $("#levelId option:selected").text();

        ///// empty field validation//////////
        issueCount += _validateEmptyValue("institutionTypeId", "INSTITUTION TYPE");
        issueCount += _validateEmptyValue("institutionName", "INSTITUTION NAME");
        issueCount += _validateEmptyValue("departmentName", "DEPARTMENT NAME");
        issueCount += _validateEmptyValue("levelId", "LEVEL");
        issueCount += _validateEmptyValue("matricNumber", "MATRIC NUMBER");

        if (issueCount > 0) return;

        /// Merge with institution data ///
        studentSession = {
            ...studentSession,
            institutionTypeId,
            institutionTypeName,
            institutionName,
            departmentName,
            levelId,
            levelName,
            matricNumber,
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
        const defaultPassport = `${websiteUrl}/uploaded_files/studentPassport/sample.jpg`;

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
    const institutionName = studentSession?.institutionName;
    const departmentName = studentSession?.departmentName;
    const levelId = studentSession?.levelId;
    const matricNumber = studentSession?.matricNumber;
    const programId = studentSession?.programId;
    const courseId = studentSession?.courseId;
    const durationId = studentSession?.durationId;

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
            institutionName,
            departmentName,
            levelId,
            matricNumber,
            programId,
            courseId,
			durationId,
            paymentMethodId,
		};

        ////// confirm action////
		_showCustomConfirm({
            callback: () => {
                _proceedToPaymentCallback(formData);
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

//// Proceed To Payment CallBack /////
function _proceedToPaymentCallback(formData) {
    try {

        ///// get btn text/////
        const btnText = $("#submitBtn").html();
        _btnDisable("submitBtn", btnText, true);

        //// call endpoint //////
        _callRawEndPoints({
            url: `registration/proceed-to-payment`,
            formData,
        })
        .then((response) => {
            const paystackPaymentKey = response?.data?.paystackPaymentKey;
            const paystackSecretKey = response?.data?.paystackSecretKey;
            const paymentId = response?.data?.paymentId;
            const amount = response?.data?.amount;
            const currency = response?.data?.currency;
            const paymentChannel = response?.data?.paymentChannel;
            const studentId = response?.data?.studentId;
            const fullName = response?.data?.fullName;
            const emailAddress = response?.data?.emailAddress;
            const phoneNumber = response?.data?.phoneNumber;
            const newPassport = response?.data?.passport;

            _callPayStack(
                paystackPaymentKey,
                paystackSecretKey,
                paymentId,
                amount,
                currency,
                paymentChannel,
                fullName,
                emailAddress,
                phoneNumber,
                newPassport,
                studentId,
            );
        })
        .catch((error) => {
        console.error("Error:", error);
        if (error.status == 0) {
            _callAjaxError(() => _proceedToPaymentCallback(formData), error.message); // retry if needed
            _btnDisable("submitBtn", btnText, false);
        } else {
            _showCustomConfirm({
                title: "Unable to Process Payment",
                message: error.message,
                alertType: "error",
                trueActionBtnText: "OK",
                closeOnOverlayClick: true,
            });
            _btnDisable("submitBtn", btnText, false);
        }
    });
    } catch (error) {
        console.error("Error:", error);
        _callCatchError(() => _proceedToPaymentCallback(formData));
        _btnDisable("submitBtn", btnText, false);
    }
}

////// CALL PAYSTACK ////////////////
function _callPayStack(
    paystackPaymentKey,
    paystackSecretKey,
    paymentId,
    amount,
    currency,
    paymentChannel,
    fullName,
    emailAddress,
    phoneNumber,
    newPassport,
) {

  // Create the base options
    const options = {
        key: paystackPaymentKey,
        email: emailAddress,
        amount: amount, // Amount in kobo
        ref: paymentId,
        currency: currency,
        channels: paymentChannel ? [paymentChannel] : ["card", "bank_transfer"],
        metadata: {
        custom_fields: [
            {
                display_name: fullName,
                variable_name: "mobile_number",
                value: phoneNumber,
            },
        ],
        },
        callback: function (response) {
            const paystackId = $.trim(response.transaction);
            $("#get-more-div-secondary")
                .css({
                display: "flex",
                "justify-content": "center",
                "align-items": "center",
                })
                .html(
                `<div class="alert-loading-div"><div class="icon"><img src="${websiteUrl}/all-images/images/loading.gif" width="20px" alt="Loading"/></div><div class="text"><p>PROCESSING...</p></div></div>`,
                ).fadeIn(500);
            _getTransactionDetailsFromPaystack(paymentId, paystackSecretKey, paystackId);
            _uploadStudentPassport(newPassport);
        },
            onClose: function () {
            //_callPaymentCancelled(paymentId);
            return false;
        },
    };

    var handler = PaystackPop.setup(options);
    handler.openIframe();
}

/// Call Get Transaction Details From Paystack ///
function _getTransactionDetailsFromPaystack(paymentId, paystackSecretKey, paystackId) {
    try{
        $.ajax({
        url: `https://api.paystack.co/transaction/${paystackId}`,
        type: "GET",
        headers: {
            "Authorization": "Bearer " + paystackSecretKey,
            "Content-Type": "application/json"
        },
        success: function (data) {
            if (data.status === true && data.data.status === "success") {
                const paystackCharges = $.trim(data?.data?.fees);
                _callPaymentSuccess(paymentId, paystackId, paystackCharges);
            } else {
                _callPaymentSuccess(paymentId, paystackId, paystackCharges);
            }
        },
            error: function (xhr, status, error) {
            console.error("Error:", error);
            _callPaymentSuccess(paymentId, paystackId, paystackCharges);
        }
    });
    }catch (error) {
        console.log(error);
        _callPaymentSuccess(paymentId, paystackId, paystackCharges);
    }
}

/// Call Payment Success ///
function _callPaymentSuccess(paymentId, paystackId, paystackCharges) {
    try {
        ///// Form Data /////
        const formData = {
            paymentId: paymentId,
            paystackId: paystackId,
            paystackCharges: paystackCharges,
        };

        ///// Call EndPoint /////
        _callRawEndPoints({
            url: `registration/payment-successful`,
            formData,
        })
        .then((response) => {
            _clearAllSession();
            _showCustomConfirm({
                callback: () => {
                   window.location.replace(registerUrl); 
                },
                title: "Registration Successful!",
                message: response?.message,
                alertType: "success",
                trueActionBtnText: "DONE",
                closeOnOverlayClick: false,
            });
            $("#get-more-div-secondary")
            .css({
                display: "flex",
                "justify-content": "center",
                "align-items": "center",
            })
            .html(
                `<div class="alert-loading-div"><div class="icon"><img src="${websiteUrl}/all-images/images/loading.gif" width="20px" alt="Loading"/></div><div class="text"><p>PROCESSING...</p></div></div>`,
            ).fadeOut(500);
        })
        .catch((error) => {
            console.error("Error:", error);
            if (error.status == 0) {
                _callAjaxError(() => _callPaymentSuccess(paymentId, paystackId, paystackCharges), error.message); // retry if needed
            } else {
                _showCustomConfirm({
                    title: "Unable to Process Payment",
                    message: error.message,
                    alertType: "warning",
                    trueActionBtnText: "OK",
                    closeOnOverlayClick: true,
                });
            }
        });
    } catch (error) {
        console.error("Error:", error);
        _callCatchError(() =>
            _callPaymentSuccess(paymentId, paystackId, paystackCharges),
        );
    }
}

/// Call Payment Cancelled ///
function _callPaymentCancelled(
    paymentId,
) {
    try {
        _callRawEndPoints({
        url: `user/exam/exam-payment-cancelled?paymentId=${paymentId}`,
        })
        .then(() => {
            $("#submitBtn")
            .html('Proceed to Payment <i class="bi bi-credit-card"></i>')
            .prop("disabled", false);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
    } catch (error) {
        console.error("Error:", error);
        _callCatchError(() =>
            _callPaymentCancelled(paymentId),
        );
    }
}

/// Upload Student Passport ///
function _uploadStudentPassport(newPassport) {
    studentSession = JSON.parse(localStorage.getItem("studentCompleteBioDataSession")) || {};
    const passport = studentSession?.passport;

    const formData = new FormData();
    formData.append("action","uploadStudentPassport");
    formData.append("passport", passport);
    formData.append("newPassport", newPassport);

    _callFileEndPoints({
        url: trainingMiddlewareUrl,
        formData,
        expectJson:false,
    })
    .then(()=>{
        console.log("Passport uploaded");
    })
    .catch((error)=>{
        console.error("Error:",error);
        _callAjaxError(() => 
            _uploadStudentPassport(newPassport)
        );
    });



}

//// Clear All Session Storage ///
function _clearAllSession() {
    localStorage.clear();
    sessionStorage.clear();
}