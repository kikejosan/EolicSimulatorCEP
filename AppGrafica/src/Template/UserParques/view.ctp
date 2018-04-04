<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserParque $userParque
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Parque'), ['action' => 'edit', $userParque->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Parque'), ['action' => 'delete', $userParque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userParque->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Parques'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Parque'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userParques view large-9 medium-8 columns content">
    <h3><?= h($userParque->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userParque->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($userParque->id_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Parque') ?></th>
            <td><?= $this->Number->format($userParque->id_parque) ?></td>
        </tr>
    </table>
</div>
