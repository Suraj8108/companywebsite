<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="{{ url('/assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/addcompany.css') }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
     <script src="{{ url('/assets/js/addrow.js') }}"></script>
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
              <a href="/addcompany" class="active">
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
              <a href="/updatesdetails">
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
                  @if($errors->has('gst'))
                    <div class="field_error">{{ $errors->first('gst') }}</div>
                  @endif
                  @if($errors->has('email'))
                    <div class="field_error">{{ $errors->first('email') }}</div>
                  @endif
                  @if($errors->has('number'))
                    <div class="field_error">{{ $errors->first('number') }}</div>
                  @endif
                  @if($errors->has('address'))
                    <div class="field_error">{{ $errors->first('address') }}</div>
                  @endif
                    <div class="box-topic">Registration</div>
                    <form action="addcompany" method="POST">
                      @csrf
                      <div class="user-details">
                        <div class="input-box">
                          <span class="details required">Company Name</span>
                          <input type="text" name="name" placeholder="Enter Company name" required>
                        </div>
                        <div class="input-box">
                          <span class="details required">Gst No.</span>
                          <input type="text" name="gst" placeholder="Enter your GST number" required>
                        </div>
                        <div class="input-box">
                          <span class="details">Company Email id</span>
                          <input type="email" name="email" placeholder="Enter companys Email" >
                        </div>
                        <div class="input-box">
                          <span class="details required">Contact Number</span>
                          <input type="number" name="number"placeholder="Enter contact number" required>
                        </div>
                        <div class="input-box ">
                          <span class="details required">Company Address</span>
                          <textarea class="address" name="address" rows="4" cols="50" placeholder="Enter Company address" required></textarea>
                        </div>
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
                        <input type="submit" value="Register">
                      </div>
                    </form>
                  </div>
               

            </div>
            </div>

            <div class="box" style="width: auto;">
              <div class="right-side">
                <div class="box-topic">List of Company</div>
                @if($errors->has('err_msg_delete'))
                    <div style="color: red; text-align:center;">{{ $errors->first('err_msg_delete') }}</div>
                  @endif
      
                  @if($errors->has('succ_msg_delete'))
                    <div style="color: green; text-align:center;">{{ $errors->first('succ_msg_delete') }}</div>
                  @endif
                <table>
                    <tr>
                        <th>Sr No.</th>
                        <th>Company Name</th>
                        <th>GST No.</th>
                        <th>Company Contact</th>
                        <th>Action</th>
                    </tr>
                  
                  @foreach ($companies as $company)
                  <tr>
                  <td style="display:none;"><form id="form_{{ $company['id'] }}" action="/deletecompany" method="POST">
                    @csrf
                  <input type="hidden" form="form_{{ $company['id'] }}" name="comp_id" value="{{ $company['id'] }}">
                </form>
                  </td>
                  <td>{{ $company['id'] - $companies[0]['id'] + 1}}</td>
                  <td>{{ $company['comp_name'] }}</td>
                  <td>{{ $company['comp_gst'] }}</td>
                  <td>{{ $company['comp_number'] }}</td>
                  <td><input form="form_{{ $company['id'] }}" type="submit" value="Delete"></td>
                  </tr>
                  @endforeach

                </table>
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

