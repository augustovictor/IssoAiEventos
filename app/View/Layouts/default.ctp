<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('main');
        
        echo $this->Html->script('jquery-1.9.1.min');
        echo $this->Html->script('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container">
		<div id="header">
            <ol class="nav nav-pills pull-right">
                <li><a href="#">Login</a></li>
                <li><a href="#">Organizador</a></li>
            </ol>
            
            <h3 class="muted logotipo">Isso Aí Eventos</h3>
            
            <ul class="nav nav-tabs">
                <li class="active"><a href="#">Acadêmicos</a></li>
                <li><a href="#">Profissionais</a></li>
                <li><a href="#">Shows/Festas</a></li>
            </ul>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
</body>
</html>
