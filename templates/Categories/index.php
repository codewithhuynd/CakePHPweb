<div class="container mt-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2> Quản Lý Danh Mục</h2>

        <?= $this->Html->link(' Thêm danh mục', ['action' => 'add'], [
            'class' => 'btn btn-primary'
        ]) ?>
    </div>

    <!-- Search -->
    <div class="card shadow-sm p-3 mb-3 rounded-4">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <div class="row">
            <div class="col-md-10">
                <?= $this->Form->control('keyword', [
                    'label' => false,
                    'placeholder' => 'Tìm tên danh mục...',
                    'class' => 'form-control'
                ]) ?>
            </div>
            <div class="col-md-2">
                <?= $this->Form->button('Tìm', ['class' => 'btn btn-success w-100']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>

    <!-- Table -->
    <div class="card shadow rounded-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                        <th><?= $this->Paginator->sort('name', 'Tên danh mục') ?></th>
                        <th><?= $this->Paginator->sort('created', 'Ngày tạo') ?></th>
                        <th><?= $this->Paginator->sort('modified', 'Cập nhật') ?></th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category->id ?></td>
                        <td><strong><?= h($category->name) ?></strong></td>
                        <td><?= h($category->created) ?></td>
                        <td><?= h($category->modified) ?></td>
                        <td>
                            <?= $this->Html->link('👁', ['action' => 'view', $category->id], [
                                'class' => 'btn btn-sm btn-info'
                            ]) ?>

                            <?= $this->Html->link('✏️', ['action' => 'edit', $category->id], [
                                'class' => 'btn btn-sm btn-warning'
                            ]) ?>

                            <?= $this->Form->postLink('🗑',
                                ['action' => 'delete', $category->id],
                                [
                                    'confirm' => 'Xóa danh mục này?',
                                    'class' => 'btn btn-sm btn-danger'
                                ]
                            ) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-3 d-flex justify-content-between align-items-center">
        <div>
            <?= $this->Paginator->first('<<') ?>
            <?= $this->Paginator->prev('<') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('>') ?>
            <?= $this->Paginator->last('>>') ?>
        </div>

        <div class="text-muted">
            <?= $this->Paginator->counter('Trang {{page}} / {{pages}} ({{count}} bản ghi)') ?>
        </div>
    </div>

</div>