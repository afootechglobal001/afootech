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
