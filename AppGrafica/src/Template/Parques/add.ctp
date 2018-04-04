<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parque $parque
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Parques'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="parques form large-9 medium-8 columns content">
    <?= $this->Form->create($parque) ?>
    <fieldset>
        <legend><?= __('Add Parque') ?></legend>
        <?php
            echo $this->Form->control('Nombre');
            echo $this->Form->control('Lugar');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
