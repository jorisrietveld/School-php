<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 17-09-2016 19:19
 */
declare(strict_types = 1);

/**
 * Class MakeLoop for understanding how generate HD 4K graphics.
 *
 * I always use the shorthand if else. Instead of writing this:
 *
 * if( 8 + 1 == 10 ){
 *      echo "Microsoft < retarded";
 * }else{
 *      echo "Linux++"
 * }
 *
 * I write this that does exactly the same:
 *
 * echo ( 8 + 1 == 10 ) ? "Microsoft < retarded" : "Linux++";
 *
 */
class MakeLoop
{
    protected $firstChar = '*&nbsp;';
    protected $secondChar = '&nbsp;&nbsp;';

    public function makeStairsIterator( int $width, int $stepSize, string $firstChar = '', string $secondChar = '') : Iterator
    {
        $this->setFirstAndLastCharIfDefined( $firstChar, $secondChar );

        if( $stepSize > $width )
        {
            throw new LogicException( "Ow yea your step size is bigger than you with of the stairs." );
        }

        for( $outerCounter = 1; $outerCounter < $width; $outerCounter++ )
        {
            // Temporary variable to save the row of the inner for loop so we can echo it twice;
            $stairRow = '';

            for( $innerCounter = 1; $innerCounter < $width*2; $innerCounter++ )
            {
                $stairRow .= $innerCounter <= ( $outerCounter*$stepSize ) ? $this->firstChar : $this->secondChar;
            }

            // Echo the rows of the stair under each other the amount of $stepSize times, so 2 rows if the step size is 2.
            yield str_repeat( $stairRow . '<br/>', $stepSize );
        }
        yield '<br/>';
    }

    public function makeStairs( int $width, int $stepSize, string $firstChar = '', string $secondChar = '') : string
    {
        $this->setFirstAndLastCharIfDefined( $firstChar, $secondChar );

        if( $stepSize > $width )
        {
            throw new LogicException( "Ow yea your step size is bigger than you with of the stairs." );
        }

        /**
         * Start a new output buffer, so instead of echo'ing everything directly to the screen save the result
         * and return and it at the bottom of the function with ob_get_clean();
         */
        ob_start();

        for( $outerCounter = 1; $outerCounter < $width; $outerCounter++ )
        {
            // Temporary variable to save the row of the inner for loop so we can echo it twice;
            $stairRow = '';

            for( $innerCounter = 1; $innerCounter < $width*2; $innerCounter++ )
            {
                $stairRow .= $innerCounter <= ( $outerCounter*$stepSize ) ? $this->firstChar : $this->secondChar;
            }

            // Echo the rows of the stair under each other the amount of $stepSize times, so 2 rows if the step size is 2.
            echo str_repeat( $stairRow . '<br/>', $stepSize );
        }
        return (string)ob_get_clean();
    }

