<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estadisticosdiario $estadisticosdiario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Estadisticosdiario'), ['action' => 'edit', $estadisticosdiario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Estadisticosdiario'), ['action' => 'delete', $estadisticosdiario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estadisticosdiario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Estadisticosdiarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estadisticosdiario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="estadisticosdiarios view large-9 medium-8 columns content">
    <h3><?= h($estadisticosdiario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($estadisticosdiario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SystemNumber') ?></th>
            <td><?= $this->Number->format($estadisticosdiario->systemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Media') ?></th>
            <td><?= $this->Number->format($estadisticosdiario->media) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Desviacion') ?></th>
            <td><?= $this->Number->format($estadisticosdiario->desviacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Viento') ?></th>
            <td><?= $this->Number->format($estadisticosdiario->viento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Veces') ?></th>
            <td><?= $this->Number->format($estadisticosdiario->veces) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($estadisticosdiario->time) ?></td>
        </tr>
    </table>
</div>
