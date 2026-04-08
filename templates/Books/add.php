<div class="container mt-4">
    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="mb-4 text-center">Thêm Sách Mới</h2>

        <?= $this->Form->create($book) ?>

        <div class="row">
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('title', [
                    'label' => 'Tên sách',
                    'class' => 'form-control',
                    'placeholder' => 'Nhập tên sách...'
                ]) ?>
            </div>

            <div class="col-md-6 mb-3">
                <?= $this->Form->control('author', [
                    'label' => 'Tác giả',
                    'class' => 'form-control',
                    'placeholder' => 'Nhập tên tác giả...'
                ]) ?>
            </div>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('description', [
                'label' => 'Mô tả',
                'class' => 'form-control',
                'rows' => 3,
                'placeholder' => 'Mô tả sách...'
            ]) ?>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <?= $this->Form->control('category_id', [
                    'label' => 'Danh mục',
                    'options' => $categories,
                    'class' => 'form-select'
                ]) ?>
            </div>

            <div class="col-md-4 mb-3">
                <?= $this->Form->control('quantity', [
                    'label' => 'Số lượng',
                    'class' => 'form-control'
                ]) ?>
            </div>

            <div class="col-md-4 mb-3">
                <?= $this->Form->control('status', [
                    'label' => 'Trạng thái',
                    'options' => [
                        'available' => 'Có sẵn',
                        'unavailable' => 'Hết'
                    ],
                    'class' => 'form-select'
                ]) ?>
            </div>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('user_id', [
                'label' => 'Người thêm (tuỳ chọn)',
                'options' => $users,
                'empty' => '--- Không chọn ---',
                'class' => 'form-select'
            ]) ?>
        </div>

        <div class="text-center mt-4">
            <?= $this->Form->button('💾 Lưu sách', [
                'class' => 'btn btn-primary px-4'
            ]) ?>

            <?= $this->Html->link('⬅ Quay lại', ['action' => 'index'], [
                'class' => 'btn btn-secondary ms-2'
            ]) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>