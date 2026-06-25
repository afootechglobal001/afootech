$(document).ready(function () {
    function trim(s) {
        return s.replace(/^\s*/, "").replace(/\s*$/, "");
    }
    $("#viewOtp").keydown(function (e) {
        if (e.keyCode == 13) {
        _proceedPrintAcceptanceLetter();
        }
    });
});


/// countdown function ///
function _counDownOtp(timer) {
    $("#resendOtpBtn").hide();
    $("#resendCountdown").fadeIn(500);

    const countdown = setInterval(() => {
        if (timer > 0) {
        timer--;

        let minutes = Math.floor(timer / 60);
        let seconds = timer % 60;

        if (timer >= 60) {
            // Show MM:SS when 1 min or more
            seconds = seconds < 10 ? "0" + seconds : seconds;
            $("#resendCountdown").html(
            'Resend in <strong id="timer">' +
                minutes +
                ":" +
                seconds +
                "</strong> min",
            );
        } else {
            // Show seconds only when below 1 minute
            $("#resendCountdown").html(
            'Resend in <strong id="timer">' + seconds + "</strong> sec",
            );
        }
        } else {
        clearInterval(countdown);
        $("#resendCountdown").hide();
        $("#resendOtpBtn").fadeIn(500);
        }
    }, 1000);

    return () => clearInterval(countdown);
}

//// Proceed Verify Student Registration ///// 
function _verifyStudentRegistration(isResendOtp = false) {
    let studentVerificationDataSession = JSON.parse(localStorage.getItem("studentVerificationDataSession"));

    try {
        let issueCount = 0;
        let emailAddress = $("#proceedEmailAddress").val()?.trim();

        // Use session values when resending ///
        if (isResendOtp) {
            emailAddress = studentVerificationDataSession?.emailAddress;
        }
        
        if (!isResendOtp) {
            ///// empty field validation//////////
            issueCount += _validateEmptyValue("proceedEmailAddress", "EMAIL ADDRESS");
            issueCount += _validateEmail("proceedEmailAddress", "EMAIL ADDRESS");
        }

        if (issueCount > 0) return;

       // Gather form data
        const formData = {
            emailAddress,
		};
        _verifyStudentRegistrationCallback(formData, isResendOtp);
    } catch (error) {
        console.error("Error:", error);
        _callCatchError(() => _verifyStudentRegistration(isResendOtp = false));
    }
}

//// Proceed Verify Student Registration CallBack /////
function _verifyStudentRegistrationCallback(formData, isResendOtp) {
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
            url: `registration/verify-student-registration?emailAddress=${formData?.emailAddress}`,
        })
        .then((response) => {
            if (!isResendOtp) {
                localStorage.setItem( "studentVerificationDataSession", JSON.stringify(response?.data));
                _showLoader("OTP Sent Successfully!. Please wait...");
                window.location.href = studentOtpVerificationUrl;
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
                _callAjaxError(() => _verifyStudentRegistrationCallback(formData), error.message); // retry if needed
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
                                "Hello, I am a student trying to print my completion letter, but I received this message: " +
                                "\"ACCESS DENIED! Your training status is not active.\" " +
                                "Kindly assist me with activating my training status so I can access and print my letter. Thank you."
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
            _callCatchError(() => _verifyStudentRegistrationCallback(formData));
            _btnDisable("proceedBtn", btnText, false);
        } else {
            _hideLoader();
        }
    }
}

//// Print Acceptance Letter ////
function _printAcceptanceLetter() {
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

    _printAcceptanceLetterCallback(formData);
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _printAcceptanceLetter());
  }
}

/// Proceed OTP Verification Callback ////
function _printAcceptanceLetterCallback(formData) {
  let studentVerificationDataSession = JSON.parse(
    localStorage.getItem("studentVerificationDataSession")
  );

  const studentId = studentVerificationDataSession?.studentId;
  try { 
    btnText = $("#printBtn").html();
    _btnDisable("printBtn", btnText, true);

    //// call endpoint //////
    _callRawEndPoints({
      url: `registration/print-acceptance-letter?studentId=${studentId}`,
      formData,
    })
     .then((response) => {
      _btnDisable("printBtn", btnText, false);
      localStorage.setItem("printAcceptanceLetterSession", JSON.stringify(response?.data));
      _showLoader("OTP Verified Successfully!. Please wait...");
      
      // Remove OTP Session
      localStorage.removeItem("studentVerificationDataSession");
      window.location.replace(studentAcceptanceLetterUrl);
    })
    .catch((error) => {
      console.error("Error:", error);
      if (error.status==0) {
        _callAjaxError(() => _printAcceptanceLetterCallback(formData), error.message); // retry if needed
        _btnDisable("printBtn", btnText, false);
      } else {
        _showCustomConfirm({
          title: "Invalid OTP!",
          message: error.message,
          alertType: "error",
          trueActionBtnText: "OK",
          closeOnOverlayClick: true,
        });
        _btnDisable("printBtn", btnText, false);
      }
    });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _printAcceptanceLetterCallback(formData));
  }
}