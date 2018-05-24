<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transicion[]|\Cake\Collection\CollectionInterface $transicions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transicion'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transicions index large-9 medium-8 columns content">
    <h3><?= __('Transicions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('systemNumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('posicionInicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('posicionFin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('variacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fin') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transicions as $transicion): ?>
            <tr>
                <td><?= $this->Number->format($transicion->id) ?></td>
                <td><?= $this->Number->format($transicion->systemNumber) ?></td>
                <td><?= $this->Number->format($transicion->posicionInicio) ?></td>
                <td><?= $this->Number->format($transicion->posicionFin) ?></td>
                <td><?= $this->Number->format($transicion->variacion) ?></td>
                <td><?= h($transicion->inicio) ?></td>
                <td><?= h($transicion->fin) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transicion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transicion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transicion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transicion->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
