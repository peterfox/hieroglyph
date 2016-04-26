<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 *
 * @package     Hieroglyph
 */

namespace Hieroglyph\Exception;

class MissingModifierException extends \Exception
{
    /**
     * @var string
     */
    private $modifier;
    /**
     * @var array
     */
    private $modifiers;

    /**
     * MissingModifierException constructor.
     * @param string $modifier
     * @param array $modifiers
     */
    public function __construct($modifier, array $modifiers)
    {
        sort($modifiers);
        $message = sprintf(
            'Could not find modifier `%s` only available modifiers are: %s',
            $modifier,
            implode(', ', $modifiers)
        );
        parent::__construct($message);
        $this->modifier = $modifier;
        $this->modifiers = $modifiers;
    }

    /**
     * @return string
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * @return array
     */
    public function getModifiers()
    {
        return $this->modifiers;
    }
}