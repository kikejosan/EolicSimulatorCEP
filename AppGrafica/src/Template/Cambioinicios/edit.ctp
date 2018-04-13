<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cambioinicio $cambioinicio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cambioinicio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cambioinicio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cambioinicios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cambioinicios form large-9 medium-8 columns content">
    <?= $this->Form->create($cambioinicio) ?>
    <fieldset>
        <legend><?= __('Edit Cambioinicio') ?></legend>
        <?php
            echo $this->Form->control('aero1');
            echo $this->Form->control('aero2');
            echo $this->Form->control('aero3');
            echo $this->Form->control('aero4');
            echo $this->Form->control('aero5');
            echo $this->Form->control('aero6');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
