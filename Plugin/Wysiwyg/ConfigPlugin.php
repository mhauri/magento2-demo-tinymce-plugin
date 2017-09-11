<?php

namespace Demo\TinyMcePlugin\Plugin\Wysiwyg;

use Magento\Cms\Model\Wysiwyg\Config as Subject;
use Magento\Framework\DataObject;
use Demo\TinyMcePlugin\Model\Wysiwyg\TextWithBox;

class ConfigPlugin
{
    /**
     * @var TextWithBox
     */
    private $textWithBox;

    /**
     * ConfigPlugin constructor.
     * @param TextWithBox $textWithBox
     */
    public function __construct(
        TextWithBox $textWithBox
    ) {
        $this->textWithBox = $textWithBox;
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterGetConfig(Subject $subject, DataObject $config) : DataObject
    {
        $textWithBoxPluginSettings = $this->textWithBox->getPluginSettings($config);
        $config->addData($textWithBoxPluginSettings);
        return $config;
    }
}
