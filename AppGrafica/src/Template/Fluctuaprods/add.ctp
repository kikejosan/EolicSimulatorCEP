<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fluctuaprod $fluctuaprod
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fluctuaprods'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="fluctuaprods form large-9 medium-8 columns content">
    <?= $this->Form->create($fluctuaprod) ?>
    <fieldset>
        <legend><?= __('Add Fluctuaprod') ?></legend>
        <?php
            echo $this->Form->control('aero1');
            echo $this->Form->control('subida1');
            echo $this->Form->control('aero2');
            echo $this->Form->control('subida2');
            echo $this->Form->control('aero3');
            echo $this->Form->control('subida3');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
