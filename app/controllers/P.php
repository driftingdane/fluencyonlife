<?php

class P extends Base

{
    public function __construct()
    {
        // Inherents from base constructor
        parent::__construct();
    }

    public function index() {

        $limitTopics = $this->pageModel->getLimitTopics();

        $data = [

            'title' => 'Lose shyness. Gain confidence in English',
            'siteName' => $this->site->site_name,
            'siteDesc' => $this->site->site_desc,
            'siteWelcome' => $this->site->site_welcome,
            'siteImg' => $this->site->site_logo,
            'ogImg' => 'share-home.png',
            'limitTopics' => $limitTopics
        ];
        $this->standardIndex($data);

    }

    public function webVersion() {

        $content = $this->pageModel->getNews();

        $data = [

            'title' => $content->ns_title,
            'siteName' => $this->site->site_name,
            'siteDesc' => $this->site->site_desc,
            'siteImg' => $this->site->site_logo,
            'ogImg' => 'logo-fluencyonlife.com-share.png',
            'content' => $content->ns_msg
        ];

        $this->standardHeader($data);
        $this->view('p/webVersion', $data);

    }



    public function topics(){

        $allTopics = $this->pageModel->getAllTopics();
        $countQuestions = $this->pageModel->countQuestions();
        $desc = "A good question will always branch out and open up into something else.
                There is no correct - false or wrong - right answer.
                Gain confidence to express yourself using our conversation game of life and feel what happens. Remove shyness.";
        $data =
            [
                'title' => 'World topics',
                'siteName' => $this->site->site_name,
                'siteDesc' => $desc,
                'siteImg' => $this->site->site_logo,
                'ogImg' => 'share-top.png',
                'countQuestions' => $countQuestions,
                'allTopics' => $allTopics
            ];

        $this->standardHeader($data);
        $this->standardNav();
        $this->view('p/topics', $data);
        $this->standardFooter();
    }



    public function randoms(){

        $random = $this->pageModel->getAllRandomQuestion();
        $topic_icons = $this->pageModel->getAllTopics();

        $new_title = str_replace( ['-'], ' ', basename($_POST['link']));
        $uriSegments = explode("/", parse_url($_GET['url'], PHP_URL_PATH));
        $cat_title = str_replace( ['-'], ' ', $uriSegments[3]);
        $cat_title = str_replace('And', 'and', ucwords($cat_title));

        $data =
            [   'title' => 'Answer and ask' . ' | ' . $cat_title . ' | ' . $new_title,
                'siteName' => $this->site->site_name,
                'cat_title' => $cat_title,
                'siteDesc' => ucfirst($new_title),
                'siteImg' => $this->site->site_logo,
                'ogImg' =>  'all-categories.png',
                'random' => $random,
                'topic_icons' => $topic_icons,
                'urlPart' => $uriSegments
            ];

        $this->standardHeader($data);
        $this->standardNav();
        $this->view('p/randoms', $data);
        $this->standardFooter();
    }




    public function questions($id=''){

            $random = $this->pageModel->getRandomQuestion($id);

        //# Check if your variable is an integer
            if ( filter_var($id, FILTER_VALIDATE_INT) === false ) {
                redirect('p/topics');
            }

        $new_title = str_replace( ['-'], ' ', basename($_POST['link']));
        $uriSegments = explode("/", parse_url($_GET['url'], PHP_URL_PATH));
        $cat_title = str_replace( ['-'], ' ', $uriSegments[3]);
        $cat_title = str_replace('And', 'and', ucwords($cat_title));

        $data =
            [   'title' => 'Answer and ask' . ' | ' . $cat_title . ' | ' . $new_title,
                'siteName' => $this->site->site_name,
                'cat_title' => $cat_title,
                'siteDesc' => ucfirst($new_title),
                'siteImg' => $this->site->site_logo,
                'ogImg' =>  $random->cat_img,
                'random' => $random,
                'urlPart' => $uriSegments
            ];

        $this->standardHeader($data);
        $this->standardNav();
        $this->view('p/questions', $data);
        $this->standardFooter();
    }



