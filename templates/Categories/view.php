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

        <div class="actions">
            <?= $this->Html->link('✏️ Edit', ['action' => 'edit', $category->id], ['class' => 'btn btn-warning']) ?>

            <?= $this->Form->postLink(
                '🗑 Delete',
                ['action' => 'delete', $category->id],
                [
                    'confirm' => 'Bạn chắc chắn muốn xóa?',
                    'class' => 'btn btn-danger'
                ]
            ) ?>

            <?= $this->Html->link('⬅️ Back', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
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