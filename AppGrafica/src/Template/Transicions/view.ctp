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
            <th scope="row"><?= __('SystemNumber') ?></th>
            <td><?= $this->Number->format($transicion->systemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PosicionInicio') ?></th>
            <td><?= $this->Number->format($transicion->posicionInicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PosicionFin') ?></th>
            <td><?= $this->Number->format($transicion->posicionFin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Variacion') ?></th>
            <td><?= $this->Number->format($transicion->variacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Inicio') ?></th>
            <td><?= h($transicion->inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fin') ?></th>
            <td><?= h($transicion->fin) ?></td>
        </tr>
    </table>
</div>
