<!DOCTYPE html>
<html lang="vi">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh; background:#f8f9fa;">

    <?= $this->Flash->render() ?>

    <?= $this->fetch('content') ?>
    <?php
    $message = $this->Flash->render('loginError');
    ?>

    <?php if ($message): ?>

    <div class="modal fade show" id="errorModal" tabindex="-1" style="display:block; background:rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-exclamation-triangle me-2"></i>Error
                    </h5>
                </div>
                <div class="modal-body text-center">
                    <p class="mb-0"><?= $message ?></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" onclick="document.getElementById('errorModal').style.display='none'">
                        Đóng
                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php endif; ?>
</body>
</html>