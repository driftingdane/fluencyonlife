<?php

class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //////////////// INSERT FUNCTIONS //////////////////////////////////////////////

    public function saveNews($data) {
        $this->db->query('INSERT INTO news (ns_title, ns_msg) VALUES (:nTitle, :nDesc)');

        $this->db->bind(':nTitle', $data['nTitle']);
        $this->db->bind(':nDesc', $data['nDesc']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function saveTopic($data) {
        $this->db->query('INSERT INTO pd_topics (cat_title, cat_desc, cat_icon, cat_color) VALUES (:catTitle, :catDesc, :catIcon, :catColor)');

        $this->db->bind(':catTitle', $data['catTitle']);
        $this->db->bind(':catDesc', $data['catDesc']);
        $this->db->bind(':catIcon', $data['catIcon']);
        $this->db->bind(':catColor', $data['catColor']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function saveQuestion($data) {
        $this->db->query('INSERT INTO pd_questions (qs_question, qs_answer, fk_topic) VALUES (:qsTitle, :qsAnswer, :topicId)');

        $this->db->bind(':qsTitle', $data['qsTitle']);
        $this->db->bind(':qsAnswer', $data['qsAnswer']);
        $this->db->bind(':topicId', $data['topicId']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function saveEmail($data) {
        $this->db->query('INSERT INTO email_list (email, em_hash) VALUES (:email, :hash)');

        $this->db->bind(':email', $data['email']);
        $this->db->bind(':hash', $data['hash']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    //////////////// UPDATE  FUNCTIONS //////////////////////////////////////////////

    public function updateTopic($data){

        $this->db->query('UPDATE pd_topics SET cat_title = :catTitle, cat_desc = :catDesc, cat_icon = :catIcon, cat_color = :catColor
                          WHERE cat_id = :catId');
        // Bind values
        $this->db->bind(':catId', $data['catId']);
        $this->db->bind(':catTitle', $data['catTitle']);
        $this->db->bind(':catDesc', $data['catDesc']);
        $this->db->bind(':catIcon', $data['catIcon']);
        $this->db->bind(':catColor', $data['catColor']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function updateNews($data){

        $this->db->query('UPDATE news SET ns_title = :nsTitle, ns_msg = :nsMsg WHERE ns_id = :nsId');
        // Bind values
        $this->db->bind(':nsId', $data['nsId']);
        $this->db->bind(':nsTitle', $data['nsTitle']);
        $this->db->bind(':nsMsg', $data['nsMsg']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function updateSocials($data){

        $this->db->query('UPDATE pd_socials SET facebook_so = :scFacebook, twitter_so = :scTwitter, linkedin_so = :scLinkedin,
                               google_so = :scGoogle, youtube_so = :scYoutube, instagram_so = :scInstagram, quora_so = :scQuora WHERE so_id = :scId');
        // Bind values
        $this->db->bind(':scId', $data['scId']);
        $this->db->bind(':scFacebook', $data['scFacebook']);
        $this->db->bind(':scTwitter', $data['scTwitter']);
        $this->db->bind(':scLinkedin', $data['scLinkedin']);
        $this->db->bind(':scGoogle', $data['scGoogle']);
        $this->db->bind(':scYoutube', $data['scYoutube']);
        $this->db->bind(':scInstagram', $data['scInstagram']);
        $this->db->bind(':scQuora', $data['scQuora']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


    public function updateSite($data, $new_name) {

        $this->db->query('UPDATE pd_site SET site_name = :site_name, site_cnpj = :site_cnpj, site_welcome = :site_welcome,
                                                 site_desc = :site_desc, site_about = :site_about, site_keywords = :site_keywords, site_logo = :site_logo,
                                                 site_contact_name = :site_contact_name, site_contact_mail = :site_contact_mail, site_contact_add 
                                                 = :site_contact_add, site_contact_num = :site_contact_num, site_contact_info = :site_contact_info
                                                 WHERE site_id = :site_id');

        $this->db->bind(':site_id', $data['site_id']);
        $this->db->bind(':site_name', $data['site_name']);
        $this->db->bind(':site_cnpj', $data['site_cnpj']);
        $this->db->bind(':site_welcome', $data['site_welcome']);
        $this->db->bind(':site_about', $data['site_about']);
        $this->db->bind(':site_desc', $data['site_desc']);
        $this->db->bind(':site_keywords', $data['site_keywords']);
        $this->db->bind(':site_logo', $new_name);
        $this->db->bind(':site_contact_name', $data['site_contact_name']);
        $this->db->bind(':site_contact_mail', $data['site_contact_mail']);
        $this->db->bind(':site_contact_add', $data['site_contact_add']);
        $this->db->bind(':site_contact_num', $data['site_contact_num']);
        $this->db->bind(':site_contact_info', $data['site_contact_info']);

        if($this->db->execute()) {
           return true;
        } else {
          return false;
        }

 }

    //////////////// GET FUNCTIONS //////////////////////////////////////////////
    public function getAllQuestions() {
        $this->db->query('SELECT * FROM pd_questions LEFT JOIN pd_topics ON cat_id = fk_topic WHERE fk_topic = cat_id ORDER BY qs_id DESC');
        $result = $this->db->resultSet();
        return $result;
    }

    public function getCities() {
        $this->db->query('SELECT * FROM cidades WHERE cidade_id = 4850');
        $row = $this->db->single();
        return $row;
    }

    public function getTopicById($id){
        $this->db->query('SELECT * FROM pd_topics WHERE cat_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getNewsById($id){
        $this->db->query('SELECT * FROM news WHERE ns_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getAllNews(){
        $this->db->query('SELECT * FROM news');
        $result = $this->db->resultSet();
        return $result;
    }

    public function getSocials(){
        $this->db->query('SELECT * FROM pd_socials');
        $row = $this->db->single();
        return $row;
    }

    public function getAllEmails(){
        $this->db->query('SELECT * FROM email_list');
        $result = $this->db->resultSet();
        return $result;
    }

    public function countEmails(){
        $this->db->query('SELECT COUNT(*) AS em 
                               FROM email_list WHERE em_created >= DATE(NOW()) + INTERVAL -7 DAY');
        $results = $this->db->resultSet();
        return $results;

    }

    public function countTopics(){
        $this->db->query('SELECT COUNT(*) AS tp 
                               FROM pd_topics WHERE cat_created >= DATE(NOW()) + INTERVAL -7 DAY');
        $results = $this->db->resultSet();
        return $results;

    }

    public function countQuestions(){
        $this->db->query('SELECT COUNT(*) AS qs 
                               FROM pd_questions WHERE qs_created >= DATE(NOW()) + INTERVAL -7 DAY');
        $results = $this->db->resultSet();
        return $results;

    }

    //////////////// DELETE FUNCTIONS //////////////////////////////////////////////


    public function delEmail($id) {

        $this->db->query('DELETE FROM email_list WHERE em_id = :id');
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function delNews($id) {

        $this->db->query('DELETE FROM news WHERE ns_id = :id');
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delTopic($id) {

        $this->db->query('DELETE FROM pd_topics WHERE cat_id = :id');
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }




}