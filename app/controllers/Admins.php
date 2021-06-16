<?php
use Gumlet\ImageResize;
class Admins extends Base
{
    public function __construct()
    {
        parent::__construct();

        if (!isLoggedIn()) {
            redirect('users/login');
        }

        if (isLoggedIn() and !adminAut()) {
            flash_error('access_msg', 'You need Admin rights to access');
            redirect('users/login');
        }

    }

    public function socials()
    {
        $data =
            [
                'socials' => $this->socials
            ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data =
                [
                    'scId' => $_POST['scId'],
                    'socials' => $this->socials,
                    'scFacebook' => trim($_POST['scFacebook']),
                    'scLinkedin' => trim($_POST['scLinkedin']),
                    'scGoogle' => trim($_POST['scGoogle']),
                    'scTwitter' => trim($_POST['scTwitter']),
                    'scInstagram' => trim($_POST['scInstagram']),
                    'scQuora' => trim($_POST['scQuora']),
                    'scYoutube' => trim($_POST['scYoutube']),

                ];

            if ($this->adminModel->updateSocials($data)) {
                flash('message', 'Data updated');
                redirect('admins/socials');
                exit();
            } else {
                echo "Something went wrong";
            }

            $this->adminHeader();
            $this->adminNav();
            $this->view('admins/socials', $data);
            $this->adminFooter();

        } else {

            $this->adminHeader();
            $this->adminNav();
            $this->view('admins/socials', $data);
            $this->adminFooter();
        }
    }


    public function site()
    {

        $data =
            [
                'title' => 'Site info',
                'siteName' => $this->site->site_name,
                'siteDesc' => $this->site->site_desc,
                'siteAbout' => $this->site->site_about,
                'siteCnpj' => $this->site->site_cnpj,
                'siteWelcome' => $this->site->site_welcome,
                'siteKeywords' => $this->site->site_keywords,
                'siteLogo' => $this->site->site_logo,
                'siteContactName' => $this->site->site_contact_name,
                'siteContactMail' => $this->site->site_contact_mail,
                'siteContactAdd' => $this->site->site_contact_add,
                'siteContactNum' => $this->site->site_contact_num,
                'siteContactInfo' => $this->site->site_contact_info,
                'siteId' => $this->site->site_id,
                'siteCreated' => $this->site->site_created

            ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $cities = $this->adminModel->getcities();

            $data =
                [

                    'site_id' => $_POST['site_id'],
                    'site_name' => trim($_POST['site_name']),
                    'site_desc' => trim($_POST['site_desc']),
                    'site_about' => trim($_POST['site_about']),
                    'site_cnpj' => trim($_POST['site_cnpj']),
                    'site_welcome' => trim($_POST['site_welcome']),
                    'site_keywords' => trim($_POST['site_keywords']),
                    'site_contact_name' => trim($_POST['site_contact_name']),
                    'site_contact_mail' => trim($_POST['site_contact_mail']),
                    'site_contact_num' => trim($_POST['site_contact_num']),
                    'site_contact_add' => trim($_POST['site_contact_add']),
                    'site_contact_info' => trim($_POST['site_contact_info']),
                    'site_logo' => trim($_FILES['site_logo']['name']),
                    'noImg' => trim($_POST['noImg']),
                    'sameFile' => trim($_POST['sameFile']),

                    'cities' => $cities,

                    // Error values
                    'name_err' => '',
                    'desc_err' => '',
                    'addr_err' => '',
                    'cnpj_err' => '',
                    'number_err' => '',
                    'mail_err' => ''

                ];

            if (empty($data['name_err']) and empty($data['desc_err']) and empty($data['addr_err']) and empty($data['cnpj_err']) and empty($data['number_err']) and empty($data['mail_err'])) {
                // Check the file upload
                //pass the file name to our mime type helper and check the type
                if ($_FILES['site_logo']['error'] == 0) {
                    $type = (get_mime($_FILES['site_logo']['tmp_name']));
                    if ($type == 'image/jpeg' or $type == 'image/jpg' or $type == 'image/png') {
                        // File is excepted
                    } else {
                        $data['logo_err'] = 'Sorry! Only jpg/jpeg/png files are allowed';
                    }

                    $size = $_FILES['site_logo']['size'];
                    if ($size > 31457280) {
                        $data['tcImg_err'] = 'Sorry! Max size is 30MB. Select a smaller file';
                    }
                    // Set the upload directory
                    $directory = $_SERVER['DOCUMENT_ROOT'] . '/public/img/';
                    // If no folder create one with permissions
                    if (!file_exists($directory)) {
                        mkdir($directory, 755, true);
                    }
                    // Rename filename
                    $new_name = round(microtime(true)) . "_" . strtolower($_FILES['site_logo']['name']);
                    // Check if file exist and add write permissions
                    $path = $directory . basename($new_name);
                    if (file_exists($path)) {
                        chmod($path, 755);
                    }

                    if (move_uploaded_file($_FILES['site_logo']['tmp_name'], strtolower($path))) {
                        // File uploaded
                    } else {
                        echo 'Failed to upload your image';
                        exit();
                    }
                    // Resize the image
                    $image = new ImageResize($path);
                    $image->crop(120, 120);
                    $image->save($path);

                } elseif ($_FILES['site_logo']['size'][0] == 0 and $_FILES['site_logo']['tmp_name'][0] === '' and $data['noImg'] == 1) {

                        $new_name = null;

                } else {
                    // If no new file set the current DATABASE VALUE AS DEFAULT
                    $new_name = $data['sameFile'];
                }

                if ($this->adminModel->updateSite($data, $new_name)) {
                    flash('resume_message', 'Data updated');
                    redirect('admins/site');
                    exit();

                }
            } /// IF no errors
            else {
                echo "Could not update data";
            }

        } else {

            /// SHOW view with errors
            $this->adminHeader();
            $this->adminNav();
            $this->view('admins/site', $data);
            $this->adminFooter();

        }
        /// SHOW view
        $this->adminHeader();
        $this->adminNav();
        $this->view('admins/site', $data);
        $this->adminFooter();

    }



