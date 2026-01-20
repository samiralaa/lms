<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LMS Dashboard</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">

    <!-- Sidebar -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="#">
                <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="LMS Logo">
                <span class="ms-1 font-weight-bold">LMS Dashboard</span>
            </a>
        </div>
        <div class="collapse navbar-collapse w-auto vh-100 d-flex flex-column" id="sidenav-collapse-main"
            style="overflow-y: auto;">
            <ul class="navbar-nav flex-column">
                <li class="nav-item mb-2"><a class="nav-link active" href="#"><i
                            class="fas fa-home text-primary me-2"></i> Dashboard</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="#"><i class="fas fa-book text-success me-2"></i>
                        Courses</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="#"><i class="fas fa-users text-warning me-2"></i>
                        Students</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="#"><i
                            class="fas fa-chalkboard-teacher text-info me-2"></i> Instructors</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="#"><i class="fas fa-tasks text-danger me-2"></i>
                        Assignments</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="#"><i
                            class="fas fa-clipboard-check text-primary me-2"></i> Grades</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="#"><i
                            class="fas fa-calendar-check text-success me-2"></i> Attendance</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="#"><i class="fas fa-comments text-warning me-2"></i>
                        Discussions</a></li>
                <li class="nav-item mb-2">
                    <form action="" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                    </div>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="#" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="#">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New Assignment Submitted</span> by
                                                    John Doe
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i> 10 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="#" class="nav-link text-body p-0"><i class="fa fa-cog cursor-pointer"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content Area -->
       
    </main>
</body>

</html>