    public function makeLeftPyramidIterator( int $width, string $firstChar = '', string $secondChar = '') : Iterator
    {
        $this->setFirstAndLastCharIfDefined( $firstChar, $secondChar );

        /**
         * To make this shape it is required to have an odd number.
         */
        if( $width % 2 == 0 )
        {
            throw new LogicException( 'An odd number is required for this type of figure.' );
        }

        /**
         * Loop tho create the rows.
         * The amount of rows is the width * 2 - 1 ( You need 2 triangles that are as high as the width minus 1
         * because in the lower triangle does not need the row with all the $firstChar's
         */
        for( $outerCounter = 1; $outerCounter < $width * 2; $outerCounter++ )
        {
            if( $outerCounter <= $width )
            {
                for( $innerCounter = 1; $innerCounter <= $width; $innerCounter++ )
                {
                    yield ( $innerCounter <= $outerCounter ) ? $this->firstChar : $this->secondChar;
                }
            }
            else
            {
                switch ( 2 ):

                    /**
                     * Loop count down from the width.
                     * The formula in every iteration is :
                     * echo ( $innerCounter <= ( $outerCounter - $width ) ? '+' : '-';
                     * So if the width is set to 3, the $outerCounter will hold 4 when it has reached this else block.

                     * The 4th iteration of the outer loop, the so the $outerCounter is equal to 4:
                     * 1st iteration: 4 <= ( 4 - 3 ) false so echo an +  4 <= 2
                     * 2th iteration: 3 <= ( 4 - 3 ) false so echo an +  3 <= 2
                     * 3th iteration: 2 <= ( 4 - 3 ) false so echo an +  2 <= 2
                     * 4th iteration: 1 <= ( 4 - 3 ) true so echo an -   1 <= 2

                     * The 5th iteration of the outer loop, the so the $outerCounter is equal to 5:
                     * 1st iteration: 4 <= ( 5 - 3 ) false so echo an +  4 <= 2
                     * 2th iteration: 3 <= ( 5 - 3 ) false so echo an +  3 <= 2
                     * 3th iteration: 2 <= ( 5 - 3 ) true so echo an -   2 <= 2
                     * 4th iteration: 1 <= ( 5 - 3 ) true so echo an -   2 <= 2

                     * The 6th iteration of the outer loop, the so the $outerCounter is equal to 6:
                     * 1st iteration: 4 <= ( 6 - 3 ) false so echo an +  4 <= 3
                     * 2th iteration: 3 <= ( 6 - 3 ) true so echo an -   3 <= 3
                     * 3th iteration: 2 <= ( 6 - 3 ) true so echo an -   2 <= 3
                     * 4th iteration: 1 <= ( 6 - 3 ) true so echo an -   1 <= 3
                     */
                    case 1:
                        for( $innerCounter = $width; $innerCounter > 0; $innerCounter-- )
                        {
                            yield ( $innerCounter <= $outerCounter-$width ) ? $this->secondChar : $this->firstChar;
                        }
                        break;

                    /**
                     * Loop count down from the width.
                     * The formula in every iteration is :
                     * echo ( $outerCounter - $width < $innerCounter ) ? '+' : '-';
                     * So if the width is set to 3, the $outerCounter will hold 4 when it has reached this else block.

                     * The 4th iteration of the outer loop, the so the $outerCounter is equal to 4:
                     * 1st iteration: ( 4 - 3 ) < 4 true so echo an +   1 < 4
                     * 2th iteration: ( 4 - 3 ) < 3 true so echo an +   1 < 3
                     * 3th iteration: ( 4 - 3 ) < 2 true so echo an +   1 < 2
                     * 4th iteration: ( 4 - 3 ) < 1 false so echo an -  1 < 1

                     * The 5th iteration of the outer loop, the so the $outerCounter is equal to 5:
                     * 1st iteration: ( 5 - 3 ) < 4 true so echo an +   2 < 4
                     * 2th iteration: ( 5 - 3 ) < 3 true so echo an +   2 < 3
                     * 3th iteration: ( 5 - 3 ) < 2 false so echo an -  2 < 2
                     * 4th iteration: ( 5 - 3 ) < 1 false so echo an -  2 < 1

                     * The 6th iteration of the outer loop, the so the $outerCounter is equal to 6:
                     * 1st iteration: ( 6 - 3 ) < 4 true so echo an +   3 < 4
                     * 2th iteration: ( 6 - 3 ) < 3 false so echo an -  3 < 3
                     * 3th iteration: ( 6 - 3 ) < 2 false so echo an -  3 < 2
                     * 4th iteration: ( 6 - 3 ) < 1 false so echo an -  3 < 1
                     */
                    case 2:
                        for( $innerCounter = $width; $innerCounter > 0; $innerCounter-- )
                        {
                            yield ( $outerCounter - $width < $innerCounter ) ? $this->firstChar : $this->secondChar;
                        }
                        break;

                    case 3:
                        for( $innerCounter = 0; $innerCounter < $width; $innerCounter++ )
                        {
                            yield ( $width - $innerCounter >= $outerCounter-($width-1) ) ? $this->firstChar : $this->secondChar;
                        }
                        break;

                    case 4:
                        for( $innerCounter = 0; $innerCounter < $width; $innerCounter++ )
                        {
                            yield ( $width - $innerCounter <= $outerCounter-$width ) ? $this->secondChar : $this->firstChar;
                        }
                        break;

                endswitch;
            }
            yield '<br/>';
        }
    }

    public function makeLeftPyramid( int $width, string $firstChar = '', string $secondChar = '') : string
    {
        $this->setFirstAndLastCharIfDefined( $firstChar, $secondChar );

        /**
         * To make this shape it is required to have an odd number.
         */
        if( $width % 2 == 0 )
        {
            throw new LogicException( 'An odd number is required for this type of figure.' );
        }

        /**
         * Start a new output buffer, so instead of echo'ing everything directly to the screen save the result
         * and return and it at the bottom of the function with ob_get_clean();
         */
        ob_start();

        for( $outerCounter = 1; $outerCounter < $width * 2; $outerCounter++ )
        {
            if( $outerCounter <= $width )
            {
                for( $innerCounter = 1; $innerCounter <= $width; $innerCounter++ )
                {
                    echo ( $innerCounter <= $outerCounter ) ? $this->firstChar : $this->secondChar;
                }
            }
            else
            {

                for( $innerCounter = $width; $innerCounter > 0; $innerCounter-- )
                {
                    echo ( $outerCounter - $width < $innerCounter ) ? $this->firstChar : $this->secondChar;
                }

            }
            echo '<br/>';
        }
        return (string)ob_get_clean();
    }