    public function index()
    {
        $countEmails = $this->adminModel->countEmails();
        $countTopics = $this->adminModel->countTopics();
        $countQuestions = $this->adminModel->countQuestions();

        $data = [

            'title' => 'Admins',
            'siteName' => $this->site->site_name,
            'siteDesc' => $this->site->site_desc,
            'countEmails' => $countEmails,
            'countQuestions' => $countQuestions,
            'countTopics' => $countTopics
        ];

        $this->adminHeader();
        $this->adminNav();
        $this->view('admins/index', $data);
        $this->adminFooter();

    }


    public function addEmail()
    {

        $emails = $this->adminModel->getAllEmails();

        $data =
            [
                'emails' => $emails
            ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // Send a token for validating user later by email
            $hash = bin2hex(random_bytes(32));
            $data =
                [
                    'emails' => $emails,
                    'hash' => $hash,
                    'email' => trim($_POST['email']),
                    'email_err' => ''

                ];

            if (empty($data['email'])) {
                $data['email_err'] = 'Please add a valid email';
            }

            if (empty($data['email_err'])) {

                if ($this->adminModel->saveEmail($data)) {

                    flash('resume_message', 'Email added');
                    redirect('admins/addEmail');
                    exit();

                } else {

                    echo "Unable to save data";
                }
            } else {

                // SHOW ERRORS
                $this->adminHeader();
                $this->adminNav();
                $this->view('admins/addEmail', $data);
                $this->adminFooter();

            }
        }

        /// SHOW DEFAULT VIEW
        $this->adminHeader();
        $this->adminNav();
        $this->view('admins/addEmail', $data);
        $this->adminFooter();

    }


    public function addNews()
    {

        $news = $this->adminModel->getAllNews();
        $latest = $this->pageModel->getNews();
        $allEmails = $this->adminModel->getAllEmails();
        $countEmails = $this->adminModel->countEmails();

        $data =
            [
                'news' => $news,
                'latest' => $latest,
                'emails' => $allEmails,
                'countEmails' => $countEmails

            ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =
                [
                    'nTitle' => trim($_POST['nTitle']),
                    'nDesc' => $_POST['nDesc'],
                    'news' => $news,
                    'latest' => $latest,
                    'emails' => $allEmails,
                    'countEmails' => $countEmails,
                    'nTitle_err' => '',
                    'nDesc_err' => ''

                ];

            if (empty($data['nTitle'])) {
                $data['nTitle_err'] = 'Please add a title';
            }

            if (empty($data['nDesc'])) {
                $data['nDesc_err'] = 'Please write some news';
            }

            if (empty($data['nTitle_err']) and empty($data['nDesc_err'])) {

                if ($this->adminModel->saveNews($data)) {

                    flash('resume_message', 'Newsletter created');
                    redirect('admins/addNews');
                    exit();

                } else {

                    echo "Unable to save data";
                }
            } else {

                // SHOW ERRORS
                $this->adminHeader();
                $this->adminNav();
                $this->view('admins/addNews', $data);
                $this->adminFooter();

            }
        }

        /// SHOW DEFAULT VIEW
        $this->adminHeader();
        $this->adminNav();
        $this->view('admins/addNews', $data);
        $this->adminFooter();

    }



