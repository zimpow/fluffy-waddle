<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class LovePlayer
 * @package Hackathon\PlayerIA
 * @author Zimpo
 */
class ZimpowPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        //Le dilemne du prisonnier c'est d'être reglo !
        //Question morale : Je préfère que moi et mon pote ne faisions que très peu de prison 
        //plutot que l'un de nous soit en prison une eternité.
        
        //MA STRATEGIE
        //Je commence donc par être amis avec mon pote au premier tour !

        //Puis :
        //Si au coup d'avant j'ai été amis avec mon pote et que lui aussi c'est très bien je continue à être son pote
        //Si au coup d'avant j'ai été amis avec mon pote et qu'il m'a trahi alors je joue foe
        //Si au coup d'avant je l'ai trahi mais qu'il redevient mon pote alors je redeviens son pote direct !
        //Si au coup d'avant je l'ai trahi mais qu'il continue c'est triste mais je serais dans l'obligation de continuer à le trahir. 
        //Malheureusement on sait que l'homme est mauvais et qu'il fonctionne comme le dernier cas ... à méditer !
        
        //
        if ($this->result->getLastChoiceFor($this->mySide) == "friend" 
        && $this->result->getLastChoiceFor($this->opponentSide) == "friend")
        {
            return "friend";
        }
        else if ($this->result->getLastChoiceFor($this->mySide) == "friend" 
        && $this->result->getLastChoiceFor($this->opponentSide) == "foe")
        {
            return "foe";
        }
        else if ($this->result->getLastChoiceFor($this->mySide) == "foe" 
        && $this->result->getLastChoiceFor($this->opponentSide) == "friend")
        {
            return "friend";
        }
        else if ($this->result->getLastChoiceFor($this->mySide) == "foe" 
        && $this->result->getLastChoiceFor($this->opponentSide) == "foe")
        {
            return "foe";
        }
        else
        {
            return "friend";
        }
    }
 
};