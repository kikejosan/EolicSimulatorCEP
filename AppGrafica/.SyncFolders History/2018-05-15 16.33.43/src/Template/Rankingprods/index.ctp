<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rankingprod[]|\Cake\Collection\CollectionInterface $rankingprods
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rankingprod'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rankingprods index large-9 medium-8 columns content">
    <h3><?= __('Rankingprods') ?></h3>
    <div class="col-md-12" >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('systemNumber') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('time') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('suma') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('productividad') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('events') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rankingprods as $rankingprod): ?>
                <tr>
                    <td><?= $this->Number->format($rankingprod->id) ?></td>
                    <td><?= $this->Number->format($rankingprod->systemNumber) ?></td>
                    <td><?= h($rankingprod->time) ?></td>
                    <td><?= $this->Number->format($rankingprod->suma) ?></td>
                    <td><?= $this->Number->format($rankingprod->productividad) ?></td>
                    <td><?= $this->Number->format($rankingprod->events) ?></td>
                    <td><?= h($rankingprod->tipo) ?></td>
                    <td><?= h($rankingprod->fecha) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rankingprod->id] , array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rankingprod->id] , array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rankingprod->id] , array('class'=>'btn btn-sm btn-default'), ['confirm' => __('Are you sure you want to delete # {0}?', $rankingprod->id)]) ?>
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
