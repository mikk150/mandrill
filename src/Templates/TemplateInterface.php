<?php

namespace ZengineChris\Mandrill\Templates;


interface TemplateInterface
{
    /**
     * @return String
     */
    public function getName();

    /**
     * @return Array
     */
    public function getContent();

    public function setContent($name, $content);

}