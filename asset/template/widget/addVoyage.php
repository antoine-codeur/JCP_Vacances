<div id="ajoutVoyage" class="block">
    <h3>Ajouter un voyage</h3>
    <button id="widgetAjoutVoyage" class="VoyageButton addVoyage">
    <span>Appuyez ici !</span>
    <svg id="sizeSVG" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path id="plusSVG" d="M9,15h2v-4h4v-2h-4v-4h-2v4h-4v2h4v4ZM10,20c-1.38,0-2.68-.26-3.9-.79-1.22-.52-2.28-1.24-3.18-2.14-.9-.9-1.61-1.96-2.14-3.18-.52-1.22-.79-2.52-.79-3.9s.26-2.68.79-3.9c.53-1.22,1.24-2.28,2.14-3.18.9-.9,1.96-1.61,3.18-2.14,1.22-.52,2.52-.79,3.9-.79s2.68.26,3.9.79c1.22.53,2.27,1.24,3.18,2.14.9.9,1.61,1.96,2.14,3.18.52,1.22.79,2.52.79,3.9s-.26,2.68-.79,3.9-1.24,2.27-2.14,3.18c-.9.9-1.96,1.61-3.18,2.14s-2.52.79-3.9.79ZM10,18c2.23,0,4.12-.77,5.67-2.33,1.55-1.55,2.33-3.44,2.33-5.67s-.77-4.12-2.33-5.68c-1.55-1.55-3.44-2.32-5.67-2.32s-4.12.78-5.68,2.32c-1.55,1.55-2.32,3.44-2.32,5.68s.78,4.12,2.32,5.67c1.55,1.55,3.44,2.33,5.68,2.33Z"/>
    </svg>
    </button>
</div>
<div id="createModal" class="modal">
    <!-- Contenu de la fenêtre modale -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <?php include 'asset/template/formulaire.php'; ?>    
        </div>
</div>
<script src="script/javascript/voyage/createVoyageModal.js"></script>
