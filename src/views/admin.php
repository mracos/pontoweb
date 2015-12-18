<link rel="stylesheet" href="../assets/css/dashboard.css">
<div id="panel">
    <div id="title">PontoWEB</div>
    <table id="table">
        <tr class="row">
            <td class="column">User</td>
            <td class="column">Logged</td>
            <td class='column'>Last Logged</td>
            <td class="column">Hours</td>
        </tr>
        <?php foreach ($data as $user): ?>
            <tr class='row'>
                <td class='column'><?php echo $user['user']; ?></td>
                <td class='column'><?php Classes\Helpers::translateLoggedToCircle($user['logged']); ?></td>
                <td class='column'><?php Classes\Helpers::translateTimestampToDate($user['lastlogged']); ?></td>
                <td class='column'><?php echo round($user['hours'], 2); ?></td>
                <div>
                    <td class="column">
                        <a href="choices/delete.php?usertodelete=<?php echo $user['user']; ?>">
                            <input type="button" value="delete" class="inputbox">
                        </a>
                    </td>
                    <td class="column">
                        <a href="choices/reset.php?user=<?php echo $user['user']; ?>">
                            <input type="button" value="reset" name="reset" class="inputbox">
                        </a>
                    </td>
                </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div id="inputbox">
        <a href="choices/quit.php">
            <input type="button" value="quit">
        </a>
        <a href="choices/createuser.php">
            <input type="button" value="create user">
        </a>
    </div>
</div>