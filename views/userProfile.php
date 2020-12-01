
<form action="" method="post">
first name<input type="text" name="first_name" value= "<?php echo $user['first_name'] ?>" id="">
last name<input type="text" name="last_name" value= "<?php echo $user['last_name'] ?>" id="">
phone number<input type="text" name="phone_number" value=" <?php echo $user['phone_number']?>" id="">
email<input type="text" name="email" value= "<?php echo $user['email']?>" id="">
address<input type="text" name="address" value= "<?php echo $user['address']?>" id="">

<input type="submit" name="update" value="update">
</form>
