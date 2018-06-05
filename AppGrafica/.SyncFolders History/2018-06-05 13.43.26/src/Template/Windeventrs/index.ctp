<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Windeventr[]|\Cake\Collection\CollectionInterface $windeventrs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Windeventr'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="windeventrs index large-9 medium-8 columns content">
    <h3><?= __('Windeventrs') ?></h3>
    <div class="col-md-12" >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('power') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('systemNumber') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('media') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('desviacion') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('windSpeed') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('viento') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('veces') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($windeventrs as $windeventr): ?>
                <tr>
                    <td><?= $this->Number->format($windeventr->id) ?></td>
                    <td><?= $this->Number->format($windeventr->power) ?></td>
                    <td><?= $this->Number->format($windeventr->systemNumber) ?></td>
                    <td><?= $this->Number->format($windeventr->media) ?></td>
                    <td><?= $this->Number->format($windeventr->desviacion) ?></td>
                    <td><?= $this->Number->format($windeventr->windSpeed) ?></td>
                    <td><?= $this->Number->format($windeventr->viento) ?></td>
                    <td><?= $this->Number->format($windeventr->veces) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $windeventr->id] , array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $windeventr->id] , array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $windeventr->id] , array('class'=>'btn btn-sm btn-default'), ['confirm' => __('Are you sure you want to delete # {0}?', $windeventr->id)]) ?>
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
