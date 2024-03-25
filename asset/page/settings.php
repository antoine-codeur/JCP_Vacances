<form action="script/core/db/setting/handleTheme.php" method="post">
    <select name="theme_id">
        <option value="1">Défaut</option>
        <option value="2">Sombre</option>
        <option value="3">Clair</option>
    </select>
    <input type="submit" value="Changer de thème">
</form>
<form action="script/core/db/setting/toggleHeader.php" method="post">
    <input type="checkbox" name="header_toggle" value="1" <?php if(isset($_SESSION['header_toggle']) && $_SESSION['header_toggle']) echo 'checked'; ?>> Afficher le header
    <input type="submit" value="Appliquer">
</form>