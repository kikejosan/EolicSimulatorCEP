<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fuera $fuera
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fueras'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="fueras form large-9 medium-8 columns content">
    <?= $this->Form->create($fuera) ?>
    <fieldset>
        <legend><?= __('Add Fuera') ?></legend>
        <?php
            echo $this->Form->control('systemNumber');
            echo $this->Form->control('vecesFuera');
            echo $this->Form->control('viento');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
