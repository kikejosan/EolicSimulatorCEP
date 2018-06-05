<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserParque[]|\Cake\Collection\CollectionInterface $userParques
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Parque'), ['action' => 'add'], array('class'=>'btn btn-sm btn-default')) ?></li>
    </ul>
</nav>
<div class="userParques index large-9 medium-8 columns content">
    <h3><?= __('User Parques') ?></h3>
    <div class="col-md-12" >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('id_user') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('id_parque') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userParques as $userParque): ?>
                <tr>
                    <td><?= $this->Number->format($userParque->id) ?></td>
                    <td><?= $this->Number->format($userParque->id_user) ?></td>
                    <td><?= $this->Number->format($userParque->id_parque) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userParque->id] , array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userParque->id] , array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userParque->id] , array('class'=>'btn btn-sm btn-default'), ['confirm' => __('Are you sure you want to delete # {0}?', $userParque->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, enseñando {{current}} entradas(s) de {{count}} total')]) ?></p>
    </div>
</div>
