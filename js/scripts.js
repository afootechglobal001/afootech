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
	var scrollheight = $(window).scrollTop();
  
	// Toggle header class based on scroll position
	if (scrollheight >= 100) {
	  $("header").addClass("fixed").removeClass("absolute");
	  $(".header-div-in").addClass("border");
	  $("#back2Top").fadeIn(1000);
	} else {
	  $("header").addClass("absolute").removeClass("fixed");
	  $(".header-div-in").removeClass("border");
	  $("#back2Top").fadeOut(1000);
	}
  });
  

function _back_to_top(){
	event.preventDefault();
	$("html, body").animate({ scrollTop: 0 }, "slow");
	return false;
}


function _collapse(div_id) {
    // Get the currently clicked FAQ element
    const currentFaq = document.getElementById(div_id);
    const currentIcon = document.getElementById(div_id + "num");
    const currentAnswer = document.getElementById(div_id + "answer");

    // Get all FAQ elements
    const allFaqs = document.querySelectorAll('.faq-toggle');

    allFaqs.forEach(faq => {
        // Close all other FAQs
        if (faq.id !== div_id) {
            const icon = document.getElementById(faq.id + "num");
            const answer = document.getElementById(faq.id + "answer");
            faq.classList.remove('active-faq');
            icon.innerHTML = '&nbsp;<i class="bi-plus"></i>&nbsp;';
            $(answer).slideUp('slow');
        }
    });

    // Toggle the current FAQ
    const isActive = currentFaq.classList.toggle('active-faq');
    currentIcon.innerHTML = isActive ? '&nbsp;<i class="bi-dash"></i>&nbsp;' : '&nbsp;<i class="bi-plus"></i>&nbsp;';
    $(currentAnswer).slideToggle('slow');
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

function alert_close(){
	$('#get-more-div').html('').fadeOut(200);
}

function _actionAlert(message,status){
	let text = '';
	$('.all-alert-back-div').html(text).css('display', 'flex');
	if(status==true){
		text +=
		'<div class="success-alert-div animated fadeInDown">' +
			'<div class="icon"><i class="bi-check-all"></i></div>'+
			'<div class="text"><p>'+message+'</p></div>'+
		'</div>';
	}else{
		text +=
		'<div class="failed-alert-div animated fadeInDown">' +
			'<div class="icon"><i class="bi-exclamation-octagon-fill"></i></div>'+
			'<div class="text"><p>'+message+'</p></div>'+
		'</div>';
	}
	$('.all-alert-back-div').html(text).fadeIn(500).delay(3000).fadeOut(100);
}


function isNumber_Check(textID) {
	var e = window.event;
	var key = e.keyCode && e.which;
  
	if (!((key >= 48 && key <= 57) || key == 43 || key == 45)) {
	  if (e.preventDefault) {
		e.preventDefault();
		$('#'+textID).val('');
	  } else {
		e.returnValue = false;
	  }
	} else {
		$('#'+textID).val('');
	}
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




 
function _get_form(page){
	$('#get-more-div').html('<div class="ajax-loader"><img src="'+websiteUrl+'/all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
		var action='get-form';
		var dataString ='action='+ action+'&page='+ page;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){$('#get-more-div').html(html);}
	});
}
function _selectOption(selectBoxId) {
    
    if ($('#searchPanel_'+selectBoxId).is(":visible")) {
        $('#searchPanel_'+selectBoxId).css('display', 'none');
        $('#'+selectBoxId).css('opacity', '1');
    } else {
        $('#'+selectBoxId).css('opacity', '0');
        $('#searchPanel_'+selectBoxId).css('display', 'flex');
        $('#txtSearchValue_'+selectBoxId).focus();
    }
}

    function filter(selectBoxId) {
        var valThis = $('#txtSearchValue_'+selectBoxId).val();
        $('#searchList_'+selectBoxId+' > li').each(function() {
            var text = $(this).text();
            (text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show(): $(this).hide();
        });
    };

   function _clickOption(selectedOption, id, value) {
        selectBoxId = selectedOption.replace("searchList_", "");
        // Clear previous options and set the selected one
        $('#'+selectBoxId).html(`<option selected="selected" value="${id}">${value}</option>`);
        _selectOption(selectBoxId);
    };
    
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function _get_parent_type(select_id,parent_type_id){
	var dataString = "parent_type_id=" + parent_type_id;
	$.ajax({
		type: "POST",
		url: endPoint + '/setups/parent-type',
		data: dataString,
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function(info){
			var success = info.success;
			var message = info.message;
			var fetch = info.data;
  
			if (success == true) {
				for (var i = 0; i < fetch.length; i++) {
				  var id = fetch[i].parent_type_id;
				  var value = fetch[i].parent_type_name;
				  $('#'+ select_id).append('<li onclick="_clickOption(\'' + select_id + '\', \'' + id + '\', \'' + value + '\')">'+ value +'</li>');
				}
			}else{
				_actionAlert(message,false);
		  	}
		}, 
	});
  }
