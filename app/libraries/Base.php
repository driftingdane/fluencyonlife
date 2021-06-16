<?php
class Base extends Controller
{
    public $site;
    public $links;
    public $socials;


    public function __construct()
    {

        $this->userModel = $this->model('User');
        $this->pageModel = $this->model('Page');
        $this->adminModel = $this->model('Admin');

        $this->site = $this->pageModel->getHomePage();
        $this->links = $this->pageModel->getLinks();
        $this->socials = $this->pageModel->getSocials();

    }


    public function standardHeader($data = null){

        if(empty($data)){
            $data = [

                'siteName' => $this->site->site_name,
                'siteDesc' => $this->site->site_desc,
                'creator' => $this->site->site_contact_name,
                'siteImg' => $this->site->site_logo,
                'siteKeywords' => $this->site->site_keywords
               ];
        }
         $this->view('inc/header', $data, true);
    }


    public function standardNav($data = null){

        $menu = $this->pageModel->getMenu();

        if(empty($data)){

            $data = [
                      'menu' => $menu,
                      'siteImg' => $this->site->site_logo,
                      'phone' => $this->site->site_contact_num,
                      'social' => $this->socials
                    ];
        }
        $this->view('inc/topNavRight', $data, true);
    }

    public function standardFooter($data = null){

        if(empty($data)){

            $data = [
                'mail' => $this->site->site_contact_mail,
                'addr' => $this->site->site_contact_add,
                'phone' => $this->site->site_contact_num,
                'links' => $this->links,
                'social' => $this->socials
            ];
        }
        $this->view('inc/footer', $data);
    }



    /////////////// ADMIN AREA ///////////////////
    public function adminHeader($data = null){

        if(empty($data)){

            $data = [
                'siteImg' => $this->site->site_logo
            ];
        }
        $this->view('admins/inc/adminHeader', $data, true);
    }

    public function adminNav($data = null){

        if(empty($data)){

            $data = [
                'siteImg' => $this->site->site_logo
            ];
        }
        $this->view('admins/inc/adminNavbar', $data, true);
    }


    public function adminFooter($data = null){

        if(empty($data)){

            $data = [
                'links' => $this->links,
                'social' => $this->socials
            ];
        }
        $this->view('admins/inc/adminFooter', $data);
    }


    public function standardIndex($data){
        $this->standardHeader($data);
        $this->standardNav();
        $this->view('p/index', $data);
        $this->standardFooter();
    }

    public function standardContact($data){

        $this->standardHeader($data);
        $this->standardNav();
        $this->view('p/contact', $data);
        $this->standardFooter();
    }

    public function standardAbout($data){
        $this->standardHeader($data);
        $this->standardNav();
        $this->view('p/about', $data);
        $this->standardFooter();
    }

}