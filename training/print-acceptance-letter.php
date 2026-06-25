<?php include '../config/constants.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Print Student Acceptance Letter</title>
</head>

<body class="letter-body">
    <section class="acceptance-letter-wrapper">
        <section class="acceptance-letter-body" id="printLetter">
            <div class="letter-header">
                <img src="<?php echo $websiteUrl ?>/all-images/images/letter-head.png" alt="<?php echo $appName ?> Letterhead">
            </div>

            <div class="letter-content">
                <div class="top-container">
                    <div class="flex-content">
                        <span>Ref:</span>
                        <p>IT/001/2024</p>
                    </div>
                    
                    <div class="flex-content">
                        <span>Date:</span>
                        <p>18th September, 2024</p>
                    </div>
                </div>

                <div class="recipient">
                    <div class="top-container">
                        <div class="flex-content">
                            <p class="bold">The Industrial Training Coordinator,</p>
                        </div>
                    </div>

                    <div class="top-container">
                        <div class="flex-content">
                            <p>Computer Science Department,</p>
                        </div>
                    </div>

                    <div class="top-container">
                        <div class="flex-content">
                            <p>The Gateway I.C.T Polytechnic,</p>
                        </div>
                    </div>
                </div>

                <div class="salutation">
                    Dear Sir/Madam,
                </div>

                <div class="title">
                    SIWES ACCEPTANCE LETTER<br>
                    FOR AJIMUDA OLUWASEUN MICHAEL
                </div>

                <div class="body-text">
                    <p>
                        We are pleased to inform you that <strong>Ajimuda Oluwaseun Michael</strong>, a student of 
                        Computer Science Department, The Gateway I.C.T Polytechnic, Saapade, matric no: 
                        <strong>21010211051</strong>, has been accepted to undergo his Students' Industrial Work 
                        Experience Scheme (SIWES) training at AfooTECH Global.
                    </p>

                    <p>
                        The industrial training program is scheduled to commence from 
                        <strong>October, 2023</strong> and end in <strong>September, 2024</strong>. During this 
                        period, he will be exposed to practical knowledge and hands-on experience in areas 
                        related to software development, information technology practices, and other relevant 
                        technical activities within our organization.
                    </p>

                    <p>
                        We are committed to providing a conducive learning environment that will enable him 
                        to develop his technical skills, gain professional experience, and apply the knowledge 
                        acquired during his academic studies to real-world projects.
                    </p>

                    <p>
                        We appreciate the opportunity to contribute to the professional development of your 
                        student and look forward to a successful SIWES program.
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
                        <strong>Mike O.S Afolabi</strong>
                        <em>CEO/MD</em>
                    </div>  
                </div>
            </div>
        </section>

        <div class="download-area">
            <div class="btn-container">
                <button class="btn" id="printLetter" title="Download PDF" onclick="_downloadLetter()">
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
    </section>

    <script>
        function _downloadLetter(){
            let element = document.getElementById("printLetter");
            let options = {
                margin: [0.0, 0.0, -0.5, 0.0], // top, left, bottom, right
                filename: "student-acceptance-letter.pdf",
                image:{
                    type:'jpeg',
                    quality:0.98
                },
                html2canvas:{
                    scale:2,
                    scrollY:0
                },
                jsPDF:{
                    unit:'in',
                    format:'a4',
                    orientation:'portrait'
                }
            };
            html2pdf().set(options).from(element).save();
        }
    </script>
</body>
</html>