<?php
include "./src/Game.php";
include "./src/Player.php";

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertTrue;

    class GameTest extends TestCase {
    
        public static function testHadGame() {
            $game = new Game(new Player(), new Player());
            assertTrue($game instanceof Game);
        }

        public static function testGameHadtowPlayers() {
            $game = new Game(new Player(), new Player());
            assertNotNull($game->getFirstPlayer());
            assertNotNull($game->getSecondPlayer());
        }

        public static function testGameHadGrid() {
            $game = new Game(new Player(), new Player());
            assertEquals(10, count($game->getGrid()));
            foreach($game->getGrid() as $row) {
                assertEquals(10, count($row));
            }
        }



    }

?>