    public function makeLeftTopSaw( int $width, int $amountOfTeeth = 2, string $firstChar = '', string $secondChar = '') : string
    {
        $this->setFirstAndLastCharIfDefined( $firstChar, $secondChar );

        ob_start();

        for( $outerCounter = 0;  $outerCounter < $amountOfTeeth; $outerCounter++ )
        {
            for( $rowCounter = 0; $rowCounter < $width; $rowCounter++ )
            {
                for ($columnCounter = 0; $columnCounter < $width; $columnCounter++)
                {
                    echo ($width - $rowCounter > $columnCounter) ? $this->getFirstChar() : $this->getSecondChar();
                }
                
                if ($rowCounter <= $width )
                {
                    echo '<br/>';
                }
            }


        }
        return (string)ob_get_clean();
    }

    public function makeTheMatrix( int $width, int $height ) : string
    {
        ob_start();

        for( $outerCounter = 0; $outerCounter < $height; $outerCounter++ )
        {
            for( $innerCounter = 1; $innerCounter <= $width; $innerCounter++ )
            {
                echo ( $innerCounter + $outerCounter ) %10 . '&nbsp;';
            }
            echo '<br/>';
        }

        return (string)ob_get_clean();
    }

    public function makeBottomLeftTriangle( int $width, string $firstCharacter = '', string $secondCharacter = '' ) : string
    {
        $this->setFirstAndLastCharIfDefined( $firstCharacter, $secondCharacter );

        ob_start();

        for( $outerCounter = 0; $outerCounter < $width; $outerCounter+=2 )
        {
            for( $innerCounter = 0; $innerCounter < $width; $innerCounter++ )
            {
                echo ( $innerCounter < ($outerCounter - $innerCounter) ) ? $this->getFirstChar() : $this->getSecondChar();
            }
            echo '<br/>';
        }
        return (string)ob_get_clean();
    }

    public function makeStairsSimple( int $width, string $firstCharacter = '', string $secondCharacter = '' ) : string
    {
        $this->setFirstAndLastCharIfDefined( $firstCharacter, $secondCharacter );

        ob_start();

        for( $outerCounter = 0; $outerCounter < $width; $outerCounter++)
        {
            for( $innerCounter = 0; $innerCounter < $width; $innerCounter++ )
            {
                echo ( $innerCounter < ($outerCounter - $innerCounter) ) ? $this->getFirstChar() : $this->getSecondChar();
            }
            echo '<br/>';
        }
        return (string)ob_get_clean();
    }

    public function makeTopLeftTriangle( int $width, string $firstCharacter = '', string $secondCharacter = '' ) : string
    {
        $this->setFirstAndLastCharIfDefined( $firstCharacter, $secondCharacter );

        ob_start();

        for( $outerCounter = 1; $outerCounter < $width; $outerCounter++ )
        {
            for( $innerCounter = 1; $innerCounter < $width; $innerCounter++ )
            {
                echo ( $innerCounter <= ( $width - $outerCounter) ) ? $this->getFirstChar() : $this->getSecondChar();
            }
            echo '<br/>';
        }
        return (string)ob_get_clean();
    }

    /**
     * @param string $firstChar
     * @param string $secondChar
     */
    protected function setFirstAndLastCharIfDefined( string $firstChar, string $secondChar )
    {
        $this->setFirstChar( strlen( $firstChar ) ? $firstChar : $this->firstChar );
        $this->setSecondChar( strlen( $secondChar ) ? $secondChar : $this->secondChar );
    }

    /**
     * @return mixed
     */
    public function getFirstChar() : string
    {
        return $this->firstChar;
    }

    /**
     * @param mixed $firstChar
     * @return MakeLoop
     */
    public function setFirstChar( string $firstChar ) : self
    {
        $this->firstChar = $firstChar;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecondChar() : string
    {
        return $this->secondChar;
    }

    /**
     * @param mixed $lastChar
     * @return MakeLoop
     */
    public function setSecondChar( string $secondChar ) : self
    {
        $this->secondChar = $secondChar;
        return $this;
    }


}