<div class="container mt-4">

    <!-- Header thông tin user -->
    <div class="card shadow-lg p-4 rounded-4 mb-4 text-center">
        <h2 class="mb-1">👤 <?= h($user->username) ?></h2>
        <p class="text-muted"><?= h($user->email) ?></p>
        <span class="badge bg-info text-dark px-3 py-2">
            <?= h($user->role) ?>
        </span>

        <div class="mt-3">
            <?= $this->Html->link(
                'Sửa',
                ['action' => 'edit', $user->id],
                ['class' => 'btn btn-warning btn-sm me-1']
            ) ?>
            <?= $this->Form->postLink(
                'Xóa',
                ['action' => 'delete', $user->id],
                [
                    'class'   => 'btn btn-danger btn-sm me-1',
                    'confirm' => 'Bạn chắc chắn muốn xóa người dùng này?'
                ]
            ) ?>
            <?= $this->Html->link(
                '⬅ Quay lại',
                ['action' => 'index'],
                ['class' => 'btn btn-secondary btn-sm']
            ) ?>
        </div>
    </div>

    <!-- Thông tin chi tiết -->
    <div class="card shadow-sm p-4 rounded-4 mb-4">
        <h4 class="mb-3">📄 Thông tin chi tiết</h4>
        <table class="table">
            <tr>
                <th width="200">ID</th>
                <td><?= $this->Number->format($user->id) ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?= h($user->username) ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th>Role</th>
                <td><?= h($user->role) ?></td>
            </tr>
            <tr>
                <th>Ngày tạo</th>
                <td><?= h($user->created) ?></td>
            </tr>
            <tr>
                <th>Cập nhật lần cuối</th>
                <td><?= h($user->modified) ?></td>
            </tr>
        </table>
    </div>

    <!-- Sách đã thêm -->
    <div class="card shadow-sm p-4 rounded-4 mb-4">
        <h4 class="mb-3">📚 Sách đã thêm</h4>

        <?php if (!empty($user->books)) : ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
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
                        <?php foreach ($user->books as $book) : ?>
                        <tr>
                            <td><?= h($book->id) ?></td>
                            <td><?= h($book->title) ?></td>
                            <td><?= h($book->author) ?></td>
                            <td><?= h($book->quantity) ?></td>
                            <td>
                                <?php if ($book->status === 'available'): ?>
                                    <span class="badge bg-success">Có sẵn</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Hết</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?= $this->Html->link(
                                    'Xem',
                                    ['controller' => 'Books', 'action' => 'view', $book->id],
                                    ['class' => 'btn btn-sm btn-outline-info me-1']
                                ) ?>
                                <?= $this->Html->link(
                                    'Sửa',
                                    ['controller' => 'Books', 'action' => 'edit', $book->id],
                                    ['class' => 'btn btn-sm btn-outline-warning']
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p class="text-muted">Chưa có sách nào.</p>
        <?php endif; ?>
    </div>

    <!-- Lịch sử mượn -->
    <div class="card shadow-sm p-4 rounded-4">
        <h4 class="mb-3">📦 Lịch sử mượn</h4>

        <?php if (!empty($user->borrows)) : ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Book ID</th>
                            <th>Ngày mượn</th>
                            <th>Ngày trả</th>
                            <th>Trạng thái</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user->borrows as $borrow) : ?>
                        <tr>
                            <td><?= h($borrow->id) ?></td>
                            <td><?= h($borrow->book_id) ?></td>
                            <td><?= h($borrow->borrow_date) ?></td>
                            <td><?= h($borrow->return_date) ?></td>
                            <td>
                                <?php if ($borrow->status === 'borrowing'): ?>
                                    <span class="badge bg-warning text-dark">Đang mượn</span>
                                <?php elseif ($borrow->status === 'late'): ?>
                                    <span class="badge bg-danger">Quá hạn</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Đã trả</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?= $this->Html->link(
                                    'Xem',
                                    ['controller' => 'Borrows', 'action' => 'view', $borrow->id],
                                    ['class' => 'btn btn-sm btn-outline-info me-1']
                                ) ?>
                                <?= $this->Html->link(
                                    'Sửa',
                                    ['controller' => 'Borrows', 'action' => 'edit', $borrow->id],
                                    ['class' => 'btn btn-sm btn-outline-warning']
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p class="text-muted">Chưa có lịch sử mượn.</p>
        <?php endif; ?>
    </div>

</div>