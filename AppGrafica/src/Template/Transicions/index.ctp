<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transicion[]|\Cake\Collection\CollectionInterface $transicions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transicion'), ['action' => 'add'], array('class'=>'btn btn-sm btn-default')) ?></li>
    </ul>
</nav>
<div class="transicions index large-9 medium-8 columns content">
    <h3><?= __('Transicions') ?></h3>
    <div class="col-md-12" >
            <table class="table table-striped">        
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('systemNumber') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('posicionInicio') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('posicionFin') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('variacion') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('inicio') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('fin') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('variacionR') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('variacionPR') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transicions as $transicion): ?>
                    <tr>
                        <td><?= $this->Number->format($transicion->id) ?></td>
                        <td><?= $this->Number->format($transicion->systemNumber) ?></td>
                        <td><?= $this->Number->format($transicion->posicionInicio) ?></td>
                        <td><?= $this->Number->format($transicion->posicionFin) ?></td>
                        <td><?= $this->Number->format($transicion->variacion) ?></td>
                        <td><?= h($transicion->inicio) ?></td>
                        <td><?= h($transicion->fin) ?></td>
                        <td><?= $this->Number->format($transicion->variacionR) ?></td>
                        <td><?= $this->Number->format($transicion->variacionPR) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $transicion->id], array('class'=>'btn btn-sm btn-default')) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transicion->id], array('class'=>'btn btn-sm btn-default')) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transicion->id], array('class'=>'btn btn-sm btn-default'), ['confirm' => __('Are you sure you want to delete # {0}?', $transicion->id)]) ?>
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
