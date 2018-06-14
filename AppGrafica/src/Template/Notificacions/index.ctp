<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notificacion[]|\Cake\Collection\CollectionInterface $notificacions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notificacion'), ['action' => 'add'], array('class'=>'btn btn-sm btn-default')) ?></li>
    </ul>
</nav>
<div class="notificacions index large-9 medium-8 columns content">
    <h3><?= __('Notificacions') ?></h3>
    <div class="col-md-12" >
        <table class="table table-striped">
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('systemNumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('campo1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('campo2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('campo3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('campo4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('campo5') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notificacions as $notificacion): ?>
            <tr>
                <td><?= $this->Number->format($notificacion->id) ?></td>
                <td><?= h($notificacion->tipo) ?></td>
                <td><?= h($notificacion->estado) ?></td>
                <td><?= $this->Number->format($notificacion->systemNumber) ?></td>
                <td><?= h($notificacion->fecha) ?></td>
                <td><?= $this->Number->format($notificacion->campo1) ?></td>
                <td><?= $this->Number->format($notificacion->campo2) ?></td>
                <td><?= $this->Number->format($notificacion->campo3) ?></td>
                <td><?= $this->Number->format($notificacion->campo4) ?></td>
                <td><?= $this->Number->format($notificacion->campo5) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $notificacion->id], array('class'=>'btn btn-sm btn-default')) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notificacion->id], array('class'=>'btn btn-sm btn-default')) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notificacion->id], array('class'=>'btn btn-sm btn-default'), ['confirm' => __('Are you sure you want to delete # {0}?', $notificacion->id)]) ?>
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
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
