<?php if ($page == 'dashboard') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi bi-speedometer2"></i></div>
            </div>
            <div class="text-div">
               <h2>Welcome Back, <span id="DashFullname">
                    <script>
                        $("#DashFullname").html(capitalizeFirstLetterOfEachWord(staffLoginData.firstName));
                    </script>
                </span>!</h2>
                <p>Welcome to your dashboard, where you can oversee all your activities, tasks, progress, and updates—helping you stay organized and on track</p>
            </div>
        </div>

        <div class="dashboard-right-wrapper">
            <div>
                <p><span><i class="bi-clock"></i> Last Login Date </span></p>
            </div>
            <div><strong id="lastLoginTime">
                    <script>
                        $("#lastLoginTime").html(staffLoginData.lastLoginTime);
                    </script>
                </strong></div>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="dashboard-wrapper">
            <div class="left-container">
                <div class="statistics-back-div">
                    <div class="statistics-div" id="adminPage" title="Administrators" onclick="_getActivePage({page:'adminPage', divid:'adminPage'});">
                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>Administrators</p>
                                <span>Total Administrators</span>
                                <h2 id="totalActiveStaffCount">0</h2>
                            </div>
                            <div class="statistics-icon pending">
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                    </div>

                    <div class="statistics-div" id="servicePage" title="Services" onclick="_getActivePage({page:'servicePage', divid:'servicePage'});">
                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>Services</p>
                                <span>Total Construction Services</span>
                                <h2 id="totalActiveServiceCount">0</h2>
                            </div>
                            <div class="statistics-icon upcoming">
                            <i class="bi bi-stack"></i>
                            </div>
                        </div>
                    </div>

                    <div class="statistics-div" id="portfolioPage" title="Portfolio" onclick="_getActivePage({page:'portfolioPage', divid:'portfolioPage'});">
                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>Portfolio</p>
                                <span>Completed Portfolio Items</span>
                                <h2 id="totalActivePortfolioCount">0</h2>
                            </div>
                            <div class="statistics-icon pending">
                                <i class="bi bi-images"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="statistics-div" id="blogsPage" title="Blog" onclick="_getActivePage({page:'blogPage', divid:'blogPage'});">
                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>Blog</p>
                                <span>Published Articles</span>
                                <h2 id="totalActiveBlogCount">0</h2>
                            </div>
                            <div class="statistics-icon upcoming">
                                <i class="bi bi-journal-text"></i>
                            </div>
                        </div>
                    </div>

                    <div class="statistics-div" id="faqPage" title="Frequently Asked Questions" onclick="_getActivePage({page:'faqPage', divid:'faqPage'});">
                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>FAQ</p>
                                <span> Frequently Asked Questions (FAQs)</span>
                                <h2 id="totalActiveFaqCount">0</h2>
                            </div>
                            <div class="statistics-icon pending">
                                <i class="bi bi-patch-question"></i>
                            </div>
                        </div>
                    </div>

                    <div class="statistics-div" id="reviewPage" title="Reviews" onclick="_getActivePage({page:'reviewPage', divid:'reviewPage'});">
                        <div class="statistics-inner-div">
                            <div class="statistics-text">
                                <p>Review</p>
                                <span> Reviews</span>
                                <h2 id="totalActiveReviewCount">0</h2>
                            </div>
                            <div class="statistics-icon completed">
                                <i class="bi bi-chat-text"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="right-container">
                <div class="recent-review-wrapper">
                    <div class="main-content-div dash-main-content-div" data-aos="fade-in" data-aos-duration="1500">
                        <div class="tables-content-div dash-table-content-div">
                            <div class="content-title">
                                <div class="title">
                                    <i class="bi bi-chat-text"></i>
                                    <p>Recent Pending Reviews</p>
                                </div>

                                <button class="btn btn-view" title="View All" onclick="_getActivePage({page:'reviewPage', divid:'reviewPage'});">
                                    VIEW ALL
                                </button>
                            </div>

                            <div class="inner-table-content">
                                <div class="review-back-div" id="fetchDashboardReviews">
                                    <script>
                                        _getReviewList({
                                            pageContainer: 'fetchDashboardReviews',
                                            crFlag: 'REVIEW',
                                            limit: 2,
                                            statusId: 3,
                                        });
                                    </script>

                                    <div class="content-loading-div">
                                        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        _fetchDashboardStatistics();
    </script>
<?php } ?>

<?php if ($page == 'logoutConfirmForm') { ?>
    <div class="caption-success-div animated zoomIn">
        <div class="div-in">
            <div class="img"><img src="<?php echo $websiteUrl ?>/all-images/images/warning.gif" /></div>
            <h2>Are you sure to log-out?</h2>
            Please, confirm your log-out action.
            <div class="btn-div">
                <button class="btn" onclick="_logOut();">YES</button>
                <button class="btn no-btn" onclick="_alertClose(<?php echo $modalLayer ?>);">NO</button>
            </div>
        </div>
    </div>
<?php } ?>