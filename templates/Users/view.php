<div class="container mt-4">

    <!-- Header -->
    <div class="card shadow-lg p-4 rounded-4 mb-4 text-center">
        <h2 class="mb-1">👤 <?= h($user->username) ?></h2>
        <p class="text-muted"><?= h($user->email) ?></p>
        <span class="badge bg-info text-dark px-3 py-2">
            <?= h($user->role) ?>
        </span>

        <div class="mt-3">
            <?= $this->Html->link('✏ Edit', ['action' => 'edit', $user->id], ['class' => 'btn btn-warning btn-sm']) ?>
            <?= $this->Form->postLink(
                '🗑 Delete',
                ['action' => 'delete', $user->id],
                [
                    'class' => 'btn btn-danger btn-sm',
                    'confirm' => __('Are you sure you want to delete # {0}?', $user->id)
                ]
            ) ?>
            <?= $this->Html->link('⬅ Back', ['action' => 'index'], ['class' => 'btn btn-secondary btn-sm']) ?>
        </div>
    </div>

    <!-- Info -->
    <div class="card shadow-sm p-4 rounded-4 mb-4">
        <h4 class="mb-3">📄 Thông tin chi tiết</h4>
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

    <!-- Books -->
    <div class="card shadow-sm p-4 rounded-4 mb-4">
        <h4 class="mb-3">📚 Sách đã thêm</h4>

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
            </table>
        </div>
        <?php else : ?>
            <p class="text-muted">Chưa có sách nào.</p>
        <?php endif; ?>
    </div>

    <!-- Borrows -->
    <div class="card shadow-sm p-4 rounded-4">
        <h4 class="mb-3">📦 Lịch sử mượn</h4>

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

</div>