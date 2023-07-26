<?php
// Robbrecht Alex 

include "./src/Game.php";
include "./src/Player.php";
include "./src/GameService.php";
include "./src/Score.php";

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
    
        public function testHadGameEasy() {
            assertTrue($this->easyGame instanceof Game);
            assertTrue($this->easyGame->getGameService() instanceof EasyGame);
        }

        public function testHadGameHard() {
            assertTrue($this->hardGame instanceof Game);
            assertTrue($this->hardGame->getGameService() instanceof HardGame);
        }

        public function testGameEasyHadtowPlayers() {
            assertNotNull($this->easyGame->getFirstPlayer());
            assertNotNull($this->easyGame->getSecondPlayer());
        }

        public function testGameHadHardtowPlayers() { 
            assertNotNull($this->hardGame->getFirstPlayer());
            assertNotNull($this->hardGame->getSecondPlayer());
        }

        public function testGameEasyHadGrid() {
            assertEquals(10, count($this->easyGame->getGrid()));
            foreach($this->easyGame->getGrid() as $row) {
                assertEquals(10, count($row));
            }
        }

        public function testGameHardHadGrid() { 
            assertEquals(10, count($this->hardGame->getGrid()));
            foreach($this->hardGame->getGrid() as $row) {
                assertEquals(10, count($row));
            }
        }

        public function testPlayerPlayOneByOneGameEasy() {
            $this->easyGame->moveCurrentPlayer(1);
            assertEquals(4, $this->easyGame->getFirstPlayer()->getY());
            $this->easyGame->moveCurrentPlayer(1);
            assertEquals(6, $this->easyGame->getSecondPlayer()->getY());
        }

        public function testPlayerPlayOneByOneGameHard() { 
            $this->hardGame->moveCurrentPlayer(1);
            assertEquals(4, $this->hardGame->getFirstPlayer()->getY());
            $this->hardGame->moveCurrentPlayer(1);
            assertEquals(6, $this->hardGame->getSecondPlayer()->getY());
        }

        public function testPlayerMoveMoreThanTowCaseGameEasy() {
            $result = $this->easyGame->moveCurrentPlayer(4);
            assertFalse($result);
            assertNotEquals(7, $this->easyGame->getFirstPlayer()->getY());
            assertEquals(0, $this->easyGame->getCurrentIndex());
        }

        public function testPlayerMoveMoreThanTowCaseGameHard() { 
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
        }

        public function testPlayerMoveNegativeOrZeroCaseGameHard() {
            $result = $this->hardGame->moveCurrentPlayer(0);
            assertFalse($result);
            assertEquals(1, $this->hardGame->getCurrentIndex());

            $result = $this->hardGame->moveCurrentPlayer(-1);
            assertFalse($result);
            assertEquals(0, $this->hardGame->getCurrentIndex());
         }

        public function testPlayerPivotRighGameEasy() { 
            $result = $this->easyGame->pivotCurrentPlayer(Game::RIGHT);
            assertTrue($result);
            assertEquals(Player::ORIENTATION[1],$this->easyGame->getFirstPlayer()->getDirection());
        }

        public function testPlayerPivotRighGameHard() { 
            $result = $this->hardGame->pivotCurrentPlayer(Game::RIGHT);
            assertTrue($result);
            assertEquals(Player::ORIENTATION[1], $this->hardGame->getFirstPlayer()->getDirection());
        }

        public function testPlayerPivotLeftGameEasy() { 
            $this->easyGame->pivotCurrentPlayer(Game::LEFT);
            assertEquals(Player::ORIENTATION[3],$this->easyGame->getFirstPlayer()->getDirection());
        }

        public function testPlayerPivotLeftGameHard() { 
            $this->hardGame->pivotCurrentPlayer(Game::LEFT);
            assertEquals(Player::ORIENTATION[3],$this->hardGame->getFirstPlayer()->getDirection());
        }

        public function testPlayerIsOutGridGameEasy() {
            $easyGame = new Game(new EasyGame([2, 10], [0, 5]));
            $easyGame->moveCurrentPlayer(1);
            assertNotEquals(11, $easyGame->getFirstPlayer()->getY());
            assertEquals(0, $easyGame->getCurrentIndex());
        }

        public function testPlayerIsOutGridGameHard() { 
            $hardGame = new Game(new HardGame([2, 10], [0, 5]));
            $hardGame->moveCurrentPlayer(1);
            assertNotEquals(11, $hardGame->getFirstPlayer()->getY());
            assertEquals(1, $hardGame->getCurrentIndex());

            $hardGame->pivotCurrentPlayer(Game::LEFT);
            $hardGame->moveCurrentPlayer(1);
            assertEquals(1, $hardGame->getCurrentIndex());
            
            $hardGame->moveCurrentPlayer(1);
            assertNotEquals(-1, $hardGame->getSecondPlayer()->getX());
        }

        public function testGameScore() {
            $game = new Game(new EasyGame([0, 1], [1, 1]));
            $game->pivotCurrentPlayer(Game::LEFT);
            $game->pivotCurrentPlayer(Game::LEFT);
            assertNotNull($game->getCurrentScore());
        }

        public function testGameScoreSeeColumn() {
            $game = new Game(new EasyGame([0, 1], [1, 1]));
            $game->pivotCurrentPlayer(Game::LEFT);
            $game->pivotCurrentPlayer(Game::LEFT);
            assertFalse($game->getCurrentScore()->firstPlayerSeeSecond());
            assertTrue($game->getCurrentScore()->secondPlayerSeeFirst());
        }

        public function testGameScoreSeeRow() {
            $game = new Game(new EasyGame([0, 4], [0, 1]));
            $game->moveCurrentPlayer(1);
            $game->moveCurrentPlayer(1);
            assertFalse($game->getCurrentScore()->firstPlayerSeeSecond());
            assertTrue($game->getCurrentScore()->secondPlayerSeeFirst());
        }

        public function testGameDistanceRow() {
            $game = new Game(new EasyGame([0, 4], [0, 1]));
            $game->moveCurrentPlayer(1);
            $game->moveCurrentPlayer(1);
            assertEquals([0, 3], $game->getCurrentScore()->getDistanceBetweenPlayer());
        }

        public function testGameScoreDistanceColumn() {
            $game = new Game(new EasyGame([0, 1], [1, 1]));
            $game->pivotCurrentPlayer(Game::LEFT);
            $game->pivotCurrentPlayer(Game::LEFT);
            assertEquals([1, 0], $game->getCurrentScore()->getDistanceBetweenPlayer());
        }






    }
