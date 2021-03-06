<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estadisticodiario[]|\Cake\Collection\CollectionInterface $estadisticodiarios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Estadisticodiario'), ['action' => 'add'] , array('class'=>'btn btn-sm btn-default')) ?></li>
    </ul>
</nav>
<div class="estadisticodiarios index large-9 medium-8 columns content">
    <h3><?= __('Estadisticodiarios') ?></h3>
    <div class="col-md-12" >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('systemNumber') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('media') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('desviacion') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('viento') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('veces') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estadisticodiarios as $estadisticodiario): ?>
                <tr>
                    <td><?= $this->Number->format($estadisticodiario->id) ?></td>
                    <td><?= $this->Number->format($estadisticodiario->systemNumber) ?></td>
                    <td><?= $this->Number->format($estadisticodiario->media) ?></td>
                    <td><?= $this->Number->format($estadisticodiario->desviacion) ?></td>
                    <td><?= $this->Number->format($estadisticodiario->viento) ?></td>
                    <td><?= $this->Number->format($estadisticodiario->veces) ?></td>
                    <td><?= h($estadisticodiario->fecha) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $estadisticodiario->id] , array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estadisticodiario->id] , array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $estadisticodiario->id] , array('class'=>'btn btn-sm btn-default'), ['confirm' => __('Are you sure you want to delete # {0}?', $estadisticodiario->id)]) ?>
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
