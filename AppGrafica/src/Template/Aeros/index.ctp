<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aero[]|\Cake\Collection\CollectionInterface $aeros
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Aero'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="aeros index large-9 medium-8 columns content">
    <h3><?= __('Aeros') ?></h3>
    <div class="col-md-12">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SystemNumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fila') ?></th>
                <th scope="col"><?= $this->Paginator->sort('columna') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idIngeboards') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aeros as $aero): ?>
            <tr>
                <td><?= $this->Number->format($aero->id) ?></td>
                <td><?= $this->Number->format($aero->SystemNumber) ?></td>
                <td><?= $this->Number->format($aero->fila) ?></td>
                <td><?= $this->Number->format($aero->columna) ?></td>
                <td><?= h($aero->idIngeboards) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $aero->id], array('class'=>'btn btn-sm btn-default')) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $aero->id], array('class'=>'btn btn-sm btn-default')) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aero->id], array('class'=>'btn btn-sm btn-default'), ['confirm' => __('Are you sure you want to delete # {0}?', $aero->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div> 
    
    <div class="paginator" >
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
