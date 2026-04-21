<div class="container mt-4">

    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="text-center mb-4">Thêm Danh Mục</h2>

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

        <div class="text-center mt-4">
            <?= $this->Form->button('Lưu', [
                'class' => 'btn btn-primary px-4'
            ]) ?>

            <?= $this->Html->link('Quay lại', ['action' => 'index'], [
                'class' => 'btn btn-secondary ms-2'
            ]) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>