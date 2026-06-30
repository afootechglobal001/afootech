<?php include '../config/constants.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Print Student Acceptance Letter</title>
</head>

<body class="letter-body">
    <script>
        let printAcceptanceLetterSession = JSON.parse(
            localStorage.getItem("printAcceptanceLetterSession")
        );
        $(document).ready(function () {
            if (!printAcceptanceLetterSession) {
                window.location.href = trainingUrl;
                return;
            }
        });
    </script>

    <section class="acceptance-letter-wrapper">
        <div class="download-area">
            <div class="btn-container">
                <button class="btn" title="Download PDF" onclick="_downloadLetter()">
                    <i class="bi bi-file-pdf"></i> Download PDF
                </button>
                
                <button class="btn print-btn" id="printBtn" title="Print Letter" onclick="window.print()">
                    <i class="bi bi-printer"></i> Print Letter
                </button>
            </div>

            <div class="download-note">
                <i class="bi bi-info-circle-fill"></i> <em>Use "Save as PDF" in print dialog (or browser print)</em>
            </div>
        </div>
        
        <section class="acceptance-letter-body" id="printLetter">
            <div class="letter-header">
                <img src="<?php echo $websiteUrl ?>/all-images/images/letter-head.png" alt="<?php echo $appName ?> Letterhead">
            </div>

            <div class="letter-content">
                <div class="top-container">
                    <div class="flex-content">
                        <span>Ref:</span>
                        <p id="studentId">
                            <script>
                                $("#studentId").html(printAcceptanceLetterSession?.studentId);
                            </script>
                        </p>
                    </div>
                    
                    <div class="flex-content">
                        <span>Date:</span>
                        <p id="todayDate">
                            <script>
                                $("#todayDate").html(_formatDate(new Date()));
                            </script>
                        </p>
                    </div>
                </div>

                <div class="recipient">
                    <div class="top-container">
                        <div class="flex-content">
                            <p class="bold">The <strong id="programName"><script>$("#programName").html(printAcceptanceLetterSession?.programName);</script></strong> Coordinator,</p>
                        </div>
                    </div>

                    <div class="top-container">
                        <div class="flex-content">
                            <p id="departmentName">
                                <script>
                                    $("#departmentName").html(capitalizeFirstLetterOfEachWord(printAcceptanceLetterSession?.departmentName) + ',');
                                </script>
                            </p>
                        </div>
                    </div>

                    <div class="top-container">
                        <div class="flex-content">
                            <p id="institutionName">
                                <script>
                                    $("#institutionName").html(capitalizeFirstLetterOfEachWord(printAcceptanceLetterSession?.institutionName) + ',');
                                </script>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="salutation">
                    Dear Sir/Madam,
                </div>

                <div class="title">
                    <span id="programName3"><script>$("#programName3").html(printAcceptanceLetterSession?.programName);</script></span> ACCEPTANCE LETTER FOR<br>
                    <span id="studentName">
                        <script>
                            $("#studentName").html(printAcceptanceLetterSession?.studentName);
                        </script>
                    </span>
                </div>

                <div class="body-text">
                    <p>
                        We are pleased to inform you that <strong id="studentNameBody">
                            <script>
                                $("#studentNameBody").html(capitalizeFirstLetterOfEachWord(printAcceptanceLetterSession?.studentName));
                            </script></strong>, a student of 
                        <strong id="departmentNameBody">
                            <script>
                                $("#departmentNameBody").html(capitalizeFirstLetterOfEachWord(printAcceptanceLetterSession?.departmentName));
                            </script>
                        </strong> Department, <strong id="bodyInstitutionName"><script>$("#bodyInstitutionName").html(capitalizeFirstLetterOfEachWord(printAcceptanceLetterSession?.institutionName));</script></strong> with the matric no: 
                        <strong id="matricNo"><script>$("#matricNo").html(printAcceptanceLetterSession?.matricNumber);</script></strong>, has been accepted to undergo his/her <span id="programName2"><script>$("#programName2").html(printAcceptanceLetterSession?.programName);</script></span> training on <strong id="courseName"><script>$("#courseName").html(capitalizeFirstLetterOfEachWord(printAcceptanceLetterSession?.courseName));</script></strong> at AfooTECH Global.
                    </p>

                    <p>
                        This training program is scheduled to commence from 
                        <strong id="startDate"><script>$("#startDate").html(_formatDate(printAcceptanceLetterSession?.startDate));</script></strong> to <strong id="endDate"><script>$("#endDate").html(_formatDate(printAcceptanceLetterSession?.endDate));</script></strong>. During this 
                        period, he/she will be exposed to practical knowledge and hands-on experience in areas 
                        related to <strong id="bodyCourseName"><script>$("#bodyCourseName").html(capitalizeFirstLetterOfEachWord(printAcceptanceLetterSession?.courseName));</script></strong> and other relevant 
                        technical activities within our organization.
                    </p>

                    <p>
                        We are committed to providing a conducive learning environment that will enable he/she
                        to develop technical skills, gain professional experience, and apply the knowledge 
                        acquired during academic studies to real-world projects.
                    </p>

                    <p>
                        We appreciate the opportunity to contribute to the professional development of your 
                        student and look forward to a successful training program. For more information, You can contact our support team 
                        on <a href="tel:(+234) 705 090 3886" title="Contact Us"><strong>07050903886</strong></a> or <a href="tel:(+234) 812 700 0262" title="Contact Us"><strong>08127000262</strong></a>, 
                        or reach us via email at <a href="mailto:afootechglobal@gmail.com" title="Mail Us"><strong>afootechglobal@gmail.com</strong></a>.
                    </p>
                    <p>
                        Thank you.
                    </p>
                    <p>
                        Yours faithfully,
                    </p>
                </div>

                <div class="flex-signature">
                    <div class="signature">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/signature.jpg" alt="Signature">
                    </div>

                    <div class="column-signature">
                        <strong>Ikong Emmanuel .O</strong>
                        <em>The Manager</em>
                    </div>  
                </div>
            </div>
        </section>
    </section>

    <script>
        const fileStudentName = printAcceptanceLetterSession?.studentName;
        const fileProgramName = printAcceptanceLetterSession?.programName;
        function _downloadLetter(){
            let element = document.getElementById("printLetter");
            let options = {
                margin: [0.0, 0.0, -0.90, 0.0], // remove negative margin
                filename: `${capitalizeFirstLetterOfEachWord(fileStudentName)}-${fileProgramName}-Acceptance-Letter.pdf`,
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    scrollY: 0,
                    useCORS: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                },
            };
            html2pdf()
                .set(options)
                .from(element)
                .save();
        }
    </script>
</body>
</html>