<?php

require_once 'CardList.php';
require_once 'Card.php';

/**
 * Return a translated type description of the card type.
 */
function getTypeDescription($card) {
    switch ($card->getType()) {
        case Card::TRAIN: return 'Trem';
        case Card::BUS: return 'Ônibus';
        case Card::AIRPLANE: return 'Avião';
    }
}

/**
 * Return the seat description.
 */
function getSeatDescription($card) {
    if ($card->getSeat() === NULL)
        return 'Sem atribuição de assento.';
    else
        return 'Sente-se no assento ' . $card->getSeat() . '.';
}

/**
 * Return the baggage information.
 */
function getBaggageInfo($card) {
    if ($card->getBaggageInfo() === NULL)
        return 'Sem informação de bagagem.';
    else
    if ($card->getBaggageInfo() === 'AUTO')
        return 'A bagagem transferiremos automaticamente da sua última conexão.';
    else
        return 'Retire sua bagagem no balcão ' . $card->getBaggageInfo() . '.';
}

/*
 * MAIN
 */
$cardsFile = (isset($argv[1])) ? $argv[1] : 'data.json';
if (!is_readable($cardsFile)) {
    printf('Invalid file: %s', $cardsFile);
    exit();
}

$cardsData = file_get_contents($cardsFile);
$cardsJson = json_decode($cardsData, true);

$cardList = new CardList($cardsJson);
foreach ($cardList->toOrderedArray() as $card) {       
    printf('Pegue o %s (%s) de %s para %s. %s %s', 
                getTypeDescription($card),
                $card->getCode(),
                $card->getFrom(),
                $card->getTo(),
                getSeatDescription($card),
                getBaggageInfo($card));
    printf(PHP_EOL);
}

printf('Você chegou ao seu destino final.');
