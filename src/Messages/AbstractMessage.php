<?php


namespace ZengineChris\Mandrill\Messages;


abstract class AbstractMessage implements MessageInterface
{
    protected $attributes = [
        //'html'                      => '<p>Example HTML content</p>',
        //'text'                      => 'Example text content',
        //'subject'                   => 'example subject',
        //'from_email'                => 'message.from_email@example.com',
        //'from_name'                 => 'Example Name',
        'to'                        => [],
        //'headers'                   => ['Reply-To' => 'message.reply@example.com'],
        //'important'                 => false,
        //'track_opens'               => null,
        //'track_clicks'              => null,
        //'auto_text'                 => null,
        //'auto_html'                 => null,
        //'inline_css'                => null,
        //'url_strip_qs'              => null,
        //'preserve_recipients'       => null,
        //'view_content_link'         => null,
        //'bcc_address'               => 'message.bcc_address@example.com',
        //'tracking_domain'           => null,
        //'signing_domain'            => null,
        //'return_path_domain'        => null,
        'merge'                     => true,
        'merge_language'            => 'handlebars',
        'global_merge_vars'         => [
            // [
            //     'name'    => 'merge1',
            //     'content' => 'merge1 content',
            // ],
        ],
        'merge_vars'                => [ ],
        //'tags'                      => ['password-resets'],
        //'subaccount'                => 'customer-123',
        //'google_analytics_domains'  => ['example.com'],
        //'google_analytics_campaign' => 'message.from_email@example.com',
        //'metadata'                  => ['website' => 'www.example.com'],
        //'recipient_metadata'        => [
        //    [
        //        'rcpt'   => 'recipient.email@example.com',
        //        'values' => ['user_id' => 123456],
        //    ],
        //],
        //'attachments'               => [
        //    [
        //       'type'    => 'text/plain',
        //        'name'    => 'myfile.txt',
        //        'content' => 'ZXhhbXBsZSBmaWxl',
        //    ],
        //],
        //'images'                    => [
        //    [
        //        'type'    => 'image/png',
        //        'name'    => 'IMAGECID',
        //        'content' => 'ZXhhbXBsZSBmaWxl',
        //    ],
        //],
    ];

    public function from($email, $name)
    {
        $this->attributes['from_email'] = $email;
        $this->attributes['from_name'] = $name;
        return $this;
    }

    public function subject($subject)
    {
        $this->attributes['subject'] = $subject;
    }

    public function withContent($name, $content)
    {
        array_push($this->attributes['global_merge_vars'], ['name' => $name, 'content' => $content]);
    }

    /**
     * @param $email
     * @param null $name
     * @param array $content
     * @uses $content [
     * 'name'    => 'merge2',
     * 'content' => 'merge2 content',
     * ],
     * @return $this
     */
    public function to($email, $name = null, array $content)
    {


        array_push($this->attributes['to'], ['email' => $email, 'name' => $name]);

        $vars = [];
        foreach($content as $key => $val){
            array_push($vars, ['name' => $key, 'content' => $val]);
        }

        array_push($this->attributes['merge_vars'], [
            'rcpt' => $email,
            'vars' => $vars,
        ]);

        return $this;
    }

    public function toUser($user)
    {

    }


    public function toArray()
    {
        return $this->attributes;
    }

}