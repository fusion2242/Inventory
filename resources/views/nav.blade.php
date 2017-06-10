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
         <span>Manage Purchase</span>
         <span class="pull-right-container">
         </span>
         </a>
         <ul class="treeview-menu">
            <li class="<?php if(Request::segment(2) == "supplier"){echo "active";}else{echo "";}?> treeview">
               <a href="#">
               <i class="glyphicon glyphicon-user"></i>
               <span>Supplier</span>
               <span class="pull-right-container">
               </span>
               </a>
               <ul class=" treeview-menu">
                  <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/manage-purchase/supplier"><i class="glyphicon glyphicon-plus"></i>Add Supplier</a></li>
                  <li class="<?php if(Request::segment(3) == "manage"){echo "active";}else{echo "";}?>"><a href="/manage-purchase/supplier/manage"><i class="glyphicon glyphicon-briefcase"></i>Manage Supplier</a></li>
               </ul>
            </li>
            <li class="<?php if(Request::segment(2) == "purchase"){echo "active";}else{echo "";}?> treeview">
               <a href="#">
               <i class="glyphicon glyphicon-credit-card"></i>
               <span>Purchases</span>
               <span class="pull-right-container">
               </span>
               </a>
               <ul class="treeview-menu">
                  <li class="<?php if(Request::segment(3) == ""){echo "active";}else{echo "";}?>"><a href="/manage-purchase/purchase"><i class="glyphicon glyphicon-shopping-cart"></i>New Purchases</a></li>
                  <li class="<?php if(Request::segment(3) == "history"){echo "active";}else{echo "";}?>"><a href="/manage-purchase/purchase/history"><i class="glyphicon glyphicon-th-list"></i>Purchases History</a></li>
               </ul>
            </li>
         </ul>
      </li>
      <li class="<?php if(Request::segment(1) == "product"){echo "active";}else{echo "";}?> treeview">
         <a href="#">
         <i class="fa fa-tags"></i>
         <span>Product</span>
         <span class="pull-right-container">
         </span>
         </a>
         <ul class="treeview-menu">
            <li class="<?php if(Request::segment(2) == "add"){echo "active";}else{echo "";}?>"><a href="/product/add"><i class="glyphicon glyphicon-plus"></i>Add Product</a></li>
            <li class="<?php if(Request::segment(2) == "manage"){echo "active";}else{echo "";}?>"><a href="/product/manage"><i class="glyphicon glyphicon-th-list"></i>Manage Product</a></li>
             
            <li class="<?php if(Request::segment(2) == "damage"){echo "active";}else{echo "";}?>"><a href="/product/damage"><i class="glyphicon glyphicon-trash"></i>Damage Product</a></li>
            <li class="<?php if(Request::segment(2) == "category"){echo "active";}else{echo "";}?> treeview">
               <a href="#">
               <i class="glyphicon glyphicon-indent-left"></i>
               <span>Category</span>
               <span class="pull-right-container">
               </span>
               </a>
               <ul class="treeview-menu">
                  <li class="<?php if(Request::segment(3) == "add"){echo "active";}else{echo "";}?>"><a href="/product/category/add"><i class="glyphicon glyphicon-tag"></i>Product Category</a></li>
                  <!--   <li class="<?php if(Request::segment(3) == "addsubcategory"){echo "active";}else{echo "";}?>"><a href="/product/category/addsubcategory"><i class="glyphicon glyphicon-tag"></i>Sub Category</a></li> -->
               </ul>
            </li>
         </ul>
      </li>
    <li class="<?php if(Request::segment(1) == "order"){echo "active";}else{echo "";}?> treeview">
         <a href="#">
         <i class="glyphicon glyphicon-shopping-cart"></i>
         <span>Order Process</span>
         <span class="pull-right-container">
         </span>
         </a>
         <ul class="treeview-menu">
            <li class="<?php if(Request::segment(2) == "add"){echo "active";}else{echo "";}?>"><a href="/order/add"><i class="fa fa-cart-plus"></i>Add Order</a></li>
            <li class="<?php if(Request::segment(2) == "addMixed"){echo "active";}else{echo "";}?>"><a href="/order/addMixed"><i class="fa fa-cart-plus"></i>Add Order (Mixed)</a></li>
            <li class="<?php if(Request::segment(2) == "manage"){echo "active";}else{echo "";}?>"><a href="/order/manage"><i class="glyphicon glyphicon-th-list"></i>Manage Order</a></li>
            <li class="<?php if(Request::segment(2) == "manageMix"){echo "active";}else{echo "";}?>"><a href="/order/manageMix"><i class="glyphicon glyphicon-th-list"></i>Manage Order (Mixed)</a></li>
            <li class="<?php if(Request::segment(2) == "invoice"){echo "active";}else{echo "";}?>"><a href="/order/invoice"><i class="glyphicon glyphicon-list-alt"></i>Manage Invoice</a></li>
         </ul>
      </li> 
      <li class=" treeview">
         <a href="#">
         <i class="fa fa-user"></i>
         <span>Customer</span>
         <span class="pull-right-container">
         </span>
         </a>
         <ul class="treeview-menu">
            <li><a href="/customer/add"><i class="glyphicon glyphicon-plus"></i>Add Customer</a></li>
            <li><a href="/customer/manage"><i class="glyphicon glyphicon-th-list"></i>Manage Customer</a></li>
         </ul>
      </li>
    <li class="<?php if(Request::segment(1) == "report"){echo "active";}else{echo "";}?> treeview">
         <a href="#">
         <i class="fa fa-file-text-o"></i>
         <span>Report</span>
         <span class="pull-right-container">
         </span>
         </a>
         <ul class="treeview-menu">
            <li class="<?php if(Request::segment(2) == "sale"){echo "active";}else{echo "";}?>"><a href="/report/sale"><i class="fa fa-bar-chart"></i>Sales Report</a></li>
            <li class="<?php if(Request::segment(2) == "sales_summary"){echo "active";}else{echo "";}?>"><a href="/report/sales_summary"><i class="fa fa-circle-o"></i>Sales Summary Report</a></li>
            <li class="<?php if(Request::segment(2) == "purchase"){echo "active";}else{echo "";}?>"><a href="/report/purchase"><i class="fa fa-line-chart"></i>Purchase Report</a></li>
            <li class="<?php if(Request::segment(2) == "stock"){echo "active";}else{echo "";}?>"><a href="/report/stock"><i class="fa fa-files-o"></i>Stock Report</a></li>
         </ul>
      </li> 
      <li class="<?php if(Request::segment(1) == "employee"){echo "active";}else{echo "";}?> treeview">
         <a href="#">
         <i class="fa fa-users"></i> <span>Employee Management</span>
         <span class="pull-right-container">
         </span>
         </a>
         <ul class="treeview-menu">
            <li class="<?php if(Request::segment(2) == "add"){echo "active";}else{echo "";}?>"><a href="/employee/add"><i class="fa fa-user"></i>Add Employee</a></li>
            <li class="<?php if(Request::segment(2) == "manage"){echo "active";}else{echo "";}?>"><a href="/employee/get"><i class="fa fa-users"></i>Manage Employee</a></li>
         </ul>
      </li>
      <!-- mix -->
      <li class="<?php if(Request::segment(1) == "managepurchase"){echo "active";}else{echo "";}?> treeview">
         <a href="/mixing">
         <i class="glyphicon glyphicon-th-large"></i>
         <span>MIXING</span>
         <span class="pull-right-container">
         <span class="label label-primary pull-right">1</span>
         </span>
         </a>
         <ul class="treeview-menu">
            <li class="<?php if(Request::segment(2) == "supplier"){echo "active";}else{echo "";}?> treeview">
               <a href="/mixing/add">
               <i class="glyphicon glyphicon-gift"></i>
               <span>Add Mixing Product</span>
               <span class="pull-right-container">
               <span class="label label-primary pull-right"></span>
               </span>
               </a>
            </li>
            <li class="<?php if(Request::segment(2) == "supplier"){echo "active";}else{echo "";}?> treeview">
               <a href="/mixing/products">
               <i class="glyphicon glyphicon-gift"></i>
               <span>Mixed Products</span>
               <span class="pull-right-container">
               <span class="label label-primary pull-right"></span>
               </span>
               </a>
            </li>
            
         </ul>
      </li>
   </section>
   <!-- /.sidebar -->
</aside>