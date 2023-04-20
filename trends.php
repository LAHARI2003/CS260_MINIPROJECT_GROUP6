<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "placementdb";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from MySQL database
$sql = "SELECT year, COUNT(*) AS count FROM details WHERE placed ='Yes' GROUP BY year ORDER BY year DESC";
$result = mysqli_query($conn, $sql);

$data = array();

if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
} else {
    echo "No data found";
}

// Separate x and y data
$x_data = array();
$y_data = array();
foreach ($data as $row) {
  $x_data[] = $row['year'];
  $y_data[] = $row['count'];
}

$sql1 = "SELECT branch, COUNT(*) AS num_students_placed FROM details WHERE placed = 'yes' GROUP BY branch";
$result1 = mysqli_query($conn, $sql1);

$data1 = array();

if(mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_assoc($result1)) {
        $data1[] = $row;
    }
} else {
    echo "No data found";
}

// Separate x and y data
$x_data1 = array();
$y_data1 = array();
foreach ($data1 as $row) {
  $x_data1[] = $row['branch'];
  $y_data1[] = $row['num_students_placed'];
}

$sql2 = "SELECT comp_name, COUNT(*) AS count FROM details d 
        INNER JOIN company c 
        WHERE d.ctc < c.ctc AND d.cpi >= c.cpicut 
        GROUP BY comp_name";
$result2 = mysqli_query($conn, $sql2);

$data2 = array();
//echo mysqli_num_rows($result2);

if(mysqli_num_rows($result2) > 0) {
    while ($row = mysqli_fetch_assoc($result2)) {
        
        $data2[] = $row;
    }
} else {
    echo "No data found";
}

// Separate x and y data
$x_data2 = array();
$y_data2 = array();
foreach ($data2 as $row) {
  $x_data2[] = $row['comp_name'];
  $y_data2[] = $row['count'];
}

$sql3 = "SELECT company, COUNT(*) AS count
FROM details WHERE company = 'TCS' AND placed = 'Yes' AND  year >= DATE_SUB(NOW(), INTERVAL 3 year)";
$result3 = mysqli_query($conn, $sql3);

$data3 = array();
//echo mysqli_num_rows($result3);

if(mysqli_num_rows($result3) > 0) {
    while ($row = mysqli_fetch_assoc($result3)) {
        
        $data3[] = $row;
    }
} else {
    echo "No data found";
}

// Separate x and y data
$x_data3 = array();
$y_data3 = array();
foreach ($data3 as $row) {
  $x_data3[] = $row['company'];
  $y_data3[] = $row['count'];
}
// Create bar graphs using Chart.js
?>
<!DOCTYPE html>
<html>
<head>
  <title>Placement Stats </title>
  <style>
    body {
      background-color: #283149; /* Change to your preferred dark blue color code */
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <canvas id="myChart" style="width: 400px; height: 300px;"></canvas>
  <canvas id="myChart2" style="width: 400px; height: 300px;"></canvas>
  <canvas id="myChart3" style="width: 400px; height: 300px;"></canvas>
  <canvas id="myChart4" style="width: 400px; height: 300px;"></canvas>
  <script>
    var ctx = document.getElementById("myChart").getContext("2d");
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($x_data); ?>,
        datasets: [{
          label: 'Number of Students Placed',
          data: <?php echo json_encode($y_data); ?>,
          backgroundColor: 'rgba(250, 99, 132, 0.5)', // changed to red color
          borderColor: 'rgba(255, 99, 132, 1)', // changed to red color
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        title: {
          display: true,
          text: 'Number of Students Placed by Year'
        }
      }
    });


    var ctx2 = document.getElementById("myChart2").getContext("2d");
    var myChart2 = new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($x_data1); ?>,
        datasets: [{
          label: 'Number of Students Placed Per Branch',
          data: <?php echo json_encode($y_data1); ?>,
          backgroundColor: 'rgba(54, 162, 235, 0.5)', // changed to blue color
          borderColor: 'rgba(255, 99, 132, 1)', // changed to red color
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        title: {
          display: true,
          text: 'Number of Students Placed by Branch'
        }
      }
    });

    var ctx3 = document.getElementById("myChart3").getContext("2d");
    var myChart3 = new Chart(ctx3, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($x_data2); ?>,
        datasets: [{
          label: 'Number of Students Eligible to a company',
          data: <?php echo json_encode($y_data2); ?>,
          backgroundColor: 'rgba(54, 162, 235, 0.5)', // changed to blue color
          borderColor: 'rgba(255, 99, 132, 1)', // changed to red color
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        title: {
          display: true,
          text: 'Number of Students Eligible to company'
        }
      }
    });
    var ctx4 = document.getElementById("myChart4").getContext("2d");
    var myChart4 = new Chart(ctx4, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($x_data3); ?>,
        datasets: [{
          label: 'Number of Students placed in TCS',
          data: <?php echo json_encode($y_data3); ?>,
          backgroundColor: 'rgba(54, 162, 235, 0.5)', // changed to blue color
          borderColor: 'rgba(255, 99, 132, 1)', // changed to red color
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        title: {
          display: true,
          text: 'Number of Students Placed in TCS'
        }
      }
    });
    </script>
    </body>
    </html>
