<?php 
// Robbrecht Alex
    class Player {

        const UP = 0;
        const RIGHT = 1;
        const DOWN = 2;
        const LEFT = 3;


        private bool $isPlayed;
        private int $direction;
        
        public function __construct(private int $x = 0, private int $y = 0) {
            $this->direction = 0;
        }

        public function getIsPlayed(): bool {
            return $this->isPlayed;
        }

        public function setIsPlayed(bool $isPlayed): self {
            $this->isPlayed = $isPlayed;
            return $this;
        }

        public function move(int $nbcase) : bool {
            if ($nbcase > 2 || $nbcase <= 0) {
                return false;
            }
            switch($this->direction) {
                case self::UP :
                    $this->y += $nbcase;
                    break;
                case self::RIGHT :
                    $this->x += $nbcase;
                    break;
                case self::DOWN :
                    $this->y -= $nbcase;
                    break;
                case self::LEFT :
                    $this->x -= $nbcase;
                    break;
            }


           return true;
        }

        public function getX(): int {
            return $this->x;
        }

        public function getY(): int {
            return $this->y;
        }

    }

?>