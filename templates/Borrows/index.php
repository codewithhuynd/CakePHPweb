<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Quản lý mượn sách</h3>
        <?= $this->Html->link('Đăng ký mượn sách', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="card shadow-lg rounded-4">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th>Người dùng</th>
                            <th>Sách</th>
                            <th><?= $this->Paginator->sort('borrow_date', 'Ngày mượn') ?></th>
                            <th><?= $this->Paginator->sort('return_date', 'Ngày trả') ?></th>
                            <th><?= $this->Paginator->sort('status', 'Trạng thái') ?></th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($borrows as $borrow): ?>
                        <tr>
                            <td><?= $this->Number->format($borrow->id) ?></td>

                            <td>
                                <?= $borrow->hasValue('user') 
                                    ? $this->Html->link($borrow->user->username, ['controller' => 'Users', 'action' => 'view', $borrow->user->id]) 
                                    : '<span class="text-muted">N/A</span>' ?>
                            </td>

                            <td>
                                <?= $borrow->hasValue('book') 
                                    ? $this->Html->link($borrow->book->title, ['controller' => 'Books', 'action' => 'view', $borrow->book->id]) 
                                    : '<span class="text-muted">N/A</span>' ?>
                            </td>

                            <td><?= h($borrow->borrow_date) ?></td>
                            <td><?= h($borrow->return_date) ?></td>

                            <td>
                                <?php
                                    $statusClass = 'bg-secondary';
                                    if ($borrow->status == 'borrowed') $statusClass = 'bg-warning text-dark';
                                    if ($borrow->status == 'returned') $statusClass = 'bg-success';
                                    if ($borrow->status == 'late') $statusClass = 'bg-danger';
                                ?>
                                <span class="badge <?= $statusClass ?>">
                                    <?= h($borrow->status) ?>
                                </span>
                            </td>

                            <td class="text-center">
                                <?= $this->Html->link(
                                    '<i class="fas fa-eye"></i>',
                                    ['action' => 'view', $borrow->id],
                                    ['class' => 'btn btn-sm btn-outline-info me-1', 'escape' => false]
                                ) ?>

                                <?= $this->Html->link(
                                    '<i class="fas fa-edit"></i>',
                                    ['action' => 'edit', $borrow->id],
                                    ['class' => 'btn btn-sm btn-outline-warning me-1', 'escape' => false]
                                ) ?>

                                <?= $this->Form->postLink(
                                    '<i class="fas fa-trash"></i>',
                                    ['action' => 'delete', $borrow->id],
                                    [
                                        'class' => 'btn btn-sm btn-outline-danger',
                                        'escape' => false,
                                        'confirm' => __('Bạn chắc chắn muốn xóa #{0}?', $borrow->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <!-- Đánh số trang -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <ul class="pagination mb-0">
            <?= $this->Paginator->first('<<') ?>
            <?= $this->Paginator->prev('<') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('>') ?>
            <?= $this->Paginator->last('>>') ?>
        </ul>

        <small class="text-muted">
            <?= $this->Paginator->counter('Trang {{page}} / {{pages}} ({{count}} bản ghi)') ?>
        </small>
    </div>

</div>