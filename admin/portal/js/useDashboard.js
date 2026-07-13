function _getActivePage(props) {
  const { page = "", divid = "", nav = "" } = props;
  _getActiveLink(divid);
  if (page) {
    sessionStorage.setItem("currentDashboardPage", page);
    _getPage({ page: page, url: adminPortalMiddlewareUrl });
  }
}

function _getActiveLink(divid) {
  _removeClass();
  $("#" + divid).addClass("active-li");
}

function _removeClass() {
  $(
    "#dashboard, #topDashboard, #adminPage, #servicePage, #portfolioPage, #projectPage, #blogPage, #faqPage, #reviewPage, #settingsPage",
  ).removeClass("active-li");
}

function _open_li(ids) {
  $("#" + ids + "-sub-li").toggle("slow");
}

function _toggleProfileDiv() {
  $(".toggle").toggle("slow");
}

function _closeProfileDiv(event) {
  if (!$(event.target).closest(".toggle, .right-icon-div").length) {
    $(".toggle").hide("slow");
  }
}
$(document).on("click", _closeProfileDiv);

function select_search() {
  $(".srch-select").toggle("fast");
}

function srch_custom(text) {
  $("#srch-text").html(text);
  $(".custom-srch-div").fadeIn(500);
}

function _closeSearchDiv(event) {
  if (!$(event.target).closest(".srch-select, .text-right").length) {
    $(".srch-select").hide("slow");
  }
}
$(document).on("click", _closeSearchDiv);

function _chevronCollapse(divId) {
  var x = document.getElementById(divId + "num");
  var titleDiv = x.closest(".pages-toggle-title");

  if (x.innerHTML === '&nbsp;<i class="bi-plus"></i>&nbsp;') {
    x.innerHTML = '&nbsp;<i class="bi-dash"></i>&nbsp;';
    $("#" + divId + "answer").addClass("active-li");
    $(titleDiv).addClass("active-toggle");
  } else {
    x.innerHTML = '&nbsp;<i class="bi-plus"></i>&nbsp;';
    $(titleDiv).removeClass("active-toggle");
  }

  $("#" + divId + "answer").slideToggle("slow");
}

function _logOut() {
  sessionStorage.clear();
  localStorage.clear();
  window.parent.location.href = adminUrl;
}

function _confirmLogOut() {
  _showCustomConfirm({
    callback: () => {
      _logOut();
    },
    title: "Confirm Logout Action!",
    message:
      "Are you sure you want to log out? You may miss important notifications or updates until you sign in again.",
    alertType: "warning",
    falseActionBtn: true,
    closeOnOverlayClick: true,
  });
}

function _staffValidationCheck(code) {
  if (code === 401 || code === 403) {
    _logOut();
    return;
  }
}

function _userRoleCheck(){
	$('.switch input').on('change', function () {
		const label = $(this).next().next(); // Grab the toggle-label span
		label.text($(this).prop('checked') ? 'Yes' : 'No');
	});
}

//// Get Status Preset Data ////
function _getSelectStatusId(fieldId, statusIds) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `preset-data/fetch-status?statusId=${statusIds}`,
      accessKey: true,
		})
        .then((response) => {
            $("#searchList_" + fieldId).html("");
			for (let i = 0; i < response.data.length; i++) {
				const id = response.data[i].statusId;
        const value = response.data[i].statusName;
                
				$("#searchList_" + fieldId).append(`
          <li onclick="
            _clickOption(
              'searchList_${fieldId}',
              '${id}',
              '${value}'
            );
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


function _fetchDashboardStatistics() {
		try {
			//// call endpoint //////
			_callFetchEndPoints({
				url: `admin/dashboard/dashboad-statistics`,
        accessKey: true,
			})
			.then((response) => {
        _staffValidationCheck(response.response);
					const data = response?.data[0];

					const totalActiveStaffCount = data.totalActiveStaffCount;
					const totalActiveServiceCount = data.totalActiveServiceCount;
					const totalActivePortfolioCount = data.totalActivePortfolioCount;
					const totalActiveBlogCount = data.totalActiveBlogCount;
					const totalActiveFaqCount = data.totalActiveFaqCount;
					const totalActiveReviewCount = data.totalActiveReviewCount;

					$('#totalActiveStaffCount').html(totalActiveStaffCount);
					$('#totalActiveServiceCount').html(totalActiveServiceCount);
					$('#totalActivePortfolioCount').html(totalActivePortfolioCount);
					$('#totalActiveBlogCount').html(totalActiveBlogCount);
					$('#totalActiveFaqCount, #sideFaqCount').html(totalActiveFaqCount);
          $('#totalActiveReviewCount').html(totalActiveReviewCount);
			})
			.catch((error) => {
				console.error("Error:", error);
			});
		} catch (error) {
			console.error("Error:", error);
		}
}