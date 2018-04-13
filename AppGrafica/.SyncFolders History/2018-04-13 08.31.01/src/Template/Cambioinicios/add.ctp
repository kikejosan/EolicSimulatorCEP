<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cambioinicio $cambioinicio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cambioinicios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cambioinicios form large-9 medium-8 columns content">
    <?= $this->Form->create($cambioinicio) ?>
    <fieldset>
        <legend><?= __('Add Cambioinicio') ?></legend>
        <?php
            echo $this->Form->control('a1.systemNumber');
            echo $this->Form->control('a2.systemNumber');
            echo $this->Form->control('a3.systemNumber');
            echo $this->Form->control('a4.systemNumber');
            echo $this->Form->control('a5.systemNumber');
            echo $this->Form->control('a6.systemNumber');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
