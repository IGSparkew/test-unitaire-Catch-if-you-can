<?php
// Robbrecht Alex 

include "./src/Game.php";
include "./src/Player.php";

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertTrue;

    class GameTest extends TestCase {
    
        public static function testHadGame() {
            $game = new Game();
            assertTrue($game instanceof Game);
        }

        public static function testGameHadtowPlayers() {
            $game = new Game();
            assertNotNull($game->getFirstPlayer());
            assertNotNull($game->getSecondPlayer());
        }

        public static function testGameHadGrid() {
            $game = new Game();
            assertEquals(10, count($game->getGrid()));
            foreach($game->getGrid() as $row) {
                assertEquals(10, count($row));
            }
        }

        public static function testPlayerPlayOneByOne() {
            $game = new Game([2, 3], [5, 5]);
            $game->moveCurrentPlayer(1);
            assertEquals(4, $game->getFirstPlayer()->getY());
            $game->moveCurrentPlayer(1);
            assertEquals(6, $game->getSecondPlayer()->getY());
        }

        public static function testPlayerMoveMoreThanTowCase() {
            $game = new Game([2, 3], [5, 5]);
            $result = $game->moveCurrentPlayer(4);
            assertFalse($result);
            assertNotEquals(7, $game->getFirstPlayer()->getY());
            assertEquals(0, $game->getCurrentIndex());
        }



    }
