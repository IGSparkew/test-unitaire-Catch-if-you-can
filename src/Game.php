<?php 
    class Game {

        public function __construct(private Player $playerFirst, private Player $playerSecond) {
        }

        public function getFirstPlayer(): Player {
            return $this->playerFirst;
        }

        public function getSecondPlayer() : Player {
            return $this->playerSecond;
        }

    }
?>