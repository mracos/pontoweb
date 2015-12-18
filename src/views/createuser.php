<div id="panel">
    <div id="title">PontoWEB</div>
    <div id="inputbox">
        <form action="createuser.php" method="post" onsubmit="return checkPass('newpass', 'confirmpass')">
            <input type="text" name="newuser" id="newuser" placeholder="new user" required>
            <input type="text" name="newpass" id="newpass" placeholder="password:" required>
            <input type="text" name="confirmpass" id="confirmpass" placeholder="password confirmation:" required>
            <input type="submit" value="create">
            <a href="../">
                <input type="button" value="cancel">
            </a>
        </form>
    </div>
    </div>
</div>
<script src="../../assets/js/create.js"></script>