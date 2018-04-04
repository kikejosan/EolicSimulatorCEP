<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fluctuaprod $fluctuaprod
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fluctuaprod'), ['action' => 'edit', $fluctuaprod->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fluctuaprod'), ['action' => 'delete', $fluctuaprod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fluctuaprod->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fluctuaprods'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fluctuaprod'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fluctuaprods view large-9 medium-8 columns content">
    <h3><?= h($fluctuaprod->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fluctuaprod->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aero1') ?></th>
            <td><?= $this->Number->format($fluctuaprod->aero1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subida1') ?></th>
            <td><?= $this->Number->format($fluctuaprod->subida1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aero2') ?></th>
            <td><?= $this->Number->format($fluctuaprod->aero2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subida2') ?></th>
            <td><?= $this->Number->format($fluctuaprod->subida2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aero3') ?></th>
            <td><?= $this->Number->format($fluctuaprod->aero3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subida3') ?></th>
            <td><?= $this->Number->format($fluctuaprod->subida3) ?></td>
        </tr>
    </table>
</div>
