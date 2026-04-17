<div class="container">

    <div class="card">
        <h2><?= h($category->name) ?></h2>

        <p class="text-muted">
            <?= h($category->description) ?>
        </p>

        <div class="info">
            <p><strong>ID:</strong> <?= $category->id ?></p>
            <p><strong>Created:</strong> <?= $category->created ?></p>
            <p><strong>Updated:</strong> <?= $category->modified ?></p>
        </div>
<<<<<<< HEAD
<<<<<<< Updated upstream
    </aside>
    <div class="column column-80">
        <div class="categories view content">
            <h3><?= h($category->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($category->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($category->modified) ?></td>
                </tr>
=======

        <div class="actions">
            <?= $this->Html->link('Sửa', ['action' => 'edit', $category->id], ['class' => 'btn btn-warning']) ?>

            <?= $this->Form->postLink(
                'Xóa',
=======

        <div class="actions">
            <?= $this->Html->link('✏️ Edit', ['action' => 'edit', $category->id], ['class' => 'btn btn-warning']) ?>

            <?= $this->Form->postLink(
                '🗑 Delete',
>>>>>>> main
                ['action' => 'delete', $category->id],
                [
                    'confirm' => 'Bạn chắc chắn muốn xóa?',
                    'class' => 'btn btn-danger'
                ]
            ) ?>

<<<<<<< HEAD
            <?= $this->Html->link('Quay lại', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <div class="card mt-20">
        <h3>Sách thuộc danh mục</h3>

        <?php if (!empty($category->books)) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sách</th>
                        <th>Tác giả</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($category->books as $book) : ?>
                    <tr>
                        <td><?= $book->id ?></td>
                        <td><?= h($book->title) ?></td>
                        <td><?= h($book->author) ?></td>
                        <td><?= $book->quantity ?></td>
                        <td>
                            <span class="badge <?= $book->status === 'available' ? 'badge-success' : 'badge-danger' ?>">
                                <?= $book->status === 'available' ? 'Có sẵn' : 'Hết' ?>
                            </span>
                        </td>
                        <td>
                            <?= $this->Html->link('View', ['controller' => 'Books', 'action' => 'view', $book->id], ['class' => 'btn btn-sm']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
>>>>>>> Stashed changes
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($category->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Books') ?></h4>
                <?php if (!empty($category->books)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Author') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->books as $book) : ?>
                        <tr>
                            <td><?= h($book->id) ?></td>
                            <td><?= h($book->user_id) ?></td>
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
=======
            <?= $this->Html->link('⬅️ Back', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
>>>>>>> main
        </div>
    </div>

    <div class="card mt-20">
        <h3>Sách thuộc danh mục</h3>

        <?php if (!empty($category->books)) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sách</th>
                        <th>Tác giả</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($category->books as $book) : ?>
                    <tr>
                        <td><?= $book->id ?></td>
                        <td><?= h($book->title) ?></td>
                        <td><?= h($book->author) ?></td>
                        <td><?= $book->quantity ?></td>
                        <td>
                            <span class="badge <?= $book->status === 'available' ? 'badge-success' : 'badge-danger' ?>">
                                <?= $book->status === 'available' ? 'Có sẵn' : 'Hết' ?>
                            </span>
                        </td>
                        <td>
                            <?= $this->Html->link('View', ['controller' => 'Books', 'action' => 'view', $book->id], ['class' => 'btn btn-sm']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Chưa có sách nào.</p>
        <?php endif; ?>
    </div>

</div>

<style>
.container {
    max-width: 1000px;
    margin: auto;
}

.card {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin-top: 20px;
}

.text-muted {
    color: #777;
}

.info p {
    margin: 5px 0;
}

.actions {
    margin-top: 15px;
}

.btn {
    padding: 8px 12px;
    border-radius: 6px;
    text-decoration: none;
    margin-right: 5px;
    font-size: 14px;
}

.btn-warning { background: orange; color: white; }
.btn-danger { background: red; color: white; }
.btn-secondary { background: gray; color: white; }
.btn-sm { font-size: 12px; }

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.table th, .table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.badge {
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 12px;
}

.badge-success { background: green; color: white; }
.badge-danger { background: red; color: white; }

.mt-20 {
    margin-top: 20px;
}
</style>