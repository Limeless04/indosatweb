<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>IM3 Logo</h3>
        </div>

        <ul class="list-unstyled components">
            <h4><a href="<?= base_url('region/');?>">Dashboard</a></h4>
            
            <li>
                <a href="<?= base_url('region/');?>report">Report</a>
            </li>
            <li>
                <a href="<?= base_url('region/');?>pushEmail">Push Via Email</a>
            </li>
            <li>
                <a href="<?= base_url('region/');?>pic">Update PIC region</a>
            </li>
            <li>
                <a href="<?= base_url('region/');?>crudProduk">Create/Update Produk</a>
            </li>   
            <li>
                <a href="<?= base_url('region/');?>logOut">Log out</a>
            </li>
        </ul>
    </nav>
    <div id="content">
        <nav class="navbar navbar-expand-lg" id="sidenav">
            <div class="container-fluid">
            
            <button type="button" id="sidebarCollapse" class="btn btn_sidebar">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
            </div> 
        </nav>
<div class="container_region">