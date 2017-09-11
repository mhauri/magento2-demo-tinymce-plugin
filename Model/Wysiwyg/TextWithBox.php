<?php

namespace Demo\TinyMcePlugin\Model\Wysiwyg;

use Magento\Framework\DataObject;

class TextWithBox
{
    const PLUGIN_NAME = 'textwithbox';

    /**
     * @var \Magento\Framework\View\Asset\Repository
     */
    protected $assetRepo;

    /**
     * TextWithBox constructor.
     * @param \Magento\Framework\View\Asset\Repository $assetRepo
     */
    public function __construct(
        \Magento\Framework\View\Asset\Repository $assetRepo
    ) {
        $this->assetRepo = $assetRepo;
    }

    public function getPluginSettings(DataObject $config) : array
    {
        $plugins = $config->getData('plugins');
        $plugins[] = [
                'name' => self::PLUGIN_NAME,
                'src' => $this->getPluginJsSrc(),
                'options' => [
                    'title' => __('Text with Box'),
                    'class' => 'add-text-with-box plugin',
                    'css' => $this->getPluginCssSrc()
                ],
            ];

        return ['plugins' => $plugins];
    }

    private function getPluginJsSrc() : string
    {
        return $this->assetRepo->getUrl(
            sprintf('Demo_TinyMcePlugin::js/tiny_mce/plugins/%s/editor_plugin.js', self::PLUGIN_NAME)
        );
    }

    private function getPluginCssSrc() : string
    {
        return $this->assetRepo->getUrl(
            sprintf('Demo_TinyMcePlugin::css/tiny_mce/plugins/%s/content.css', self::PLUGIN_NAME)
        );
    }
}
