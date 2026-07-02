//// Proceed Verify Student Account ///// 
function _proceedVerifyStudentAccount(isResendOtp = false) {
    let studentVerifyAccountDataSession = JSON.parse(localStorage.getItem("studentVerifyAccountDataSession"));

    try {
        let issueCount = 0;
        let emailAddress = $("#verifyEmailAddress").val()?.trim();

        // Use session values when resending ///
        if (isResendOtp) {
            emailAddress = studentVerifyAccountDataSession?.emailAddress;
        }
        
        if (!isResendOtp) {
            ///// empty field validation//////////
            issueCount += _validateEmptyValue("verifyEmailAddress", "EMAIL ADDRESS");
            issueCount += _validateEmail("verifyEmailAddress", "EMAIL ADDRESS");
        }

        if (issueCount > 0) return;

       // Gather form data
        const formData = {
            emailAddress,
		};
        _proceedVerifyStudentAccountCallback(formData, isResendOtp);
    } catch (error) {
        console.error("Error:", error);
        _callCatchError(() => _proceedVerifyStudentAccount(isResendOtp = false));
    }
}

//// Proceed Verify Student Account CallBack /////
function _proceedVerifyStudentAccountCallback(formData, isResendOtp) {
    try {
        ///// get btn text/////
        let btnText = "";
        if (!isResendOtp) {
            btnText = $("#proceedBtn").html();
            _btnDisable("proceedBtn", btnText, true);
        } else {
            _showLoader("Resending OTP... Please wait...");
        }
        
        //// call endpoint //////
        _callFetchEndPoints({
            url: `students/payment/verify-student-account?emailAddress=${formData?.emailAddress}`,
        })
        .then((response) => {
            if (!isResendOtp) {
                localStorage.setItem( "studentVerifyAccountDataSession", JSON.stringify(response?.data));
                _showLoader("OTP Sent Successfully!. Please wait...");
                window.location.href = tuitionFeePaymentVerificationUrl;
            } else {
                _hideLoader();
                _actionAlert(response.message, true);
                _counDownOtp(180);
            }
        })
        .catch((error) => {
        console.error("Error:", error);
        if (error.status == 0) {
            if (!isResendOtp) {
                _callAjaxError(() => _proceedVerifyStudentAccountCallback(formData), error.message); // retry if needed
                _btnDisable("proceedBtn", btnText, false);
            } else {
                _actionAlert('Check your internet connection and try again', false);
                _hideLoader();
            }
        } else {
            if (!isResendOtp) {
                if (error.response === 404) {
                    _showCustomConfirm({
                        title: "Student Record Not Found!",
                        message: error.message,
                        alertType: "error",
                        falseActionBtn: true,
                        trueActionBtnText: "PROCEED TO REGISTRATION",
                        falseActionBtnText: "CANCEL",
                        trueActionCallback: () => {
                            window.location.replace(registerUrl);
                        },
                        closeOnOverlayClick: true,
                    });
                    _btnDisable("proceedBtn", btnText, false);
                } else if (error.response === 403) {
                    _showCustomConfirm({
                        title: "Access Denied!",
                        message: error.message,
                        alertType: "error",
                        falseActionBtn: true,
                        trueActionBtnText: "WHATSAPP",
                        falseActionBtnText: "CANCEL",
                        trueActionCallback: () => {
                            let whatsappMessage = encodeURIComponent(
                                "Hello, I am a student trying to pay my tuition fee, but I received this message: " +
                                "\"ACCESS DENIED! Your training status is not active.\" " +
                                "Kindly assist me with activating my training status so I can access and pay my fees. Thank you."
                            );

                            window.open(
                                `https://api.whatsapp.com/send?phone=2347050903886&text=${whatsappMessage}`,
                                "_blank"
                            );
                        },
                        closeOnOverlayClick: true,
                    });
                    _btnDisable("proceedBtn", btnText, false);
                }
            } else {
                _actionAlert(error.message, false);
                _hideLoader();
            }
        }
    });
    } catch (error) {
        console.error("Error:", error);
        if (!isResendOtp) {
            _callCatchError(() => _proceedVerifyStudentAccountCallback(formData));
            _btnDisable("proceedBtn", btnText, false);
        } else {
            _hideLoader();
        }
    }
}

