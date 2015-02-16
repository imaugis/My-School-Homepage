<?php include('../includes/header.php') ?>

<?php
    if ( isset($_POST['website_name']) && isset($_POST['website_url']) && isset($_POST['website_description']) ) {
        
        if ( isset($_FILES['website_img']) && $_FILES['website_img']['error'] == 0 ) {
            
            /*
             * TO DO : Ckeck if uploaded file is an image
             */
            
            $website_img = $_FILES;
        }
        
        require_once('../classes/Websites.class.php');
        $website = new Websites();
        $website->msh_AddWebsite($_POST['website_name'], $_POST['website_url'], $_POST['website_description'], $website_img, $_POST['website_category']);
    }
?>

<div id="main">
    <h1>Ajouter un site</h1>
    <div id="content">
        <form method="POST" enctype="multipart/form-data">
            <label for="website_name">Nom du site :</label>
            <input type="text" id="website_name" name="website_name" placeholder="Ex: DuckDuckGo" maxlength="255" />
            <label for="website_url">Adresse du site :</label>
            <input type="url" id="website_url" name="website_url" placeholder="Ex: https://duckduckgo.com/" maxlength="255" />
            <label for="website_img">Visuel du site :</label>
            <input type="file" id="website_img" name="website_img" require />
            <label for="website_description">Description du site :</label>
            <textarea id="website_description" name="website_description"></textarea>
            <label>Catégorie du site :</label>
            <select id="website_category" name="website_category">
                <option value="1">Mathématiques</option>
                <option value="2">Français</option>
                <option value="3">Histoire / Géographie</option>
                <option value="4">Sciences</option>
                <option value="5">Autres matières</option>
                <option value="6">Outils</option>
                <option value="7">Actualités</option>
                <option value="8">Ressources Pédagogiques</option>
            </select>
            <!--<input type="checkbox" id="website_category_1" name="website_category_1" /> <label for="website_category_1">Mathématiques</label><br />
            <input type="checkbox" id="website_category_2" name="website_category_2" /> <label for="website_category_2">Français</label><br />
            <input type="checkbox" id="website_category_3" name="website_category_3" /> <label for="website_category_3">Histoire / Géographie</label><br />
            <input type="checkbox" id="website_category_4" name="website_category_4" /> <label for="website_category_4">Sciences</label><br />
            <input type="checkbox" id="website_category_5" name="website_category_5" /> <label for="website_category_5">Autres matières</label><br />
            <input type="checkbox" id="website_category_6" name="website_category_6" /> <label for="website_category_6">Outils</label><br />
            <input type="checkbox" id="website_category_7" name="website_category_7" /> <label for="website_category_7">Actualités</label><br />
            <input type="checkbox" id="website_category_8" name="website_category_8" /> <label for="website_category_8">Ressources Pédagogiques</label><br /><br />-->
            <input class="button button-blue" type="submit" value="Enregistrer" />
            <a class="button button-grey" href="dashboard.php">Annuler</a>
        </form>
    </div>
</div>
<?php include('../includes/footer.php') ?>