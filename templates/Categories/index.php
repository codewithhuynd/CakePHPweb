<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2> Quản Lý Danh Mục</h2>

        <?= $this->Html->link(' Thêm danh mục', ['action' => 'add'], [
            'class' => 'btn btn-primary'
        ]) ?>
    </div>
    <div class="card shadow-sm p-3 mb-3 rounded-4">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <div class="row">
            <div class="col-md-10">
                <?= $this->Form->control('keyword', [
                    'label' => false,
                    'placeholder' => 'Tìm tên danh mục...',
                    'class' => 'form-control',
                    'value' => $this->request->getQuery('keyword')
                ]) ?>
            </div>
            <div class="col-md-2">
                <?= $this->Form->button('Tìm', ['class' => 'btn btn-success w-100']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>

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
    
    <!-- Phân trang -->
    <div class="mt-3 d-flex justify-content-between align-items-center">

        <ul class="pagination mb-0">
            <li class="page-item">
                <?= $this->Paginator->first('«', [
                    'class' => 'page-link'
                ]) ?>
            </li>
            <li class="page-item">
                <?= $this->Paginator->prev('‹', [
                    'class' => 'page-link'
                ]) ?>
            </li>

            <?= $this->Paginator->numbers([
                'tag'         => 'li',
                'class'       => 'page-item',
                'currentTag'  => 'a',
                'currentClass' => 'page-link active',
                'before'      => '',
                'after'       => '',
                'first'       => false,
                'last'        => false,
            ]) ?>

            <li class="page-item">
                <?= $this->Paginator->next('›', [
                    'class' => 'page-link'
                ]) ?>
            </li>
            <li class="page-item">
                <?= $this->Paginator->last('»', [
                    'class' => 'page-link'
                ]) ?>
            </li>
        </ul>

        <div class="text-muted small">
            <?= $this->Paginator->counter(
                'Trang {{page}} / {{pages}} ({{count}} bản ghi)'
            ) ?>
        </div>

    </div>

</div>