//// Proceed Get Student Account Details ////
function _getStudentTuitionFeeDetails() {
  try {
    let issueCount = 0;
    const otp = $("#otp").val().trim();

    ///// empty field validation//////////
    if (!otp) {
      $("#otp_box .otp_text_field").addClass("issue");
      $('#issue_otp').html('USER ERROR! OTP REQUIRED');
      issueCount++;
    } else if (otp.length < 6 || !/^\d+$/.test(otp)) {
      $("#otp_box .otp_text_field").addClass("issue");
      $('#issue_otp').html('USER ERROR! OTP must be a 6-digit number');
      issueCount++;
    } else {
      $("#otp_box .otp_text_field").removeClass("issue");
      $('#issue_otp').html('');
    }

    if (issueCount > 0) return;

    // Gather form data
    const formData = {
      otp,
    };

    _getStudentTuitionFeeDetailsCallback(formData);
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _getStudentTuitionFeeDetails());
  }
}

/// Proceed OTP Verification Callback ////
function _getStudentTuitionFeeDetailsCallback(formData) {
  let studentVerifyAccountDataSession = JSON.parse(
    localStorage.getItem("studentVerifyAccountDataSession")
  );

  const studentId = studentVerifyAccountDataSession?.studentId;
  try { 
    btnText = $("#proceedBtn").html();
    _btnDisable("proceedBtn", btnText, true);

    //// call endpoint //////
    _callRawEndPoints({
      url: `students/payment/validate-otp?studentId=${studentId}`,
      formData,
    })
     .then((response) => {
      _btnDisable("proceedBtn", btnText, false);
      localStorage.setItem("studentPaymentDetailsSession", JSON.stringify(response?.data));
      _showLoader("OTP Verified Successfully!. Please wait...");
      
      // Remove OTP Session
      localStorage.removeItem("studentVerifyAccountDataSession");
      window.location.replace(tutionFeePaymentPageUrl);
    })
    .catch((error) => {
      console.error("Error:", error);
      if (error.status==0) {
        _callAjaxError(() => _getStudentTuitionFeeDetailsCallback(formData), error.message); // retry if needed
        _btnDisable("proceedBtn", btnText, false);
      } else {
        if (error.response === 400) {
            _showCustomConfirm({
                title: "Invalid OTP!",
                message: error.message,
                alertType: "error",
                trueActionBtnText: "OK",
                closeOnOverlayClick: true,
            });
            _btnDisable("proceedBtn", btnText, false);
        } else if (error.response === 409) {
            _showCustomConfirm({
                title: "Payment Already Made!",
                message: error.message,
                alertType: "error",
                trueActionBtnText: "OK",
                trueActionCallback: () => {
                    window.location.replace(trainingUrl);
                },
                closeOnOverlayClick: true,
            });
            _btnDisable("proceedBtn", btnText, false);
        }
      }
    });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _getStudentTuitionFeeDetailsCallback(formData));
  }
}


//// Proceed to Tuition Fee Payment ////
function _proceedToTuitionFeePayment() {
    studentPaymentDetailsSession = JSON.parse(localStorage.getItem("studentPaymentDetailsSession")) || {};
    const studentId = studentPaymentDetailsSession?.studentData?.studentId;
    const durationId = studentPaymentDetailsSession?.programData?.durationId;

    try {
        let issueCount = 0;
        const paymentMethodId = $("#paymentMethodId").val()?.trim();
        
        ///// empty field validation//////////
        issueCount += _validateEmptyValue("paymentMethodId", "PAYMENT METHOD");
        if (issueCount > 0) return;

       // Gather form data
        const formData = {
            studentId,
            durationId,
            paymentMethodId,
		};

        ////// confirm action////
		_showCustomConfirm({
            callback: () => {
                _proceedToTuitionFeePaymentCallback(formData);
            },
			title: "Are you sure?",
			message: 'Are you sure you want to continue? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
			closeOnOverlayClick: true,
        });
        
    } catch (error) {
        console.error("Error:", error);
        _callCatchError(() => _proceedToTuitionFeePayment());
    }
}

