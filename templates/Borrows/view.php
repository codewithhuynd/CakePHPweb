<<<<<<< Updated upstream
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Borrow $borrow
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Borrow'), ['action' => 'edit', $borrow->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Borrow'), ['action' => 'delete', $borrow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrow->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Borrows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Borrow'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="borrows view content">
            <h3><?= h($borrow->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $borrow->hasValue('user') ? $this->Html->link($borrow->user->username, ['controller' => 'Users', 'action' => 'view', $borrow->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Book') ?></th>
                    <td><?= $borrow->hasValue('book') ? $this->Html->link($borrow->book->title, ['controller' => 'Books', 'action' => 'view', $borrow->book->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($borrow->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($borrow->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Borrow Date') ?></th>
                    <td><?= h($borrow->borrow_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Return Date') ?></th>
                    <td><?= h($borrow->return_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($borrow->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($borrow->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
=======
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
        <h4 class="mb-3">Thông tin hệ thống</h4>

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

>>>>>>> Stashed changes
</div>