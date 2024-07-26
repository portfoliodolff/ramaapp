<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Helpdesk <sup>By rama</sup></div>
    </a>

    <!-- Divider -->
    <!-- Side Bar admin -->
    <hr class="sidebar-divider my-0">
    <?php if (session()->get('level') == 1) { ?>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/pages/index">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            All Menu
        </div>



        <!-- Nav Item - Charts -->
        <li class="nav-item">

            <a class="nav-link" href="/report/report">

                <i class="fas fa-fw fa-chart-area"> </i>
                <span>Report </span>

            </a>

        </li>


        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="/datastasiun/datastasiun">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Data Stasiun</span></span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="/inventory/datainventory">
                <i class="fas fa-fw fa-table"></i>
                <span>Inventory </span></span></a>
        </li>
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="/datateknisi/datateknisi">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Teknisi
                </span></span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    <?php  } ?>
    <!-- Sidebar Petugas Stasiun -->
    <?php if (session()->get('level') == 2) { ?>


        <li class="nav-item active">
            <a class="nav-link" href="/pages/index">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>



        <hr class="sidebar-divider">


        <div class="sidebar-heading">
            All Menu
        </div>




        <li class="nav-item">


            <a class="nav-link" href="/report/report">

                <i class="fas fa-fw fa-chart-area"> </i>
                <span>Report </span>

            </a>

        </li>

        <!-- 

<li class="nav-item">
    <a class="nav-link" href="/datastasiun/datastasiun">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Data Stasiun</span></span></a>
</li>


<li class="nav-item">
    <a class="nav-link" href="/inventory/datainventory">
        <i class="fas fa-fw fa-table"></i>
        <span>Inventory </span></span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="/datateknisi/datateknisi">
        <i class="fas fa-fw fa-table"></i>
        <span>Data Teknisi
        </span></span></a>
</li>



<hr class="sidebar-divider d-none d-md-block">


<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div> -->

    <?php  } ?>

    <!-- Sidebar Staff it -->
    <?php if (session()->get('level') == 3) { ?>


        <li class="nav-item active">
            <a class="nav-link" href="/pages/index">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- <li class="nav-item active">
            <a class="nav-link" href="/datateknisi/datateknisi">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Cek Profil</span></a>
        </li>
 -->


        <!-- <li class="nav-item">
            <a class="nav-link" href="/datateknisi/cekprofil">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Cek Profil</span></a>
        </li> -->

        <!-- 

<li class="nav-item">
<a class="nav-link" href="/datastasiun/datastasiun">
<i class="fas fa-fw fa-chart-area"></i>
<span>Data Stasiun</span></span></a>
</li>


<li class="nav-item">
<a class="nav-link" href="/inventory/datainventory">
<i class="fas fa-fw fa-table"></i>
<span>Inventory </span></span></a>
</li>

<li class="nav-item">
<a class="nav-link" href="/datateknisi/datateknisi">
<i class="fas fa-fw fa-table"></i>
<span>Data Teknisi
</span></span></a>
</li>



<hr class="sidebar-divider d-none d-md-block">


<div class="text-center d-none d-md-inline">
<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div> -->

    <?php  } ?>
    <!-- Sidebar Manager -->
    <?php if (session()->get('level') == 4) { ?>


        <li class="nav-item active">
            <a class="nav-link" href="/pages/index">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>



        <hr class="sidebar-divider">


        <div class="sidebar-heading">
            All Menu
        </div>




        <li class="nav-item">

            <a class="nav-link" href="/report/report">

                <i class="fas fa-fw fa-chart-area"> </i>
                <span>Report </span>

            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="/datateknisi/datateknisi">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Teknisi
                </span></span></a>
        </li>

        <!-- 

<li class="nav-item">
<a class="nav-link" href="/datastasiun/datastasiun">
<i class="fas fa-fw fa-chart-area"></i>
<span>Data Stasiun</span></span></a>
</li>


<li class="nav-item">
<a class="nav-link" href="/inventory/datainventory">
<i class="fas fa-fw fa-table"></i>
<span>Inventory </span></span></a>
</li>

<li class="nav-item">
<a class="nav-link" href="/datateknisi/datateknisi">
<i class="fas fa-fw fa-table"></i>
<span>Data Teknisi
</span></span></a>
</li>



<hr class="sidebar-divider d-none d-md-block">


<div class="text-center d-none d-md-inline">
<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div> -->

    <?php  } ?>

</ul>