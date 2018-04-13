<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cambioinicio[]|\Cake\Collection\CollectionInterface $cambioinicios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cambioinicio'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cambioinicios index large-9 medium-8 columns content">
    <h3><?= __('Cambioinicios') ?></h3>
    <div class="col-md-12" >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('a1.systemNumber') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('a2.systemNumber') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('a3.systemNumber') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('a4.systemNumber') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('a5.systemNumber') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('a6.systemNumber') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cambioinicios as $cambioinicio): ?>
                <tr>
                    <td><?= $this->Number->format($cambioinicio->id) ?></td>
                    <td><?= $this->Number->format($cambioinicio->a1.systemNumber) ?></td>
                    <td><?= $this->Number->format($cambioinicio->a2.systemNumber) ?></td>
                    <td><?= $this->Number->format($cambioinicio->a3.systemNumber) ?></td>
                    <td><?= $this->Number->format($cambioinicio->a4.systemNumber) ?></td>
                    <td><?= $this->Number->format($cambioinicio->a5.systemNumber) ?></td>
                    <td><?= $this->Number->format($cambioinicio->a6.systemNumber) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cambioinicio->id], array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cambioinicio->id], array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cambioinicio->id], array('class'=>'btn btn-sm btn-default'), ['confirm' => __('Are you sure you want to delete # {0}?', $cambioinicio->id)]) ?>
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
