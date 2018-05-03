<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estadisticosdiario $estadisticosdiario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Estadisticosdiarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="estadisticosdiarios form large-9 medium-8 columns content">
    <?= $this->Form->create($estadisticosdiario) ?>
    <fieldset>
        <legend><?= __('Add Estadisticosdiario') ?></legend>
        <?php
            echo $this->Form->control('systemNumber');
            echo $this->Form->control('media');
            echo $this->Form->control('desviacion');
            echo $this->Form->control('viento');
            echo $this->Form->control('veces');
            echo $this->Form->control('time', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>