
<?php
echo $this->form->create('Users', array('action' => 'upload', 'type' => 'file'));
echo $this->form->file('file');
echo $this->form->submit(__('Upload', true)); ?>