    public function about(){

        $data = [
            'title' => 'About Us',
            'siteName' => $this->site->site_name,
            'siteDesc' => $this->site->site_about,
            'siteImg' => $this->site->site_logo,
            'ogImg' => 'share-about.png',
            'siteAbout' => $this->site->site_about
        ];

        $this->standardAbout($data);
    }



    public function contact(){

        $data = [

            'title' => 'Contact',
            'siteImg' => $this->site->site_logo,
            'ogImg' => 'share-contact.png',
            'siteName' => $this->site->site_name,
            'siteDesc' => $this->site->site_desc,
            'creator' => $this->site->site_contact_name,
            'mail' => $this->site->site_contact_mail,
            'addr' => $this->site->site_contact_add,
            'phone' => $this->site->site_contact_num,
            'info' => $this->site->site_contact_info,
            'about' => $this->site->site_about,
            'social' => $this->socials
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Create the post values from form
            $data = [

                'ctName' => trim($_POST['ctName']),
                'ctEmail' => trim($_POST['ctEmail']),
                'ctMsg' => trim($_POST['ctMsg']),
                'ctName_err' => '',
                'ctEmail_err' => '',
                'ctMsg_err' => '',

                'title' => 'Contact',
                'siteImg' => $this->site->site_logo,
                'ogImg' => 'share-contact.png',
                'siteName' => $this->site->site_name,
                'siteDesc' => $this->site->site_desc,
                'creator' => $this->site->site_contact_name,
                'mail' => $this->site->site_contact_mail,
                'addr' => $this->site->site_contact_add,
                'phone' => $this->site->site_contact_num,
                'info' => $this->site->site_contact_info,
                'about' => $this->site->site_about,
                'social' => $this->socials

            ];

            $clean =
                array(
                    'ctName' => FILTER_SANITIZE_STRING,
                    'ctMsg' => FILTER_SANITIZE_STRING,
                    'ctEmail' => FILTER_SANITIZE_EMAIL,
                );

            $_POST = filter_input_array(INPUT_POST, $clean);


            if (preg_match('/http|www/i', $data['ctMsg'])) {
                $data['ctMsg_err'] = 'Links are not allowed';
            }
            if (empty($data['ctName'])) {
                $data['ctName_err'] = 'Please enter name';
            }
            if (empty($data['ctEmail'])) {
                $data['ctEmail_err'] = 'Please enter email';
            }
            if (!filter_var($data['ctEmail'], FILTER_VALIDATE_EMAIL)) {
                $data['ctEmail_err'] = 'Email does not validate';
            }
            if (empty($data['ctMsg'])) {
                $data['ctMsg_err'] = 'Please say what is on your mind';
            }

            if (empty($data['ctName_err']) and empty($data['ctEmail_err']) and empty($data['ctMsg_err'])) {
                // Validate form
                $this->pageModel->contact_mail($data);

                flash('contact_message', 'Success! your mail was sent. Thanks.');
                redirect('p/contact');
                exit();
                // Send mail
            } else {

                // Show errors
                $this->standardHeader();
                $this->standardNav();
                flash_error('contact_error', 'Please correct the error(s)');
                $this->view('p/contact', $data);
                $this->standardFooter();
            }

        } else {
            // Load our view
            $this->standardContact($data);
            }
        }




