<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transicion $transicion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transicion'), ['action' => 'edit', $transicion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transicion'), ['action' => 'delete', $transicion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transicion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transicions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transicion'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transicions view large-9 medium-8 columns content">
    <h3><?= h($transicion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transicion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aero1') ?></th>
            <td><?= $this->Number->format($transicion->aero1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subida1') ?></th>
            <td><?= $this->Number->format($transicion->subida1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aero2') ?></th>
            <td><?= $this->Number->format($transicion->aero2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subida2') ?></th>
            <td><?= $this->Number->format($transicion->subida2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aero3') ?></th>
            <td><?= $this->Number->format($transicion->aero3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subida3') ?></th>
            <td><?= $this->Number->format($transicion->subida3) ?></td>
        </tr>
    </table>
</div>
