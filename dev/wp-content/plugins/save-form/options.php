<?php
$user_name_opt_name = "user_name";

 
if(isset($_POST["submit"])){ 
    $usernm_show = $_POST[$user_name_opt_name];
    // echo $usernm_show;
    update_option($user_name_opt_name, $usernm_show);
    
     
    echo '<div id="message" class="updated fade"><p>Options Updates</p></div>';
}
else{
    $usernm_show = get_option($user_name_opt_name);
}
?>