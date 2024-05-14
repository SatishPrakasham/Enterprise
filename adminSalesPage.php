<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin PetCare Treasury</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <?php
session_start();
include 'db_petcare.php';

$id=$_SESSION['id'];
$query=mysqli_query($conn,"SELECT * FROM adminlogin where id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);

?> 
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');

*{
  margin: 0;
  padding: 0;
  list-style: none;
  box-sizing: border-box;
  text-decoration: none;
  font-family: 'Montserrat', sans-serif;
}

.wrapper{
  width: 100%;
  height: 100%;
}

.top_navbar{
  background: #80CBC4;
  height: 60px;
  display: flex;
  position: fixed;
  width: 100%;
  top: 0;
}

.top_navbar .hamburger{
  width: 80px;
  background: #004D40;
  position: relative;
  font-size: 28px;
}

.top_navbar .hamburger .hamburger__inner{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  cursor: pointer;
  width: 40px;
  height: 20px;
}

.top_navbar .hamburger__inner > div{
  width: 30px;
  height: 2px;
  background: #fff;
  position: absolute;
  top: 0;
  left: 0;
}

.top_navbar .hamburger div.two{
  top: 10px;
  width: 40px;
}

.top_navbar .hamburger div.three{
  top: 20px;
}

.top_navbar .menu{
  width: calc(100% - 80px);
  height: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 20px;
}

.top_navbar .menu .logo{
  color: #004D40;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.top_navbar .menu .right_menu ul{
  display: flex;
}

.top_navbar .menu .right_menu ul li{
  position: relative;
}

.top_navbar .menu .right_menu ul li .fas{
  font-size: 22px;
  cursor: pointer;
  color: #004D40;
}

.top_navbar .menu .right_menu ul li .profile_dd{
  position: absolute;
  top: 35px;
  right: -10px;
  background: #fff;
  box-shadow: 0 0 2px rgba(0,0,0,0.5);
  padding: 10px 0;
  width: 180px;
  border-radius: 3px;
  display: none;
  user-select: none;
}

.top_navbar .menu .right_menu ul li .profile_dd.active{
  display: block;
}

.top_navbar .menu .right_menu ul li .profile_dd .dd_item{
  padding: 10px;
  cursor: pointer;
  color: #004D40;
}

.top_navbar .menu .right_menu ul li .profile_dd .dd_item:hover{
  background: #E0F2F1;
}

.top_navbar .menu .right_menu ul li .profile_dd:before{
  content: "";
  position: absolute;
  top: -20px;
  right: 10px;
  border: 10px solid;
  border-color: transparent transparent #fff transparent;
}

.main_container .sidebar{
  position: fixed;
  top: 60px;
  left: 0;
  width: 225px;
  height: 100%;
  background: #004D40;
  transition: all 0.3s ease;
}

.main_container .sidebar .sidebar__inner{
  position: relative;
}

.main_container .sidebar .profile{
  display: flex;
  align-items: center;
  color: #fff;
  padding: 20px 0;
  white-space: nowrap;
  transition: all 0.3s ease;
}

.main_container .sidebar .profile .img{
  padding: 0 18px;
}

.main_container .sidebar .profile img{
   width: 45px;
}

.main_container .sidebar .profile p:first-child{
  font-size: 14px;
  color: #80CBC4;
  margin-bottom: 3px;
}

.main_container .container{
  margin-top: 60px;
  width: calc(100% - 225px);
  margin-left: 225px;
  padding: 30px;
  transition: all 0.3s ease;
}

.main_container .sidebar ul li a{
  color: #fff;
  font-size: 18px;
  padding: 20px 30px;
  white-space: nowrap;
  display: flex;
  align-items: center;
  margin-bottom: 1px;
  transition: all 0.3s ease;
}

.main_container .sidebar ul li a .icon{
  margin-right: 15px;
  font-size: 28px;
}

.main_container .sidebar ul li a span{
  display: inline-block;
}

.main_container .sidebar ul li a:hover,
.main_container .sidebar ul li a.active{
  background: #fff;
  color: #004D40;
}

.main_container .container .item{
  background: #fff;
  border: 1px solid #E0F2F1;
  margin-bottom: 30px;
  padding: 20px;
  font-size: 14px;
  line-height: 22px;
}

/* after adding active class */
.wrapper.active .sidebar{
  width: 80px;
}

.wrapper.active .sidebar ul li a span.title,
.wrapper.active .profile_info
{
  display: none;
}

.wrapper.active .main_container .container{
  width: calc(100% - 80px);
  margin-left: 80px;
}

.container {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #61c6d4;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
        
        canvas {
            max-width: 55%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
</style>
<body>

    <div class="dashboard">
        
        
        <div class="wrapper">
   <div class="top_navbar">
      <div class="hamburger">
         <div class="hamburger__inner">
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
         </div>
      </div>
      <div class="menu">
         <div class="logo">
             PetCare Treasury
             
         </div>
          
         <div class="right_menu">
            <ul>
               <li>
                  <i class="fas fa-user"></i>
                  <div class="profile_dd">
                    <a href="adminLoginPage.php">
                          <div class="dd_item">Logout</div>
                      </a>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <div class="main_container">
      <div class="sidebar">
         <div class="sidebar__inner">
            <div class="profile">
               <div class="img">
                  <img src="adminIcon.png" alt="profile_pic">
               </div>
               <div class="profile_info">
                  <p>Welcome</p>
                  <p class="profile_name"><?php echo $row['uname']; ?></p>
               </div>
            </div>
            <ul>
               <li>
                  <a href="adminPetCare.php">
                  <span class="icon"><i class="fas fa-dice-d6"></i></span>
                  <span class="title">Dashboard</span>
                  </a>
               </li>
               <li>
                  <a href="adminUserList.php">
                  <span class="icon"><i class="fa-solid fa-users"></i></span>
                  <span class="title">Customers</span>
                  </a>
               </li>
               <li>
                  <a href="adminSalesPage.php" class="active">
                  <span class="icon"><i class="fa-solid fa-arrow-trend-up"></i></span>
                  <span class="title">Sales</span>
                  </a>
               </li>
              
            </ul>
         </div>
      </div>
      
       
       <div class="container">
    <h2>Overall Sales Details</h2>
    
    <canvas id="orderChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('orderChart').getContext('2d');

        // Fetch data from your backend
        fetch('getOrderChartData.php') // Replace with your actual backend endpoint
            .then(response => response.json())
            .then(data => {
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.productNames,
                        datasets: [{
                            label: 'Total Quantity',
                            data: data.totalQuantities,
                            backgroundColor: '#61c6d4',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    });
</script>
    
</div>
   </div>
</div>
    </div>
    
    <script>
    $(document).ready(function(){
	$(".hamburger .hamburger__inner").click(function () {
	$(".wrapper").toggleClass("active");
});

$(".top_navbar .fas").click(function () {
	$(".profile_dd").toggleClass("active");
});
});
    </script>
</body>
</html>
