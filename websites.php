<?php
    if ( isset($_GET['cat']) && $_GET['cat'] != "" && is_numeric($_GET['cat']) ) {
        require_once('classes/Websites.class.php');
        $website = new Websites();
        $website_list = $website->msh_GetWebsitesByCategoryGui($_GET['cat']);
    }
?>

<?php include('header.php'); ?>
    <div id="actions" style="margin-top:150px; text-align: left;">
        <a class="button button-blue previous" href="index.php">Retour à l'accueil</a>
    </div>
    <div id="msh_websites">
        <?php
            foreach ($website_list as $key => $values) {
        ?>
        <a target="_blank" href="<?php echo $values['website_url']; ?>">
            <div class="msh_website_item">
                <img src="<?php echo $values['website_img']; ?>" />
            <h1><?php echo stripslashes($values['website_name']); ?></h1>
            <p>
                <?php echo stripslashes($values['website_description']); ?>
            </p>
            </div>
        </a>
        <?php
            }
        ?>
    </div>
<?php include('footer.php'); ?>