function _getActiveStudentPage(props) {
  const { page = "", divid = "", pageContainer = "getStudentDetails" } = props;
  _getStudentPagesActiveLink(divid);
  if (page) {
    _getPage({
      page: page,
      pageContainer: pageContainer,
      url: trainingAdminPortalMiddlewareUrl,
    });
  }
}
function _getStudentPagesActiveLink(divid) {
  $("#studentProfileDetails").removeClass("active");
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