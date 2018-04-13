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
            <th scope="row"><?= __('Aero1') ?></th>
            <td><?= $this->Number->format($cambioinicio->aero1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aero2') ?></th>
            <td><?= $this->Number->format($cambioinicio->aero2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aero3') ?></th>
            <td><?= $this->Number->format($cambioinicio->aero3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aero4') ?></th>
            <td><?= $this->Number->format($cambioinicio->aero4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aero5') ?></th>
            <td><?= $this->Number->format($cambioinicio->aero5) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aero6') ?></th>
            <td><?= $this->Number->format($cambioinicio->aero6) ?></td>
        </tr>
    </table>
</div>
