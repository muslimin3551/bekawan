<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ArticleModel;

class Home extends BaseController
{
    public function index(): string
    {
        $data['title'] = 'HOME';
        return view('index', $data);
    }

    public function contact_us()
    {
        $data['title'] = 'CONTACT US';
        return view('contact', $data);
    }
    public function contact_message()
    {
        // Get form data
        $name = $this->request->getVar('name');
        $userEmail = $this->request->getVar('email'); // Rename this variable to avoid conflict
        $message = $this->request->getVar('message');
        $subject = $this->request->getVar('subject');

        // app/config/Email.php

        $config = [
            'protocol' => 'smtp',
            'SMTPHost' => 'smtp.hostinger.com',
            'SMTPUser' => 'system@bekawan.my.id',
            'SMTPPass' => 'Qazwsx123!',
            'SMTPPort' => 465,
            'SMTPCrypto' => 'ssl',
            'mailType' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $content =  '<!DOCTYPE html>
        <html style="margin: 0;padding: 0;">
        
        <head style="margin: 0;padding: 0;">
            <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" style="margin: 0;padding: 0;">
            <meta content="width=device-width,initial-scale=1,maximum-scale=1" name="viewport" style="margin: 0;padding: 0;">
            <meta charset="utf-8" style="margin: 0;padding: 0;">
        </head>
        
        <body style="margin: 0;padding: 0;font-family: Poppins;font-style: normal;font-size: 18px;background-color: #f5f4f4;">
            <div class="container"
                style="margin: 0;padding: 5%;display: block;height: auto;background-color: #fff;margin-left: auto;margin-right: auto;width: auto !important;">
                <br style="margin: 0;padding: 0;">
                <div style="margin: 0;padding: 0;">
                    <header class="content" style="margin: 0 10px 0 10px;padding: 0;">
                        <h1>Bekawan.my.id</h1>
                    </header>
                </div><br style="margin: 0;padding: 0;">
                <div class="content" style="margin: 0 10px 0 10px;padding: 0;">
                    <p style="font-size: 14px;margin: 0;padding: 0;">
                        <strong style="margin: 0;padding: 0;">Contact Us</strong>
                    </p><br style="margin: 0;padding: 0;">
                    <p style="font-size: 14px;margin: 0;padding: 0;">Halo sahabat Bekawan saya ' . $name . ',
                    </p><br style="margin: 0;padding: 0;">
                    <p style="font-size: 14px;margin: 0;padding: 0;">' . $message . '
                    </p>
                </div>
            </div>
            <div class="container"
                style="margin: 0;padding: 5%;display: block;height: auto;background-color: #fff;margin-left: auto;margin-right: auto;width: auto !important;">
                <div style="margin: 0;padding: 0;">
                    <footer style="height: auto;margin: 0;padding: 0;">
                        <div class="content" style="margin: 0 10px 0 10px;padding: 0;"><br style="margin: 0;padding: 0;">
                            <p style="color: 302F2F;font-size: 12px;margin: 0;padding: 0;">Email dibuat secara otomatis, mohon
                                tidak mengirim balasan ke
                                email ini.</p><br style="margin: 0;padding: 0;"><br style="margin: 0;padding: 0;"><br
                                style="margin: 0;padding: 0;">
                            <p style="color: gray;font-size: 12px;margin: 0;padding: 0;">Jika butuh bantuan, silahkan hubungi
                                kami <a href="https://wa.me/081383363959?text=Chat%20Dengan%20Agent%20"
                                    style="text-decoration: none;margin: 0;padding: 0;">disini</a>.</p>
                            <br style="margin: 0;padding: 0;"><br style="margin: 0;padding: 0;">
                            <div style="margin: 0;padding: 0;"><a href="#" style="margin-right: 10px;margin: 0;padding: 0;"><img
                                        src="https://storage.googleapis.com/solar_calculator/assets/facebook-icon.png"
                                        alt="facebook" style="margin: 0;padding: 0;"></a><a href="#"
                                    style="margin: 10px;padding: 0;"><img
                                        src="https://storage.googleapis.com/solar_calculator/assets/instagram-icon.png"
                                        alt="instagram" style="margin: 0;padding: 0;"></a>
                            </div><br style="margin: 0;padding: 0;">
                        </div>
                    </footer>
                </div>
            </div>
        </body>
        
        </html>';

        $email = \Config\Services::email($config);

        $email->setFrom($userEmail, $name);
        $email->setTo('kawanbkone@gmail.com'); // Use the renamed variable
        $email->setSubject($subject);
        $email->setMessage($content);

        // Send email
        if ($email->send()) {
            // Email sent successfully
            return redirect('contact');
        } else {
            // Email sending failed
            echo 'Email sending failed: ' . $email->printDebugger(); // Output the error details
        }
    }


    //article
    public function article()
    {
        $data['title'] = 'ARTICLE';
        $article = new ArticleModel();
        $data['articles'] = $article->where('is_deleted', 0)->where('is_published', 1)->findAll();
        return view('article', $data);
    }
    public function article_detail($id)
    {
        $model = new ArticleModel();
        $article = $model->find($id);

        if (!$article) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Article not found');
        }

        // Update views count
        $model->where('id', $id)->set('views', $article['views'] + 1)->update();
        $data['article'] = $model->where('id', $id)->first();
        $data['title'] = 'Detail ARTICLE';
        return view('article_detail', $data);
    }
    public function likeArticle($id)
    {
        $model = new ArticleModel();
        $article = $model->find($id);

        if (!$article) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Article not found');
        }
        // Update likes count
        $model->where('id', $id)->set('likes', $article['likes'] + 1)->update();

        return redirect()->to(site_url('article/' . $id));
    }
}
