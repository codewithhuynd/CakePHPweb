<<<<<<< HEAD
<<<<<<< Updated upstream
<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Category> $categories
 */
?>
<div class="categories index content">
    <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $this->Number->format($category->id) ?></td>
                    <td><?= h($category->name) ?></td>
                    <td><?= h($category->created) ?></td>
                    <td><?= h($category->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $category->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $category->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $category->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
=======
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2> Quản Lý Danh Mục</h2>

        <?= $this->Html->link(' Thêm danh mục', ['action' => 'add'], [
            'class' => 'btn btn-primary'
        ]) ?>
    </div>

=======
<div class="container mt-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2> Quản Lý Danh Mục</h2>

        <?= $this->Html->link(' Thêm danh mục', ['action' => 'add'], [
            'class' => 'btn btn-primary'
        ]) ?>
    </div>

    <!-- Search -->
>>>>>>> main
    <div class="card shadow-sm p-3 mb-3 rounded-4">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <div class="row">
            <div class="col-md-10">
                <?= $this->Form->control('keyword', [
                    'label' => false,
                    'placeholder' => 'Tìm tên danh mục...',
<<<<<<< HEAD
                    'class' => 'form-control',
                    'value' => $this->request->getQuery('keyword')
=======
                    'class' => 'form-control'
>>>>>>> main
                ]) ?>
            </div>
            <div class="col-md-2">
                <?= $this->Form->button('Tìm', ['class' => 'btn btn-success w-100']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>

<<<<<<< HEAD
=======
    <!-- Table -->
>>>>>>> main
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
                            <?= $this->Html->link(
                                '<i class="fas fa-eye"></i>',
                                ['action' => 'view', $category->id],
                                ['class' => 'btn btn-sm btn-outline-info me-1', 'escape' => false]
                            ) ?>

                            <?= $this->Html->link(
                                '<i class="fas fa-edit"></i>',
                                ['action' => 'edit', $category->id],
                                ['class' => 'btn btn-sm btn-outline-warning me-1', 'escape' => false]
                            ) ?>

                            <?= $this->Form->postLink(
                                '<i class="fas fa-trash"></i>',
                                ['action' => 'delete', $category->id],
                                [
                                    'class' => 'btn btn-sm btn-outline-danger',
                                    'escape' => false,
                                    'confirm' => 'Xóa danh mục này?'
                                ]
                            ) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<<<<<<< HEAD
=======
    <!-- Pagination -->
>>>>>>> main
    <div class="mt-3 d-flex justify-content-between align-items-center">
        <div>
            <?= $this->Paginator->first('<<') ?>
            <?= $this->Paginator->prev('<') ?>
<<<<<<< HEAD
>>>>>>> Stashed changes
=======
>>>>>>> main
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('>') ?>
            <?= $this->Paginator->last('>>') ?>
        </div>

        <div class="text-muted">
            <?= $this->Paginator->counter('Trang {{page}} / {{pages}} ({{count}} bản ghi)') ?>
        </div>
    </div>

</div>