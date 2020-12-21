<?php

require 'zklibrary.php';

$zk = new ZKLibrary('192.168.0.51', 4370);
$zk->connect();
$zk->disableDevice();

// $users = $zk->getUser();
// $zk->setTime(date('d-m-Y H:i:s'));
$kehadiran = $zk->getAttendance();
?>
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
<thead>
  <tr>
    <td width="25">No</td>
    <td>UID</td>
    <td>ID</td>
    <td>Name</td>
    <td>State</td>
    <td>Jam</td>
  </tr>
</thead>
<tbody>
<?php
$no = 0;
foreach($kehadiran as $key => $user)
{
  $no++;
  ?>
  <tr>
    <td align="right"><?php echo $no; ?></td>
    <td><?php echo $key; ?></td>
    <td><?php echo $user[0]; ?></td>
    <td><?php echo $user[1]; ?></td>
    <td><?php echo $user[2]; ?></td>
    <td><?php echo $user[3]; ?></td>
  </tr>
  <?php
}
?>
</tbody>
</table>
<?php
print_r($kehadiran);
$zk->enableDevice();
$zk->disconnect();

?>
