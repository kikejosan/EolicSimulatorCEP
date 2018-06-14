<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notificacion $notificacion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Notificacions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="notificacions form large-9 medium-8 columns content">
    <?= $this->Form->create($notificacion) ?>
    <fieldset>
        <legend><?= __('Add Notificacion') ?></legend>
        <?php
            echo $this->Form->control('tipo');
            echo $this->Form->control('systemNumber');
            echo $this->Form->control('fecha', ['empty' => true]);
            echo $this->Form->control('campo1');
            echo $this->Form->control('campo2');
            echo $this->Form->control('campo3');
            echo $this->Form->control('campo4');
            echo $this->Form->control('campo5');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
