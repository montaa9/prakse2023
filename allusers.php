<?php
include_once 'connection.php';
include_once 'header.php';

if (!isset($_SESSION['user_id'])) {
    header('location: register.php');
    exit;
}

$nouser = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}";
$nouser_check = mysqli_query($conn, $nouser);

if (mysqli_num_rows($nouser_check) == 0) {
    session_destroy();
    header("location: register.php");
    exit;
}

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<section class="allusers">
  <h1 class="heading">Visi lietotāji</h1>

  <div class="tbcon">
    <table class="alltable">
      <thead class="allthead">
        <tr class="alltr">
          <th class="allth">Id</th>
          <th class="allth">Vards</th>
          <th class="allth">Uzvārds</th>
          <th class="allth">E-pasts</th>
          <th class="allth">Reģistrācijas datums</th>
          <th class="allth">Izdzēst lietotāju</th>
        </tr>
      </thead>
      <tbody class="alltbody">
        <?php while ($user = mysqli_fetch_assoc($result)) : ?>
          <tr class="alltr">
            <td class="alltd"><?= $user['user_id'] ?></td>
            <td class="alltd"><?= $user['first_name'] ?></td>
            <td class="alltd"><?= $user['last_name'] ?></td>
            <td class="alltd"><?= $user['email'] ?></td>
            <td class="alltd"><?= $user['register_date'] ?></td>
            <td class="alltd"><a href="delete.php?uid=<?= $user['user_id'] ?>"><button class="inbtn">Dzēst</button></a></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</section>

<?php include_once 'footer.php'; ?>
