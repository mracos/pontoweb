<link rel="stylesheet" href="../assets/css/dashboard.css">
<div id="panel">
    <div id="title">PontoWEB</div>
    <table id="table">
        <tr class="row">
            <td class="column">User</td>
            <td class="column">Logged</td>
            <td class="column">Last Logged</td>
            <td class="column">Hours</td>
        </tr>
        <tr class='row'>
            <td class='column'><?php echo $user->user; ?></td>
            <td class='column'><?php Classes\Helpers::translateLoggedToCircle($user->logged); ?></td>
            <td class='column'><?php Classes\Helpers::translateTimestampToDate($user->lastlogged); ?></td>
            <td class='column'><?php echo round($user->hours, 2); ?></td>
        </tr>
    </table>
    <div id="inputbox">
        <a href="choices/chlogged.php">
            <input type="button" value="<?php Classes\Helpers::defineLogButton($user->logged); ?>">
        </a>
        <a href="choices/quit.php">
            <input type="button" value="quit">
        </a>
        <a href="choices/reset.php">
            <input type="button" value="reset">
        </a>
        <a href="choices/delete.php">
            <input type="button" value="delete">
        </a>
    </div>
</div>