    public function subscribe() {

        $data =
            [
                'title' => 'Subscribe to our newsletter',
                'siteDesc' => 'Stay up to date on our English excursions, events, in and around Sao Paulo',
                'siteImg' => $this->site->site_logo,
                'ogImg' => 'banner6.jpg',
                'siteName' => $this->site->site_name,
            ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Send a token for validating user later by email
            $hash = bin2hex(random_bytes(32));
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =
                [
                    'title' => 'Subscribe to our newsletter',
                    'siteDesc' => 'Stay up to date on our English excursions, events, in and around Sao Paulo',
                    'ownerEmail' => $this->site->site_contact_mail,
                    'siteImg' => $this->site->site_logo,
                    'ogImg' => 'logo-fluencyonlife.com-share.png',
                    'email' => trim($_POST['subEmail']),
                    'hash' => $hash,
                    'subEmail_err' => ''
                ];

            if(empty($data['email'])) {
                $data['subEmail_err'] = "Please add a valid email";
            }

            if(empty($data['subEmail_err'])) {

                if($this->adminModel->saveEmail($data)) {
                    flash('success', 'Success! Thanks for subscribing');

                    $this->subscribe_greeting($data);

                    redirect('p/subscribe');
                    exit();

                } else {
                    echo "Something went wrong.";
                }

            } else {

                // Show errors
                $this->standardHeader($data);
                $this->view('p/subscribe', $data);

            }
        }
        // Show default view
        $this->standardHeader($data);
        $this->view('inc/emailSignup');
    }



    public function subscribe_greeting($data)
    {

        $title = "Thanks for subscribing.";
        $content = "We will happily send you some great news about English real life immersions,
                            as soon as something is up. Please help us make sure you receive by adding hello@FluencyOnLife.com to your
                            safe sender list. Thanks.";

        // Create the Transport
        $transport = (new Swift_SmtpTransport('', 587))
            ->setUsername('')
            ->setPassword('');
        //$transport = (new Swift_SmtpTransport('localhost', 25));
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);
        // Create a message

        $message = (new Swift_Message($title))->setFrom(array($data['ownerEmail']))->setTo(array($data['email']))->setBody('
                    <html>
                     <body><table width="600">
                     <tr><td>
                     </td></tr>
                      <h2>' . $title . '</h2>
                       <tr><td style="font-size: 14px;">' . $content . '</td></tr>
                     </table></body>
                    </html>', "text/html");
        // Add alternative parts with addPart()
        $message->addPart($title, $content, 'text/plain');
        $headers = $message->getHeaders();
        $headers->addTextHeader('List-Unsubscribe', "https://fluencyonlife.com/unsubscribe");
        $mailer->send($message);


    }



    public function unsubscribe()
    {
        $data =
            [
                'title' => 'Unsubscribe',
                'siteName' => $this->site->site_name,
                'siteImg' => $this->site->site_logo,
                'ogImg' => 'logo-fluencyonlife.com-share.png',
            ];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data =
                [
                    'title' => 'Unsubscribe',
                    'siteImg' => $this->site->site_logo,
                    'ogImg' => 'logo-fluencyonlife.com-share.png',
                    'email' => $_POST['unEmail'],
                    'confirm_email' => $_POST['confirm_email'],
                    'unEmail_err' => '',
                    'confirm_email_err' => ''

                ];

            if(empty($data['email'])){
                $data['unEmail_err'] = "Please add a valid email";
            }
            if(empty($data['confirm_email'])){
                $data['confirm_email_err'] = "Please confirm email";
            } else {
                if ($data['email'] != $data['confirm_email']) {
                    $data['confirm_email_err'] = 'Email do not match';
                }
            }

            $san_email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
            if (filter_var($san_email, FILTER_VALIDATE_EMAIL)) {
                /// if VALID DO NOTHING
            } else {
                $data['unEmail_err'] =  "This email address is considered invalid";
            }

            if(empty($data['unEmail_err']) and empty($data['confirm_email_err'])){

                if ($this->pageModel->unsEmail($san_email)) {
                    flash('resume_message', 'You have been unsubscribed');
                    redirect('p/unsubscribe');
                    exit();
                } else {
                    exit('Something went wrong');
                }
            } else {

                // Show errors
                $this->standardHeader($data);
                $this->view('p/unsubscribe', $data);
            }
        }
        // Show default view
        $this->standardHeader($data);
        $this->view('p/unsubscribe', $data);
    }



    public function error(): string {

        return 'Page not found';
    }


}
