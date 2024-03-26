<form action="script/core/db/setting/handleSettings.php" method="post">
    <label for="theme_id">Sélectionnez votre thème :</label>
    <select name="theme_id">
        <option value="1">Défaut</option>
        <option value="2" <?php if (isset($_SESSION['theme_id']) && $_SESSION['theme_id'] == 2) echo 'selected'; ?>>Sombre</option>
        <option value="3" <?php if (isset($_SESSION['theme_id']) && $_SESSION['theme_id'] == 3) echo 'selected'; ?>>Clair</option>
    </select>
    <div class="rowForm">
        <span>Masquer le header</span>
    </div>
    <input type="checkbox" name="header_toggle" value="1" <?php if (isset($_SESSION['header_toggle']) && !$_SESSION['header_toggle']) echo 'checked'; ?>>
    <div class="rowForm">
        <span>Masquer les widgets</span>
    </div>
    <input type="checkbox" name="widget_toggle" value="1" <?php if (isset($_SESSION['widget_toggle']) && !$_SESSION['widget_toggle']) echo 'checked'; ?>>
    <div class="rowForm">
        <input type="submit" value="Save">
    </div>
</form>
