<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fuera[]|\Cake\Collection\CollectionInterface $fueras
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fuera'), ['action' => 'add'],array('class'=>'btn btn-sm btn-default')) ?></li>
    </ul>
</nav>
<div class="fueras index large-9 medium-8 columns content">
    <h3><?= __('Fueras') ?></h3>
    <div class="col-md-12" >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('systemNumber') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('vecesFuera') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('viento') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('media') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('desviacion') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fueras as $fuera): ?>
                <tr>
                    <td><?= $this->Number->format($fuera->id) ?></td>
                    <td><?= $this->Number->format($fuera->systemNumber) ?></td>
                    <td><?= $this->Number->format($fuera->vecesFuera) ?></td>
                    <td><?= $this->Number->format($fuera->viento) ?></td>
                    <td><?= $this->Number->format($fuera->media) ?></td>
                    <td><?= $this->Number->format($fuera->desviacion) ?></td>
                    <td><?= h($fuera->fecha) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fuera->id],array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fuera->id],array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fuera->id],array('class'=>'btn btn-sm btn-default'), ['confirm' => __('Are you sure you want to delete # {0}?', $fuera->id)]) ?>
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
