<?php $this->assign('title', 'Quản lý Sách'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title">
        <i class="fas fa-book me-2"></i>Danh sách Sách
    </h2>
    <?= $this->Html->link(
        '<i class="fas fa-plus me-2"></i>Thêm sách mới',
        ['action' => 'add'],
        ['class' => 'btn btn-primary', 'escape' => false]
    ) ?>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET"
              action="<?= $this->Url->build(['controller' => 'Books', 'action' => 'index']) ?>"
              class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control"
                    placeholder="Tìm theo tên sách, tác giả..."
                    value="<?= h($this->request->getQuery('search')) ?>">
            </div>
            <div class="col-md-3">
                <select name="category" class="form-select">
                    <option value="">-- Tất cả danh mục --</option>
                    <?php foreach ($categories as $id => $name): ?>
                        <option value="<?= $id ?>"
                            <?= $this->request->getQuery('category') == $id ? 'selected' : '' ?>>
                            <?= h($name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search me-1"></i>Tìm kiếm
                </button>
            </div>
            <div class="col-md-2">
                <?= $this->Html->link(
                    '<i class="fas fa-times me-1"></i>Xóa lọc',
                    ['action' => 'index'],
                    ['class' => 'btn btn-outline-secondary w-100', 'escape' => false]
                ) ?>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sách</th>
                        <th>Tác giả</th>
                        <th>Danh mục</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($books->toArray())): ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                Không có sách nào
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($books as $book): ?>
                        <tr>
                            <td><?= $book->id ?></td>
                            <td><strong><?= h($book->title) ?></strong></td>
                            <td><?= h($book->author) ?></td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    <?= $book->has('category')
                                        ? h($book->category->name)
                                        : 'N/A' ?>
                                </span>
                            </td>
                            <td><?= $book->quantity ?></td>
                            <td>
                                <?php if ($book->status === 'available'): ?>
                                    <span class="badge bg-success">Có sẵn</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Hết sách</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?= $this->Html->link(
                                    '<i class="fas fa-eye"></i>',
                                    ['action' => 'view', $book->id],
                                    ['class' => 'btn btn-sm btn-outline-info me-1',
                                     'escape' => false, 'title' => 'Xem']
                                ) ?>
                                <?= $this->Html->link(
                                    '<i class="fas fa-edit"></i>',
                                    ['action' => 'edit', $book->id],
                                    ['class' => 'btn btn-sm btn-outline-warning me-1',
                                     'escape' => false, 'title' => 'Sửa']
                                ) ?>
                                <?= $this->Form->postLink(
                                    '<i class="fas fa-trash"></i>',
                                    ['action' => 'delete', $book->id],
                                    ['escape' => false,
                                     'class' => 'btn btn-sm btn-outline-danger',
                                     'title' => 'Xóa',
                                     'confirm' => 'Xóa sách "' . h($book->title) . '"?']
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3 d-flex justify-content-center">
    <?= $this->Paginator->numbers() ?>
</div>
