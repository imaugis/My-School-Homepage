<?php include('../includes/header.php') ?>

<?php
    if ( isset($_GET['id']) && $_GET['id'] != "" && is_numeric($_GET['id']) ) {
        require_once('../classes/Websites.class.php');
        $website = new Websites();
        $website->msh_DelWebsite($_GET['id']);
    }
?>

<div id="main">
    <h1>Liste des sites</h1>
    <div id="actions">
        <form method="POST">
            <select id="website_category" name="website_category">
                <?php
                    if ( isset($_POST['website_category']) ) {
                        require_once('../classes/Websites.class.php');
                        $website = new Websites();
                        $website_cat_name = $website->msh_GetWebsiteCategoryName($_POST['website_category']);
                        echo "<option value='" . $_POST['website_category'] . "'>" . $website_cat_name . "</option>";
                    }
                ?>
                <option value="all">Filtrer par catégorie</option>
                <option value="1">Mathématiques</option>
                <option value="2">Français</option>
                <option value="3">Histoire / Géographie</option>
                <option value="4">Sciences</option>
                <option value="5">Autres matières</option>
                <option value="6">Outils</option>
                <option value="7">Actualités</option>
                <option value="8">Ressources Pédagogiques</option>
            </select>
            <input class="button button-grey" type="submit" value="Ok" />
        </form>
        <a class="button button-blue add" href="add_website.php">Ajouter un site</a>
    </div>
    <div id="websites">
        <?php
            require_once('../classes/Websites.class.php');
            $website = new Websites();
            if ( isset($_POST['website_category']) ) {
                $website_list = $website->msh_GetWebsitesByCategory($_POST['website_category']);
            } else {
                $website_list = $website->msh_GetWebsites();
            }
            
            if ( is_array($website_list) ) {
                foreach ($website_list as $key => $values) {
            
        ?>
        <div class="websites_item">
            <img src="../<?php echo $values['website_img']; ?>" />
            <h1><?php echo stripslashes($values['website_name']); ?></h1>
            <p>
                <?php echo stripslashes($values['website_description']); ?>
            </p>
            <a class="website_edit" title="Éditer ce site" href="edit_website.php?id=<?php echo $values['website_id']; ?>"></a>
            <a class="website_delete" title="Supprimer ce site" href="dashboard.php?id=<?php echo $values['website_id']; ?>"></a>
        </div>
        <?php
                }
            } else {
                echo $website_list;
            }
        ?>
    </div>
</div>
<?php include('../includes/footer.php') ?>