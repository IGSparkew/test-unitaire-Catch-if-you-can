<?php 
    class Game {

        private $grid;

        public function __construct(private Player $playerFirst, private Player $playerSecond) {
            $this->grid = [];

            for ($i = 0; $i < 10; $i++) {
                $col = [0,0,0,0,0,0,0,0,0,0];
                array_push($this->grid, $col);
            }
        }

        public function getFirstPlayer(): Player {
            return $this->playerFirst;
        }

        public function getSecondPlayer() : Player {
            return $this->playerSecond;
        }

        public function getGrid(): Array {
            return $this->grid;
        }

    }
?>