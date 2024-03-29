<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script href="nvabar.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body id="body-pd">
    <header class="header" id="header" data-bs-theme="dark" style="background-color: #861358;">
        <div class="header_toggle" data-bs-theme="dark"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div>Dashboard</div>

    </header>
    <div class="l-navbar" id="nav-bar" style="background-color: #861358;">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span
                        class="nav_logo-name">Academic Dept</span> </a>
                <div class="nav_list">
                    <a href="#" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="permission.html" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span
                            class="nav_name">Leave Form</span>
                    </a>
                    <a href="studentmgt.html" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i>
                        <span class="nav_name">Student Management System</span>
                    </a>
                    <a href="createattendance.html" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span
                            class="nav_name">Attendance Management</span>
                    </a>
                    <a href="permission_pending.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span
                            class="nav_name">Permission Pending</span>
                    </a>
                    <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span
                            class="nav_name">Stats</span>
                    </a>
                </div>
            </div> <a href="index.html" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                    class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="container-fluid cont-fluid-cust" data-bs-theme="dark">
        <div class="row custom-row" style="margin-top: 10vh;">
            <div class="col-sm-4">
                <div class="p-3 border bg-light custom-row-el">
                    <div>Total Student</div>
                    <div class="cust-widget">
                        <?php
                        $servername = 'localhost';
                        $username = 'root';
                        $password = '05082003@David';
                        $dbname = 'academic';

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            echo '' . $conn->connect_error;
                        }
                        $sql = "SELECT student_name FROM student_tbl";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $count = 0;
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                            echo $count;
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="p-3 border bg-light custom-row-el">
                    <div>Total Class</div>
                    <div class="cust-widget">0</div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>