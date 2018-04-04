<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Windeventr $windeventr
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Windeventr'), ['action' => 'edit', $windeventr->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Windeventr'), ['action' => 'delete', $windeventr->id], ['confirm' => __('Are you sure you want to delete # {0}?', $windeventr->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Windeventrs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Windeventr'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="windeventrs view large-9 medium-8 columns content">
    <h3><?= h($windeventr->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($windeventr->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Power') ?></th>
            <td><?= $this->Number->format($windeventr->power) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SystemNumber') ?></th>
            <td><?= $this->Number->format($windeventr->systemNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Media') ?></th>
            <td><?= $this->Number->format($windeventr->media) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Desviacion') ?></th>
            <td><?= $this->Number->format($windeventr->desviacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('WindSpeed') ?></th>
            <td><?= $this->Number->format($windeventr->windSpeed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Viento') ?></th>
            <td><?= $this->Number->format($windeventr->viento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Veces') ?></th>
            <td><?= $this->Number->format($windeventr->veces) ?></td>
        </tr>
    </table>
</div>
