<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Escala $escala
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Escala'), ['action' => 'edit', $escala->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Escala'), ['action' => 'delete', $escala->id], ['confirm' => __('Are you sure you want to delete # {0}?', $escala->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Escalas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Escala'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="escalas view large-9 medium-8 columns content">
    <h3><?= h($escala->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($escala->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SystemNumber') ?></th>
            <td><?= $this->Number->format($escala->systemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Posicion') ?></th>
            <td><?= $this->Number->format($escala->posicion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= $this->Number->format($escala->fecha) ?></td>
        </tr>
    </table>
</div>
