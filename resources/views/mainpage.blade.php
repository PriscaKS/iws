<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Malawian Airlines - Luggage Management Dashboard</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Fontawesome CDN Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <style>
      /* Import Google font - Poppins */
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }
      body {
        display: flex;
        min-height: 100vh;
        background: #e7f2fd;
      }
      .sidebar {
        position: fixed;
        height: 100%;
        width: 260px;
        background: #11101d;
        padding: 15px;
        z-index: 99;
        overflow-y: auto;
      }
      .sidebar .logo {
        font-size: 25px;
        padding: 15px;
        color: #fff;
        text-align: center;
      }
      .sidebar a {
        color: #fff;
        text-decoration: none;
      }
      .sidebar ul {
        list-style: none;
        padding: 20px 0;
      }
      .sidebar ul li {
        padding: 10px 20px;
        border-radius: 8px;
        margin-bottom: 10px;
        transition: background 0.3s;
      }
      .sidebar ul li:hover {
        background: rgba(255, 255, 255, 0.1);
      }
      .sidebar ul li a {
        display: flex;
        align-items: center;
        font-size: 16px;
      }
      .sidebar ul li a i {
        margin-right: 15px;
      }
      .navbar {
        width: calc(100% - 260px);
        height: 60px;
        background:#ffdd57;
        padding: 15px 30px;
        color: #fff;
        position: fixed;
        left: 260px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        z-index: 1000;
        transition: all 0.5s ease;
      }
      .navbar .nav-links {
        display: flex;
        align-items: center;
      }
      .navbar .nav-icon {
        font-size: 24px;
        cursor: pointer;
        margin-right: 20px;
      }
      .navbar .nav-link {
        color: #fff;
        font-size: 18px;
        margin-left: 20px;
        transition: color 0.3s;
      }
      .navbar .nav-link:hover {
        color: #11101d;
      }
      .main {
        margin-left: 260px;
        padding: 60px 0px;
        transition: all 0.5s ease;
        width: calc(100% - 260px);
      }
      .main h1 {
        font-size: 80px;
        color: #fff;
        text-align: center;
        margin-bottom: 40px;
      }
      .sidebar .profile-section {
  padding: 15px 20px;
  border-radius: 8px;
  
  margin-bottom: 10px;
}

.sidebar .profile-header {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #fff;
  text-align: center;
}

.sidebar .profile-icon {
  font-size: 96px; 
  margin-bottom: 10px;
}

.sidebar .profile-details {
  color: #ddd;
  line-height: 35px;
  font-size: 35px;
}

.sidebar .profile-details p {
  margin: 5px 0;
}

      .sidebar.close {
        width: 80px;
      }
      .sidebar.close ul li a span {
        display: none;
      }
      .sidebar.close ul li a i {
        font-size: 30px;
        margin-right: 0;
      }
      .sidebar.close .logo {
        font-size: 20px;
      }
      .sidebar.close ~ .navbar {
        left: 80px;
        width: calc(100% - 80px);
      }
      .sidebar.close ~ .main {
        margin-left: 80px;
        width: calc(100% - 80px);
      }
      .submenu {
        display: none;
      }
      .submenu-active .submenu {
        display: block;
        padding-left: 20px;
      }
      .card-title {
        font-weight: 600;
        font-size: 20px;
      }
      @media (max-width: 991px) {
        .navbar {
          left: 0;
          width: 100%;
        }
        .sidebar {
          width: 100%;
          height: auto;
          position: relative;
        }
        .sidebar.close {
          width: 100%;
        }
        .main {
          margin-left: 0;
          width: 100%;
          padding: 20px;
        }
        .navbar .nav-links {
          margin-top: 15px;
        }
      }
    
      .card-deck {
         display: grid;
         grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
         gap: 20px;
         padding-top: 35px;
}

