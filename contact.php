<?php
use Ds\Vector;

    require_once(__DIR__. '/vendor/autoload.php');
    use \Mailjet\Resources;
    define('API_PUBLIC_KEY', '935c04cc6110cabe04ccd32df4191c73');
    define('API_PRIVATE_KEY', '95056c60cbf83baa07de3c179164009c');
    $mj = new \Mailjet\Client(API_PUBLIC_KEY, API_PRIVATE_KEY,true,['version' => 'v3.1']);


    if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['objet']) &!empty($_POST['message'])){
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $objet= htmlspecialchars($_POST['objet']);
        $message = htmlspecialchars($_POST['message']);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)){

            $body = [
                'Messages' => [
                  [
                    'From' => [
                      'Email' => "amagarai6@gmail.com",
                      'Name' => "Amagaraï"
                    ],
                    'To' => [
                      [
                        'Email' => "amagarai6@gmail.com",
                        'Name' => "Amagaraï"
                      ]
                    ],
                    'Subject' => "Greetings from Mailjet.",
                    'TextPart' => "My first Mailjet email",
                  ]
                ]
              ];
              $response = $mj->post(Resources::$Email, ['body' => $body]);
              $response->success();
              echo "email envoyer avec success";

        }else{
            echo "l'email que vous avez saisie n'est pas valide";
        }
    }else{
        echo "remplisser tout le champs";
    }
?>