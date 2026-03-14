/// Fetch Index Blog ///
function _fetchIndexBlogData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/fetch-blog?page=index`,
		})
		.then((response) => {
            _initFetchIndexBlogData(response.data);
		 })
		 .catch((error) => {
			console.error("Error:", error);
			if (error.status==0) {
				$('#indexBlogPageContent').html(`
				<div class="false-notification-div">
					<p>Check your internet connection and try again</p>
				</div>
			`);
			} else {
				$('#indexBlogPageContent').html(`
					<div class="false-notification-div">
						<p>${error.message}</p>
					</div>
				`);
			}
		});
	} catch (error) {
		console.error("Error:", error);
  	}
}

/// Initialize Fetch Index Blog ///
function _initFetchIndexBlogData(data) {
	const content = data.map((item) => {
    return `
      	<div class="blog-div" data-aos="fade-in" data-aos-duration="1000">
			<div class="blog-inner-div">
				<div class="image-div">
					<img src="${blogPixPath}/${item?.blogPix}" alt="${item.blogTitle}" />
				</div>

				<div class="text-div">
					<div class="count"><i class="bi-calendar3"></i> ${_formatDate(item?.updatedTime)} <span>|</span> <i class="bi-eye-fill"></i> ${item.viewCount} VIEWS</div>
					<h3>${item.blogTitle}</h3>

					<a href="${websiteUrl}/blog/${item.pageUrl}" title="${item.blogTitle}">
						<button class="btn">Read More <i class="bi-chevron-right"></i></button></a>
				</div>
			</div>
		</div>
    `;
  }).join("");

  $('#indexBlogPageContent').html(content);
}

/// Fetch Page Blog ///
function _fetchPageBlogData(categoryId = '') {
	$('#pageBlogContent').html(`
      <div class="content-loading-div">
        <img src="${websiteUrl}/all-images/images/spinner.gif" alt="Loading..." />
      </div>
    `).fadeIn("fast");
	
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/fetch-blog?page=blog&categoryId=${categoryId || ''}`,
		})
		.then((response) => {
            _initFetchPageBlogData(response.data);
		 })
		.catch((error) => {
			console.error("Error:", error);
			$('#pageBlogContent').html(`
				<div class="false-notification-div">
					 <p>${error.message}</p>
				</div>
			`);
		});
	} catch (error) {
		console.error("Error:", error);
  	}
}

/// Initialize Fetch Page Blog ///
function _initFetchPageBlogData(data) {
	const content = data.map((item) => {
    return `
		<div class="main-blog-div">
		<a href="${websiteUrl}/blog/${item.pageUrl}" title="${item.blogTitle}">
			<div class="top-text">${item.categoryData.categoryName}</div>
			<div class="image-div">
				<img src="${blogPixPath}/${item?.blogPix}" alt="${item.blogTitle}" />
			</div>
			
			<div class="text-content-div">
				<div class="count"><i class="bi-calendar3"></i> ${_formatDate(item?.updatedTime)} <span> | </span> <i class="bi-eye"></i> ${item.viewCount} VIEWS</div>
				<h2>${item.blogTitle}</h2>
				<p>${item.seoDescription}</p>
				
				<div>
					<button class="btn" title="Read More">Read More <i class="bi-arrow-right"></i></button>
				</div>
			</div></a>
		</div>
    `;
  }).join("");

  $('#pageBlogContent').html(content);
}

