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
                    <a href="func.php" class="nav_link">
                        <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="permission.html" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span
                            class="nav_name">Leave Permission Management</span>
                    </a>
                    <a href="studentmgt.html" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i>
                        <span class="nav_name">Student Management System</span>
                    </a>
                    <a href="createattendance.html" class="nav_link active"> <i class='bx bx-bookmark nav_icon'></i>
                        <span class="nav_name">Attendance Management</span>
                    </a>
                    <a href="permission_pending.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span
                            class="nav_name">Permission Pending</span>
                    </a>
                    <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span
                            class="nav_name">Stats</span>
                    </a>
                </div>
            </div>
            <a href="index.html" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                    class="nav_name">SignOut</span></a>
        </nav>
    </div>
    <div class="row custom-row" style="margin-top: 10vh;">
        <div class="col-lg-12 cust-tbl">

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "05082003@David";
            $dbname = "academic";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die ("Connection failed: " . $conn->connect_error);
            }

            if (isset ($_POST['table_name'])) {
                $table_name = $_POST['table_name'];

                $sql = "SELECT fk_student_id, time_arrived FROM $table_name";
                $result = $conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<table class="table" name="attendance_list_name">';
                            echo '<th>Student ID</th>';
                            echo '<th>Time arrived</th>';
                            echo '<th>Delete  <Form method="post" action="delete-att-row.php">
                        <Button type="submit" class="btn btn-primary" onClick="refresh">Delete</button>
                         <input type="hidden" name="fk_student_id" value="' . $row["fk_student_id"] . '">
                         <input type="hidden" name="table_name" value="' . $table_name . '">
                        </form>
                        </th>';
                            echo '<th>Delete  <Form method="post" action="drop-att-tbl.php">
                        <Button type="submit" class="btn btn-primary" onClick="refresh">Delete Table</button>
                         <input type="hidden" name="fk_student_id" value="' . $row["fk_student_id"] . '">
                         <input type="hidden" name="table_name" value="' . $table_name . '">
                        </form>
                        </th>';

                            echo "<tr><td>" . $row["fk_student_id"] . "</td><td>" .
                                $row["time_arrived"] . "</td>";
                            // Integrate delete functionality
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'No records found.';
                    }
                } else {
                    echo 'Error executing query: ' . $conn->error;
                }
            } else {
                echo '<h2 style="color: white;">Table name not provided.<p>';
            }

            $conn->close();
            ?>

            <div></div>
            <div></div>
        </div>
        <form id="fetch-form" method="post" action="fetch_table.php">
            <input type="text" name="table_name">
            <button type="submit" class="btn btn-primary">Find attendance list</button>
        </form>
        <script>
            document.getElementById('hideButton').addEventListener('click', function () {
                var myDiv = document.getElementById('myDiv');
                myDiv.style.display = myDiv.style.display === 'none' ? 'block' : 'none';
            });
        </script>
</body>

</html>
</div>
</body>

</html>