<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
  header("Location: admin");  // আপনার login.php এর পাথ ঠিক রাখুন
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin panel</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
    }

    main {
      margin: auto;
    }

    h2 {
      color: #333;
      font-size: 50px;
    }

    p {
      color: #666;
    }

    .counter-list {
      display: flex;
      justify-content: space-around;
      margin-top: 20px;
    }

    .counter-list-option1,
    .counter-list-option2,
    .counter-list-option3 {
      background-color: #dae9fd;
      padding: 20px;
      margin: 10px;
      flex: 1;
      text-align: center;
      border: 1px solid #ddd;
      box-sizing: border-box;
      transition: transform 0.3s ease;
      transform: scale(1);
      border-radius: 9px;
      background: linear-gradient(145deg, #cacaca, #f0f0f0);
      box-shadow: 27px 27px 53px #bebebe,
        -27px -27px 53px #ffffff;
      background: linear-gradient(180deg, #DCF9E0 0%, #FFFFFF 30.21%);
      box-shadow: 0px 187px 75px rgba(0, 0, 0, 0.01), 0px 105px 63px rgba(0, 0, 0, 0.05), 0px 47px 47px rgba(0, 0, 0, 0.09), 0px 12px 26px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0);
    }
  </style>
</head>
<?php
include_once 'backend/connect.php'; // DB connection file

// Default values
$orderCount = 0;
$itemCount = 0;

// Total Order Count
$orderResult = mysqli_query($conn, "SELECT COUNT(*) as total FROM orders");
if ($orderResult && mysqli_num_rows($orderResult) > 0) {
  $orderRow = mysqli_fetch_assoc($orderResult);
  $orderCount = $orderRow['total'];
}

// Total Product Count (Table name is 'items')
$itemResult = mysqli_query($conn, "SELECT COUNT(*) as total FROM items");
if ($itemResult && mysqli_num_rows($itemResult) > 0) {
  $itemRow = mysqli_fetch_assoc($itemResult);
  $itemCount = $itemRow['total'];
}
// Total Earning Calculation
$earningResult = mysqli_query($conn, "SELECT SUM(price) AS total_earning FROM order_items");

$totalEarning = 0;
if ($earningResult && mysqli_num_rows($earningResult) > 0) {
  $row = mysqli_fetch_assoc($earningResult);
  $totalEarning = $row['total_earning'];
}
// Order Statistics by Month
$orderStats = [];
$result = mysqli_query($conn, "
    SELECT DATE_FORMAT(order_date, '%Y-%m') as month, COUNT(*) as total
    FROM orders
    GROUP BY month
    ORDER BY month
");

// New Order Count (Assuming 'new_order' is a status for new orders)
$newOrderResult = mysqli_query($conn, "SELECT COUNT(*) as total FROM orders WHERE status = 'new_order'");
$newOrderCount = 0;
if ($newOrderResult && mysqli_num_rows($newOrderResult) > 0) {
  $newRow = mysqli_fetch_assoc($newOrderResult);
  $newOrderCount = $newRow['total'];
}


while ($row = mysqli_fetch_assoc($result)) {
  $orderStats[] = $row;
}
// Pie Chart Data for Most Ordered Items
$pieData = [];
$result = mysqli_query($conn, "
    SELECT item_name, COUNT(*) as total 
    FROM order_items 
    GROUP BY item_name
    ORDER BY total DESC
");

while ($row = mysqli_fetch_assoc($result)) {
  $pieData[] = $row;
}

// Order status-wise count
$statusCounts = [];
$statusResult = mysqli_query($conn, "
    SELECT status, COUNT(*) as total 
    FROM orders 
    GROUP BY status
");
while ($row = mysqli_fetch_assoc($statusResult)) {
  $statusCounts[] = $row;
}

?>

<body>
  <?php include_once 'backend/asset/header.php'; ?>
  <div class="d-flex" ;>
    <?php include_once 'backend/asset/slidebar.php'; ?>
    <main>
      <h2>Welcome to the Dashboard ;)</h2>
      <p>Use the navigation links to manage your items.</p>
      <a href="https://haisam10.github.io/haisam_/" target="_blank" rel="noopener noreferrer">MDHH Group</a>
      <div class="counter-list">
        <div class="counter-list-option1">
          <h3><?php echo $orderCount; ?></h3>
          <p>Total order</p>
        </div>
        <!-- New Order Counter -->
        <div class="counter-list-option1">
          <h3><?php echo $newOrderCount; ?></h3>
          <p>New order</p>
        </div>
        <!--total product and earning-->
        <div class="counter-list-option2">
          <h3><?php echo $itemCount; ?></h3>
          <p>Total Product</p>
        </div>
        <!-- Total Earning Counter -->
        <div class="counter-list-option2">
          <h3>৳: <?php echo number_format($totalEarning, 2); ?></h3>
          <p>Total Earning</p>
        </div>
      </div>
      <div>
        <h3>Monthly Order Report</h3>
        <p>View the total orders placed each month.</p>
        <div style="text-align: center; margin-top: 20px; display: flex; justify-content: center;">
          <canvas id="orderChart" style="width: 50%; max-width: 500px; height: 50%; max-height: 350px; margin: 30px auto;"></canvas>
          <div style="width: 100%; max-width: 600px; margin: 30px auto;">
            <canvas id="itemPieChart"></canvas>
          </div>
          <div style="width: 100%; max-width: 600px; margin: 30px auto;">
            <canvas id="statusPieChart"></canvas>
          </div>
        </div>
      </div>

    </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctx = document.getElementById('orderChart').getContext('2d');
    const orderChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode(array_column($orderStats, 'month')); ?>,
        datasets: [{
          label: 'Total Orders per Month',
          data: <?php echo json_encode(array_column($orderStats, 'total')); ?>,
          backgroundColor: '#4CAF50'
        }]
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Monthly Order Report'
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            precision: 0
          }
        }
      }
    });
  </script>

  <script>
    const ctxPie = document.getElementById('itemPieChart').getContext('2d');

    const itemNames = <?php echo json_encode(array_column($pieData, 'item_name')); ?>;
    const itemCounts = <?php echo json_encode(array_column($pieData, 'total')); ?>;


    const itemPieChart = new Chart(ctxPie, {
      type: 'pie',
      data: {
        labels: itemNames,
        datasets: [{
          label: 'Item Orders',
          data: itemCounts,
          backgroundColor: [
            '#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF9800', '#9C27B0',
            '#3F51B5', '#00BCD4', '#8BC34A', '#E91E63'
          ],
          hoverOffset: 10
        }]
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Most Ordered Items (Pie Chart)'
          }
        }
      }
    });
  </script>
  <script>
    const statusCtx = document.getElementById('statusPieChart').getContext('2d');

    const statusLabels = <?php echo json_encode(array_column($statusCounts, 'status')); ?>;
    const statusData = <?php echo json_encode(array_column($statusCounts, 'total')); ?>;

    const statusPieChart = new Chart(statusCtx, {
      type: 'pie',
      data: {
        labels: statusLabels,
        datasets: [{
          label: 'Order Status',
          data: statusData,
          backgroundColor: [
            '#FF6384', // packaging
            '#36A2EB', // out_for_delivery
            '#4CAF50' // delivered
          ],
          hoverOffset: 10
        }]
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Order Status Distribution'
          }
        }
      }
    });
  </script>

</body>

</html>