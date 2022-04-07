<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="{{ asset('/assets/css/dashboard.css', env("secure")) }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/companylist.css', env("secure")) }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/addcompany.css', env("secure")) }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> 
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
              <a href="/companydetails" class="active">
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
            <span class="dashboard">Transaction Details</span>
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
            <div class="box" style="max-width: 700px;width:auto;margin-left:500px">
              <div class="content">
                  @if($errors->has('err_msg'))
                    <div class="error_msg">{{ $errors->first('err_msg') }}</div>
                  @endif
      
                  @if($errors->has('succ_msg'))
                    <div class="succ_msg">{{ $errors->first('succ_msg') }}</div>
                  @endif
      
                  @if($errors->has('comp_name'))
                      <div class="field_error">{{ $errors->first('comp_name') }}</div>
                  @endif
                  @if($errors->has('status'))
                    <div class="field_error">{{ $errors->first('status') }}</div>
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
                  @if($errors->has('status'))
                    <div class="field_error">{{ $errors->first('status') }}</div>
                  @endif
                  @if($errors->has('pend_amt'))
                    <div class="field_error">{{ $errors->first('pend_amt') }}</div>
                  @endif
                    <div class="box-topic">Add Trasaction Details</div>
                    <form action="addtransaction" method="POST">
                      @csrf
                      <div class="user-details">
                        <div class="input-box">
                          <span class="details required">Company Name</span>
                          <input type="text" name="comp_name" id="comp_name" placeholder="Enter Company name" required>
                        </div>
                        <div class="input-box">
                          <span class="details required">Gst No.</span>
                          <input type="text" name="gst" id="comp_gst" placeholder="Enter your GST number" required readonly>
                        </div>
                        <div class="input-box">
                          <span class="details">Company Email id</span>
                          <input type="email" name="comp_email"id="comp_email" placeholder="Enter companys Email" readonly>
                        </div>
                        <div class="input-box">
                          <span class="details required">Contact Number</span>
                          <input type="number" name="comp_mob" id="comp_mob" placeholder="Enter contact number" required readonly>
                        </div>
                        <div class="input-box ">
                          <span class="details required">Company Address</span>
                          <textarea class="address" name="comp_add" id="comp_add" rows="4" cols="50" placeholder="Enter Company address" required readonly></textarea>
                        </div>
                        <div class="input-box"></div>
                        <div class="input-box ">
                          <span class="details required">Transaction</span>
                            <input id="checkbox" type="checkbox" name="status"/>
                            <label for="checkbox" ></label>
                        </div>
                        <div class="input-box">
                          <span class="details required">Actual Amount</span>
                          <input type="number" name="act_amt" id="act_amt" placeholder="Enter Actual amount" required>
                        </div>
                        <div class="input-box">
                          <span class="details required">Pending Amount</span>
                          <input type="number" name="pend_amt" id="pend_amt" placeholder="Enter pending amount">
                        </div>
                      <div class="button">
                        <input type="submit" value="Add">
                      </div>
                    </form>
                  </div>
               

            </div>
            </div>

            <div class="box" style="width: auto;">
              <div class="right-side">
                <div class="box-topic">List of Transactions</div>
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
                        <th>Status</th>
                        <th>Actual Amt</th>
                        <th>Pending Amt</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                  @foreach ($transactions as $index => $company)
                  <tr>
                  <td style="display:none;"><form id="form_{{ $company['id'] }}" action="/deletetrans" method="POST">
                    @csrf
                  <input type="hidden" form="form_{{ $company['id'] }}" name="trans_id" value="{{ $company['id'] }}">
                </form>
                  </td>
                  <td>{{ $index+1 }}</td>
                  <td>{{ $company['company']['comp_name'] }}</td>
                  <td>{{ $company['company']['comp_gst'] }}</td>
                  @if($company['transaction_status'] == 0)
                    <td><div class="status -pending">Pending</div></td>
                  @else
                  <td><div class="status -success">Done</div></td>
                  @endif
                  <td>{{ $company['actual_amount'] }}</td>
                  <td>{{ $company['pending_amount'] }}</td>
                  <td>{{ $company['created_at'] }}</td>
                  <td><input form="form_{{ $company['id'] }}" type="submit" value="Delete"></td>
                  </tr>
                  @endforeach

                </table>
              </div>  
          </div>
      </div>
        
        
  </section>

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

