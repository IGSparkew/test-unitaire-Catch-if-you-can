<?php 
// Robbrecht Alex

    class Game {

        const RIGHT = "right";
        const LEFT = "left";

        public function __construct(private DifficultyGame $difficultyGame = new EasyGame()) {  }

        public function moveCurrentPlayer(int $nbCase):bool {
            return $this->difficultyGame->moveCurrentPlayer($nbCase);
        }

        public function pivotCurrentPlayer(string $direction):bool {
            return $this->difficultyGame->pivotCurrentPlayer($direction);
        }

        public function getGrid(): Array {
            return $this->getGameService()->getGrid();
        }
        
        public function getGameService() : DifficultyGame {
            return $this->difficultyGame;
        }

        public function getFirstPlayer(): Player {
            return $this->getGameService()->getFirstPlayer();
        }

        
        public function getSecondPlayer(): Player {
            return $this->getGameService()->getSecondPlayer();
        }

        public function getCurrentIndex(): int {
            return $this->getGameService()->getCurrentIndex();
        }

        public function getCurrentScore(): Score {
            return $this->getGameService()->getCurrentScore();
        }
    }
?>