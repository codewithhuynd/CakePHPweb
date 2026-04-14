?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trang chủ thư viện</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <!-- TIÊU ĐỀ -->
    <div class="text-center mb-4">
        <h1 class="fw-bold">SÁCH VÀ DANH MỤC HIỆN CÓ</h1>
    </div>

    <div class="row">

        <!-- BẢNG SÁCH -->
        <div class="col-md-8">
            <h3>Danh sách sách</h3>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên sách</th>
                        <th>Tác giả</th>
                        <th>Danh mục</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= $book->id ?></td>
                        <td><?= h($book->title) ?></td>
                        <td><?= h($book->author) ?></td>
                        <td><?= h($book->category->name ?? 'Không có') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- BẢNG DANH MỤC -->
        <div class="col-md-4">
            <h3>Danh mục</h3>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category->id ?></td>
                        <td><?= h($category->name) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
