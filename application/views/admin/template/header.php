<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Admin Panel'; ?> - RT 9 Sambiroto</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            padding-top: 20px;
        }
        .sidebar-brand {
            color: white;
            padding: 0 20px 20px;
            border-bottom: 1px solid #495057;
        }
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar-menu li a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: all 0.3s;
        }
        .sidebar-menu li a:hover,
        .sidebar-menu li a.active {
            background: #495057;
            color: white;
            padding-left: 30px;
        }
        .main-content {
            margin-left: 250px;
            flex: 1;
            overflow-y: auto;
        }
        .topbar {
            background: white;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .page-content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4 style="margin: 0;"><i class="fas fa-admin"></i> Admin Panel</h4>
            <small>RT 9 Sambiroto</small>
        </div>
        <ul class="sidebar-menu">
            <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fas fa-chart-line"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url('admin/artikel'); ?>"><i class="fas fa-newspaper"></i> Artikel</a></li>
            <li><a href="<?php echo base_url('admin/galeri'); ?>"><i class="fas fa-images"></i> Galeri</a></li>
            <li><a href="<?php echo base_url('admin/penduduk'); ?>"><i class="fas fa-users"></i> Data Penduduk</a></li>
            <li><a href="<?php echo base_url('admin/keuangan'); ?>"><i class="fas fa-money-bill-wave"></i> Keuangan</a></li>
            <li><a href="<?php echo base_url('admin/komentar'); ?>"><i class="fas fa-comments"></i> Komentar</a></li>
            <li style="border-top: 1px solid #495057; margin-top: 20px; padding-top: 20px;">
                <a href="<?php echo base_url(); ?>" target="_blank"><i class="fas fa-globe"></i> Lihat Website</a>
            </li>
            <li>
                <a href="<?php echo base_url('login/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <h5 class="mb-0"><i class="fas fa-cogs"></i> <?php echo isset($title) ? $title : 'Admin Panel'; ?></h5>
            <div>
                <span class="me-3"><i class="fas fa-user"></i> <?php echo $this->session->userdata('admin_username'); ?></span>
                <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-sm btn-danger">Logout</a>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>