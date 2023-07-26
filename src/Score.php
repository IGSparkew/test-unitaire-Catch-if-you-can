<?php 

    class Score {

        private bool $firstPlayerSee;
        private bool $secondPlayerSee;
        private array $distanceBetween;

        public function __construct(private int $round, Player $firstPlayer, Player $secondPlayer ) { 
            $this->firstPlayerSee = $this->playerSee($firstPlayer, $secondPlayer);
            $this->secondPlayerSee = $this->playerSee($secondPlayer, $firstPlayer);
            $this->distanceBetween = $this->getDistance($firstPlayer, $secondPlayer);
        }

        public function firstPlayerSeeSecond(): bool {
            return $this->firstPlayerSee;
        }

        public function secondPlayerSeeFirst(): bool {
            return $this->secondPlayerSee;
        }

        public function getDistanceBetweenPlayer(): array {
            return $this->distanceBetween;
        }

        private function playerSee(Player $player, Player $otherPlayer): bool {
            $playerDirection = $player->getDirection();
            if ($player->getY() == $otherPlayer->getY()) {
                if($player->getX() > $otherPlayer->getX()) {
                    return $playerDirection == Player::ORIENTATION[3];
                } else {
                    return $playerDirection == Player::ORIENTATION[1];
                }

            } else if ($player->getX() == $otherPlayer->getX()) {
                if($player->getY() > $otherPlayer->getY()) {
                    return $playerDirection == Player::ORIENTATION[2];
                } else {
                    return $playerDirection == Player::ORIENTATION[0];
                }
            }else {
                return false;
            }
        }

        private function getDistance(Player $player, Player $otherPlayer): array {
            return [abs($player->getX() - $otherPlayer->getX()), abs($player->getY() - $otherPlayer->getY())];
        }
    }
?>