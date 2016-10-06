<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 01-10-2016 00:09
 */
declare(strict_types = 1);

namespace Website\Core\TemplateEngine\Rule\Delimiter;


use JorisRietveld\Website\Core\TemplateEngine\Rule\DelimiterRule;

class VariableDelimiter extends DelimiterRule
{
    public function __construct( string $startDelimiter = '', string $endDelimiter )
    {
        parent::__construct( $startDelimiter, $endDelimiter );
    }
}