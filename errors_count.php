<?php 
if(count($errors) > 0): 
?>
<div class=error style="border:1px solid:#a9442;
    background-color: coral;border-radius:5px;">

<?php foreach($errors as $error) : ?>
<p > <strong><?php echo $error ?></strong></p>
<?php endforeach ?>
</div>
<?php endif ?>






