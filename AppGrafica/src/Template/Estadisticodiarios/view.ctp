<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estadisticodiario $estadisticodiario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Estadisticodiario'), ['action' => 'edit', $estadisticodiario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Estadisticodiario'), ['action' => 'delete', $estadisticodiario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estadisticodiario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Estadisticodiarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estadisticodiario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="estadisticodiarios view large-9 medium-8 columns content">
    <h3><?= h($estadisticodiario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($estadisticodiario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SystemNumber') ?></th>
            <td><?= $this->Number->format($estadisticodiario->systemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Media') ?></th>
            <td><?= $this->Number->format($estadisticodiario->media) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Desviacion') ?></th>
            <td><?= $this->Number->format($estadisticodiario->desviacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Viento') ?></th>
            <td><?= $this->Number->format($estadisticodiario->viento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Veces') ?></th>
            <td><?= $this->Number->format($estadisticodiario->veces) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($estadisticodiario->fecha) ?></td>
        </tr>
    </table>
</div>
