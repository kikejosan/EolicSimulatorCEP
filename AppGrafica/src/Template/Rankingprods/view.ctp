<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rankingprod $rankingprod
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rankingprod'), ['action' => 'edit', $rankingprod->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rankingprod'), ['action' => 'delete', $rankingprod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rankingprod->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rankingprods'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rankingprod'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rankingprods view large-9 medium-8 columns content">
    <h3><?= h($rankingprod->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($rankingprod->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($rankingprod->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SystemNumber') ?></th>
            <td><?= $this->Number->format($rankingprod->systemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suma') ?></th>
            <td><?= $this->Number->format($rankingprod->suma) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Productividad') ?></th>
            <td><?= $this->Number->format($rankingprod->productividad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Events') ?></th>
            <td><?= $this->Number->format($rankingprod->events) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($rankingprod->time) ?></td>
        </tr>
    </table>
</div>