.card {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
  background: #11101d;
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

@media (max-width: 768px) {
  .card-deck {
    grid-template-columns: repeat(auto-fill, minmax(100%, 1fr));
  }
}

@media (min-width: 769px) and (max-width: 1199px) {
  .card-deck {
    grid-template-columns: repeat(auto-fill, minmax(50%, 1fr));
  }
}

@media (min-width: 1200px) {
  .card-deck {
    grid-template-columns: repeat(auto-fill, minmax(45%, 1fr));
  }
}

      .profile-section .profile-details {
        margin-top: 10px;
        padding-left: 30px;
        font-size: 14px;
        color: #ccc;
    }

.profile-section .profile-details p {
  margin-bottom: 5px;
}
/* Background image */
.background-container {
  position: relative;
  background-image: url('./images/aeroplane.jpg'); 
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 400px;
  padding: 40px; /* Adjust padding as needed */
  color: white; /* White text color for contrast */
  text-align: center;
  border-radius: 8px; /* Optional: Add rounded corners */
  overflow: hidden; /* Ensure content doesn't overflow rounded corners */
}

.background-container h1 {
  position: relative;
  z-index: 1; /* Ensure the text is above the overlay */
  font-size: 2em; /* Adjust size as needed */
  margin: 0;
}

.background-container::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5); /* Dark overlay for readability */
  z-index: 0; /* Ensure the overlay is behind the text */
  border-radius: 8px; /* Match border radius if used */
}
.btn-color{
    background-color:#ffdd57;
}
.text-center{
    color: #fff;
}
.card-title{
    color:#ffdd57;
}


    </style>
  </head>
  <body>
    <nav class="sidebar">
        <div class="logo" style="color: #ffdd57;">Malawian Airlines</div>
        <ul>
          <!-- Customer Profile Section -->
          <li class="item profile-section">
            <div class="profile-header">
              <i class="fa-solid fa-user profile-icon  "></i>
              <span style="color: #ffdd57;font-size: 21px">Customer Profile</span>
            </div>
            <div class="profile-details">
              <p><strong style="color: #ffdd57; font-size: 17px;">Name:</strong> John Doe</p>
              <p><strong style="color: #ffdd57; font-size: 17px">Email:</strong> johndoe@example.com</p>
              <p><strong style="color: #ffdd57; font-size: 17px">Phone:</strong> +265 123 456 789</p>
              <p><strong style="color: #ffdd57; font-size: 17px">Luggage Count:</strong> 2</p>
            </div>
          </li>
<!--       
          <li>
            <a href="#"><i class="fa-solid fa-cog"></i><span>Settings</span></a>
          </li> -->
        </ul>
      </nav>
      
      
    <!-- START OF NAVIGATION BAR -->
    <nav class="navbar">
      <div class="nav-icon">
        <i class="fa-solid fa-bars" id="sidebar-toggle"></i>
      </div>
      <div class="nav-links">
        <a href="#" class="nav-link">
          <i class="fa-solid fa-home"></i> Home
        </a>
        <a href="#" class="nav-link">
          <i class="fa-solid fa-bell"></i> Notifications
        </a>
      </div>
    </nav>
    <!-- END OF NAVIGATION BAR -->
    <main class="main">
        <div class="background-container">
            <h1 style="line-height: 95px; font-size: 45px;"><span style="color: #ffdd57; font-weight: 700;">Welcome</span> to Malawian Airlines  <br>Management System</h1>
        </div>
        
      

      <div class="container">
        <div class="card-deck ">
          <div class="card mb-4">
            <div class="card-body text-center">
              <i class="fa-solid fa-plane fa-2x mb-3"></i>
              <h5 class="card-title">Register Flight</h5>
              <p class="card-text">
                Register flight details including departure and destination information.
              </p>
              <a href="./registerFlight.html" class="btn btn-color">Register flight</a>
            </div>
          </div>
          
          <div class="card mb-4">
            <div class="card-body text-center">
              <i class="fa-solid fa-suitcase-rolling fa-2x mb-3"></i>
              <h5 class="card-title">Register Luggage</h5>
              <p class="card-text">
                Register and manage customer luggage details including departure and destination information.
              </p>
              <a href="./registerLaggage.html" class="btn btn-color">Register Luggage</a>
            </div>
          </div>
          <div class="card mb-4">
            <div class="card-body text-center">
              <i class="fa-solid fa-clipboard-list fa-2x mb-3"></i>
              <h5 class="card-title">Generated QR Code</h5>
              <p class="card-text">
                Generated a QR code for easy tracking of luggage information.
              </p>
              <a href="./qr_code_page.html" class="btn btn-color">Generate QR Code</a>
            </div>

      </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
      document.getElementById("sidebar-toggle").addEventListener("click", function () {
        document.querySelector(".sidebar").classList.toggle("close");
        document.querySelector(".navbar").classList.toggle("close");
        document.querySelector(".main").classList.toggle("close");
      });
    </script>
  </body>
</html>
