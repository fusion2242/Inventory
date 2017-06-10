 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/dist/img/img.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin Inventory System</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="/">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          
        </li>
        <li class="<?php if(Request::segment(1) == "manage-purchase"){echo "active";}else{echo "";}?> treeview">
          <a href="#">
            <i class="fa fa-calendar-plus-o"></i>
            <span>Accounts</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(Request::segment(2) == "supplier"){echo "active";}else{echo "";}?> treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i>
            <span>voucher</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class=" treeview-menu">
            <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/manage-purchase/supplier"><i class="glyphicon glyphicon-plus"></i>Cash Payment Voucher</a></li>
            <li class="<?php if(Request::segment(3) == "manage"){echo "active";}else{echo "";}?>"><a href="/manage-purchase/supplier/manage"><i class="glyphicon glyphicon-briefcase"></i>Bank Payment Voucher</a></li>
                        <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/manage-purchase/supplier"><i class="glyphicon glyphicon-plus"></i>Cash Recieving Voucher</a></li>
                                    <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/manage-purchase/supplier"><i class="glyphicon glyphicon-plus"></i>Bank Recieving Voucher</a></li>
                                                <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/manage-purchase/supplier"><i class="glyphicon glyphicon-plus"></i>General Voucher</a></li>
            </ul>
          </li>
             <li class="<?php if(Request::segment(2) == "purchase"){echo "active";}else{echo "";}?> treeview">
          <a href="#">
            <i class="glyphicon glyphicon-credit-card"></i>
            <span>Chat Of Account</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/manage-purchase/purchase"><i class="glyphicon glyphicon-shopping-cart"></i>Account Class</a></li>
            <li class="<?php if(Request::segment(3) == "history"){echo "active";}else{echo "";}?>"><a href="/manage-purchase/purchase/history"><i class="glyphicon glyphicon-th-list"></i>Account Group</a></li>
                        <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/manage-purchase/purchase"><i class="glyphicon glyphicon-shopping-cart"></i>Accounts</a></li>
                                    <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/manage-purchase/purchase"><i class="glyphicon glyphicon-shopping-cart"></i>Sub Accounts</a></li>
            </ul>
          </li>
                     <li class="<?php if(Request::segment(2) == "purchase"){echo "active";}else{echo "";}?> treeview">
          <a href="#">
            <i class="glyphicon glyphicon-credit-card"></i>
            <span>Ladgers</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/partyledgers"><i class="glyphicon glyphicon-shopping-cart"></i>Party Ladgers</a></li>
            </ul>
          </li>
                     <li class="<?php if(Request::segment(2) == "purchase"){echo "active";}else{echo "";}?> treeview">
          <a href="#">
            <i class="glyphicon glyphicon-credit-card"></i>
            <span>Reports</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/manage-purchase/purchase"><i class="glyphicon glyphicon-shopping-cart"></i>Bank Reconciliation</a></li>
            <li class="<?php if(Request::segment(3) == "history"){echo "active";}else{echo "";}?>"><a href="/manage-purchase/purchase/history"><i class="glyphicon glyphicon-th-list"></i>Cash flow statement</a></li>
                        <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/manage-purchase/purchase"><i class="glyphicon glyphicon-shopping-cart"></i>Profit and Lost Account</a></li>
                                    <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/manage-purchase/purchase"><i class="glyphicon glyphicon-shopping-cart"></i>Balance Sheet</a></li>
                                                <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/manage-purchase/purchase"><i class="glyphicon glyphicon-shopping-cart"></i>Trial Balance</a></li>
            </ul>
          </li>
          </ul>
        </li>
         <li class="<?php if(Request::segment(1) == "product"){echo "active";}else{echo "";}?> treeview">
          
       
    </section>
    <!-- /.sidebar -->
  </aside>