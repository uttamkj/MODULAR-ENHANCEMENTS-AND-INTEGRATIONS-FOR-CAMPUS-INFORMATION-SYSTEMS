<?php
require_once "../includes/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        .about-section {
            padding: 50px 0;
            background-color: #f5f5f5;
            position: relative;
        }

        .about-content {
            background-color: #f5f5f5;
            padding: 40px;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: relative;
        }

        .about-content h3 {
            font-size: 3rem;
            font-weight: 700;
            color: #333;
            margin: 0;
        }

        .about-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: -20px;
            background-color: #003366;
            width: 20px;
            height: 100%;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            transform: skewX(-20deg);
        }

        .about-image img {
            width: 65%;
            max-height: 300px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .about-image {
            display: flex;
            justify-content: flex-end;
        }

        .about-para p {
            font-size: x-large;
            text-align: justify;
            line-height: 1.8;
        }

        .about-para h2 {
            text-decoration: underline;
            text-decoration-color: rgba(184, 8, 8, 0.677);
            text-decoration-thickness: 4px;
            padding-bottom: 5px;
            text-align: center;
        }

        .history-section {
            position: relative;
            padding: 50px 0;
        }

        .history-heading {
            position: relative;
            display: inline-block;
            z-index: 1;
        }

        .history-heading h2 {
            font-size: 2.5rem;
            font-weight: 400;
            color: #333;
            margin: 0;
        }

        .history-heading .bold-text {
            font-weight: 800;
            color: #000;
        }

        .history-heading .light-text {
            font-weight: 400;
            color: #333;
        }

        .history-heading::before {
            content: '';
            position: absolute;
            top: 10px;
            left: -20px;
            width: 320px;
            height: 80px;
            background-color: #dad7d7;
            transform: skewX(-20deg);
            z-index: -1;
        }

        .historybg {
            background-color: rgb(209, 220, 229);
        }

        .history-para {
            font-size: x-large;
            text-align: justify;
            line-height: 1.8;
        }

        .milestones-section {
            position: relative;
            padding: 50px 0;
        }

        .milestones-heading {
            position: relative;
            display: inline-block;
            z-index: 1;
        }

        .milestones-heading h2 {
            font-size: 2.5rem;
            font-weight: 400;
            color: #333;
            margin: 0;
        }

        .milestones-heading .bold-text {
            font-weight: 800;
            color: #000;
        }

        .milestones-heading .light-text {
            font-weight: 400;
            color: #333;
        }

        .milestones-heading::before {
            content: '';
            position: absolute;
            top: 10px;
            left: -20px;
            width: 320px;
            height: 80px;
            background-color: #dad7d7;
            transform: skewX(-20deg);
            z-index: -1;
        }

        .timeline-section {
            padding: 40px 0;
        }

        .year-box {
            background-color: #004a99;
            color: #fff;
            padding: 12px 30px;
            font-weight: bold;
            font-size: 18px;
            position: relative;
            border-radius: 5px;
            margin-right: 20px;
            width: 10%;
        }

        .timeline-list ul {
            list-style-type: disc;
            padding: 20px;
            margin: 0;
        }

        .timeline-list ul li {
            font-size: larger;
            color: #333;
            margin-bottom: 10px;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <!--title-->
    <div class="ms-4 me-4 mt-4">
        <section class="about-section">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Left Section with Heading -->
                    <div class="col-md-5">
                        <div class="about-content">
                            <h3>About Silicon University</h3>
                        </div>
                    </div>

                    <!-- Right Section with Image -->
                    <div class="col-md-7">
                        <div class="about-image">
                            <img src="../images/campus2.png" class="img-fluid" alt="Silicon University Building">
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <!--para-->
    <div class="ms-4 me-4 mt-4">
        <div class="about-para ms-4 me-4">
            <p>Silicon University (formerly known as Silicon Institute of Technology, Bhubaneswar) combines a commitment
                to providing the best engineering education with supporting India’s development in science and
                technology through rigorous academic programs, promoting fundamental and applied research, and fostering
                innovation and entrepreneurship.</p>
            <p>Founded in 2001 in the eastern state of Odisha, India, SiliconTech, the engineering institute of Silicon
                University, is known for its community of reputed and dedicated faculty, bright and talented students,
                and effective administration and support staff. </p>
            <br>
            <h2>Our Vision: To become a centre of excellence in the fields of technical education & research and create
                responsible citizens.
            </h2><br>
        </div>
    </div>

    <!--history-->
    <div class="ms-4 me-4">
        <section class="history-section">
            <div class="history-heading ms-4">
                <h2>
                    <span class="bold-text">A History of</span><br>
                    <span class="light-text">Dreamers & Doers</span>
                </h2>
            </div>
        </section>
        <div class="historybg text-center ms-4 me-4">
            <img src="../images/history.jpg" alt="history">
        </div>
        <p class="history-para ms-4 me-4"> <br> In 1987, the idea of Silicon Institute of Technology germinated in the
            minds of two young BITS Pilani
            graduates, Sanjeev Nayak and Laxman Mohanty. Laxman, from rural Odisha, studied hard, getting the
            national scholarship and going to Ramakrishna Mission and Birla Public Schools. Sanjeev, the son of a
            medical professor, had Indian middle-class aspirations for a better life. Although from different life
            contexts, the love for art, photography, and fun brought them together at BITS Pilani. <br><br>
            While at college, they often discussed their dreams of contributing to entrepreneurship in the IT sector
            of Odisha. Two years after graduating from college in 1985, Laxman, an electrical engineer, and Sanjeev,
            a civil engineer, quit their promising careers in the USA and government of Odisha to start Oricom
            Systems Pvt. Ltd. In 1987, Oricom began with a focus on IT services, marketing, and solutions in Odisha.
            <br><br>
            Over the next decade, the market need and opportunity led to Oricom becoming a leader in non-formal
            computer education in the state. It offered a wide range of courses in the information technology
            domain, set up computer labs in schools, and trained teachers.
            In 1997, a strategic decision to enter formal technology education led them to establish the Gyana
            Bharati Charitable & Education Trust (GBCET). In 1998, GBCET formed the Silicon School of Information
            Technology (SSIT) to offer Masters in Computer Applications (MCA). Ramananda Mishra from the publishing
            industry, and Nitai Gaur Dhall working in the aviation sector, from Singapore, joined Sanjeev and Laxman
            to set up a Trust in the non-profit education sector. <br><br>
            In three years, by 2001, the team’s passion to bring rigorous, outstanding, and industry-facing
            engineering education to young people in eastern India led to the founding of the Silicon Institute of
            Technology, which started its campus SiliconTech, in Bhubaneswar, Odisha, with four AICTE approved
            B.Tech. programs.
            In 2024, Silicon Institute of Technology, Bhubaneswar (SiliconTech) got upgraded to Silicon University. <br>
        </p>
    </div>

    <!--Milestones-->
    <div class="ms-4 me-4">
        <section class="milestones">
            <div class="milestones-heading ms-4">
                <h2>
                    <span class="bold-text">SIT</span><br>
                    <span class="light-text">Milestones</span>
                </h2>
            </div>
        </section>

        <section class="timeline-section ms-4">
            <div class="timeline-item">
                <div class="year-box text-center">
                    <h4>2001</h4>
                </div>
                <div class="timeline-list">
                    <ul>
                        <li>Silicon Institute of Technology (SIT) builds the first academic block in its Bhubaneswar
                            campus.</li>
                        <li>SIT gets the first Director of Academics, Dr. P.K Dash, and the team of faculty and staff.
                        </li>
                        <li>SIT welcomes its first batch of students to four B.Tech. programs.</li>
                        <li>AICTE gives approval to SIT programs.</li>
                    </ul>
                </div>

                <div class="year-box text-center">
                    <h4>2004</h4>
                </div>
                <div class="timeline-list">
                    <ul>
                        <li>Professor Damodar Acharya, former Director of IIT-Kharagpur and Chairman of AICTE
                            inaugurates new infrastructure, the Silicon Guest House and Facility Center. SIT gets the
                            Young Achiever’s Award 2004 for Excellence in Technical Education from Ever Green Forum.
                        </li>
                        <li>Tata Consultancy Services (TCS) recruits the first batch of students from SIT.</li>
                    </ul>
                </div>

                <div class="year-box text-center">
                    <h4>2005</h4>
                </div>
                <div class="timeline-list">
                    <ul>
                        <li>The first batch of B.Tech. students graduate from SIT.</li>
                        <li>SIT establishes the Silicon Alumni Association.ter. SIT gets the Young Achiever’s Award 2004
                            for Excellence in Technical Education from Ever Green Forum.</li>
                        <li>40% of the students get placed in top technology and engineering companies.</li>
                    </ul>
                </div>

                <div class="year-box text-center">
                    <h4>2009</h4>
                </div>
                <div class="timeline-list">
                    <ul>
                        <li>SIT’s Sambalpur campus, Silicon West, starts functioning with four B.Tech. programs in CSE,
                            EE, ETC and ME.</li>
                        <li>SIT establishes its Incubation Center, the Silicon Tech Lab.</li>
                        <li>SIT forms the IEEE Student Chapter.</li>
                        <li>The NBA accredits three SIT programs, B.Tech. in ETC, CSE, and EEE.</li>
                    </ul>
                </div>

                <div class="year-box text-center">
                    <h4>2016</h4>
                </div>
                <div class="timeline-list">
                    <ul>
                        <li>Silicon Research Center established with dedicated infrastructure to facilitate and grow
                            research in science and engineering.</li>
                        <li>Sky Lab, an outdoor WiFi zone with high speed internet access around a picturesque fountain,
                            music and a sculpted reflective roof inaugurated.</li>

                    </ul>
                </div>

                <div class="year-box text-center">
                    <h4>2018</h4>
                </div>
                <div class="timeline-list">
                    <ul>
                        <li>SIT’s Bhubaneswar campus, SiliconTech, conferred the UGC Autonomous status for a period of
                            10 years from the academic Session of 2018-19.</li>
                        <li>NBA accreditation again for three undergraduate programs of SiliconTech, B.Tech. in ECE, EEE
                            and CSE, from 2018 to 2021</li>
                        <li>Silicon became an institutional member of the Institute of Engineers India.</li>

                    </ul>
                </div>

                <div class="year-box text-center">
                    <h4>2021</h4>
                </div>
                <div class="timeline-list">
                    <ul>
                        <li>SiliconTech ranked 163 (Engineering) in the NIRF (National Institutional Ranking Framework)
                            by the Ministry of Human Resource Development, Government of India.</li>
                        <li> SiliconTech’s Institution Innovation Council (IIC) becomes the only institute from Odisha
                            to be selected as a mentor institution by Ministry of Education’s Innovation Cell (MIC),
                            Government of India, under the Mentor–Mentee Program 2021–2022 for IIC institutions, to
                            provide mentoring support and guidance to mentee institutions.</li>
                        <li>Silicon became an institutional member of the Institute of Engineers India.</li>
                        <li>SiliconTech’s Institution Innovation Council (IIC) recognized as the one the best performing
                            IICs for its performance in the year 2020-21, by the Innovation Cell, Ministry of Education
                            (MoE), Government of India, on the basis of the institute’s performance in undertaking
                            various innovation, entrepreneurship and startup activities in the campus.</li>
                        <li>SiliconTech has been placed under ‘Band-Performer’ in the category of ‘Private or
                            Self-Financed College/Institutes (Technical)’ in ARIIA Rankings 2021, an initiative of the
                            Ministry of Education (MoE), Government of India.</li>
                        <li>SiliconTech receives Start-up Cell award from Biju Patnaik University of Technology (BPUT),
                            Odisha.</li>
                    </ul>
                </div>

                <div class="year-box text-center">
                    <h4>2024</h4>
                </div>
                <div class="timeline-list">
                    <ul>
                        <li>Silicon Institute of Technology, Bhubaneswar is placed under Band 201-300 (Engineering) in
                            the NIRF (National Institutional Ranking Framework) Rankings 2024 by the Ministry of
                            Education (MoE), Government of India.
                        </li>
                        <li> Silicon Institute of Technology, Bhubaneswar got upgraded to Silicon University.</li>
                        <li>SiliconTech’s Institution Innovation Council (IIC) recognized as one of the best performing
                            IICs for its performance in the year 2022-23, by the Innovation Cell, Ministry of Education
                            (MoE), Government of India, on the basis of the institute’s performance in undertaking
                            various innovation, entrepreneurship, and startup activities in the campus.
                        </li>
                        <li>SiliconTech’s Institution Innovation Council (IIC) is the only funded institute from Odisha
                            to be selected as a mentor institution by Ministry of Education’s Innovation Cell (MIC),
                            Government of India, under the Mentor–Mentee Program 2023 for IIC institutions, to provide
                            mentoring support and guidance to mentee institutions.</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

<?php
require_once "../includes/footer.php";
?>