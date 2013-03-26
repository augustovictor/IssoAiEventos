<?php if (!$loggedIn): ?>
<ul class="nav nav-pills pull-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Facebook->login(array('perms' => 'email,publish_stream', 'redirect' => $this->Html->url(array('controller' => 'participantes', 'action' => 'login'), true), 'label' => 'Participante')); ?></li>
            <li><a href="#">Organizador</a></li>
        </ul>
    </li>
    <li><?php echo $this->Html->link('Cadastro', array('controller' => 'usuarios', 'action' => 'cadastro')) ?></li>
</ul>
<?php else: ?>
<div class="pull-right">
    olá, <?= AuthComponent::user('nome'); ?>
    <?php // echo $this->Html->link('Logout', array('controller' => 'participantes', 'action' => 'logout')); ?>
    <?php echo $this->Facebook->logout(array('redirect' => $this->Html->url(array('controller' => 'participantes', 'action' => 'logout'), true), 'label' => 'Logout')) ?>
</div>
<?php endif; ?>

<h3 class="muted logotipo">Isso Aí Eventos</h3>

<ul class="nav nav-tabs">
    <li class="active"><a href="#">Acadêmicos</a></li>
    <li><a href="#">Profissionais</a></li>
    <li><a href="#">Shows/Festas</a></li>
</ul>