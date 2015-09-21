# Mandrill Wrapper to send Templates

Send Mandrill Templates to one or many Users in one request.

```php

require_once './../vendor/autoload.php';

use ZengineChris\Mandrill\Mail;
use ZengineChris\Mandrill\Messages\Message;
use ZengineChris\Mandrill\Templates\AbstractTemplate;

// create the mail instance
$Mail = new Mail(new Mandrill('yourMandrillKey'));

$msg = new Message();

$msg->from('noreply@zengine.org', 'Zengine');
$msg->subject('Das ist ein Test');
// add as many users as you want
$msg->to('christian@zengine.org', 'Christian', ['user_name' => 'ZengineChris']);
$msg->withContent('company', 'ZengineOrg');

class Template extends AbstractTemplate
{
    protected $name = 'welcome';
}

$temp = new Template();

$Mail->sendTemplate($temp)
    ->withMessage($msg)
    ->at(date('Y-m-d H:i:s', strtotime('+5 minutes', strtotime('2011-04-8 08:29:49'))));
    //->now();
```