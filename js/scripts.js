function _call_carousel(cnt) {
	// INIT CAROUSEL
	window["carousel_" + cnt] = new CgCarousel(
	  "#js-carousel_" + cnt,
	  window["carousel_options_" + cnt],
	  {}
	);
	// Navigation
	window["next_" + cnt] = document.getElementById("js-carousel__next_" + cnt);
	window["next_" + cnt].addEventListener("click", () =>
	  window["carousel_" + cnt].next()
	);
	window["prev_" + cnt] = document.getElementById("js-carousel__prev_" + cnt);
	window["prev_" + cnt].addEventListener("click", () =>
	  window["carousel_" + cnt].prev()
	);
  }


$(window).scroll(function () {
	const scrollHeight = $(window).scrollTop();
	const windowWidth = $(window).width();

    if (scrollHeight >= 100) {
        $("header").addClass("fixed").removeClass("absolute");
        $(".header-div-in").addClass("border");
        $("#back2Top").fadeIn(1000);
    } else {
        $("header").addClass("absolute").removeClass("fixed");
        $(".header-div-in").removeClass("border");
        $("#back2Top").fadeOut(1000);
    }

	if (windowWidth <= 870) {
		$(".sticky-div").css({
		position: "relative",
		top: "0",
		height: "auto",
		overflow: "visible",
		});
	} else {
		if (scrollHeight >= 700) {
		$(".sticky-div").css({
			position: "sticky",
			top: "140px",
			"min-height": "280px",
			overflow: "auto",
		});
		} else {
		$(".sticky-div").css({
			position: "relative",
			top: "0",
			height: "auto",
			overflow: "auto",
		});
		}
	}
});
  

function _back_to_top(){
	event.preventDefault();
	$("html, body").animate({ scrollTop: 0 }, "slow");
	return false;
}

let currentIndex = 0;
function _viewPreviewImage(divid) {
    const images = $("#fetchPagePictures .each-img-div");
    currentIndex = images.index($("#" + divid));
    images.removeClass("active");
    const current = $("#" + divid);
    current.addClass("active");
    const src = current.find("img").attr("src");

    $("#galleryMainImage")
        .stop(true, true)
        .fadeOut(150, function () {
            $(this).attr("src", src).fadeIn(150);
        });

    // Automatically scroll thumbnail into view
    current[0].scrollIntoView({
        behavior: "smooth",
        inline: "center",
        block: "nearest"
    });
}

function _navigateGallery(direction) {
    const images = $("#fetchPagePictures .each-img-div");
    currentIndex += direction;

    if (currentIndex < 0) {
        currentIndex = images.length - 1;
    }
    if (currentIndex >= images.length) {
        currentIndex = 0;
    }
  	_viewPreviewImage(images.eq(currentIndex).attr("id"));
}

function _initializeGallery() {
    const firstImage = $("#fetchPagePictures .each-img-div:first");
    if (!firstImage.length) return;
    _viewPreviewImage(firstImage.attr("id"));
}

///// for FAQs
function _collapse(div_id) {
  const $currentFaq = $("#" + div_id);
  const $currentIcon = $("#" + div_id + "num");
  const $currentAnswer = $("#" + div_id + "answer");

  $(".faq-toggle.active-faq").each(function () {
    if (this.id !== div_id) {
      $(this).removeClass("active-faq");
      $(this).find(".expand-div").html('&nbsp;<i class="bi-plus"></i>&nbsp;');
      $(this).find(".answer-div").slideUp("slow");
    }
  });

  const isActive = $currentFaq.toggleClass("active-faq").hasClass("active-faq");
  $currentIcon.html(
    isActive
      ? '&nbsp;<i class="bi-dash"></i>&nbsp;'
      : '&nbsp;<i class="bi-plus"></i>&nbsp;',
  );
  $currentAnswer.slideToggle("slow");
}


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

function _progressBar(){
	document.addEventListener('DOMContentLoaded', () => {
		const progressBars = document.querySelectorAll('.progress-per');
	
		const animateProgressBar = (entry) => {
			const progressBar = entry.target;
			if (!progressBar.classList.contains('animated')) {
				const value = progressBar.dataset.text;
				progressBar.style.width = `${value}%`; // Animate width
				progressBar.classList.add('animated');
			}
		};
	
		const observer = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					animateProgressBar(entry);
				}
			});
		}, { threshold: 0.5 }); // Adjust threshold as needed
	
		progressBars.forEach(bar => {
			observer.observe(bar);
		});
	});
}

function _getActiveCcontactLink(text) {
	$('#next-usa, #next-nigeria').removeClass('active-btn');
	$('#next-'+text).addClass('active-btn');
}

function _nextContactPage(nextId, text) {
	_getActiveCcontactLink(text);
	$("#nigeriaHideDiv, #usaHideDiv").hide();
	$("#" + nextId).fadeIn(1000);
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////