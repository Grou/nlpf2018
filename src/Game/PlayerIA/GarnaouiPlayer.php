<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class GarnaouiPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class GarnaouiPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        $myLastChoice = $this->result->getLastChoiceFor($this->mySide);
        $oppLastChoice = $this->result->getLastChoiceFor($this->opponentSide);

        $oppLastScore = $this->result->getLastScoreFor($this->opponentSide);
        $myLastScore = $this->result->getLastScoreFor($this->mySide);

        $scissorsChoice = parent::scissorsChoice();
        $paperChoice = parent::paperChoice();
        $rockChoice = parent::rockChoice();
        
        
        if ($this->result->getNbRound() == 0)
        {
            return $paperChoice;
        }
        else
        {
            if ($myLastScore > $oppLastScore)
            {
                return $myLastChoice;
            }
            elseif($myLastScore < $oppLastScore)
            {
                if ($myLastChoice == $scissorsChoice && $oppLastChoice == $paperChoice)
                {
                    return $rockChoice;
                }
                elseif ($myLastChoice == $paperChoice && $oppLastChoice == $scissorsChoice)
                {
                    return $rockChoice;
                }
                elseif ($myLastChoice == $scissorsChoice && $oppLastChoice == $rockChoice)
                {
                    return $paperChoice;
                }
                elseif ($myLastChoice == $rockChoice && $oppLastChoice == $scissorsChoice)
                {
                    return $paperChoice;
                }
                elseif ($myLastChoice == $rockChoice && $oppLastChoice == $paperChoice)
                {
                    return $scissorsChoice;
                }
                elseif ($myLastChoice == $paperChoice && $oppLastChoice == $rockChoice)
                {
                    return $scissorsChoice;
                }
            elseif($myLastScore == $oppLastScore)
                return $rockChoice;
            }
        }

        return $rockChoice;
    }
};

// -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------