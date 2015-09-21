<?php


namespace ZengineChris\Mandrill\Templates;


abstract class AbstractTemplate implements TemplateInterface
{
    protected $name = '';

    protected $content = [];

    /**
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Array
     */
    public function getContent()
    {
        return $this->content;
    }

    public function setContent($name, $content)
    {
        array_push($this->content, ['name' => $name, 'content' => $content]);
    }
}