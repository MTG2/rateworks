<!-- File: /app/View/Users/view.ctp -->
<?php $this->layout = 'standart'; ?> 


<h1><?php echo $user['User']['username']; ?></h1>

<?php echo $this->Html->image($user['User']['pic'], array('class'=>'alignleft', 'width'=>'150px'));  ?>
<p>Rolle: <?php echo $user['User']['role']; ?> </p>
<p>E-Mail: <?php echo $user['User']['email']; ?> </p>
<p>Semester: <?php echo $user['User']['semester']; ?> </p>
<p>Kurs: <?php echo $user['User']['course']; ?> </p>



