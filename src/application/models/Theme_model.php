<?php
class Theme_model extends MY_Model {


 

    private $assets = array(

        "default" => array(

            "css" => array(
                [ "path"      => "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css", "media" => "screen" ],
                [ "path"      => "/public/theme/css/layout.css", "media"     => "screen"],
                [ "path" => "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css", "media" => "screen"],
            ),

            "js" => [
                "/public/theme/js/app.js",
                "https://kit.fontawesome.com/fbf7b37366.js"
            ]

        ),  // end of default assets load

    );


    public function get_assets($key){
        return isset($this->assets[$key]) ? $this->assets[$key] : null;
    } //

    // function to set active nav
    public function set_active_nav($key, $type = NULL)
    {

   
        return $this;
    } // end of function to set active nav


    // getting the left nav
    public function get_nav($type = NAV_POSITION_LEFT, $args = NULL) {

        $the_nav = $this->{"{$type}_nav"} ?? [];

        if (NULL !== $args && !empty($args)) :
            foreach ($the_nav as $k => $single) :
                $the_nav[$k]['path'] = vsprintf($single['path'], $args);
            endforeach;
        endif;

        return $the_nav;
    } //

    public function get_url($slug, $position = NAV_POSITION_LEFT) {
        $the_nav = $this->left_nav;

        switch ($position):
            case NAV_POSITION_RIGHT:
                $the_nav = $this->right_nav;
                break;
            default:
                $the_nav = $this->{"{$position}_nav"};
        endswitch;

        if (isset($the_nav[$slug]) && !empty($the_nav[$slug])) return $the_nav[$slug]['path'];

        return "";
    }



    public function get_site_info() {

        return [
            "site_title"    => META_DEFAULT_SITE_TITLE,
            "site_url"      => base_url(),
            "login_url"     => base_url("/login"),
            "logout_url"    => base_url("/login/logout")
        ];  // end of site info

    } // end of getting site info



}
