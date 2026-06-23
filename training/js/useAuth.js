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

    /// Get all the textfield Object ///
    const studentCompleteBioDataSession = {
      firstName,
      lastName,
      emailAddress,
      phoneNumber,
    };

    /// Set the student data in session ///
    localStorage.setItem(
      "studentCompleteBioDataSession",
      JSON.stringify(studentCompleteBioDataSession)
    );

    _getNextPage({page: 'institutionDetailsPage'});
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _proceedStudentBioData()); 
  }
}

function _setInputValues() {
  let studentCompleteBioDataSession = localStorage.getItem("studentCompleteBioDataSession");
  
  if (studentCompleteBioDataSession) {
    studentCompleteBioDataSession = JSON.parse(studentCompleteBioDataSession);
    $("#firstName").val(studentCompleteBioDataSession.firstName);
    $("#lastName").val(studentCompleteBioDataSession.lastName);
    $("#emailAddress").val(studentCompleteBioDataSession.emailAddress);
    $("#phoneNumber").val(studentCompleteBioDataSession.phoneNumber);
  }
}










function _completeRegistration() {
  _showCustomConfirm({
    title: "Registration Successful!",
    message: 'Registration Successful!, Kindly Check your email for acknowlegdement letter.',
    alertType: "success",
    trueActionBtnText: "OK",
    closeOnOverlayClick: true,
  });
}