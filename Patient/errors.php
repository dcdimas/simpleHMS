<?php  if (count($errors) > 0) : ?>
  <div class="error" style="color: red; font-size: 15px;"> <strong>You must completely filled up the following first correctly:</strong> 
  	<?php foreach ($errors as $errors) : ?>
  	  <p><?php echo $errors ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
