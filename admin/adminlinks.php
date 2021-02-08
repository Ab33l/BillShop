<div class="topnav">	
<a href="admin.php">Home</a>
<a href="../index.php">Site</a>
<!--table in shop with supermarket,category, brand -->
<a href="categories.php">Categories</a>
<a href="products.php">Products</a>
<a href="users.php">Users</a>
<a href="archived.php">Archived</a>
<a href="vieworders.php">View Orders</a>
<ul>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello <?php echo $_SESSION['UserID']; ?> !
  <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="change_password.php" style="color:black;">Change Password</a></li>
    <li><a href="logout.php" style="color:black;">Log Out</a></li>
  </ul>
</li>
</ul>
</div>