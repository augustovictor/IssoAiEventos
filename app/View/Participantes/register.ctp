<fb:registration
    fields="name,birthday,gender,email" 
    redirect-uri="<?php echo $this->Html->url(array('controller' => 'participantes', 'action' => 'register'), true) ?>"
    width="530">
</fb:registration>