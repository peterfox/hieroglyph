<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 *
 * @package     Hieroglyph
 */

namespace Hieroglyph;

class Glyph
{
    /**
     * @var Hiero
     */
    private $hiero;
    /**
     * @var array
     */
    private $styles;

    /**
     * Glyph constructor.
     * @param Hiero $hiero
     * @param string $identifier
     */
    public function __construct(Hiero $hiero, $identifier)
    {
        $this->hiero = $hiero;
        $this->styles[] = $identifier;
    }

    /**
     * @param string $style
     */
    public function pushStyle($style)
    {
        $this->styles[] = $style;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $styles = implode(' ', $this->styles);

        return sprintf($this->hiero->getTemplate(), $styles);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return Glyph
     */
    public function __call($name, $arguments)
    {
        return $this->hiero->modify($this, $name);
    }
}