    public function addQuestion()
    {

        $topics = $this->pageModel->getAllTopics();
        $allQuestions = $this->adminModel->getAllQuestions();
        // Load page data
        $data =
            [
                'topics' => $topics,
                'questions' => $allQuestions
            ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Because we are submitting html from our editor we disable filter input array.
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =
                [
                    'qsTitle' => trim(utf8_encode($_POST['qsTitle'])),
                    'topicId' => trim($_POST['topicId']),
                    'qsAnswer' =>  trim(urlencode(utf8_encode($_POST['qsAnswer']))),
                    'topics' => $topics,
                    'qsTitle_err' => '',
                    'topicId_err' => ''

                ];

            if (empty($data['qsTitle'])) {
                $data['qsTitle_err'] = 'Please ask a question';
            }
            if (empty($data['topicId'])) {
                $data['topicId_err'] = 'Please select category';
            }
            if (empty($data['qsTitle_err']) and empty($data['topicId_err'])) {



                if ($this->adminModel->saveQuestion($data)) {

                    flash('resume_message', 'Question added');
                    redirect('admins/addQuestion');
                    exit();

                } else {

                    echo "Unable to save data";
                }
            } else {

                // SHOW ERRORS
                $this->adminHeader();
                $this->adminNav();
                $this->view('admins/addQuestion', $data);
                $this->adminFooter();

            }
        }

        /// SHOW DEFAULT VIEW
        $this->adminHeader();
        $this->adminNav();
        $this->view('admins/addQuestion', $data);
        $this->adminFooter();

    }




    public function addTopic()
    {

        $topics = $this->pageModel->getAllTopics();
        // Load page data
        $data =
            [
                'topics' => $topics
            ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =
                [
                    'catTitle' => trim($_POST['catTitle']),
                    'catDesc' => trim($_POST['catDesc']),
                    'catIcon' => trim($_POST['catIcon']),
                    'catColor' => trim($_POST['catColor']),
                    'topics' => $topics,
                    'catTitle_err' => ''

                ];

            if (empty($data['catTitle'])) {
                $data['catTitle_err'] = 'Please add topic';
            }
            if (empty($data['catTitle_err'])) {

                if ($this->adminModel->saveTopic($data)) {

                    flash('resume_message', 'Topic added');
                    redirect('admins/addTopic');
                    exit();

                } else {

                    echo "Unable to save data";
                }
            } else {

                // SHOW ERRORS
                $this->adminHeader();
                $this->adminNav();
                $this->view('admins/addTopic', $data);
                $this->adminFooter();

            }
        }

        /// SHOW DEFAULT VIEW
        $this->adminHeader();
        $this->adminNav();
        $this->view('admins/addTopic', $data);
        $this->adminFooter();

    }




    public function editTopic($id = '')
    {

        $topics = $this->pageModel->getAllTopics();
        $oneTopic = $this->adminModel->getTopicById($id);
        // Check for ID
        if (empty($id)) {
            redirect('admins');
        }
        // Load page data
        $data =
            [
                'topics' => $topics,
                'oneTopic' => $oneTopic

            ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $returnUrl = $_POST['returnUrl'];
            // Because we are submitting html from our editor we disable filter input array.
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =
                [
                    'catId' => $id,
                    'catTitle' => trim($_POST['catTitle']),
                    'catDesc' => trim($_POST['catDesc']),
                    'catIcon' => trim($_POST['catIcon']),
                    'catColor' => trim($_POST['catColor']),
                    'topics' => $topics,
                    'oneTopic' => $oneTopic,
                    'catTitle_err' => '',
                    'catDesc_err' => ''

                ];

            if (empty($data['catTitle'])) {
                $data['catTitle_err'] = 'Please add a topic';
            }
            if (empty($data['catTitle_err'])) {

                if ($this->adminModel->updateTopic($data)) {

                    flash('resume_message', 'Topic updated');
                    redirect($returnUrl);
                    exit();

                } else {

                    echo "Unable to save data";
                }
            } else {

                // SHOW ERRORS
                $this->adminHeader();
                $this->adminNav();
                $this->view('admins/editTopic', $data);
                $this->adminFooter();

            }
        }

        /// SHOW DEFAULT VIEW
        $this->adminHeader();
        $this->adminNav();
        $this->view('admins/editTopic', $data);
        $this->adminFooter();

    }


