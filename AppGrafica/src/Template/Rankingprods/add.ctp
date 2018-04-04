<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rankingprod $rankingprod
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rankingprods'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rankingprods form large-9 medium-8 columns content">
    <?= $this->Form->create($rankingprod) ?>
    <fieldset>
        <legend><?= __('Add Rankingprod') ?></legend>
        <?php
            echo $this->Form->control('systemNumber');
            echo $this->Form->control('time', ['empty' => true]);
            echo $this->Form->control('suma');
            echo $this->Form->control('productividad');
            echo $this->Form->control('events');
            echo $this->Form->control('tipo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
