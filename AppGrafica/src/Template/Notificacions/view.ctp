<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notificacion $notificacion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notificacion'), ['action' => 'edit', $notificacion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notificacion'), ['action' => 'delete', $notificacion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notificacion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notificacions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notificacion'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notificacions view large-9 medium-8 columns content">
    <h3><?= h($notificacion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($notificacion->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($notificacion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SystemNumber') ?></th>
            <td><?= $this->Number->format($notificacion->systemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Campo1') ?></th>
            <td><?= $this->Number->format($notificacion->campo1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Campo2') ?></th>
            <td><?= $this->Number->format($notificacion->campo2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Campo3') ?></th>
            <td><?= $this->Number->format($notificacion->campo3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Campo4') ?></th>
            <td><?= $this->Number->format($notificacion->campo4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Campo5') ?></th>
            <td><?= $this->Number->format($notificacion->campo5) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($notificacion->fecha) ?></td>
        </tr>
    </table>
</div>