/// Fetch Related Blog ///
function _fetchRelatedBlogData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/fetch-blog?page=blog`,
		})
		.then((response) => {
            _initFetchRelatedBlogData(response.data);
		})
		.catch((error) => {
			console.error("Error:", error);
			if (error.status==0) {
				$('#relatedBlogContent').html(`
				<div class="false-notification-div">
					<p>Check your internet connection and try again</p>
				</div>
			`);
			} else {
				$('#relatedBlogContent').html(`
					<div class="false-notification-div">
						<p>${error.message}</p>
					</div>
				`);
			}
		});
	} catch (error) {
		console.error("Error:", error);
  	}
}

/// Initialize Fetch Page Blog ///
function _initFetchRelatedBlogData(data) {
	const content = data.map((item) => {
    return `
	<div class="blog-div">
		<div class="blog-inner-div">
			<div class="image-div">
				<img src="${blogPixPath}/${item?.blogPix}" alt="${item.blogTitle}" />
			</div>

			<div class="text-div">
				<div class="count"><i class="bi-calendar3"></i> ${_formatDate(item?.updatedTime)} <span>|</span> <i class="bi-eye-fill"></i> ${item.viewCount} VIEWS</div>
				<h3>${item.blogTitle}</h3>

				<a href="${websiteUrl}/blog/${item.pageUrl}" title="${item.blogTitle}">
					<button class="btn" title="Read More">Read More <i class="bi-chevron-right"></i></button></a>
			</div>
		</div>
	</div>
    `;
  }).join("");

  $('#relatedBlogContent').html(content);
}

/// Filter Blog Page///
function _filterSiteBlog(value) {
  $("#pageBlogContent .main-blog-div").each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(value.toLowerCase()) > -1
      ? $(this).show()
      : $(this).hide();
  });
}

/// Fetch Blog Information Categories /// 
function _fetchBlogCategories() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/fetch-informative-categories`,
		})
		.then((response) => {
			let text = '';
			for (let i = 0; i < response.data.length; i++) {
				const id = response.data[i].categoryId;
				const value = response.data[i].categoryName;
				text += `<li title="${value}" onclick="_fetchPageBlogData('${id}');">${value}</li>`;
			}
			$('#catId').html(text);
		 })
		.catch((error) => {
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
  	}
}

/// Fetch Blog Detail Page ///
function _fetchBlogPagesContent(publishId) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/pages/fetch-page?publishId=${publishId}`,
		})
		.then((response) => {
			const data = response.data;

			const pageTitle = data.pageTitle;
			const seoDescription = data.seoDescription;
			const pageContent = data.pageContent;
			const pageUrl = data.pageUrl;
			const seoFlyer = data.seoFlyer;
			const updatedBy = data.updatedBy?.fullname ?? data.createdBy?.fullname;
			const viewCount = data.viewCount;
			const updatedTime = _formatDate(data.updatedTime);

			$('#pageTitle, #topNavTitle').html(pageTitle);
			$('#seoDescription').html(seoDescription);
			$('#pageContentInfo').html(pageContent);
			$('#viewCount').html(viewCount);
			$('#updatedTime').html(updatedTime);
			$('#updatedBy').html(updatedBy);
			$('#blogFetchPix').attr('src', (seoFlyerPixPath) + '/' + seoFlyer);
			$('#blogTitleLink').attr('href', websiteUrl + '/blog/' + pageUrl);
		})
		.catch((error) => {
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
	}
}

/// Fetch Detail Page Related Blog ///
function _fetchDetailsPageRelatedBlogData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/fetch-blog?page=index`,
		})
		.then((response) => {
            _initFetchDetailsPageRelatedBlogData(response.data);
		})
		.catch((error) => {
			console.error("Error:", error);
			$('#fetchDetailPageRelatedBlogs').html(`
				<div class="false-notification-div">
					<p>${error.message}</p>
				</div>
			`);
		});
	} catch (error) {
		console.error("Error:", error);
  	}
}

/// Initialize Fetch Detail Page Blog ///
function _initFetchDetailsPageRelatedBlogData(data) {
	const content = data.map((item) => {
    return `
		<a href="${websiteUrl}/blog/${item.pageUrl}" title="${item.blogTitle}">
		<div class="related-post">
			<div class="image-div">
				<img src="${blogPixPath}/${item?.blogPix}" alt="${item.blogTitle}" />
			</div>

			<div class="cont-div">
				<h3>${item.blogTitle.substr(0, 90)}...</h3> 
				<div class="comment"><i class="bi-clock"></i> <span> ${_formatDate(item?.updatedTime)} </span> | <i class="bi-eye-fill"></i> <span> ${item.viewCount} Views </span></div>
			</div>
		</div></a>
    `;
  }).join("");

  $('#fetchDetailPageRelatedBlogs').html(content);
}