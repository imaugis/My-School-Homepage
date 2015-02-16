<?php
    /*
     * This class manage websites.
     */
    
    class Websites {
        
        /*
         * This function add a website into the database
         */
        function msh_AddWebsite($website_name, $website_url, $website_description, $website_img, $website_category) {
            $websiteName = addslashes($website_name);
            $websiteDescription = addslashes(strip_tags(nl2br($website_description)));
            
            move_uploaded_file($website_img['website_img']['tmp_name'], '../img/uploads/websites/' . basename($website_img['website_img']['name']));
            $websiteImg = "img/uploads/websites/" . $website_img['website_img']['name'];
            
            require_once('../libs/wideimage/WideImage.php');
            $imageLoad = WideImage::load("../" . $websiteImg);
            $croppedImg = $imageLoad->crop('center', 'center', 320, 200);
            $croppedImg->saveToFile("../img/uploads/websites/" . $website_img['website_img']['name']);
            
            require_once('../msh_config.php');
            mysql_connect(MSH_DB_HOST,MSH_DB_USER,MSH_DB_PASSWD);
            mysql_select_db(MSH_DB_DATABASE);
            
            $sql = "INSERT INTO msh_websites (id, website_name, website_url, website_description, website_img, website_cat) VALUES ('','" . $websiteName . "','" . $website_url . "','" . $websiteDescription . "','" . $websiteImg . "','" . $website_category . "')";
            $req = mysql_query($sql) or die(mysql_error());
            header('location:dashboard.php');
            
        }
        
        /*
         * This function edit a website
         */
        function msh_SetWebsite($website_id, $website_name, $website_url, $website_description, $website_img, $website_category) {
            $websiteName = addslashes($website_name);
            $websiteDescription = addslashes(strip_tags(nl2br($website_description)));
            
            if ( is_array($website_img) ) {
                move_uploaded_file($website_img['website_img']['tmp_name'], '../img/uploads/websites/' . basename($website_img['website_img']['name']));
                $websiteImg = "img/uploads/websites/" . $website_img['website_img']['name'];
                
                require_once('../libs/wideimage/WideImage.php');
                $imageLoad = WideImage::load("../" . $websiteImg);
                $croppedImg = $imageLoad->crop('center', 'center', 320, 200);
                $croppedImg->saveToFile("../img/uploads/websites/" . $website_img['website_img']['name']);
            } else {
                $websiteImg = $website_img;
            }
            
            require_once('../msh_config.php');
            mysql_connect(MSH_DB_HOST,MSH_DB_USER,MSH_DB_PASSWD);
            mysql_select_db(MSH_DB_DATABASE);
            
            $sql = "UPDATE msh_websites SET website_name='" . $websiteName . "', website_url='" . $website_url . "', website_description='" . $websiteDescription . "', website_img='" . $websiteImg . "', website_cat='" . $website_category . "' WHERE id='" . $website_id . "'";
            $req = mysql_query($sql) or die(mysql_error());
            header('location:dashboard.php');
        }
        
        /*
         * This function delete a website
         */
        function msh_DelWebsite($website_id) {
            require_once('../msh_config.php');
            mysql_connect(MSH_DB_HOST,MSH_DB_USER,MSH_DB_PASSWD);
            mysql_select_db(MSH_DB_DATABASE);
            
            $sql = "DELETE FROM msh_websites WHERE id=" . $website_id;
            $req = mysql_query($sql) or die(mysql_error());
            header('location:dashboard.php');
        }
        
        /*
         * This function load all categories of website
         */
        function msh_GetWebsites() {
            require_once('../msh_config.php');
            mysql_connect(MSH_DB_HOST,MSH_DB_USER,MSH_DB_PASSWD);
            mysql_select_db(MSH_DB_DATABASE);
            
            $sql = "SELECT * FROM msh_websites ORDER BY website_name ASC";
            $req = mysql_query($sql) or die(mysql_error());
            
            $websites = array();
            while ($data = mysql_fetch_assoc($req)){
                $websites[] = array(
                        'website_id' => $data['id'],
                        'website_name' => $data['website_name'],
                        'website_url' => $data['website_url'],
                        'website_img' => $data['website_img'],
                        'website_description' => $data['website_description'],
                        'website_cat' => $data['website_cat'],
                    );
            }
            return $websites;
        }
        
        /*
         * This function load all categories of website
         */
        function msh_GetWebsiteById($website_id) {
            require_once('../msh_config.php');
            mysql_connect(MSH_DB_HOST,MSH_DB_USER,MSH_DB_PASSWD);
            mysql_select_db(MSH_DB_DATABASE);
            
            $sql = "SELECT * FROM msh_websites WHERE id='" . $website_id . "'";
            $req = mysql_query($sql) or die(mysql_error());
            
            while ($data = mysql_fetch_assoc($req)){
                $websiteInfo = array(
                        'website_id' => $data['id'],
                        'website_name' => $data['website_name'],
                        'website_url' => $data['website_url'],
                        'website_img' => $data['website_img'],
                        'website_description' => $data['website_description'],
                        'website_cat' => $data['website_cat'],
                    );
            }
            return $websiteInfo;
        }
        
        /*
         * This function load websites by category
         */
        function msh_GetWebsitesByCategory($website_category) {
            require_once('../msh_config.php');
            mysql_connect(MSH_DB_HOST,MSH_DB_USER,MSH_DB_PASSWD);
            mysql_select_db(MSH_DB_DATABASE);
            
            $sql = "SELECT * FROM msh_websites WHERE website_cat=" . $website_category . " ORDER BY website_name ASC";
            $req = mysql_query($sql) or die(mysql_error());
            $result = mysql_num_rows($req);
            
            $websites = array();
            while ($data = mysql_fetch_assoc($req)){
                $websites[] = array(
                        'website_id' => $data['id'],
                        'website_name' => $data['website_name'],
                        'website_url' => $data['website_url'],
                        'website_img' => $data['website_img'],
                        'website_description' => $data['website_description'],
                        'website_cat' => $data['website_cat'],
                    );
            }
            
            if ( $result < 1 ) {
                $result_message = "<p>Il n'y a aucun site dans cette catégorie...</p>";
                return $result_message;
            } else {
                return $websites;
            }
        }
        
        /*
         * This function load websites by category
         */
        function msh_GetWebsitesByCategoryGui($website_category) {
            require_once('msh_config.php');
            mysql_connect(MSH_DB_HOST,MSH_DB_USER,MSH_DB_PASSWD);
            mysql_select_db(MSH_DB_DATABASE);
            
            $sql = "SELECT * FROM msh_websites WHERE website_cat=" . $website_category . " ORDER BY website_name ASC";
            $req = mysql_query($sql) or die(mysql_error());
            $result = mysql_num_rows($req);
            
            $websites = array();
            while ($data = mysql_fetch_assoc($req)){
                $websites[] = array(
                        'website_id' => $data['id'],
                        'website_name' => $data['website_name'],
                        'website_url' => $data['website_url'],
                        'website_img' => $data['website_img'],
                        'website_description' => $data['website_description'],
                        'website_cat' => $data['website_cat'],
                    );
            }
            
            if ( $result < 1 ) {
                $result_message = "<p>Il n'y a aucun site dans cette catégorie...</p>";
                return $result_message;
            } else {
                return $websites;
            }
        }
        
        /*
         * This function return the name of a category
         */
        function msh_GetWebsiteCategoryName($website_category) {
            $category_name = array(
                "1" => "Mathématiques",
                "2" => "Français",
                "3" => "Histoire / Géographie",
                "4" => "Sciences",
                "5" => "Autres matières",
                "6" => "Outils",
                "7" => "Actualités",
                "8" => "Ressources Pédagogiques"
            );
            $website_category_name = $category_name[$website_category];
            return $website_category_name;
        }
    }
    
?>