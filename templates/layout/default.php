<!DOCTYPE html>
<html lang="vi">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thư Viện Sách | <?= $this->fetch('title') ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .navbar-brand, .nav-link { color: white !important; }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
        }
        .table thead {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        .sidebar {
            min-height: 100vh;
            background: white;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
        }
        .sidebar .nav-link {
            color: #555 !important;
            padding: 10px 20px;
            border-radius: 8px;
            margin: 3px 10px;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white !important;
        }
        .sidebar .nav-link i { width: 20px; }
        .page-title {
            color: #333;
            font-weight: 600;
            border-left: 4px solid #667eea;
            padding-left: 15px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-4">
        <?= $this->Html->link(
            '<i class="fas fa-book-open me-2"></i>Thư Viện Sách',
            ['controller' => 'Pages', 'action' => 'display', 'home'],
            ['class' => 'navbar-brand fw-bold', 'escape' => false]
        ) ?>
        <div class="ms-auto d-flex align-items-center">
            <span class="text-white me-3">
                <i class="fas fa-user me-1"></i>Admin
            </span>
            <?= $this->Html->link(
                '<i class="fas fa-sign-out-alt me-1"></i>Đăng xuất',
                ['controller' => 'Users', 'action' => 'login'],
                ['class' => 'btn btn-outline-light btn-sm', 'escape' => false]
            ) ?>
        </div>
    </div>
</nav>

<!-- Main Layout -->
<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 px-0 sidebar">
            <div class="py-3">
                <p class="text-muted px-3 small fw-bold text-uppercase mt-2">
                    Menu chính
                </p>
                <nav class="nav flex-column">
                    <?= $this->Html->link(
                        '<i class="fas fa-home me-2"></i>Trang chủ',
                        ['controller' => 'Pages', 'action' => 'display', 'home'],
                        ['class' => 'nav-link', 'escape' => false]
                    ) ?>
                    <?= $this->Html->link(
                        '<i class="fas fa-book me-2"></i>Quản lý sách',
                        ['controller' => 'Books', 'action' => 'index'],
                        ['class' => 'nav-link', 'escape' => false]
                    ) ?>
                    <?= $this->Html->link(
                        '<i class="fas fa-tags me-2"></i>Danh mục',
                        ['controller' => 'Categories', 'action' => 'index'],
                        ['class' => 'nav-link', 'escape' => false]
                    ) ?>
                    <?= $this->Html->link(
                        '<i class="fas fa-users me-2"></i>Người dùng',
                        ['controller' => 'Users', 'action' => 'index'],
                        ['class' => 'nav-link', 'escape' => false]
                    ) ?>
                    <?= $this->Html->link(
                        '<i class="fas fa-hand-holding-heart me-2"></i>Mượn sách',
                        ['controller' => 'Borrows', 'action' => 'index'],
                        ['class' => 'nav-link', 'escape' => false]
                    ) ?>
                </nav>

                <hr>

                <p class="text-muted px-3 small fw-bold text-uppercase">
                    API
                </p>
                <nav class="nav flex-column">
                    <?= $this->Html->link(
                        '<i class="fas fa-code me-2"></i>API Books',
                        ['controller' => 'Books', 'action' => 'index', '_ext' => 'json', 'prefix' => 'Api'],
                        ['class' => 'nav-link', 'escape' => false, 'target' => '_blank']
                    ) ?>
                    <?= $this->Html->link(
                        '<i class="fas fa-code me-2"></i>API Categories',
                        ['controller' => 'Categories', 'action' => 'index', '_ext' => 'json', 'prefix' => 'Api'],
                        ['class' => 'nav-link', 'escape' => false, 'target' => '_blank']
                    ) ?>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 py-4 px-4">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
