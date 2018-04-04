<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aero $aero
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $aero->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $aero->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Aeros'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="aeros form large-9 medium-8 columns content">
    <?= $this->Form->create($aero) ?>
    <fieldset>
        <legend><?= __('Edit Aero') ?></legend>
        <?php
            echo $this->Form->control('SystemNumber');
            echo $this->Form->control('fila');
            echo $this->Form->control('columna');
            echo $this->Form->control('idIngeboards');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
