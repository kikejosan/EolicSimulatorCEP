<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transicion $transicion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transicion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transicion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Transicions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="transicions form large-9 medium-8 columns content">
    <?= $this->Form->create($transicion) ?>
    <fieldset>
        <legend><?= __('Edit Transicion') ?></legend>
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
