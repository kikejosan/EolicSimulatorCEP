<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parque $parque
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Parque'), ['action' => 'edit', $parque->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Parque'), ['action' => 'delete', $parque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parque->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Parques'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parque'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parques view large-9 medium-8 columns content">
    <h3><?= h($parque->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($parque->Nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lugar') ?></th>
            <td><?= h($parque->Lugar) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($parque->id) ?></td>
        </tr>
    </table>
</div>
