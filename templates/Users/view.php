<<<<<<< Updated upstream
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->username) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($user->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
=======
<div class="container mt-4">

    <div class="card shadow-lg p-4 rounded-4 mb-4 text-center">
        <h2 class="mb-1">👤 <?= h($user->username) ?></h2>
        <p class="text-muted"><?= h($user->email) ?></p>
        <span class="badge bg-info text-dark px-3 py-2">
            <?= h($user->role) ?>
        </span>

        <div class="mt-3">
            <?= $this->Html->link('Sửa', ['action' => 'edit', $user->id], ['class' => 'btn btn-warning btn-sm']) ?>
            <?= $this->Form->postLink(
                'Xóa',
                ['action' => 'delete', $user->id],
                [
                    'class' => 'btn btn-danger btn-sm',
                    'confirm' => __('Are you sure you want to delete # {0}?', $user->id)
                ]
            ) ?>
            <?= $this->Html->link('Quay lại', ['action' => 'index'], ['class' => 'btn btn-secondary btn-sm']) ?>
        </div>
    </div>

    <div class="card shadow-sm p-4 rounded-4 mb-4">
        <h4 class="mb-3">Thông tin chi tiết</h4>
        <table class="table">
            <tr>
                <th>ID</th>
                <td><?= $this->Number->format($user->id) ?></td>
            </tr>
            <tr>
                <th>Created</th>
                <td><?= h($user->created) ?></td>
            </tr>
            <tr>
                <th>Modified</th>
                <td><?= h($user->modified) ?></td>
            </tr>
        </table>
    </div>

    <div class="card shadow-sm p-4 rounded-4 mb-4">
        <h4 class="mb-3">Sách đã thêm</h4>

        <?php if (!empty($user->books)) : ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
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
                            <span class="badge bg-success">
                                <?= h($book->status) ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <?= $this->Html->link('View', ['controller' => 'Books', 'action' => 'view', $book->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                            <?= $this->Html->link('Edit', ['controller' => 'Books', 'action' => 'edit', $book->id], ['class' => 'btn btn-sm btn-outline-warning']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
>>>>>>> Stashed changes
            </table>
            <div class="related">
                <h4><?= __('Related Books') ?></h4>
                <?php if (!empty($user->books)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Author') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->books as $book) : ?>
                        <tr>
                            <td><?= h($book->id) ?></td>
                            <td><?= h($book->category_id) ?></td>
                            <td><?= h($book->title) ?></td>
                            <td><?= h($book->author) ?></td>
                            <td><?= h($book->description) ?></td>
                            <td><?= h($book->quantity) ?></td>
                            <td><?= h($book->status) ?></td>
                            <td><?= h($book->created) ?></td>
                            <td><?= h($book->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Books', 'action' => 'view', $book->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Books', 'action' => 'edit', $book->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Books', 'action' => 'delete', $book->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $book->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Borrows') ?></h4>
                <?php if (!empty($user->borrows)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Book Id') ?></th>
                            <th><?= __('Borrow Date') ?></th>
                            <th><?= __('Return Date') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->borrows as $borrow) : ?>
                        <tr>
                            <td><?= h($borrow->id) ?></td>
                            <td><?= h($borrow->book_id) ?></td>
                            <td><?= h($borrow->borrow_date) ?></td>
                            <td><?= h($borrow->return_date) ?></td>
                            <td><?= h($borrow->status) ?></td>
                            <td><?= h($borrow->created) ?></td>
                            <td><?= h($borrow->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Borrows', 'action' => 'view', $borrow->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Borrows', 'action' => 'edit', $borrow->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Borrows', 'action' => 'delete', $borrow->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $borrow->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<<<<<<< Updated upstream
=======

    <div class="card shadow-sm p-4 rounded-4">
        <h4 class="mb-3">Lịch sử mượn</h4>

        <?php if (!empty($user->borrows)) : ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book ID</th>
                        <th>Borrow</th>
                        <th>Return</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
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
                            <span class="badge bg-warning text-dark">
                                <?= h($borrow->status) ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <?= $this->Html->link('View', ['controller' => 'Borrows', 'action' => 'view', $borrow->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                            <?= $this->Html->link('Edit', ['controller' => 'Borrows', 'action' => 'edit', $borrow->id], ['class' => 'btn btn-sm btn-outline-warning']) ?>
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

>>>>>>> Stashed changes
</div>