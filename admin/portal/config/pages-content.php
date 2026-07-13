<?php if ($page == 'editPagesForm') { ?>
    <div class="pages-creation-panel" data-aos="fade-left" data-aos-duration="900">
        <div class="pages-content-div">
            <div class="title-div">
                <ul>
                    <?php if ($pageCategory == 'SERVICE') { ?>
                        <li class="active-li" title="PAGE CONTENT" id="pageContent" onclick="_getActivePagesTab({divid: 'pageContent', page: 'pageContent', pageCategory: 'SERVICE', url: adminPortalMiddlewareUrl});">PAGE CONTENT</li>
                        <li title="UPLOAD PICTURE" id="picturePage" onclick="_getActivePagesTab({divid:'picturePage', page: 'picturePage', pageCategory: 'SERVICE', url: adminPortalMiddlewareUrl});">UPLOAD PICTURE</li>
                    <?php } ?>

                    <?php if ($pageCategory == 'PORTFOLIO') { ?>
                        <li class="active-li" title="PAGE CONTENT" id="pageContent" onclick="_getActivePagesTab({divid: 'pageContent', page: 'pageContent', pageCategory: 'PORTFOLIO', url: adminPortalMiddlewareUrl});">PAGE CONTENT</li>
                        <li title="UPLOAD PICTURE" id="picturePage" onclick="_getActivePagesTab({divid:'picturePage', page: 'picturePage', pageCategory: 'PORTFOLIO', url: adminPortalMiddlewareUrl});">UPLOAD PICTURE</li>   
                    <?php } ?>

                    <?php if ($pageCategory == 'BLOG') { ?>
                        <li class="active-li" title="PAGE CONTENT" id="pageContent" onclick="_getActivePagesTab({divid: 'pageContent', page: 'pageContent', pageCategory: 'BLOG', url: adminPortalMiddlewareUrl});">PAGE CONTENT</li> 
                        <li title="UPLOAD PICTURE" id="picturePage" onclick="_getActivePagesTab({divid:'picturePage', page: 'picturePage', pageCategory: 'BLOG', url: adminPortalMiddlewareUrl});">UPLOAD PICTURE</li>
                    <?php } ?>
                </ul>

                <div class="btn-div">
                    <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                        <i class="bi bi-x-lg"></i> Close
                    </button>
                </div>
            </div>

            <div class="pages-back-div">
                <div id="getPagesDetails">
                    <?php
                        $page = 'pageContent';
                        include 'page-details.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>