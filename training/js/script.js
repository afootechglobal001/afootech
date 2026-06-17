function _open_menu(){
	$('.sidenavdiv, .sidenavdiv-in').animate({'margin-left':'0'},200);
	$('.live-chat-back-div').animate({'margin-left':'-100%'},400);
	$('.index-menu-back-div').animate({'margin-left':'0'},400);
}
function _open_live_chat(){
	$('.sidenavdiv, .sidenavdiv-in').animate({'margin-left':'0'},200);
	$('.index-menu-back-div').animate({'margin-left':'-100%'},400);
	$('.live-chat-back-div').animate({'margin-left':'0'},400);
}
function _close_side_nav(){
	$('.sidenavdiv, .sidenavdiv-in').animate({'margin-left':'-100%'},200);
	$('.index-menu-back-div,.live-chat-back-div').animate({'margin-left':'-100%'},400);
}

function _open_li(ids){
	$('#'+ids+'-sub-li').toggle('slow');
}

function alert_close(){
	$('#get-more-div').html('').fadeOut(200);
}

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