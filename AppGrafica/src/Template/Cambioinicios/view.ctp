<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cambioinicio $cambioinicio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cambioinicio'), ['action' => 'edit', $cambioinicio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cambioinicio'), ['action' => 'delete', $cambioinicio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cambioinicio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cambioinicios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cambioinicio'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cambioinicios view large-9 medium-8 columns content">
    <h3><?= h($cambioinicio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cambioinicio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('A1.systemNumber') ?></th>
            <td><?= $this->Number->format($cambioinicio->a1.systemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('A2.systemNumber') ?></th>
            <td><?= $this->Number->format($cambioinicio->a2.systemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('A3.systemNumber') ?></th>
            <td><?= $this->Number->format($cambioinicio->a3.systemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('A4.systemNumber') ?></th>
            <td><?= $this->Number->format($cambioinicio->a4.systemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('A5.systemNumber') ?></th>
            <td><?= $this->Number->format($cambioinicio->a5.systemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('A6.systemNumber') ?></th>
            <td><?= $this->Number->format($cambioinicio->a6.systemNumber) ?></td>
        </tr>
    </table>
</div>
