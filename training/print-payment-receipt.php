<?php include '../config/constants.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link href="<?php echo $websiteUrl ?>/all-images/images/icon.png" rel="shortcut icon" type="image-png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet" >
    <link href="<?php echo $websiteUrl ?>/training/styles/payment-reciept-style.css?v=<?php echo $codeVersion ?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo $websiteUrl ?>/style/paramount.css?v=<?php echo $codeVersion ?>" type="text/css" rel="stylesheet" />
    <script src="<?php echo $websiteUrl ?>/js/jquery-v3.6.1.min.js"></script>
    <script src="<?php echo $websiteUrl ?>/js/paramount.js"></script>
    <!-- ///// External Link //// -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <title>Payment Receipt | <?php echo $appName ?></title>
</head>

    <div class="download-area-wrapper">
        <div class="download-area">
            <div class="btn-container">
                <button class="btn" title="Download PDF" onclick="_downloadLetter()">
                    <i class="bi bi-file-pdf"></i> Download PDF
                </button>
                
                <button class="btn print-btn" id="printBtn" title="Print Reciept" onclick="window.print()">
                    <i class="bi bi-printer"></i> Print Reciept
                </button>
            </div>

            <div class="download-note">
                <i class="bi bi-info-circle-fill"></i> <em>Use "Save as PDF" in print dialog (or browser print)</em>
            </div>
        </div>
    </div>

    <div class="recieptContent">
        <body class="receipt-body" id="reciept-body">
            <script> printGeneralPaymentRecieptBreakdownSession = JSON.parse(sessionStorage.getItem("printGeneralPaymentRecieptBreakdownSession"));</script>

            <div class="receipt-container">
                <header>
                    <div class="header-inner">
                        <div class="logo-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="<?php echo $appName ?>" />
                        </div>

                        <div class="address-wrapper">
                            <div class="list">
                                <div class="icon"><i class="bi bi-globe"></i></div>
                                <div>
                                    https://afootech.com
                                </div>
                            </div>

                            <div class="list">
                                <div class="icon"><i class="bi bi-envelope-fill"></i></div>
                                <div>
                                    info@afootechtechglobal.com
                                </div>
                            </div>

                            <div class="list">
                                <div class="icon"><i class="bi bi-telephone-outbound-fill"></i></div>
                                <div>
                                    (+234) 813 125 2996
                                </div>
                            </div>

                            <div class="list">
                                <div class="icon"><i class="bi bi-geo-alt-fill"></i></div>
                                <div>
                                    121, Kotco Road, Ode Remo, Ogun State.
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="receipt-title">
                    <div class="text">
                        <h1>PAYMENT RECEIPT</h1>
                    </div>
                    <div class="stamp-wrapper">
                        <div class="stamp">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/stamp1.webp" alt="Payment Stamp" />
                        </div>
                    </div>
                </div>

                <div class="section">
                    <h2>STUDENT INFORMATION</h2>
                    <div class="details-cont">
                        <div class="details">
                            <div>Student Full Name:</div> 
                                <span id="studentFullName">
                                    <script>
                                        $("#studentFullName").html(capitalizeFirstLetterOfEachWord(printGeneralPaymentRecieptBreakdownSession?.studentData?.firstName + ' ' + printGeneralPaymentRecieptBreakdownSession?.studentData?.lastName));
                                    </script>
                                </span>
                            </div>
                        <div class="details">
                            <div>Student Id:</div> 
                            <span id="studentId">
                                <script>
                                    $("#studentId").html(printGeneralPaymentRecieptBreakdownSession?.studentData?.studentId);
                                </script>
                            </span>
                        </div>
                        <div class="details">
                            <div>Email Address:</div> 
                            <span id="emailAddress">
                                <script>
                                    $("#emailAddress").html(printGeneralPaymentRecieptBreakdownSession?.studentData?.emailAddress);
                                </script>
                            </span>
                        </div>
                        <div class="details">
                            <div>Phone Number:</div> 
                            <span id="phoneNumber"><script>
                                    $("#phoneNumber").html(printGeneralPaymentRecieptBreakdownSession?.studentData?.phoneNumber);
                                </script></span>
                        </div>
                    </div> 
                </div>
                
                <div class="section">
                    <h2>PAYMENT INFORMATION</h2>
                    <div class="details-cont">
                        <div class="details">
                            <div>Payment ID:</div>
                            <span id="paymentId2">
                                <script>
                                    $("#paymentId2").html(printGeneralPaymentRecieptBreakdownSession?.paymentId);
                                </script>
                            </span>
                        </div>

                        <div class="details">
                            <div>Payment Purpose:</div>
                            <span id="paymentPurposeName">
                                <script>
                                    $("#paymentPurposeName").html(printGeneralPaymentRecieptBreakdownSession?.paymentPurposeData?.paymentPurposeName);
                                </script>
                            </span>
                        </div>

                        <div class="details">
                            <div>Payment Method:</div>
                            <span id="paymentMethodName2">
                                <script>
                                    $("#paymentMethodName2").html(printGeneralPaymentRecieptBreakdownSession?.paymentMethodData?.paymentMethodName);
                                </script>
                            </span>
                        </div>

                        <div class="details">
                            <div>Payment Status:</div>
                            <strong id="statusName2" style="color: green;">
                                <script>
                                    const status = printGeneralPaymentRecieptBreakdownSession?.statusData?.statusName;

                                    let color = "red";

                                    if (status === "SUCCESSFUL") {
                                        color = "green";
                                    } else if (status === "PENDING") {
                                        color = "orange";
                                    }
                                    $("#statusName2")
                                        .html(status)
                                        .css("color", color);
                                </script>
                            </strong>
                        </div>

                        <div class="details">
                            <div>Date Initiated:</div>
                            <span id="createdTime2">
                                <script>
                                    $("#createdTime2").html(printGeneralPaymentRecieptBreakdownSession?.createdTime);
                                </script>
                            </span>
                        </div>

                        <div class="details">
                            <div>Date Confirmed:</div>
                            <span id="payDate2">
                                <script>
                                    $("#payDate2").html(printGeneralPaymentRecieptBreakdownSession?.payDate);
                                </script>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="section">
                    <div class="reciept-table">
                        <table cellspacing="0" style="width:100%" id="recieptContent">
                            <script>
                                $(document).ready(function () {

                                    let content = '';
                                    let no = 0;
                                    
                                    content += `
                                        <tr class="total">
                                            <td class="total-td"><strong>TOTAL AMOUNT PAID:</strong></td>
                                            <td class="total-td"><strong><s>N</s>${thousandSeperator(printGeneralPaymentRecieptBreakdownSession?.amount)}</strong></td>
                                        </tr>
                                    `;
                                    content += `</tbody>`;
                                    $('#recieptContent').html(content);
                                });
                            </script>
                        </table>
                    </div>
                </div>
                
                <div class="disclaimer">
                    This receipt serves as proof of payment.
                </div>
            </div>
        </body>
    </div>
    
    <script>
        const fileStudentName = capitalizeFirstLetterOfEachWord(printGeneralPaymentRecieptBreakdownSession?.studentData?.firstName + '-' + printGeneralPaymentRecieptBreakdownSession?.studentData?.lastName);

        const fileTermName= capitalizeFirstLetterOfEachWord(printGeneralPaymentRecieptBreakdownSession?.paymentPurposeData?.paymentPurposeName);

        function _downloadLetter(){
            let element = document.querySelector(".recieptContent");
            let options = {
                margin: [0.0, -0.9000, 0.0, 0.0],
                filename: `${(fileStudentName)}-${(fileTermName)}-Payment-Reciept.pdf`,
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 2,
                    useCORS: true
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };
            html2pdf()
                .set(options)
                .from(element)
                .save();
        }
    </script>
</html>