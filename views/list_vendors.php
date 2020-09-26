<table style="width:100%">
<tr>
    <th>Id</th>
    <th>Vendor Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Address</th>
    <th>Status</th>
    <th>Action</th>

</tr>
<?php foreach($vendors as $vendor){ ?>
    <tr>
        <td><h3><?php echo $vendor['vendor_id'];?></h3></td>
        <td><h3><?php echo $vendor['vendor_name']; ?></h3> </td>
        <td><h3><?php echo $vendor['phone_number']; ?></h3> </td>
        <td><h3><?php echo $vendor['email']; ?></h3> </td>
        <td><h3><?php echo $vendor['address']; ?></h3> </td>
        <td><h3><?php echo $vendor['status']; ?></h3> </td>
        <td> <input type="submit" name="DeleteItem"  value="Delete User" /><input type="submit" name="EditItem"  value="Edit User" /> </td>
    </tr>
<?php } ?>
</table>