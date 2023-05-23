<!-- Sidebar  -->
<div id="sidebar">
    <div class="sidebar-header">
        <h3 class="text-center">Hexa OJT</h3>
    </div>

    <ul class="list-unstyled components">
        <p>MENU</p>

        <li <?php if ($this->uri->segment(1) == 'dasbor') {
                echo 'class="active"';
            } ?>>
            <a href="<?php echo base_url('dasbor'); ?>" class="nav_link">
                <i class='bx bxs-dashboard'></i>
                <span class="nav_name">Dasbor</span>
            </a>
        </li>

        <li <?php if ($this->uri->segment(1) == 'siswa') {
                echo 'class="active"';
            } ?>>
            <a href="<?php echo base_url('siswa'); ?>" class="nav_link">
                <i class='bx bx-user'></i>
                <span class="nav_name">Siswa</span>
            </a>
        </li>
        <li <?php if ($this->uri->segment(1) == 'sekolah') {
                echo 'class="active"';
            } ?>>
            <a href="<?php echo base_url('sekolah'); ?>" class="nav_link">
                <i class='bx bxs-school'></i>
                <span class="nav_name">Sekolah</span>
            </a>
        </li>
        <li <?php if ($this->uri->segment(1) == 'kalender') {
                echo 'class="active"';
            } ?>>
            <a href="<?php echo base_url('kalender'); ?>" class="nav_link">
                <i class='bx bx-calendar'></i>
                <span class="nav_name">Kalender</span>
            </a>
        </li>
        <li <?php if ($this->uri->segment(1) == 'kalender') {
                echo 'class="active"';
            } ?>>
            <a href="https://hexaintegra.com/karir/" class="nav_link">
                <i class='bx bx-envelope'></i>
                <span class="nav_name">Pengajuan</span>
            </a>
        </li>
        <li <?php if ($this->uri->segment(1) == 'kalender') {
                echo 'class="active"';
            } ?>>
            <a href="<?php echo base_url('Password'); ?>" class="nav_link">
                <i class='bx bx-lock-alt'></i>
                <span class="nav_name">Ubah password</span>
            </a>
        </li>
    </ul>

    <div class="sidebar-header">
        <a href="<?php echo base_url('Auth/logout'); ?>" class="nav_link">
            <i class='bx bx-log-out nav_icon'></i>
            <span class="nav_name">SignOut</span>
        </a>
    </div>
</div>

<div id="content" style="height: fit-content;">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class='bx bx-menu'></i>
                <span>Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">

                    <div class="sidebar-header">
                        <a href="<?php echo base_url('Auth/logout'); ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span></a>

                    </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <style>
        /*
    DEMO STYLE
*/

        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

        body {
            font-family: 'Poppins', sans-serif;
            background: #fafafa;
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar {
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 40px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }

        .line {
            width: 100%;
            height: 1px;
            border-bottom: 1px dashed #ddd;
            margin: 40px 0;
        }

        /* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #7386D5;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #6d7fcc;
        }

        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748b;
        }

        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #7386D5;
            background: #fff;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #fff;
            background: #6d7fcc;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #6d7fcc;
        }

        ul.CTAs {
            padding: 20px;
        }

        ul.CTAs a {
            text-align: center;
            font-size: 0.9em !important;
            display: block;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        a.download {
            background: #fff;
            color: #7386D5;
        }

        a.article,
        a.article:hover {
            background: #6d7fcc !important;
            color: #fff !important;
        }

        /* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

        #content {
            width: 100%;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        /* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #sidebar.active {
                margin-left: 0;
            }

            #sidebarCollapse span {
                display: none;
            }
        }
    </style>


    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>