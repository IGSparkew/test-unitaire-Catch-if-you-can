<?php 
// Robbrecht Alex

    class Game {

        private $grid;
        private Array $playerList;
        private int $currentPlayerIndex;

        public function __construct(array $playerFirstPosition = [0,0], array $playerSecondPosition = [0,0]) {
            $this->grid = [];
            $this->currentPlayerIndex = 0;
            $playerFirst = new Player($playerFirstPosition[0], $playerFirstPosition[1]);
            $playerSecond = new Player($playerSecondPosition[0], $playerSecondPosition[1]);
            $playerFirst->setIsPlayed(true);
            $playerSecond->setIsPlayed(false);


            $this->playerList = [$playerFirst, $playerSecond];

            for ($i = 0; $i < 10; $i++) {
                $col = [0,0,0,0,0,0,0,0,0,0];
                array_push($this->grid, $col);
            }
        }

        public function moveCurrentPlayer(int $nbCase):bool {
            $currentPlayer = $this->playerList[$this->currentPlayerIndex];
            if ($currentPlayer->getIsPlayed()) {
                
                $result = $currentPlayer->move($nbCase);
                $currentPlayer->setIsPlayed(false);
                $this->currentPlayerIndex++;

                if ($this->currentPlayerIndex >= count($this->playerList)) {
                    $this->currentPlayerIndex = 0;
                }
                $nextCurrentPlayer = $this->playerList[$this->currentPlayerIndex];
                $nextCurrentPlayer->setIsPlayed(true);
                return $result;
            }
            return false;
        }

        public function getFirstPlayer(): Player {
            return $this->playerList[0];
        }

        public function getSecondPlayer() : Player {
            return $this->playerList[1];
        }

        public function getGrid(): Array {
            return $this->grid;
        }

    }
?>