<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Escala[]|\Cake\Collection\CollectionInterface $escalas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Escala'), ['action' => 'add'],array('class'=>'btn btn-sm btn-default')) ?></li>
    </ul>
</nav>
<div class="escalas index large-9 medium-8 columns content">
    <h3><?= __('Escalas') ?></h3>
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('systemNumber') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('posicion') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($escalas as $escala): ?>
                <tr>
                    <td><?= $this->Number->format($escala->id) ?></td>
                    <td><?= $this->Number->format($escala->systemNumber) ?></td>
                    <td><?= $this->Number->format($escala->posicion) ?></td>
                    <td><?= h($escala->fecha) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $escala->id],array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $escala->id],array('class'=>'btn btn-sm btn-default')) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $escala->id],array('class'=>'btn btn-sm btn-default'), ['confirm' => __('Are you sure you want to delete # {0}?', $escala->id)]) ?>
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
