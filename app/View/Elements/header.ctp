<div class="btn-toolbar pull-right">
    <?php if (!$loggedIn): ?>
    
    <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Login <i class="caret"></i></a>
        <ul class="dropdown-menu">
            <li><a href="#" id="participante_login_link">Participante</a></li>
            <li><?php echo $this->Html->link('Organizador',
					array('controller' => 'organizadores', 'action' => 'login')) ?></li>
        </ul>
    </div>
    <?php echo $this->Html->link("Cadastro",
			array('controller' => 'organizadores', 'action' => 'add'),
			array('class' => 'btn')); ?>
    
    <?php elseif(AuthComponent::user('facebook_id')): ?>
    
    <div class="btn-group">
        <img src="" width="30" height="30" id="profile_picture" />
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <?= AuthComponent::user('nome'); ?> <i class="caret"></i>
        </a>
        <ul class="dropdown-menu">
            <li><a>Meu perfil</a></li>
            <li class="divider"></li>
            <li><?= $this->Html->link('Logout',
                    array('controller' => 'participantes', 'action' => 'logout')); ?>
            </li>
        </ul>
    </div>
    
	<?php else: ?>
	
	<div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><?= AuthComponent::user('nome'); ?> <i class="caret"></i></a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('Painel',
					array('controller' => 'organizadores', 'action' => 'painel')) ?></li>
            <li class="divider"></li>
            <li><?php echo $this->Html->link('Logout',
                array('controller' => 'usuarios', 'action' => 'logout')); ?>
            </li>
        </ul>
    </div>
	
    <?php endif; ?>
    
</div>

<h3 class="muted logotipo"><?= $this->Html->link('Isso Aí Eventos', array('controller' => 'eventos', 'action' => 'index')); ?></h3>

<ul class="nav nav-tabs">
    <li <?= $this->Site->menuActive('eventos', 'academicos') ?>><?= $this->Html->link('Academicos', array('controller' => 'eventos', 'action' => 'academicos')); ?></li>
    <li <?= $this->Site->menuActive('eventos', 'profissionais') ?>><?= $this->Html->link('Profissionais', array('controller' => 'eventos', 'action' => 'profissionais')); ?></li>
    <li <?= $this->Site->menuActive('eventos', 'recreativos') ?>><?= $this->Html->link('Shows/Festas', array('controller' => 'eventos', 'action' => 'recreativos')); ?></li>
</ul>