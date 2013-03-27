<div class="btn-toolbar pull-right">
    
    <?php if (!$loggedIn): ?>
    
    <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Login <i class="caret"></i></a>
        <ul class="dropdown-menu">
            <li><?php echo $this->Facebook->login(array(
                'perms' => 'email,publish_stream',
                'redirect' => $this->Html->url(array('controller' => 'participantes', 'action' => 'login'), true),
                'label' => 'Participante')); ?>
            </li>
            <li><a href="#">Organizador</a></li>
        </ul>
    </div>
    <a href="#" class="btn pull-right">Cadastro</a>
    
    <?php else: ?>
    
    <div class="btn-group">
        <?= $this->Facebook->picture(AuthComponent::user('facebook_id'), array('size' => 'square', 'facebook-logo' => false, 'width' => 30, 'height' => 30)); ?>
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><?= AuthComponent::user('nome'); ?> <i class="caret"></i></a>
        <ul class="dropdown-menu">
            <li><a>Meu Perfil</a></li>
            <li class="divider"></li>
            <li><?php echo $this->Facebook->disconnect(array(
                'redirect' => array('controller' => 'participantes', 'action' => 'logout'),
                'confirm' => 'Desconectar de Isso Aí Eventos?')); ?>
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