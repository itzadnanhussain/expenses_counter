<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?>
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- base:css -->
    <link rel="stylesheet"
        href="<?php echo ADMIN_ASSETS; ?>vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet"
        href="<?php echo ADMIN_ASSETS; ?>vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet"
        href="<?php echo ADMIN_ASSETS; ?>vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- plugin css for this page -->
    <link rel="stylesheet"
        href="<?php echo ADMIN_ASSETS; ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet"
        href="<?php echo ADMIN_ASSETS; ?>vendors/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet"
        href="<?php echo ADMIN_ASSETS; ?>vendors/lightgallery/css/lightgallery.css">


    <!-- End plugin css for this page -->
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet"
        href="<?php echo ADMIN_ASSETS; ?>css/vertical-layout-light/style.css">
    <link rel="stylesheet"
        href="<?php echo ADMIN_ASSETS; ?>css/vertical-layout-light/custom.css">
    <!-- endinject -->
    <link rel="shortcut icon"
        href="<?php echo ADMIN_ASSETS; ?>images/favicon.png" />
</head>

<body class="sidebar-fixed">
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-left navbar-brand-wrapper d-flex align-items-center justify-content-between">
                <a class="navbar-brand brand-logo"
                    href="<?php echo SERVER_ROOT_PATH; ?>admin/dashboard">
                    <!-- <img
                        src="<?php echo ADMIN_ASSETS; ?>images/logo.svg"
                    alt="logo" /> -->
                    <h3 class="logo-title">RENTAL APP</h3>
                </a>
                <a class="navbar-brand brand-logo-mini"
                    href="<?php echo SERVER_ROOT_PATH; ?>admin/dashboard">
                    <!-- <img src="<?php echo ADMIN_ASSETS; ?>images/logo-mini.svg"
                    alt="logo" /> -->
                    <h3 class="logo-title">R</h3>
                </a>
                <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
                        <a class="dropdown-toggle btn btn-outline-secondary btn-fw" href="#" data-toggle="dropdown"
                            id="pagesDropdown">
                            <span class="nav-profile-name">Pages</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="pagesDropdown">
                            <a class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item">
                                <i class="mdi mdi-logout text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li> -->

                </ul>
                <ul class="navbar-nav navbar-nav-right">


                    <!-- <li class="nav-item nav-search d-none d-lg-flex">
                        <div class="input-group" style="height: 40px; padding:0px">
                            <div class="input-group-prepend" style="padding-left: 10px;font-size: 11px;">
                                <span class="input-group-text" id="search">
                                    <i class="mdi mdi-magnify" style="font-size: 20px;"></i>
                                </span>
                            </div>
                            <style>
                                .highlight {
                                    background-color: yellow;
                                }
                            </style>
                            <input type="text" id="filter-input" name="keyword" class="form-control"
                                onkeyup="filter_content()" placeholder="Type to search..." aria-label="search"
                                aria-describedby="search" autocomplete="off" style="font-size: 15px;padding-left: 7px;">

                        </div>
                    </li> -->

                    <li class="nav-item dropdown">


                        <a class="nav-link profile-image count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                            id="pagesDropdown" href="#" data-toggle="dropdown">
                            <img src="<?php echo ADMIN_ASSETS.'images/profile/admin.jpg' ?>"
                                class="nav-user-icon" width="30px" style="border-radius: 25px;" alt="profile" />

                            <i class="fa fa-angle-down"></i>
                        </a>


                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown " aria-labelledby="pagesDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-user-circle-o text-primary"></i>
                                My Profile
                            </a>

                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fa fa-info-circle text-primary"></i>
                                About Us
                            </a>

                            <a class="dropdown-item" href="#">
                                <i class="fa fa-key text-primary"></i>
                                Change Password
                            </a>

                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fa fa-file-text-o text-primary"></i>
                                Terms & Conditions
                            </a>


                            <a class="dropdown-item"
                                href="<?php echo SERVER_ROOT_PATH.'admin/logout' ?>">
                                <i class="fa fa-sign-out text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <div class="nav-link d-flex">
                            <div class="profile-image">
                                <img src="<?php echo ADMIN_ASSETS.'images/profile/admin.jpg' ?>"
                                    alt="image">
                            </div>
                            <div class="profile-name">
                                <p class="name">
                                    Edwin Harring
                                </p>
                                <p class="designation">
                                    Manager
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item" id="dashboard">
                        <a class="nav-link"
                            href="<?php echo SERVER_ROOT_PATH.'admin/dashboard' ?>">
                            <i class="fa fa-dashboard menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item" id="user">
                        <a class="nav-link"
                            href="<?php echo SERVER_ROOT_PATH.'admin/users_list' ?>">
                            <!-- <i class="mdi mdi-account-multiple menu-icon"></i> -->
                            <i class="fa fa-users menu-icon"></i>
                            <span class="menu-title">Users</span>
                        </a>
                    </li>
                    <li class="nav-item" id="content">
                        <a class="nav-link"
                            href="<?php echo SERVER_ROOT_PATH.'admin/content_list' ?>">
                            <i class="fa fa-tasks menu-icon"></i>
                            <span class="menu-title">Content</span>
                        </a>
                    </li>
                    <li class="nav-item" id="payment">
                        <a class="nav-link"
                            href="<?php echo SERVER_ROOT_PATH.'admin/payment_list' ?>">
                            <i class="fa fa-credit-card menu-icon"></i>
                            <span class="menu-title">Payment</span>
                        </a>
                    </li>
                    <li class="nav-item" id="category">
                        <a class="nav-link"
                            href="<?php echo SERVER_ROOT_PATH.'admin/category_list' ?>">
                            <i class="fa fa-paw menu-icon"></i>
                            <span class="menu-title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item" id="property">
                        <a class="nav-link"
                            href="<?php echo SERVER_ROOT_PATH.'admin/property_list' ?>">
                            <i class="fa fa-building menu-icon"></i>
                            <span class="menu-title">Property</span>
                        </a>
                    </li>
                    <li class="nav-item" id="booking">
                        <a class="nav-link"
                            href="<?php echo SERVER_ROOT_PATH.'admin/booking_list' ?>">
                            <i class="fa fa-home menu-icon"></i>
                            <span class="menu-title">Booking</span>
                        </a>
                    </li>
                    <li class="nav-item" id="review">
                        <a class="nav-link"
                            href="<?php echo SERVER_ROOT_PATH.'admin/review_list' ?>">
                            <i class="fa fa-star menu-icon"></i>
                            <span class="menu-title">Reviews</span>
                        </a>
                    </li>
                    <li class="nav-item" id="email">
                        <a class="nav-link"
                            href="<?php echo SERVER_ROOT_PATH.'admin/email_temp_list' ?>">
                            <i class="fa fa-envelope menu-icon"></i>
                            <span class="menu-title">Email</span>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="mdi mdi-view-array menu-icon"></i>
                            <span class="menu-title">UI Elements</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="../../pages/ui-features/accordions.html">Accordions</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="../../pages/ui-features/buttons.html">Buttons</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="../../pages/ui-features/badges.html">Badges</a></li>

                            </ul>
                        </div>
                    </li> -->

                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">