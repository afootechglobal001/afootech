<?php if($page=='registerPage'){?>
    <div class="form-div" data-aos="fade-in" data-aos-duration="1200">
        <h1>Welcome <span>Student!</span></h1>
        <p>
            Create your account and register for your SIWES/IT program with <?php echo $appName ?>.
        </p>

        <div class="inner-form" id="viewLogin">
            <div class="row-wrapper">
                <div class="text_field_container" id="firstName_container">
                    <script>
                        textField({
                            id: 'firstName',
                            title: 'First Name'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="lastName_container">
                    <script>
                        textField({
                            id: 'lastName',
                            title: 'Last Name'
                        });
                    </script>
                </div>
            </div>

            <div class="text_field_container" id="emailAddress_container">
                <script>
                    textField({
                        id: 'emailAddress',
                        title: 'Email Address',
                        type: 'email'
                    });
                </script>
            </div>

            <div class="text_field_container" id="phoneNumber_container">
                <script>
                    textField({
                        id: 'phoneNumber',
                        title: 'Phone Number'
                    });
                </script>
            </div>

            <div class="btn-div">
                <button class="btn full-btn" id="submitBtn" title="Proceed" onclick="_getNextPage({page: 'institutionDetailsPage'});">Proceed <i class="bi bi-arrow-right-circle"></i></button>
            </div>
        </div>
    </div>
<?php }?>

<?php if($page=='institutionDetailsPage'){?>
    <div class="form-div">
        <h1>Institution <span>Information</span></h1>
        <p>
            Provide your institution information to begin your SIWES/IT registration with <?php echo $appName ?>.
        </p>

        <div class="inner-form">
            <div class="text_field_container" id="institutionType_container">
                <script>
                    selectField({
                        id: 'institutionType',
                        title: 'Select Institution Type'
                    });
                </script>
            </div>

            <div class="text_field_container" id="levelId_container">
                <script>
                    selectField({
                        id: 'levelId',
                        title: 'Select Cuurent Level'
                    });
                </script>
            </div>

            <div class="text_field_container" id="nameOfInstitution_container">
                <script>
                    textField({
                        id: 'nameOfInstitution',
                        title: 'Name Of Institution'
                    });
                </script>
            </div>

            <div class="text_field_container" id="department_container">
                <script>
                    textField({
                        id: 'department',
                        title: 'Department'
                    });
                </script>
            </div>

            <div class="text_field_container" id="matricNo_container">
                <script>
                    textField({
                        id: 'matricNo',
                        title: 'Refrence/Matric No',
                    });
                </script>
            </div>
            
            <div class="btn-div">
                <button class="btn back-btn" title="Back to previous" onclick="_getNextPage({page: 'registerPage'});"><i class="bi bi-arrow-left-circle"></i> Back</button>
                <button class="btn" id="submitBtn" title="Proceed" onclick="_getNextPage({page: 'programDetailsPage'});">Proceed <i class="bi bi-arrow-right-circle"></i></button>
            </div>
        </div>
    </div>
<?php }?>

<?php if($page=='programDetailsPage'){?>
    <div class="form-div" data-aos="fade-in" data-aos-duration="1200">
        <h1>Program <span>Information</span></h1>
        <p>
            Select your preferred program to continue your SIWES/IT registration with <?php echo $appName ?>.
        </p>

        <div class="inner-form" id="viewLogin">
            <div class="text_field_container" id="programId_container">
                <script>
                    selectField({
                        id: 'programId',
                        title: 'Slect Program'
                    });
                </script>
            </div>

            <div class="text_field_container" id="courseId_container">
                <script>
                    selectField({
                        id: 'courseId',
                        title: 'Select Course'
                    });
                </script>
            </div>

            <div class="text_field_container" id="duration_container">
                <script>
                    selectField({
                        id: 'duration',
                        title: 'Select Duration',
                    });
                </script>
            </div>
            
            <div class="btn-div">
                <button class="btn back-btn" title="Back to previous" onclick="_getNextPage({page: 'institutionDetailsPage'});"><i class="bi bi-arrow-left-circle"></i> Back</button>
                <button class="btn" id="submitBtn" title="Proceed" onclick="_getNextPage({page: 'passportPage'});">Proceed <i class="bi bi-arrow-right-circle"></i></button>
            </div>
        </div>
    </div>
<?php }?>

<?php if($page=='passportPage'){?>
    <div class="form-div" data-aos="fade-in" data-aos-duration="1200">
        <h1>Upload <span>Passport</span></h1>
        <p>
            Upload your passport photograph to complete your SIWES/IT registration with <?php echo $appName ?>.
        </p>

        <div class="inner-form">
            <div class="cam-pix">
                <div class="btn-container">
                    <button class="capture-btn" title="Take Picture" onClick="takeSnapShot()"> <i
                            class="bi-camera-fill"></i> TAKE
                        PICTURE </button>

                    <input id="browseImageInput" type="file" style="display:none;"
                        accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif"
                        onchange="studentPreview.UpdatePreview(this);" />

                    <button class="capture-btn" type="button" title="Browse Image"
                        onclick="document.getElementById('browseImageInput').click()">
                        <i class="bi bi-cloud-arrow-up"></i>
                        BROWSE IMAGE
                    </button>
                </div>
                <div class="cam-pix-inner" id="cam-pix">
                    <img src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" />
                </div>
            </div>
            <div class="issue-text" id="issues_blogPix"></div>
            
            <div class="alert alert-success form-alert-div">
                <span><i class="bi-pencil-square"></i> Note:</span> 
                Kindly note that a registration fee of (<strong><span style="font-size:14px;" id=""><s>N</s>10,000.00</span></strong>) will be required before completing your registration.
            </div>
            <div class="btn-div">
                <button class="btn back-btn" title="Back to previous" onclick="_getNextPage({page: 'programDetailsPage'});"><i class="bi bi-arrow-left-circle"></i> Back</button>
                <button class="btn full-btn" id="submitBtn" title="Proceed to Payment" onclick="_completeRegistration();">Proceed to Payment <i class="bi bi-credit-card"></i></button>
            </div>
        </div>
    </div>
<?php }?>