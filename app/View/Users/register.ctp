<!-- File: /app/View/Users/register.ctp -->

<h1>Register</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->end('Registrieren!');
?>