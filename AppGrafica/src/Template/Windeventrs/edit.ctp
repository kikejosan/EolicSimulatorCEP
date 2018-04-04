<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Windeventr $windeventr
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $windeventr->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $windeventr->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Windeventrs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="windeventrs form large-9 medium-8 columns content">
    <?= $this->Form->create($windeventr) ?>
    <fieldset>
        <legend><?= __('Edit Windeventr') ?></legend>
        <?php
            echo $this->Form->control('power');
            echo $this->Form->control('systemNumber');
            echo $this->Form->control('media');
            echo $this->Form->control('desviacion');
            echo $this->Form->control('windSpeed');
            echo $this->Form->control('viento');
            echo $this->Form->control('veces');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
