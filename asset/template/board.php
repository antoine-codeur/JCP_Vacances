<div id="BOARD">
    <div>
        <img id="imgLOGO" src="asset/image/icon/logo_JCP.png" alt="Logo de JCP Vacances, représentant une valise stylisée avec des éléments évoquant le voyage, comme des palmiers et un soleil, symbolisant la gestion de voyages et les vacances. Le design épuré et moderne communique l'efficacité et le plaisir des voyages organisés par JCP Vacances." loading="lazy">
    </div>
    <nav id="menuDeBord">
        <span>Menu de bord</span>
        <div class="menuBordMain">
            <div class="menuBord <?php echo $page === 'home' ? 'active' : ''; ?>">
                <a href="index.php">Tableau De Bord</a>
            </div>
            <div class="menuBord <?php echo $page === 'favorite' ? 'active' : ''; ?>">
                <a href="index.php?page=favorite">Favoris</a>
            </div>
            <div class="menuBord <?php echo $page === 'newVoyage' ? 'active' : ''; ?>">
                <a href="index.php?page=newVoyage">Publier Un Nouveau Voyage</a>
            </div>
            <div class="menuBord <?php echo $page === 'draft' ? 'active' : ''; ?>">
                <a href="index.php?page=draft">Brouillons</a>
            </div>
            <div class="menuBord <?php echo $page === 'listVoyage' ? 'active' : ''; ?>">
                <a href="index.php?page=listVoyage">Liste Des Voyages</a>
            </div>
            <div class="menuBord <?php echo $page === 'images' ? 'active' : ''; ?>">
                <a href="index.php?page=images">Images</a>
            </div>
        </div>
    </nav>
    <nav id="Settings">
        <span>Settings</span>
        <div class="menuBordMain">
            <div class="menuBord <?php echo $page === 'account' ? 'active' : ''; ?>">
                <a href="index.php?page=account">Mon Profile</a>
            </div>            
            <div class="menuBord <?php echo $page === 'settings' ? 'active' : ''; ?>">
                <a href="index.php?page=settings">Réglages</a>
            </div>
            <div class="menuBord <?php echo $page === 'help' ? 'active' : ''; ?>">
                <a href="index.php?page=help">Aide</a>
            </div>
            <div class="menuBord">
                <a href="?logout='1'">Déconnexion</a>
            </div>
        </div>
    </nav>
</div>
