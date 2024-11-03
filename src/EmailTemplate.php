<?php


namespace EasyMiler;

class EmailTemplate
{
    private $subject;
    private $body;

    public function __construct($subject, $body)
    {
        $this->subject = $subject;
        $this->body = $body;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getBody()
    {
        return $this->body;
    }

    public static function fromFile($templatePath, $data = [])
    {
        if (!file_exists($templatePath)) {
            throw new \Exception("Template file not found: " . $templatePath);
        }

        ob_start();
        extract($data);
        include $templatePath;
        $body = ob_get_clean();

        return new self($data['subject'], $body);
    }
}
