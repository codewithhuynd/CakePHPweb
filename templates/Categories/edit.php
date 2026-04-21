<div class="container mt-4">

    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="text-center mb-4">Chỉnh Sửa Danh Mục</h2>

        <?= $this->Form->create($category) ?>

        <div class="mb-3">
            <?= $this->Form->control('name', [
                'label' => 'Tên danh mục',
                'class' => 'form-control',
                'placeholder' => 'Nhập tên danh mục...'
            ]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('description', [
                'label' => 'Mô tả',
                'class' => 'form-control',
                'rows' => 3,
                'placeholder' => 'Nhập mô tả...'
            ]) ?>
        </div>

        <div class="d-flex justify-content-between mt-4">

            <?= $this->Form->postLink(
                'Xóa',
                ['action' => 'delete', $category->id],
                [
                    'confirm' => 'Bạn chắc chắn muốn xóa danh mục này?',
                    'class' => 'btn btn-danger'
                ]
            ) ?>

            <div>
                <?= $this->Html->link('Quay lại', ['action' => 'index'], [
                    'class' => 'btn btn-secondary me-2'
                ]) ?>

                <?= $this->Form->button('Cập nhật', [
                    'class' => 'btn btn-primary'
                ]) ?>
            </div>
        </div>

        <?= $this->Form->end() ?>
    </div>

</div>