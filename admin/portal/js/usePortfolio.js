/// Get Select Project Stages ///
function _getSelectProjectStages(fieldId) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `preset-data/fetch-project-stages?statusId=1`,
			accessKey: true,
		})
		.then((response) => {
			for (let i = 0; i < response.data.length; i++) {
				const id = response.data[i].projectStageId;
				const value = response.data[i].projectStageName;
				$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\');">'+ value +'</li>');
			}				
		 })
		.catch((error) => {
			_staffValidationCheck(error.response);
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
		_actionAlert('An unexpected error occurred. Please try again.', false);
  	}
}

/// Get Select Project Categories ///
function _getSelectProjectCategories(fieldId) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/settings/project-category/fetch-project-category?statusId=1`,
			accessKey: true,
		})
		.then((response) => {
			for (let i = 0; i < response.data.length; i++) {
				const id = response.data[i].projectCategoryId;
				const value = response.data[i].projectCategoryName;
				$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\');">'+ value +'</li>');
			}				
		 })
		.catch((error) => {
			_staffValidationCheck(error.response);
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
		_actionAlert('An unexpected error occurred. Please try again.', false);
  	}
}

/// Fetch Portfolio Data ///
function _fetchPortfolioData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/pages/fetch-page?pageCategory=PORTFOLIO`,
			accessKey: true,
		})
		.then((response) => {
            _initFetchPortfolioData(response?.data);
		})
		.catch((error) => {
			_staffValidationCheck(error.response);
			console.error("Error:", error);
			if (error.status==0) {
				_showEmptyState({
					container: "portfolioPageContent",
					message: "Check your internet connection and try again",
					paginationContainer: "portfolioContentPaginationControls",
				});
				_callAjaxError(() => _fetchPortfolioData(), error.message); // retry if needed
			} else {
				_showEmptyState({
					container: "portfolioPageContent",
					message: error.message,
					button: `
						<button class="btn" title="ADD NEW PORTFOLIO" onclick="sessionStorage.removeItem('useEachPageSession'); _getForm({page: 'editPagesForm', pageCategory: 'PORTFOLIO', url: adminPortalMiddlewareUrl});">
							<i class="bi-plus-square"></i> ADD NEW PORTFOLIO
						</button>
					`,
					paginationContainer: "portfolioContentPaginationControls",
				});
			}
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchPortfolioData());
  	}
}

/// Initialize Portfolio Data ///
function _renderPortfolioData(data) {
  return data.map((item) => `
  	<div class="grid-div">
		<div class="status-div ${item.projectStageData?.projectStageName}">${item.projectStageData?.projectStageName}</div>
		<div class="img-div">
			<img src="${portfolioPixPath}/${item.seoFlyer}?t=${Date.now()}" alt="${item.pageTitle}" />
		</div>
		<div class="text-div">
			<div class="text-in">
				<div class="text">UPDATED ON: <span>${_fetchFormatDate(item.updatedTime)}</span></div>
				<div class="other-status ${item.statusData?.statusName}">${item.statusData?.statusName}</div>
			</div>
			<h2 title="${item.pageTitle}" onclick="_fetchEachPageContent('${item.pageCategory}', '${item.pageId}');">${item.pageTitle}</h2>
			<p>${item.seoDescription}</p>  
			<div class="bottom-content">
				<div class="category"><span>${item.projectCategoryData?.projectCategoryName}</span></div>
				<div class="location"><i class="bi bi-geo-alt"></i> <span>${item.location}</span></div>
			</div>
		</div>
	</div>`).join("");
}

//// Initialize Portfolio Data Pagination ////
function _initFetchPortfolioData(data) {
  const paginator = new Paginator(
    data,
    _renderPortfolioData,
    "portfolioContentPaginationControls",
    "portfolioPageContent",
    8
  );
  __paginatorHandlers["portfolioContentPaginationControls"] = paginator;
  paginator.renderPage();
}

//// Filter Portfolio Data ////
function _filtersPortfolio(value) {
  $("#portfolioPageContent .grid-div").each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(value.toLowerCase()) > -1
      ? $(this).show()
      : $(this).hide();
  });
}