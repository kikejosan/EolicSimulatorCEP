<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Escala[]|\Cake\Collection\CollectionInterface $escalas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Escala'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="escalas index large-9 medium-8 columns content">
    <h3><?= __('Escalas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('systemNumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('posicion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($escalas as $escala): ?>
            <tr>
                <td><?= $this->Number->format($escala->id) ?></td>
                <td><?= $this->Number->format($escala->systemNumber) ?></td>
                <td><?= $this->Number->format($escala->posicion) ?></td>
                <td><?= h($escala->fecha) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $escala->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $escala->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $escala->id], ['confirm' => __('Are you sure you want to delete # {0}?', $escala->id)]) ?>
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
