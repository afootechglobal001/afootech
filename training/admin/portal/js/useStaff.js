function _getActiveStaffPage(props) {
  const { page = "", divid = "", pageContainer = "getStaffDetails" } = props;
  _getStaffPagesActiveLink(divid);
  if (page) {
    _getPage({
      page: page,
      pageContainer: pageContainer,
      url: trainingAdminPortalMiddlewareUrl,
    });
  }
}
function _getStaffPagesActiveLink(divid) {
  $("#staffProfileDetails").removeClass("active");
  $("#" + divid).addClass("active");
}

function _filtersStaffs(value) {
  $("#staffContent .tb-row").each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(value.toLowerCase()) > -1
      ? $(this).show()
      : $(this).hide();
  });
}