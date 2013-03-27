<div>
    <?php
    echo $this->Form->create('Organizador', array('inputDefaults' => Configure::read('Form.inputDefaults')));
    echo $this->Form->input('Usuario.nome');
    echo $this->Form->input('Usuario.email');
    echo $this->Form->input('Organizador.data_nascimento', array('type' => 'text'));
    echo $this->Form->input('Usuario.senha');
    echo $this->Form->input('Usuario.confirma_senha');
    echo $this->Form->end(array('label' => 'Enviar', 'class' => 'btn'))
    ?>
</div>