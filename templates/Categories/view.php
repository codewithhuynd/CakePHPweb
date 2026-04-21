<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title">
            <i class="fas fa-tags me-2"></i>
        </h2>
        <div>
            <?= $this->Html->link(
                '<i class="fas fa-edit me-1"></i>Sửa',
                ['action' => 'edit', $category->id],
                ['class' => 'btn btn-warning me-2', 'escape' => false]
            ) ?>
            <?= $this->Form->postLink(
                '<i class="fas fa-trash me-1"></i>Xóa',
                ['action' => 'delete', $category->id],
                [
                    'confirm' => 'Bạn chắc chắn muốn xóa danh mục này?',
                    'class'   => 'btn btn-danger me-2',
                    'escape'  => false,
                ]
            ) ?>
            <?= $this->Html->link(
                '<i class="fas fa-arrow-left me-1"></i>Quay lại',
                ['action' => 'index'],
                ['class' => 'btn btn-secondary', 'escape' => false]
            ) ?>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="200">ID</th>
                    <td><?= $category->id ?></td>
                </tr>
                <tr>
                    <th>Tên danh mục</th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <td><?= h($category->description) ?></td>
                </tr>
                <tr>
                    <th>Ngày tạo</th>
                    <td><?= $category->created ?></td>
                </tr>
                <tr>
                    <th>Cập nhật lần cuối</th>
                    <td><?= $category->modified ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-book me-2"></i>
                Sách thuộc danh mục này
            </h5>
        </div>
        <div class="card-body p-0">
            <?php if (!empty($category->books)) : ?>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sách</th>
                                <th>Tác giả</th>
                                <th>Số lượng</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($category->books as $book) : ?>
                            <tr>
                                <td><?= $book->id ?></td>
                                <td><strong><?= h($book->title) ?></strong></td>
                                <td><?= h($book->author) ?></td>
                                <td><?= $book->quantity ?></td>
                                <td>
                                    <?php if ($book->status == 'available') : ?>
                                        <span class="badge bg-success">Có sẵn</span>
                                    <?php else : ?>
                                        <span class="badge bg-danger">Hết sách</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?= $this->Html->link(
                                        '<i class="fas fa-eye"></i>',
                                        ['controller' => 'Books', 'action' => 'view', $book->id],
                                        ['class' => 'btn btn-sm btn-outline-info me-1', 'escape' => false]
                                    ) ?>
                                    <?= $this->Html->link(
                                        '<i class="fas fa-edit"></i>',
                                        ['controller' => 'Books', 'action' => 'edit', $book->id],
                                        ['class' => 'btn btn-sm btn-outline-warning me-1', 'escape' => false]
                                    ) ?>
                                    <?= $this->Form->postLink(
                                        '<i class="fas fa-trash"></i>',
                                        ['controller' => 'Books', 'action' => 'delete', $book->id],
                                        [
                                            'confirm' => 'Xóa sách "' . h($book->title) . '"?',
                                            'class'   => 'btn btn-sm btn-outline-danger',
                                            'escape'  => false,
                                        ]
                                    ) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <div class="text-center py-4 text-muted">
                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                    Danh mục này chưa có sách nào
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>