    public function editNews($id = '')
    {

        $news = $this->adminModel->getAllNews();
        $onenews = $this->adminModel->getNewsById($id);
        // Check for ID
        if (empty($id)) {
            redirect('admins');
        }
        // Load page data
        $data =
            [
                'news' => $news,
                'onenews' => $onenews

            ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $returnUrl = $_POST['returnUrl'];

            // Because we are submitting html from our editor we disable filter input array.
            //$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =
                [
                    'nsId' => $id,
                    'nsTitle' => trim($_POST['nsTitle']),
                    'nsMsg' => trim($_POST['nsMsg']),
                    'news' => $news,
                    'onenews' => $onenews,
                    'nsTitle_err' => '',
                    'nsMsg_err' => ''

                ];

            if (empty($data['nsTitle'])) {
                $data['nsTitle_err'] = 'Please add a title';
            }

            if (empty($data['nsMsg'])) {
                $data['nsMsg_err'] = 'Please write some news';
            }

            if (empty($data['nsTitle_err']) and empty($data['nsMsg_err'])) {

                if ($this->adminModel->updateNews($data)) {

                    flash('resume_message', 'Newsletter updated');
                    redirect($returnUrl);
                    exit();

                } else {

                    echo "Unable to save data";
                }
            } else {

                // SHOW ERRORS
                $this->adminHeader();
                $this->adminNav();
                $this->view('admins/editNews', $data);
                $this->adminFooter();

            }
        }

        /// SHOW DEFAULT VIEW
        $this->adminHeader();
        $this->adminNav();
        $this->view('admins/editNews', $data);
        $this->adminFooter();

    }


//////////////// MAIL FUNCTIONS //////////////////////////////////////////////
    public function sendNewsBulk()
    {

        $news = $this->pageModel->getNews();
        $allEmails = $this->adminModel->getAllEmails();

        $data = [
            'news' => $news,
            'emails' => $allEmails
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                //'bulk_emails' => $_POST['bulk_emails'],
                'news' => $news,
                'emails' => $allEmails,
                'ownerEmail' => $this->site->site_contact_mail,
                'siteLogo' => $this->site->site_logo
            ];
            // collect all the emails for the newsletter
            $emails = array();
            foreach ($data['emails'] as $e) :

                $emails[] = $e->email;

                $sep_mails = implode(',', $emails);
                $send_to = array_map('trim', explode(',', $sep_mails));

            endforeach;

            /// SEND BULK NEWSLETTER
            $this->BulkNews($data, $send_to);

        }

        unset($_SESSION['n']);
        /// SHOW DEFAULT VIEW
        $this->adminHeader();
        $this->adminNav();
        $this->view('admins/inc/sendNewsBulk', $data);
        $this->adminFooter();
    }



    public function BulkNews($data, $send_to){

        try {
            // Create the Transport
           $transport = (new Swift_SmtpTransport('websmtp.simply.com', 587))
         ->setUsername('')
         ->setPassword('');

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            // Create a message
            $message = (new Swift_Message($data['news']->ns_title))->setFrom(array($data['ownerEmail']))->setTo(array($data['ownerEmail']))->setBody('
                         <html>
                         <body>' . $data['news']->ns_msg . '</body>
                         </html>', "text/html");
            // Add alternative parts with addPart()
            $message->addPart($data['news']->ns_msg, 'text/plain');
            $headers = $message->getHeaders();
            $headers->addTextHeader('List-Unsubscribe', "https://fluencyonlife.com/unsubscribe");

            //Send the message
            $failedRecipients = array();
            $numSent = 0;

            /// SEND_TO IS AND ARRAY WITH ALL THE EMAILS
            foreach ($send_to as $address => $name) {

                if (is_int($address)) {
                    $message->setTo($name);
                } else {
                    $message->setTo(array($address => $name));
                }

                $numSent += $mailer->send($message, $failedRecipients);
            }
            if ($mailer->send($message)) {
                $_SESSION['n'] = $numSent;
                // SHOW
                $this->adminHeader();
                $this->adminNav();
                $this->view('admins/inc/sendNewsBulk', $data);
                $this->adminFooter();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



//////////////// DELETE FUNCTIONS //////////////////////////////////////////////


    public function deleteEmail($id)
    {
        $returnUrl = $_POST['returnUrl'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->adminModel->delEmail($id)) {
                flash('resume_message', 'Email deleted');
                redirect($returnUrl);
            } else {
                exit('Something went wrong');
            }
        } else {
            redirect($returnUrl);
        }
    }


    public function deleteTopic($id)
    {
        $returnUrl = $_POST['returnUrl'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->adminModel->delTopic($id)) {
                flash('resume_message', 'News deleted');
                redirect($returnUrl);
            } else {
                exit('Something went wrong');
            }
        } else {
            redirect($returnUrl);
        }
    }


    public function deleteNews($id)
    {
        $returnUrl = $_POST['returnUrl'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->adminModel->delNews($id)) {
                flash('resume_message', 'News deleted');
                redirect($returnUrl);
            } else {
                exit('Something went wrong');
            }
        } else {
            redirect($returnUrl);
        }
    }

}

