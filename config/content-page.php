<?php if ($page == 'galleryDetails') { ?>
    <div class="user-profile-div" data-aos="fade-left" data-aos-duration="900" onclick="event.stopPropagation();">
        <div class="form-title-wrapper">
            <div class="form-title-div">
                <div class="icon-div"><i class="bi bi-images"></i></div>
                <h3 id="pageTitle">GALLERY</h3>
            </div>
            <div class="btn-div">
                <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                    <i class="bi bi-x-lg"></i> Close
                </button>
            </div>
        </div>

        <div class="profile-content-div">
            <div class="main-picture-back-div">
                <div class="main-picture-div gallery-main-picture-div" id="galleryPreviewPix">
                    <img id="galleryMainImage" src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_2.jpg" alt="Gallery" />
                    <button class="gallery-nav-btn gallery-prev" id="galleryPrevBtn" onclick="_navigateGallery(-1);">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <button class="gallery-nav-btn gallery-next" id="galleryNextBtn" onclick="_navigateGallery(1);">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

                <div class="bottom-img-div">
                    <div class="inner-img-container">
                        <div class="inner-img-div" id="fetchPagePictures">
                            <div class="each-img-div" title="Click to Preview" id="img1"
                                onclick="_viewPreviewImage('img1', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_2.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img2"
                                onclick="_viewPreviewImage('img2', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_3.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img3"
                                onclick="_viewPreviewImage('img3', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_4.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img4"
                                onclick="_viewPreviewImage('img4', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_4.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img5"
                                onclick="_viewPreviewImage('img5', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_4.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img6"
                                onclick="_viewPreviewImage('img6', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_4.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img7"
                                onclick="_viewPreviewImage('img7', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_4.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img8"
                                onclick="_viewPreviewImage('img8', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_4.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img9"
                                onclick="_viewPreviewImage('img9', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_4.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img10"
                                onclick="_viewPreviewImage('img10', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_4.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img11"
                                onclick="_viewPreviewImage('img11', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_4.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img12"
                                onclick="_viewPreviewImage('img12', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_4.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img13"
                                onclick="_viewPreviewImage('img13', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_4.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img14"
                                onclick="_viewPreviewImage('img14', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_4.jpg" alt="Blog" />
                            </div>

                            <div class="each-img-div" title="Click to Preview" id="img15"
                                onclick="_viewPreviewImage('img15', 'galleryPreviewPix')">
                                <img src="<?php echo $websiteUrl?>/uploaded_files/gallery/gallery_2.jpg" alt="Blog" />
                            </div>
                        </div>
                    </div>
                </div>  
            </div>  
                
            <div class="gallery-info-back-div">
                <div class="left-info-container">
                    <h2>Frontend Development Class</h2>
                    <div class="info-wrapper">
                        <div class="title">Training</div>
                        <div class="info"><i class="bi bi-calendar3"></i> <span>May 15, 2026</span></div>
                        <div class="info"><i class="bi bi-images"></i> <span>10</span></div>
                    </div>
                    <p>Our Frontend development class in session. Students learning HTML, CSS and Javascript and building real-world projects with hands-on guidiance from our expert instructors</p>

                    <h4>Share this photo</h4>
                    <div class="social-info">
                        <a href="" title="YouTube">
                            <li><i class="bi-youtube"></i></li>
                        </a>
                        <a href="https://web.facebook.com" target="_blank" title="Facebook">
                            <li><i class="bi-facebook"></i></li>
                        </a>
                        <a href="https://twitter.com" target="_blank" title="Twitter">
                            <li><i class="bi-twitter"></i></li>
                        </a>
                        <a href="https://www.instagram.com" target="_blank" title="Instagram">
                            <li><i class="bi-instagram"></i></li>
                        </a>
                        <a href="https://api.whatsapp.com/send?text=Hello AfooTECH Global&amp;phone=+234 812 700 0262"
                            target="_blank" title="Whatsapp">
                            <li><i class="bi-whatsapp"></i></li>
                        </a>
                    </div>
                </div>
                
                <div class="right-info-container">
                    <div class="main-content-div dash-main-content-div">
                        <div class="tables-content-div">
                            <div class="content-title">
                                <div class="title">
                                    <i class="bi bi-image"></i>
                                    <span>Image Information</span>
                                </div>
                            </div>

                            <div class="inner-table-content colum-table-content">
                                <div class="list-content-wrapper">
                                    <div class="list-content-div"> 
                                        <div>Category</div>
                                        <span>Training</span>
                                    </div>

                                    <div class="list-content-div"> 
                                        <div>Date</div>
                                        <span>May 15, 2026</span>
                                    </div>

                                    <div class="list-content-div"> 
                                        <div>Location</div>
                                        <span>Afootech Lab</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>