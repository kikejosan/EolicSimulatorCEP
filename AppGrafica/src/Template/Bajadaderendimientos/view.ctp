<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bajadaderendimiento $bajadaderendimiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bajadaderendimiento'), ['action' => 'edit', $bajadaderendimiento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bajadaderendimiento'), ['action' => 'delete', $bajadaderendimiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bajadaderendimiento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bajadaderendimientos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bajadaderendimiento'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bajadaderendimientos view large-9 medium-8 columns content">
    <h3><?= h($bajadaderendimiento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bajadaderendimiento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SystemNumber1') ?></th>
            <td><?= $this->Number->format($bajadaderendimiento->systemNumber1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Media1') ?></th>
            <td><?= $this->Number->format($bajadaderendimiento->media1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Viento1') ?></th>
            <td><?= $this->Number->format($bajadaderendimiento->viento1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SystemNumber2') ?></th>
            <td><?= $this->Number->format($bajadaderendimiento->systemNumber2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Media2') ?></th>
            <td><?= $this->Number->format($bajadaderendimiento->media2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Viento2') ?></th>
            <td><?= $this->Number->format($bajadaderendimiento->viento2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha1') ?></th>
            <td><?= h($bajadaderendimiento->fecha1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha2') ?></th>
            <td><?= h($bajadaderendimiento->fecha2) ?></td>
        </tr>
    </table>
</div>
