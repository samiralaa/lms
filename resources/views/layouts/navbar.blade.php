<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active">@yield('title', 'Dashboard')</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">@yield('title', 'Dashboard')</h6>
        </nav>
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Type here...">
            </div>
        </div>
    </div>
</nav>
