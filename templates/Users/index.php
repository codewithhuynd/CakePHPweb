<div class="users index content container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Users</h3>
        <?= $this->Html->link(__('+ New User'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('username') ?></th>
                            <th><?= $this->Paginator->sort('email') ?></th>
                            <th><?= $this->Paginator->sort('role') ?></th>
                            <th><?= $this->Paginator->sort('created') ?></th>
                            <th><?= $this->Paginator->sort('modified') ?></th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $this->Number->format($user->id) ?></td>
                            <td><?= h($user->username) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    <?= h($user->role) ?>
                                </span>
                            </td>
                            <td><?= h($user->created) ?></td>
                            <td><?= h($user->modified) ?></td>
                            <td class="text-center">
                                <?= $this->Html->link('View', ['action' => 'view', $user->id], ['class' => 'btn btn-sm btn-outline-primary']) ?>
                                <?= $this->Html->link('Edit', ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-outline-warning']) ?>
                                <?= $this->Form->postLink(
                                    'Delete',
                                    ['action' => 'delete', $user->id],
                                    [
                                        'class' => 'btn btn-sm btn-outline-danger',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            <ul class="pagination mb-0">
                <?= $this->Paginator->first('<<') ?>
                <?= $this->Paginator->prev('<') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('>') ?>
                <?= $this->Paginator->last('>>') ?>
            </ul>
        </div>
        <small class="text-muted">
            <?= $this->Paginator->counter(__('Page {{page}} / {{pages}} ({{count}} records)')) ?>
        </small>
    </div>

</div>