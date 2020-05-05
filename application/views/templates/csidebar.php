<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
        <img src="<?= base_url('assets/');?>img/logo_im3.svg" id="logo_im3" alt="">
        </div>
        <ul class="list-unstyled components">
            <h4><a href="<?= base_url('Cluster/');?>">Dashboard</a></h4>
            
            <li>
                <a href="<?= base_url('Cluster/');?>reportOrder">Report Sheet</a>
            </li>
            <li>
                <a href="<?= base_url('Cluster/');?>msisdn">Add/Update MSISDN</a>
            </li>
            <li>
                <a href="<?= base_url('Cluster/');?>email">Info User Cluster</a>
            </li>
            <li>
                <a href="<?= base_url('Cluster/');?>logOut">Log out</a>
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