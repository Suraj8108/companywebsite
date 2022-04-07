<div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Gajanan</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="/dashboard" class="active">
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
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box" style="max-width:300px">
        <input id="comp_name" name="comp_name" type="text" placeholder="Company Name" value="Gajanan Laser">
        
      </div>
      <div class="search-box" style="max-width:300px">
        <input id="rec_name" name="rec_name" type="text" placeholder="Billed To" required>
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">{{ $user['name'] }}</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>