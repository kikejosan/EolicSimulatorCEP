<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fluctuaprod[]|\Cake\Collection\CollectionInterface $fluctuaprods
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fluctuaprod'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fluctuaprods index large-9 medium-8 columns content">
    <h3><?= __('Fluctuaprods') ?></h3>
    <div class="col-md-12" >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('aero1') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('subida1') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('aero2') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('subida2') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('aero3') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('subida3') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fluctuaprods as $fluctuaprod): ?>
                <tr>
                    <td><?= $this->Number->format($fluctuaprod->id) ?></td>
                    <td><?= $this->Number->format($fluctuaprod->aero1) ?></td>
                    <td><?= $this->Number->format($fluctuaprod->subida1) ?></td>
                    <td><?= $this->Number->format($fluctuaprod->aero2) ?></td>
                    <td><?= $this->Number->format($fluctuaprod->subida2) ?></td>
                    <td><?= $this->Number->format($fluctuaprod->aero3) ?></td>
                    <td><?= $this->Number->format($fluctuaprod->subida3) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fluctuaprod->id], array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fluctuaprod->id], array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fluctuaprod->id], array('class'=>'btn btn-sm btn-default'), ['confirm' => __('Are you sure you want to delete # {0}?', $fluctuaprod->id)]) ?>
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
