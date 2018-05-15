<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transicion $transicion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Transicions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="transicions form large-9 medium-8 columns content">
    <?= $this->Form->create($transicion) ?>
    <fieldset>
        <legend><?= __('Add Transicion') ?></legend>
        <?php
            echo $this->Form->control('systemNumber');
            echo $this->Form->control('posicionInicio');
            echo $this->Form->control('posicionFin');
            echo $this->Form->control('variacion');
            echo $this->Form->control('inicio', ['empty' => true]);
            echo $this->Form->control('fin', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
