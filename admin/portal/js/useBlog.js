/// Fetch Blog Data ///
function _fetchBlogData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/pages/fetch-page?pageCategory=BLOG`,
			accessKey: true,
		})
		.then((response) => {
            _initFetchBlogData(response.data);
		 })
		.catch((error) => {
			_staffValidationCheck(error.response);
			console.error("Error:", error);
			if (error.status==0) {
				_showEmptyState({
					container: "blogPageContent",
					message: "Check your internet connection and try again",
					paginationContainer: "blogContentPaginationControls",
				});
				_callAjaxError(() => _fetchBlogData(), error.message); // retry if needed
			} else {
				_showEmptyState({
					container: "blogPageContent",
					message: error.message,
					button: `
						<button class="btn" title="ADD NEW BLOG" onclick="sessionStorage.removeItem('useEachBlogSession'); _getForm({page: 'blogReg', url: adminPortalLocalUrl});">
							<i class="bi-plus-square"></i> ADD NEW BLOG
						</button>
					`,
					paginationContainer: "blogContentPaginationControls",
				});
			}
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchBlogData());
  	}
}

/// Initialize Blog Data ///
function _renderBlogData(data) {
  return data.map((item) => `
  	<div class="grid-div">
		<div class="status-div ${item.statusData?.statusName}">${item.statusData?.statusName}</div>
		<div class="img-div">
			<img src="${blogPixPath}/${item.seoFlyer}?t=${Date.now()}" alt="${item.pageTitle}" />
		</div>

		<div class="text-div">
			<div class="text-in">
				<div class="text">UPDATED ON: <span>${_fetchFormatDate(item.updatedTime)}</span></div>
			</div>
			<h2 title="Edit Blog Post" onclick="_fetchEachPageContent('${item.pageCategory}', '${item.pageId}');">${item.pageTitle}</h2>
			<p>${item.seoDescription}</p>  
			<div class="bottom-content">
				<div class="category"><span>${item.categoryData?.categoryName}</span></div>
			</div>
		</div>
	</div>`).join("");
}

//// Initialize Blog Data Pagination ////
function _initFetchBlogData(data) {
  const paginator = new Paginator(
    data,
    _renderBlogData,
    "blogContentPaginationControls",
    "blogPageContent",
    8
  );
  __paginatorHandlers["blogContentPaginationControls"] = paginator;
  paginator.renderPage();
}

//// Filter Blog Data ////
function _filtersBlog(value) {
  $("#blogPageContent .grid-div").each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(value.toLowerCase()) > -1
      ? $(this).show()
      : $(this).hide();
  });
}