<?php
// Robbrecht Alex 

include "./src/Game.php";
include "./src/Player.php";
include "./src/GameService.php";

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertTrue;

    class GameTest extends TestCase {

        protected Game $hardGame;
        protected Game $easyGame;
        protected $positionFirst;
        protected $positionSecond;

        /**
         *  @before
         */
        public function init() {
            $this->positionFirst =  [2, 3];
            $this->positionSecond = [5, 5];
            $this->hardGame = new Game(new HardGame($this->positionFirst, $this->positionSecond));
            $this->easyGame = new Game(new EasyGame($this->positionFirst, $this->positionSecond));
        }
    
        public function testHadGame() {
            assertTrue($this->easyGame instanceof Game);
            assertTrue($this->hardGame instanceof Game);

        }

        public function testGameHadtowPlayers() {
            assertNotNull($this->easyGame->getFirstPlayer());
            assertNotNull($this->easyGame->getSecondPlayer());

            assertNotNull($this->hardGame->getFirstPlayer());
            assertNotNull($this->hardGame->getSecondPlayer());
        }

        public function testGameHadGrid() {
            assertEquals(10, count($this->easyGame->getGrid()));
            foreach($this->easyGame->getGrid() as $row) {
                assertEquals(10, count($row));
            }

            assertEquals(10, count($this->hardGame->getGrid()));
            foreach($this->hardGame->getGrid() as $row) {
                assertEquals(10, count($row));
            }
        }

        public function testPlayerPlayOneByOne() {
            $this->easyGame->moveCurrentPlayer(1);
            assertEquals(4, $this->easyGame->getFirstPlayer()->getY());
            $this->easyGame->moveCurrentPlayer(1);
            assertEquals(6, $this->easyGame->getSecondPlayer()->getY());

            $this->hardGame->moveCurrentPlayer(1);
            assertEquals(4, $this->hardGame->getFirstPlayer()->getY());
            $this->hardGame->moveCurrentPlayer(1);
            assertEquals(6, $this->hardGame->getSecondPlayer()->getY());
        }

        public function testPlayerMoveMoreThanTowCase() {
            $result = $this->easyGame->moveCurrentPlayer(4);
            assertFalse($result);
            assertNotEquals(7, $this->easyGame->getFirstPlayer()->getY());
            assertEquals(0, $this->easyGame->getCurrentIndex());

            $result = $this->hardGame->moveCurrentPlayer(4);
            assertFalse($result);
            assertNotEquals(7, $this->hardGame->getFirstPlayer()->getY());
            assertEquals(1, $this->hardGame->getCurrentIndex());
        }

        public function testPlayerMoveNegativeOrZeroCase() {
            
            $result = $this->easyGame->moveCurrentPlayer(0);
            assertFalse($result);
            assertEquals(0, $this->easyGame->getCurrentIndex());

            $result = $this->easyGame->moveCurrentPlayer(-1);
            assertFalse($result);
            assertEquals(0, $this->easyGame->getCurrentIndex());

            $result = $this->hardGame->moveCurrentPlayer(0);
            assertFalse($result);
            assertEquals(1, $this->hardGame->getCurrentIndex());

            $result = $this->hardGame->moveCurrentPlayer(-1);
            assertFalse($result);
            assertEquals(0, $this->hardGame->getCurrentIndex());
        }

        public function testPlayerPivotRigh() { 
            $result = $this->easyGame->pivotCurrentPlayer(Game::RIGHT);
            assertTrue($result);
            assertEquals(Player::ORIENTATION[1],$this->easyGame->getFirstPlayer()->getDirection());

            $result = $this->hardGame->pivotCurrentPlayer(Game::RIGHT);
            assertTrue($result);
            assertEquals(Player::ORIENTATION[1], $this->hardGame->getFirstPlayer()->getDirection());
        }

        public function testPlayerPivotLeft() { 
            $result = $this->easyGame->pivotCurrentPlayer(Game::LEFT);
            assertEquals(Player::ORIENTATION[3],$this->easyGame->getFirstPlayer()->getDirection());

            $result = $this->hardGame->pivotCurrentPlayer(Game::LEFT);
            assertEquals(Player::ORIENTATION[3],$this->hardGame->getFirstPlayer()->getDirection());
        }

        public function testPlayerIsOutGrid() {
            $easyGame = new Game(new EasyGame([2, 10], [0, 5]));
            $result = $easyGame->moveCurrentPlayer(1);
            assertNotEquals(11, $easyGame->getFirstPlayer()->getY());
            assertEquals(0, $easyGame->getCurrentIndex());

            $hardGame = new Game(new HardGame([2, 10], [0, 5]));
            $result = $hardGame->moveCurrentPlayer(1);
            assertNotEquals(11, $hardGame->getFirstPlayer()->getY());
            assertEquals(1, $hardGame->getCurrentIndex());
            $result = $hardGame->pivotCurrentPlayer(Game::LEFT);
            $result = $hardGame->moveCurrentPlayer(1);
            assertEquals(1, $hardGame->getCurrentIndex());
            $result = $hardGame->moveCurrentPlayer(1);
            assertNotEquals(-1, $hardGame->getSecondPlayer()->getX());
        }






    }
