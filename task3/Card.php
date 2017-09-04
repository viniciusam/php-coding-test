<?php

class Card {

    const AIRPLANE = 'AIRPLANE';
    const BUS = 'BUS';
    const TRAIN = 'TRAIN';

    private $data;

    private $previous;
    private $next;

    public function __construct($data) {
        $this->data = $data;
        $this->previous = NULL;
        $this->next = NULL;
    }

    public function getType() {
        return $this->data['type'];
    }

    public function getCode() {
        return $this->data['code'];
    }

    public function getGate() {
        return $this->data['gate'];
    }

    public function getFrom() {
        return $this->data['from'];
    }

    public function getTo() {
        return $this->data['to'];
    }

    public function getSeat() {
        return $this->data['seat'];
    }

    public function getBaggageInfo() {
        return $this->data['baggage'];
    }

    public function getPrevious() {
        return $this->previous;
    }

    public function setPrevious($listNode) {
        $this->previous = $listNode;
    }

    public function getNext() {
        return $this->next;
    }

    public function setNext($listNode) {
        $this->next = $listNode;
    }

    public function toString() {
        return $this->getType() . ' - From: ' . $this->getFrom() . ' - To: ' . $this->getTo();
    }

}
