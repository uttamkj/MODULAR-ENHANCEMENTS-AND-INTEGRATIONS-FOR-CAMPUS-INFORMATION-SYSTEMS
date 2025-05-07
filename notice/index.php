<?php
// require_once "../includes/navbarfinal.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP System</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .notice-board {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            height: 600px;
            overflow-y: auto;
        }

        /* .notice-item {
            padding: 10px; 
            border-bottom: 1px solid #ddd;
        } */

        .notice-item:last-child {
            border-bottom: none;
        }

        .carousel-item::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 40%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            z-index: 1;
        }

        .carousel-caption {
            z-index: 2;
        }

        .carousel-caption h6,
        .carousel-caption p {
            color: #fff;
        }

        .ranking-section {
            background: linear-gradient(135deg, rgb(30, 203, 237), rgb(4, 78, 157));
            color: white;
            padding: 60px 0;
        }

        .ranking-section h3 {
            font-weight: bold;
            text-align: left;
        }

        .ranking-section p {
            text-align: justify;
            max-width: 90%;
            margin-bottom: 25px;
            font-weight: 400;
            margin-left: 40px;
        }

        .rank {
            font-size: x-large;
        }

        .ranking-section .btn-outline-light {
            border-color: white;
            color: white;
            padding: 10px 30px;
            margin-left: 40px;
        }

        .ranking-section .btn-outline-light:hover {
            background-color: white;
            color: rgb(4, 54, 66);
        }

        .event-card {
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            padding: 20px;
        }

        .event-card:hover {
            transform: scale(1.05);
        }

        .event-title {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }

        .read-more {
            text-decoration: none;
            color: rgba(0, 0, 0, 0.91);
            font-weight: bold;
        }

        .events-section h3 {
            font-weight: bold;
            color: #003366;
            border-left: 5px solid #d32f2f;
            padding-left: 15px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <!-- The above part will be cut and paste in nav bar in future  and this page will be included in index.php file stating page -->
    <!-- Navbar -->


    <div class="ms-4 me-4 mt-4">
        <div class="row">
            <!-- Notice Board Sidebar -->
            <div class="col-md-4">
                <div class="notice-board">
                    <h5 class="text-center bg-warning">📢 <b>NOTICE BOARD</b></h5>
                    <div id="notice-list">
                        <?php
                        include '../db/dbconnect.php';
                        $sql = "SELECT title, DATE_FORMAT(posted_date, '%Y-%m-%d') as formatted_date, file FROM notice ORDER BY posted_date DESC LIMIT 9";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='notice-item d-flex align-items-center justify-content-between'>";

                                // If file exists, make the entire notice a download link
                                if (!empty($row['file'])) {
                                    echo "<a href='uploads/" . urlencode($row['file']) . "' class='text-decoration-none d-flex align-items-center w-100' download>";
                                    echo "<strong class='text-dark me-2'>" . htmlspecialchars($row['title']) . "</strong>";
                                    echo "<small class='text-muted ms-auto me-2'>" . htmlspecialchars($row['formatted_date']) . "</small>";
                                    echo "</a>";
                                } else {
                                    // If no file, just display the notice title
                                    echo "<strong class='me-1'>" . htmlspecialchars($row['title']) . "</strong>";
                                    echo "<small class='text-muted ms-auto'>" . htmlspecialchars($row['formatted_date']) . "</small>";
                                }

                                echo "</div> <hr class='my-1'>";
                            }
                        } else {
                            echo "<p>No notices available.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>


            <!-- Placeholder for Other Content -->
            <div class="col-md-4 text-start ">
                <h1 class="ms-2" style="font-size: 4rem; font-weight:600 ; line-height: 1.2;">
                    Building <br><span style="font-weight: 600;"></span>technology for <br><span
                        style="font-weight: 600;">human progress</span>
                </h1><br>
                <p class="ms-2" style="font-size: 1.5rem; color: #6c757d; margin-top: 5px; line-height: 1.5;">
                    We are a university advancing science <br>
                    and technology education for <br>
                    students from all walks of life.
                </p><br>
                <a href="#" class="btn btn-primary ms-2 mt-3">ADMISSIONS 2025-26</a>
            </div>


            <!-- advertisement -->
            <div class="col-md-4">
                <div id="adCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-wrap="true">
                    <div class="carousel-inner">
                        <!-- Admission -->
                        <div class="carousel-item active">
                            <img src="../images/admission.jpeg" class="d-block w-100" alt="Admissions Open">
                            <div class="carousel-caption d-none d-md-block">
                                <h6>Admissions Open!</h6>
                                <p>Apply now for the 2025-26 academic session.</p>
                            </div>
                        </div>
                        <!-- Women's Day -->
                        <div class="carousel-item">
                            <img src="../images/womensday.jpeg" class="d-block w-100" alt="Admissions Open">
                            <div class="carousel-caption d-none d-md-block">
                                <h6>Happy International Women's Day!</h6>
                                <p>Celebrating the power, strength, and achievements of women.</p>
                            </div>
                        </div>

                        <!-- Nirman -->
                        <div class="carousel-item">
                            <img src="../images/nirman.jpeg" class="d-block w-100" alt="Admissions Open">
                            <div class="carousel-caption d-none d-md-block">
                                <h6>Nirman: The Annual Technical Fest</h6>
                                <p>Join us to witness innovation, creativity, and technical excellence.</p>
                            </div>
                        </div>

                        <!-- Annual Fest -->
                        <div class="carousel-item">
                            <img src="../images/zygon.jpeg" class="d-block w-100" alt="Annual Fest">
                            <div class="carousel-caption d-none d-md-block">
                                <h6>Annual Fest 2025</h6>
                                <p>Join us for music, dance, and competitions!</p>
                            </div>
                        </div>

                        <!-- MUN -->
                        <div class="carousel-item">
                            <img src="../images/mun.jpeg" class="d-block w-100" alt="MUN">
                            <div class="carousel-caption d-none d-md-block">
                                <h6>Model United Nations (MUN)</h6>
                                <p>Debate, discuss, and solve global issues.</p>
                            </div>
                        </div>

                        <!-- Campus Life -->
                        <div class="carousel-item">
                            <img src="../images/campus.jpg" height="530" width="550" alt="Campus Life">
                            <div class="carousel-caption d-none d-md-block">
                                <h6>Experience Vibrant Campus Life</h6>
                                <p>Join clubs, sports, and cultural events.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#adCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#adCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div><br><br>
    <br>

    <!--ranking and recognition-->
    <section class="ranking-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="ms-2" style="font-size: 4rem; font-weight: 600; line-height: 1.2;">Ranking &</h3>
                    <h3 class="ms-2" style="font-size: 4rem; font-weight: 600; line-height: 1.2;">Recognition</h3>
                </div>
                <div class="col-md-6">
                    <p class="rank">
                        Silicon Institute of Technology, Bhubaneswar has been upgraded to Silicon University.
                        Silicon has a NAAC Grade A accreditation. Three of our undergraduate programs,
                        CSE, ECE, and EEE, are NBA accredited. We are placed in the Band 201-300 in the
                        Engineering Category in NIRF Rankings 2024. Silicon was placed in the Band 151-300 in the
                        Innovation Category in NIRF Rankings 2023.
                    </p>
                    <a href="#" class="btn btn-outline-light">Know More</a>
                </div>
            </div>
        </div>
    </section><br><br><br>

    <!-- event -->
    <section class="events-section">
        <div class="ms-4 me-4 mt-4">
            <h3 class="mb-4">Featured Events</h3>
            <div class="row">
                <!-- Event 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card event-card">
                        <img src="../images/womensday.jpeg" class="card-img-top" alt="Women's Day 2025">
                        <div class="card-body">
                            <h5 class="event-title">WOMEN'S DAY 2025</h5>
                            <a href="#" class="read-more">READ MORE »</a>
                        </div>
                    </div>
                </div>

                <!-- Event 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card event-card">
                        <img src="../images/zygon.jpeg" class="card-img-top" alt="Zygon 2025">
                        <div class="card-body">
                            <h5 class="event-title">ZYGON 2025</h5>
                            <a href="#" class="read-more">READ MORE »</a>
                        </div>
                    </div>
                </div>

                <!-- Event 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card event-card">
                        <img src="../images/nirman.jpeg" class="card-img-top" alt="Nirman 4.0">
                        <div class="card-body">
                            <h5 class="event-title">NIRMAN 4.0</h5>
                            <a href="#" class="read-more">READ MORE »</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="bootstrap.bundle.min.js"></script> -->
</body>

</html>

<?php
require_once "../includes/footer.php";
?>