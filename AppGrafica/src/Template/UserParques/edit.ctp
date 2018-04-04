<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserParque $userParque
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userParque->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userParque->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Parques'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="userParques form large-9 medium-8 columns content">
    <?= $this->Form->create($userParque) ?>
    <fieldset>
        <legend><?= __('Edit User Parque') ?></legend>
        <?php
            echo $this->Form->control('id_user');
            echo $this->Form->control('id_parque');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
