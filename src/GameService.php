<?php    
    interface DifficultyGame {
        public function moveCurrentPlayer(int $nbCase):bool;
        public function pivotCurrentPlayer(string $direction):bool;
        public function play(array $actions);
        public function getCurrentPlayer() : Player;
        public function getFirstPlayer(): Player;
        public function getSecondPlayer() : Player;
        public function getCurrentIndex(): int;
        public function getCurrentScore(): Score;
        public function getGrid(): array;
        public function getScores(): array;

    }

    abstract class DifficultyGameAbstract implements DifficultyGame {
        protected array $playerList;
        protected int $currentPlayerIndex;
        private array $grid;
        private int $round;
        private array $scoreList;
        protected bool $playerOneWin;
        protected bool $playerTowWin;

        public function __construct(array $playerFirstPosition = [0,0], array $playerSecondPosition = [0,0]) { 
            $playerFirst = new Player($playerFirstPosition[0], $playerFirstPosition[1]);
            $playerSecond = new Player($playerSecondPosition[0], $playerSecondPosition[1]);
            $playerFirst->setIsPlayed(true);
            $playerSecond->setIsPlayed(false);

            $this->playerList = [$playerFirst, $playerSecond];
            $this->currentPlayerIndex = 0;
            $this->round = 0;
            $this->scoreList = [];
            $this->playerOneWin = false;
            $this->playerTowWin = false;

            $this->grid = [];
            for ($i = 0; $i < 10; $i++) {
                $col = [0,0,0,0,0,0,0,0,0,0];
                array_push($this->grid, $col);
            }
        }

        public function getCurrentPlayer() : Player {
            return $this->playerList[$this->currentPlayerIndex];
        }

        public function getFirstPlayer(): Player {
            return $this->playerList[0];
        }

        public function getSecondPlayer() : Player {
            return $this->playerList[1];
        }

        public function getCurrentIndex(): int {
            return $this->currentPlayerIndex;
        }

        public function getGrid(): array {
            return $this->grid;
        }

        public function getScores(): array {
            return $this->scoreList;
        }

        public function getCurrentScore(): Score {
            return $this->scoreList[($this->round - 1)];
        }

        protected function changeCurrentPlayer() {
            $currentPlayer = $this->getCurrentPlayer();

            $currentPlayer->setIsPlayed(false);
                $this->currentPlayerIndex++;

                if ($this->currentPlayerIndex >= count($this->playerList)) {
                    $this->updateScore();
                    $this->currentPlayerIndex = 0;
                }
                $nextCurrentPlayer = $this->playerList[$this->currentPlayerIndex];
                $nextCurrentPlayer->setIsPlayed(true);
        }

        protected function updateScore() {
            $this->round++;
            array_push($this->scoreList, new Score($this->round, $this->getFirstPlayer(), $this->getSecondPlayer()));
        }

        protected function execAction(string $actionName, $data) {
            if ($actionName == Game::MOVE) {
              $this->moveCurrentPlayer($data);
            } else if ($actionName == Game::PIVOT) {
                $this->pivotCurrentPlayer($data);
            }
        }

        protected function checkWin() {
            $first = $this->getFirstPlayer();
            $second = $this->getSecondPlayer();
            if ($first->getX() == $second->getX() && $second->getY() == $first->getY()) {
                if($this->getCurrentIndex() == 0 && !$this->playerTowWin) {
                    $this->playerOneWin = true;
                } 
                if($this->getCurrentIndex() == 1 && !$this->playerOneWin) {
                    $this->playerTowWin = true;
                } 
            }
        }
       
        protected function playerIsOut(int $nbCase): bool {
            $currentPlayer = $this->getCurrentPlayer();
            $direction = $currentPlayer->getDirection();
            $grid = $this->getGrid();
            if ($direction == Player::ORIENTATION[0] ) {
                if (($currentPlayer->getY() + $nbCase) > count($grid)) {
                    return true;
                }
                return false;
            }else if ($direction == Player::ORIENTATION[2]) {
                if (($currentPlayer->getY() - $nbCase) < 0) {
                    return true;
                }
                return false;
            }else if ($direction == Player::ORIENTATION[1]) {
                if (($currentPlayer->getX() + $nbCase) > count($grid[0]) || ($currentPlayer->getX() - $nbCase) < 0) {
                    return true;
                }
                return false;
            } else if ($direction == Player::ORIENTATION[3]) {
                if (($currentPlayer->getX() - $nbCase) < 0) {
                    return true;
                }
                return false;
            }
            return true;
        }
    }

    class HardGame extends DifficultyGameAbstract implements DifficultyGame {
        
        public function __construct(array $playerFirstPosition = [0,0], array $playerSecondPosition = [0,0]) {
            parent::__construct($playerFirstPosition, $playerSecondPosition);
        }

        public function moveCurrentPlayer(int $nbCase):bool {
            $currentPlayer = $this->getCurrentPlayer();
            
            if ($currentPlayer->getIsPlayed()) {
                if (!$this->playerIsOut($nbCase)) {
                    $result = $currentPlayer->move($nbCase);
                    $this->checkWin();
                }
                $this->changeCurrentPlayer();
                return $result ?? false;
            }
            return false;
        }

        public function pivotCurrentPlayer(string $direction):bool {
            $currentPlayer = $this->getCurrentPlayer();
            if ($currentPlayer->getIsPlayed()) {
                $result = $currentPlayer->pivot($direction);
                $this->checkWin();
                $this->changeCurrentPlayer();
                return $result;
            }
            return false;
        }

        public function play(array $actions): string | Score {
            foreach($actions as $action) {
                $this->execAction($action[0], $action[1]);
                if ($this->playerOneWin) {
                    return Game::WIN_P1;
                }

                if ($this->playerTowWin) {
                    return Game::WIN_P2;
                }
            }

            return $this->getCurrentScore();
            
        }

    }

    class EasyGame extends DifficultyGameAbstract implements DifficultyGame {

        public function __construct(array $playerFirstPosition = [0,0], array $playerSecondPosition = [0,0]) {
            parent::__construct($playerFirstPosition, $playerSecondPosition);
        }
        public function moveCurrentPlayer(int $nbCase):bool {
            $currentPlayer = $this->getCurrentPlayer();
            
            if ($currentPlayer->getIsPlayed()) {
                if ($this->playerIsOut($nbCase)) {
                    return false;
                }
                $result = $currentPlayer->move($nbCase);
                if ($result == false) {
                    return false;
                }
                $this->checkWin();
                $this->changeCurrentPlayer();
                return $result;
            }
            return false;
        }

        public function pivotCurrentPlayer(string $direction):bool {
            $currentPlayer = $this->getCurrentPlayer();
            if ($currentPlayer->getIsPlayed()) {
                $result = $currentPlayer->pivot($direction);
                if ($result == false) {
                    return false;
                }
                $this->checkWin();
                $this->changeCurrentPlayer();
                return $result;
            }
            return false;
        }

        public function play(array $actions): string | Score {
            foreach($actions as $action) {
                $this->execAction($action[0], $action[1]);
                if ($this->playerOneWin || $this->playerTowWin) {
                    break;
                }
            }

            if ($this->playerOneWin) {
                return Game::WIN_P1;
            }

            if ($this->playerTowWin) {
                return Game::WIN_P2;
            }

            $this->updateScore();

            return $this->getCurrentScore();
            
        }
    }


?>