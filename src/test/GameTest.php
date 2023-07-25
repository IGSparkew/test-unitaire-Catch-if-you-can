<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertTrue;

    class GameTest extends TestCase {

        public static function testHadGame() {
            $game = new Game();
            assertTrue($game instanceof Game);
        }



    }

?>