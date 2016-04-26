<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 *
 * @package     Hieroglyph
 */

namespace Hieroglyph\Exception;

class MissingIconException extends \Exception
{
    /**
     * @var string
     */
    private $icon;
    /**
     * @var array
     */
    private $icons;

    /**
     * MissingIconException constructor.
     * @param string $icon
     * @param array $icons
     */
    public function __construct($icon, array $icons)
    {
        sort($icons);
        $message = sprintf(
            'Could not find icon `%s` only available icons are: %s',
            $icon,
            implode(', ', $icons)
        );

        parent::__construct($message);
        $this->icon = $icon;
        $this->icons = $icons;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return array
     */
    public function getIcons()
    {
        return $this->icons;
    }
}