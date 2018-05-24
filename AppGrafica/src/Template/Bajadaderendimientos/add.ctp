<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bajadaderendimiento $bajadaderendimiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bajadaderendimientos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bajadaderendimientos form large-9 medium-8 columns content">
    <?= $this->Form->create($bajadaderendimiento) ?>
    <fieldset>
        <legend><?= __('Add Bajadaderendimiento') ?></legend>
        <?php
            echo $this->Form->control('systemNumber1');
            echo $this->Form->control('media1');
            echo $this->Form->control('fecha1', ['empty' => true]);
            echo $this->Form->control('viento1');
            echo $this->Form->control('systemNumber2');
            echo $this->Form->control('media2');
            echo $this->Form->control('fecha2', ['empty' => true]);
            echo $this->Form->control('viento2');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
