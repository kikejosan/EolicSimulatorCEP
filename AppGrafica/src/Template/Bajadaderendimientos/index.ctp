<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bajadaderendimiento[]|\Cake\Collection\CollectionInterface $bajadaderendimientos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bajadaderendimiento'), ['action' => 'add'], array('class'=>'btn btn-sm btn-default')) ?></li>
    </ul>
</nav>
<div class="bajadaderendimientos index large-9 medium-8 columns content">
    <h3><?= __('Bajadaderendimientos') ?></h3>
    <div class="col-md-12" >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('systemNumber1') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('media1') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fecha1') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('viento1') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('systemNumber2') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('media2') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fecha2') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('viento2') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bajadaderendimientos as $bajadaderendimiento): ?>
                <tr>
                    <td><?= $this->Number->format($bajadaderendimiento->id) ?></td>
                    <td><?= $this->Number->format($bajadaderendimiento->systemNumber1) ?></td>
                    <td><?= $this->Number->format($bajadaderendimiento->media1) ?></td>
                    <td><?= h($bajadaderendimiento->fecha1) ?></td>
                    <td><?= $this->Number->format($bajadaderendimiento->viento1) ?></td>
                    <td><?= $this->Number->format($bajadaderendimiento->systemNumber2) ?></td>
                    <td><?= $this->Number->format($bajadaderendimiento->media2) ?></td>
                    <td><?= h($bajadaderendimiento->fecha2) ?></td>
                    <td><?= $this->Number->format($bajadaderendimiento->viento2) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $bajadaderendimiento->id] , array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bajadaderendimiento->id] , array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bajadaderendimiento->id] , array('class'=>'btn btn-sm btn-default'), ['confirm' => __('Are you sure you want to delete # {0}?', $bajadaderendimiento->id)]) ?>
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
