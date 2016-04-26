<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 *
 * @package     Hieroglyph
 */

namespace Hieroglyph\Laravel;

use Hieroglyph\Hiero;
use Illuminate\Support\Facades\Facade;

class HieroglyphFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return Hiero::class; }
}