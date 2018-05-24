<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estadisticodiario $estadisticodiario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $estadisticodiario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $estadisticodiario->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Estadisticodiarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="estadisticodiarios form large-9 medium-8 columns content">
    <?= $this->Form->create($estadisticodiario) ?>
    <fieldset>
        <legend><?= __('Edit Estadisticodiario') ?></legend>
        <?php
            echo $this->Form->control('systemNumber');
            echo $this->Form->control('media');
            echo $this->Form->control('desviacion');
            echo $this->Form->control('viento');
            echo $this->Form->control('veces');
            echo $this->Form->control('fecha', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
