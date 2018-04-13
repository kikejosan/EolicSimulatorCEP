<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aero $aero
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Aero'), ['action' => 'edit', $aero->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Aero'), ['action' => 'delete', $aero->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aero->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Aeros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aero'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aeros view large-9 medium-8 columns content">
    <h3><?= h($aero->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdIngeboards') ?></th>
            <td><?= h($aero->idIngeboards) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($aero->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SystemNumber') ?></th>
            <td><?= $this->Number->format($aero->SystemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fila') ?></th>
            <td><?= $this->Number->format($aero->fila) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Columna') ?></th>
            <td><?= $this->Number->format($aero->columna) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Parque') ?></th>
            <td><?= $this->Number->format($aero->id_parque) ?></td>
        </tr>
    </table>
</div>
