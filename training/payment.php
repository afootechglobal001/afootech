<?php include '../config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | SIWES | IT | Tuition Fee Payment</title>
    <meta name="description"
        content="Join AfooTECH Global ICT Training Centre and learn practical digital skills including software development, networking, UI/UX design, graphics design, and more." />
    <meta name="keywords"
        content="SIWES Training centre in Remo, Ogun State, SIWES Placement centre in Remo Ogun State, IT placement centre in Remo Ogun State, Best internship Training centre in Remo, Ogun State, AfooTECH GLOBAL IT SOLUTION, AfooTECH Global, Best ICT training centre in Ogun State, Best ICT training centre in Nigeria, Software development training, Web development training, Web app development training, Android app development training, Programming training, Coding academy in Ogun State, Networking training, Cybersecurity training, UI UX design training, Graphics design training, Digital skills training, IT training centre in Remo, ICT academy Nigeria, Software engineering training, Ogun State, Nigeria, Ode Remo" />
    <meta property="og:title" content="<?php echo $appName ?> | SIWES | IT | Tuition Fee Payment" />
    <meta property="og:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/training-banner.jpg" />
    <meta property="og:description"
        content="Join AfooTECH Global ICT Training Centre and learn practical digital skills including software development, networking, UI/UX design, graphics design, and more." />
    <meta name="twitter:title" content="<?php echo $appName ?> | SIWES | IT | Tuition Fee Payment" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/training-banner.jpg" />
    <meta name="twitter:description"
        content="Join AfooTECH Global ICT Training Centre and learn practical digital skills including software development, networking, UI/UX design, graphics design, and more." />

</head>
<script src="https://js.paystack.co/v1/inline.js"></script>

<body>
    <?php include '../alert.php' ?>
    <?php _mobileHeader($websiteUrl); ?>

    <section class="login-div">
        <?php _leftSideSection($websiteUrl, $appName); ?>

        <script>
        let studentPaymentDetailsSession = JSON.parse(localStorage.getItem("studentPaymentDetailsSession"));

        $(document).ready(function() {
            if (!studentPaymentDetailsSession) {
                window.location.href = trainingUrl;
                return;
            }
        });
        </script>

        <div class="login-card-div">
            <div class="form-section">
                <a href="<?php echo $websiteUrl ?>/training">
                    <div class="logo-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="Logo">
                    </div>
                </a>

                <div class="form-back-div">
                    <div class="form-div" data-aos="fade-in" data-aos-duration="1200">
                        <h1>Review & Pay <span>Tuition Fee</span></h1>
                        <p>
                            Kindly confirm your details and select a payment method to pay your tuition fee.
                        </p>

                        <div class="inner-form">
                            <div class="alert alert-success form-alert-div">
                                <div class="alert-list-div">
                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>FullName:</div>
                                            <div>
                                                <span id="sfullName">
                                                    <script>
                                                    $("#sfullName").html(studentPaymentDetailsSession?.studentData
                                                        ?.fullName);
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Email Address:</div>
                                            <div>
                                                <span id="emailAddress">
                                                    <script>
                                                    $("#emailAddress").html(studentPaymentDetailsSession?.studentData
                                                        ?.emailAddress);
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Phone Number:</div>
                                            <div>
                                                <span id="phoneNumber">
                                                    <script>
                                                    $("#phoneNumber").html(studentPaymentDetailsSession?.studentData
                                                        ?.phoneNumber);
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Program:</div>
                                            <div>
                                                <span id="programName">
                                                    <script>
                                                    $("#programName").html(studentPaymentDetailsSession?.programData
                                                        ?.programName);
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Course:</div>
                                            <div>
                                                <span id="courseName">
                                                    <script>
                                                    $("#courseName").html(studentPaymentDetailsSession?.programData
                                                        ?.courseName);
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Duration:</div>
                                            <div>
                                                <span id="durationName">
                                                    <script>
                                                    $("#durationName").html(studentPaymentDetailsSession?.programData
                                                        ?.durationName);
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Start Date:</div>
                                            <div>
                                                <span id="startDate">
                                                    <script>
                                                    $("#startDate").html(_formatDate(studentPaymentDetailsSession
                                                        ?.programData?.startDate));
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>End Date:</div>
                                            <div>
                                                <span id="endDate">
                                                    <script>
                                                    $("#endDate").html(_formatDate(studentPaymentDetailsSession
                                                        ?.programData?.endDate));
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-success form-alert-div">
                                <span><i class="bi-pencil-square"></i> <strong>Note:</strong></span>
                                Kindly note that a <strong>tuition fee</strong> of
                                <strong>
                                    (<span style="font-size:14px;" id="formFee">
                                        <script>
                                        $("#formFee").html('<s>N</s>' + thousandSeperator(
                                            studentPaymentDetailsSession?.programData?.tuitionFee
                                        ));
                                        </script></span>)
                                </strong>
                                is required to complete your payment. Please ensure that you have sufficient funds in
                                your account before proceeding.
                            </div>

                            <div class="text_field_container" id="paymentMethodId_container">
                                <script>
                                selectField({
                                    id: 'paymentMethodId',
                                    title: 'Select Payment Method'
                                });
                                _getSelectPaymentMethod('paymentMethodId');
                                </script>
                            </div>

                            <div class="btn-div">
                                <button class="btn back-btn" title="Back to previous"
                                    onclick="window.location.href= trainingUrl;"><i class="bi bi-arrow-left-circle"></i>
                                    Back</button>
                                <button class="btn full-btn" id="submitBtn" title="Proceed to Payment"
                                    onclick="_proceedToTuitionFeePayment();">Proceed to Payment <i
                                        class="bi bi-credit-card"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-container">
                <p>
                    &copy; <?php echo date('Y'); ?> <?php echo $appName ?> Student Registration. All rights reserved.
                </p>
            </div>
        </div>
    </section>
    <?php include 'bottom-scripts.php' ?>
</body>

</html>