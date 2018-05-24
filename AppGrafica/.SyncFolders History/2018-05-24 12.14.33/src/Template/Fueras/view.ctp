<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fuera $fuera
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fuera'), ['action' => 'edit', $fuera->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fuera'), ['action' => 'delete', $fuera->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuera->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fueras'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fuera'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fueras view large-9 medium-8 columns content">
    <h3><?= h($fuera->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fuera->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SystemNumber') ?></th>
            <td><?= $this->Number->format($fuera->systemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('VecesFuera') ?></th>
            <td><?= $this->Number->format($fuera->vecesFuera) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Viento') ?></th>
            <td><?= $this->Number->format($fuera->viento) ?></td>
        </tr>
    </table>
</div>
