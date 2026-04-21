<div class="container mt-4">

    <div class="card shadow-lg p-4 rounded-4 mb-4 text-center">
        <h2 class="mb-2">Phiếu mượn #<?= $this->Number->format($borrow->id) ?></h2>

        <?php
            $statusClass = 'bg-secondary';
            if ($borrow->status == 'borrowed') $statusClass = 'bg-warning text-dark';
            if ($borrow->status == 'returned') $statusClass = 'bg-success';
            if ($borrow->status == 'late') $statusClass = 'bg-danger';
        ?>

        <span class="badge <?= $statusClass ?> px-3 py-2 mb-3">
            <?= h($borrow->status) ?>
        </span>

        <div>
            <?= $this->Html->link('Sửa', ['action' => 'edit', $borrow->id], ['class' => 'btn btn-warning btn-sm']) ?>
            <?= $this->Form->postLink(
                'Xóa',
                ['action' => 'delete', $borrow->id],
                [
                    'class' => 'btn btn-danger btn-sm',
                    'confirm' => __('Bạn chắc chắn muốn xóa #{0}?', $borrow->id)
                ]
            ) ?>
            <?= $this->Html->link('Quay lại', ['action' => 'index'], ['class' => 'btn btn-secondary btn-sm']) ?>
        </div>
    </div>

    <div class="card shadow-sm p-4 rounded-4 mb-4">
        <h4 class="mb-3">Thông tin mượn</h4>

        <table class="table">
            <tr>
                <th>Người dùng</th>
                <td>
                    <?= $borrow->hasValue('user') 
                        ? $this->Html->link($borrow->user->username, ['controller' => 'Users', 'action' => 'view', $borrow->user->id]) 
                        : '<span class="text-muted">N/A</span>' ?>
                </td>
            </tr>

            <tr>
                <th>Sách</th>
                <td>
                    <?= $borrow->hasValue('book') 
                        ? $this->Html->link($borrow->book->title, ['controller' => 'Books', 'action' => 'view', $borrow->book->id]) 
                        : '<span class="text-muted">N/A</span>' ?>
                </td>
            </tr>

            <tr>
                <th>Ngày mượn</th>
                <td><?= h($borrow->borrow_date) ?></td>
            </tr>

            <tr>
                <th>Ngày trả</th>
                <td><?= h($borrow->return_date) ?: '<span class="text-muted">Chưa trả</span>' ?></td>
            </tr>
        </table>
    </div>

    <div class="card shadow-sm p-4 rounded-4">
        <h4 class="mb-3">⚙️ Thông tin hệ thống</h4>

        <table class="table">
            <tr>
                <th>ID</th>
                <td><?= $this->Number->format($borrow->id) ?></td>
            </tr>

            <tr>
                <th>Created</th>
                <td><?= h($borrow->created) ?></td>
            </tr>

            <tr>
                <th>Modified</th>
                <td><?= h($borrow->modified) ?></td>
            </tr>
        </table>
    </div>
</div>