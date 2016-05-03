<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 *
 * @package     Hieroglyph
 */

namespace Hieroglyph;

use Hieroglyph\Exception\MissingIconException;
use Hieroglyph\Exception\MissingModifierException;

class Hiero
{
    /**
     * @var string
     */
    private $template;
    /**
     * @var array
     */
    private $icons;
    /**
     * @var array
     */
    private $modifiers;
    /**
     * @var string
     */
    private $prefix;

    /**
     * Hiero constructor.
     * @param string $template
     * @param array $icons
     * @param array $modifiers
     * @param string $prefix
     */
    public function __construct($template, array $icons, array $modifiers = [], $prefix = '')
    {
        $this->template = $template;
        $this->icons = $icons;
        $this->modifiers = $modifiers;
        $this->prefix = $prefix;
    }

    /**
     * @param string $name
     * @return Glyph
     * @throws MissingIconException
     */
    public function glyph($name)
    {
        if (array_key_exists($name, $this->icons)) {
            return new Glyph($this, $this->addPrefix($this->icons[$name]));
        }

        throw new MissingIconException($name, array_keys($this->icons));
    }

    /**
     * @param bool $state
     * @param string $trueName
     * @param string $falseName
     * @return Glyph
     * @throws MissingIconException
     */
    public function glyphDecision($state, $trueName, $falseName)
    {
        if ($state) {
            return $this->glyph($trueName);
        }
        return $this->glyph($falseName);
    }

    /**
     * @param string $name
     * @param bool $includePrefix
     * @return string
     * @throws MissingIconException
     */
    public function lookup($name, $includePrefix = true)
    {
        if (array_key_exists($name, $this->icons)) {

            return $includePrefix ? $this->addPrefix($this->icons[$name]) : $this->icons[$name];
        }

        throw new MissingIconException($name, array_keys($this->icons));
    }
    
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param Glyph $glyph
     * @param string $modifier
     * @return Glyph
     * @throws MissingModifierException
     */
    public function modify(Glyph $glyph, $modifier)
    {
        if (array_key_exists($modifier, $this->modifiers)) {
            $glyph->pushStyle($this->addPrefix($this->modifiers[$modifier]));
            return $glyph;
        }

        throw new MissingModifierException($modifier, array_keys($this->modifiers));
    }

    /**
     * @param string $base
     * @return string
     */
    private function addPrefix($base)
    {
        return $this->prefix.$base;
    }
}