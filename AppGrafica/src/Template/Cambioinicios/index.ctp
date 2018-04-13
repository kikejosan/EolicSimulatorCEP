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
                    <th scope="col"><?= $this->Paginator->sort('aero1') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('aero2') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('aero3') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('aero4') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('aero5') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('aero6') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cambioinicios as $cambioinicio): ?>
                <tr>
                    <td><?= $this->Number->format($cambioinicio->id) ?></td>
                    <td><?= $this->Number->format($cambioinicio->aero1) ?></td>
                    <td><?= $this->Number->format($cambioinicio->aero2) ?></td>
                    <td><?= $this->Number->format($cambioinicio->aero3) ?></td>
                    <td><?= $this->Number->format($cambioinicio->aero4) ?></td>
                    <td><?= $this->Number->format($cambioinicio->aero5) ?></td>
                    <td><?= $this->Number->format($cambioinicio->aero6) ?></td>
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
