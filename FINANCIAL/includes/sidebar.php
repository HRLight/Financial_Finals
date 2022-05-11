 <a href="index3.html" class="brand-link navbar-green">
      <img src="log_css/logo2.gif" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">FMS FINANCE</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php
                  echo "<b>".$_SESSION['fname']. $_SESSION['lname']."</b>"
                    
                  ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="./index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
 <!-- DONE Collection -->
             <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-coins "></i>
              <p>
                Collection
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
           
              <li class="nav-item">
                <a href="customer.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Costumer</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="col_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collection List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="col.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Report</p>
                </a>
              </li>
             
            </ul>
          </li>
<!-- Done Budget Management -->
             <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Budget Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="budget_allo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Budget Allocation
                  </p>
                </a>


              </li>
              <li class="nav-item">
                <a href="budget_req.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Budget Request</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="budget_reports.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reports</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Done -->
          <li class="nav-item">
            <a href="disburse.php" class="nav-link">
              <i class="nav-icon fas fa-stamp"></i>
              <p>
                 Disbursement
              </p>
            </a>
          </li>
         <!-- Done -->
          <li class="nav-item">
            <a href="recievable.php" class="nav-link">
              <i class="nav-icon    fas fa-receipt"></i>
              <p>
                 Recieveble
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="payable.php" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                 Payable
              </p>
            </a>
          </li>
          </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                General Ledger
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="journal_entry.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Journal Entry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="chartofacc.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chart Of Accounts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="trailbal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trial Balance</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-gear"></i>
              <p>
                 Settings
              </p>
            </a>
          </li>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
                 Log-Out
              </p>
            </a>
          </li>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->