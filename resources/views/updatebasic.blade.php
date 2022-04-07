<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="{{ asset('/assets/css/dashboard.css', env("secure")) }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/addcompany.css', env("secure")) }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
     <script src="{{ asset('/assets/js/addrow.js', env("secure")) }}"></script>
   </head>
<body>
    <div class="sidebar">
        <div class="logo-details">
          <i class='bx bxl-c-plus-plus'></i>
          <span class="logo_name">Gajanan</span>
        </div>
          <ul class="nav-links">
            <li>
              <a href="/dashboard">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="/addcompany" >
                <i class='bx bx-box' ></i>
                <span class="links_name">Add a company</span>
              </a>
            </li>
            <li>
              <a href="/companydetails">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">Transaction list</span>
              </a>
            </li>
            <li>
                <a href="/updatesdetails" class="active">
                  <i class='bx bx-list-ul' ></i>
                  <span class="links_name">Update Basic Details</span>
                </a>
              </li>
            <!--<li>
              <a href="#">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Analytics</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-coin-stack' ></i>
                <span class="links_name">Stock</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-book-alt' ></i>
                <span class="links_name">Total order</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-user' ></i>
                <span class="links_name">Team</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-message' ></i>
                <span class="links_name">Messages</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-heart' ></i>
                <span class="links_name">Favrorites</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Setting</span>
              </a>
            </li>-->
            <li class="log_out">
              <a href="/logout">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
              </a>
            </li>
          </ul>
      </div>
    
      <section class="home-section">
        <nav>
          <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Add a Company</span>
          </div>
          <!--<div class="search-box">
            <input type="text" placeholder="Search...">
            <i class='bx bx-search' ></i>
          </div>-->
          <div class="profile-details">
            <!--<img src="images/profile.jpg" alt="">-->
            <span class="admin_name">{{ $user['name'] }}</span>
            <i class='bx bx-chevron-down' ></i>
          </div>
        </nav>
        <div class="home-content">
          <div class="overview-boxes">
            <div class="box" style="max-width: 700px;width:auto">
              <div class="content">
                  @if($errors->has('err_msg'))
                    <div class="error_msg">{{ $errors->first('err_msg') }}</div>
                  @endif
      
                  @if($errors->has('succ_msg'))
                    <div class="succ_msg">{{ $errors->first('succ_msg') }}</div>
                  @endif
      
                  @if($errors->has('name'))
                      <div class="field_error">{{ $errors->first('name') }}</div>
                  @endif
                  @if($errors->has('email'))
                    <div class="field_error">{{ $errors->first('email') }}</div>
                  @endif
                    <div class="box-topic">User Details</div>
                    <form action="updateuser" method="POST">
                      @csrf
                      <div class="user-details">
                        <div class="input-box">
                          <span class="details required">Name</span>
                          <input type="text" name="name" value = "{{ $user['name'] }}" required>
                        </div>
                        <div class="input-box">
                          <span class="details required">Email</span>
                          <input type="text" name="email" value= "{{ $user['email'] }}" required>
                        </div>
                        <div class="input-box"></div>
                        <div class="input-box"></div>
                      <!--<div class="gender-details">
                        <input type="radio" name="gender" id="dot-1">
                        <input type="radio" name="gender" id="dot-2">
                        <input type="radio" name="gender" id="dot-3">
                        <span class="gender-title">Gender</span>
                        <div class="category">
                          <label for="dot-1">
                          <span class="dot one"></span>
                          <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                          <span class="dot two"></span>
                          <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                          <span class="dot three"></span>
                          <span class="gender">Prefer not to say</span>
                          </label>
                        </div>
                      </div>-->
                      <div class="button">
                        <input type="submit" value="Update">
                      </div>
                    </form>
                  </div>
               
            </div>
            </div>

            <div class="box" style="max-width: 700px;width:auto">
                <div class="content">
                    @if($errors->has('basic_err_msg'))
                      <div class="error_msg">{{ $errors->first('basic_err_msg') }}</div>
                    @endif
        
                    @if($errors->has('basic_succ_msg'))
                      <div class="succ_msg">{{ $errors->first('basic_succ_msg') }}</div>
                    @endif
        
                    @if($errors->has('cgst_rate'))
                        <div class="field_error">{{ $errors->first('cgst_rate') }}</div>
                    @endif
                    @if($errors->has('sgst_rate'))
                      <div class="field_error">{{ $errors->first('sgst_rate') }}</div>
                    @endif
                    @if($errors->has('igst_rate'))
                      <div class="field_error">{{ $errors->first('igst_rate') }}</div>
                    @endif
                      <div class="box-topic">Basic Details</div>
                      <form action="updatebasic" method="POST">
                      @foreach ($basics as $val)
                        @csrf
                        <div class="user-details">
                          <div class="input-box">
                            <span class="details required"> {{ $val['name'] }} (%)</span>
                            <input type="text" name="{{ $val['name'] }}" value="{{ $val['value'] }}" required>
                          </div>
                      </form>
                      @endforeach
                      <div class="button">
                        <input type="submit" value="Update">
                      </div>
                    </div>
                 
              </div>

      </section>

        <!--  Registration Page -->
        
      
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

 </script>

</body>
</html>

