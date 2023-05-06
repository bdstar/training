<?php require_once "database.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- START: Datatable -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
  <!-- END: Datatable -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="css/toastr.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index"><i class="fa fa-home" aria-hidden="true"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="page1?page=meeting"><i class="fa fa-windows" aria-hidden="true"></i> Meeting</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="page1?page=courses"><i class="fa fa-book" aria-hidden="true"></i> Courses</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="page1?page=institutions"><i class="fa fa-university" aria-hidden="true"></i> Institutions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="page1?page=profession"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Profession</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="page3?page=registration"><i class="fa fa-address-card" aria-hidden="true"></i> Registration</a>
      </li>

      <!--<li class="nav-item">
        <a class="nav-link" href="page2.php?page=cash"><i class="fa fa-list" aria-hidden="true"></i> Cash</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="page2.php?page=cards"><i class="fa fa-list" aria-hidden="true"></i> Cards</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="page2.php?page=withdrawn"><i class="fa fa-list" aria-hidden="true"></i> Withdrawn</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="page-budget.php?page=budget"><i class="fa fa-list" aria-hidden="true"></i> Budget</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="page3.php?page=daily"><i class="fa fa-list" aria-hidden="true"></i> Daily Cost</a>
      </li> -->
    </ul>
  </div>  
</nav>