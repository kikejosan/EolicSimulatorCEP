<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Escala $escala
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $escala->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $escala->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Escalas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="escalas form large-9 medium-8 columns content">
    <?= $this->Form->create($escala) ?>
    <fieldset>
        <legend><?= __('Edit Escala') ?></legend>
        <?php
            echo $this->Form->control('systemNumber');
            echo $this->Form->control('posicion');
            echo $this->Form->control('fecha', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
