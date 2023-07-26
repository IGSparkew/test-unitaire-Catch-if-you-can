<?php 
// Robbrecht Alex
    class Player {

        const ORIENTATION = [0=>"up",2=>"down",1=>"right",3=>"left"];


        private bool $isPlayed;
        private string $direction;
        
        public function __construct(private int $x = 0, private int $y = 0) {
            $this->direction = self::ORIENTATION[0];
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
                case self::ORIENTATION[0] :
                    $this->y += $nbcase;
                    break;
                case self::ORIENTATION[1] :
                    $this->x += $nbcase;
                    break;
                case self::ORIENTATION[2] :
                    $this->y -= $nbcase;
                    break;
                case self::ORIENTATION[3] :
                    $this->x -= $nbcase;
                    break;
            }


           return true;
        }

        public function pivot(string $direction) : bool {
            $key = array_keys(self::ORIENTATION, $this->direction)[0];
            if ($direction == Game::RIGHT) {
                $key += 1;
                if ($key > count(self::ORIENTATION)) {
                    $key = 0;
                }
                $this->direction = self::ORIENTATION[$key];
                return true;
            } else if ($direction == Game::LEFT) {
                    $key -= 1;
                    if ($key < 0) {
                        $key = count(self::ORIENTATION) - 1;
                    }
                    $this->direction = self::ORIENTATION[$key];
                    return true;

            } else {
                return false;
            }

        }

        public function getX(): int {
            return $this->x;
        }

        public function getY(): int {
            return $this->y;
        }

        public function getDirection(): string {
            return $this->direction;
        }

    }

?>