//// Proceed To Tuition Fee Payment CallBack /////
function _proceedToTuitionFeePaymentCallback(formData) {
    try {

        ///// get btn text/////
        const btnText = $("#submitBtn").html();
        _btnDisable("submitBtn", btnText, true);

        //// call endpoint //////
        _callRawEndPoints({
            url: `students/payment/proceed-to-payment`,
            formData,
        })
        .then((response) => {
            const paystackPaymentKey = response?.data?.paystackPaymentKey;
            const paystackSecretKey = response?.data?.paystackSecretKey;
            const paymentId = response?.data?.paymentId;
            const amount = response?.data?.amount;
            const currency = response?.data?.currency;
            const paymentChannel = response?.data?.paymentChannel;
            const fullName = response?.data?.fullName;
            const emailAddress = response?.data?.emailAddress;
            const phoneNumber = response?.data?.phoneNumber;

            _callTuitionFeePayStack(
                paystackPaymentKey,
                paystackSecretKey,
                paymentId,
                amount,
                currency,
                paymentChannel,
                fullName,
                emailAddress,
                phoneNumber,
            );
        })
        .catch((error) => {
        console.error("Error:", error);
        if (error.status == 0) {
            _callAjaxError(() => _proceedToTuitionFeePaymentCallback(formData), error.message); // retry if needed
            _btnDisable("submitBtn", btnText, false);
        } else {
            _showCustomConfirm({
                title: "Unable to Proceed to Payment",
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
        _callCatchError(() => _proceedToTuitionFeePaymentCallback(formData));
        _btnDisable("submitBtn", btnText, false);
    }
}

////// CALL TUITION FEE PAYSTACK ////////////////
function _callTuitionFeePayStack(
    paystackPaymentKey,
    paystackSecretKey,
    paymentId,
    amount,
    currency,
    paymentChannel,
    fullName,
    emailAddress,
    phoneNumber,
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
            _getTuitionFeeTransactionDetailsFromPaystack(paymentId, paystackSecretKey, paystackId);
        },
            onClose: function () {
            _callTuitionFeePaymentCancelled(paymentId);
            return false;
        },
    };

    var handler = PaystackPop.setup(options);
    handler.openIframe();
}

/// Call Get Transaction Details From Paystack ///
function _getTuitionFeeTransactionDetailsFromPaystack(paymentId, paystackSecretKey, paystackId) {
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
                _callTuitionFeePaymentSuccess(paymentId, paystackId, paystackCharges);
            } else {
                _callTuitionFeePaymentSuccess(paymentId, paystackId, paystackCharges);
            }
        },
            error: function (xhr, status, error) {
            console.error("Error:", error);
            _callTuitionFeePaymentSuccess(paymentId, paystackId, paystackCharges);
        }
    });
    }catch (error) {
        console.log(error);
        _callTuitionFeePaymentSuccess(paymentId, paystackId, paystackCharges);
    }
}

/// Call Tuition Fee Payment Success ///
function _callTuitionFeePaymentSuccess(paymentId, paystackId, paystackCharges) {
    try {
        ///// Form Data /////
        const formData = {
            paymentId: paymentId,
            paystackId: paystackId,
            paystackCharges: paystackCharges,
        };

        ///// Call EndPoint /////
        _callRawEndPoints({
            url: `students/payment/payment-successful`,
            formData,
        })
        .then((response) => {
            _clearAllSession();
            _showCustomConfirm({
                callback: () => {
                   window.location.replace(trainingUrl); 
                },
                title: "Payment Successful!",
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
                _callAjaxError(() => _callTuitionFeePaymentSuccess(paymentId, paystackId, paystackCharges), error.message); // retry if needed
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
            _callTuitionFeePaymentSuccess(paymentId, paystackId, paystackCharges),
        );
    }
}

/// Call Tuition Fee Payment Cancelled ///
function _callTuitionFeePaymentCancelled(
    paymentId,
) {
    try {
        _callFetchEndPoints({
        url: `students/payment/payment-cancelled?paymentId=${paymentId}`,
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
            _callTuitionFeePaymentCancelled(paymentId),
        );
    }
}

//// Clear All Session Storage ///
function _clearAllSession() {
    localStorage.clear();
    sessionStorage.clear();
}