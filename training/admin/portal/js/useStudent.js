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