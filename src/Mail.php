<?php

namespace ZengineChris\Mandrill;


use Mandrill;
use ZengineChris\Mandrill\Messages\MessageInterface;
use ZengineChris\Mandrill\Templates\TemplateInterface;

class Mail
{

    /**
     * @var Mandrill
     */
    protected $mandrillApi;

    /**
     * @var TemplateInterface
     */
    protected $template;

    /**
     * @var MessageInterface
     */
    protected $message;

    /**
     * Mail constructor.
     * @param $mandrillApi
     */
    public function __construct(Mandrill $mandrillApi)
    {
        $this->mandrillApi = $mandrillApi;
    }


    /**
     * @param TemplateInterface $template
     * @return $this
     */
    public function sendTemplate(TemplateInterface $template)
    {
        $this->template = $template;

        return $this;

    }

    /**
     * @param MessageInterface $message
     * @return $this
     */
    public function withMessage(MessageInterface $message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return array
     */
    public function now()
    {
        return $this->mandrillApi->messages->sendTemplate($this->template->getName(), $this->template->getContent(), $this->message->toArray());
    }

    /**
     * @param  $date
     * @return array
     */
    public function at($date)
    {
        return $this->mandrillApi->messages->sendTemplate($this->template->getName(), $this->template->getContent(), $this->message->toArray(), false, '', $date);
    }

}