<?php

require_once 'Card.php';

class CardList {

    private $cards;

    public function __construct($cardsJson) {
        $this->cards = array();

        foreach ($cardsJson as $cardData) {
            $this->cards[] = new Card($cardData);
        }
    }

    public function toOrderedArray() {
        $array = array();

        $root = $this->linkCards();
        $next = $root;
        
        while ($next !== NULL) {
            $array[] = $next;
            $next = $next->getNext();
        }

        return $array;
    }

    private function linkCards() {
        $cardsCount = count($this->cards);
        $root = NULL;

        for ($i = 0; $i < $cardsCount; $i++) {
            $cardI = $this->cards[$i];
            
            for ($j = 0; $j < $cardsCount; $j++) {
                $cardJ = $this->cards[$j];

                if ($cardI->getFrom() === $cardJ->getTo()) {
                    $cardI->setPrevious($cardJ);
                    $cardJ->setNext($cardI);
                }
                else
                if ($cardI->getTo() === $cardJ->getFrom()) {
                    $cardJ->setPrevious($cardI);
                    $cardI->setNext($cardJ);
                }
            }

            if ($cardI->getPrevious() === NULL) {
                $root = $cardI;
            }
        }

        return $root;
    }

}
