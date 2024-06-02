<?php

require_once 'Team.php';
require_once 'Match.php';

use Football\Team;
use Football\Match;

$team1 = new Team("Warriors");
$team2 = new Team("Expendables");
$team3 = new Team("Avengers");

$match1 = new Match($team1, $team2, 2, 1);
$match2 = new Match($team2, $team1, 3, 0);
$match3 = new Match($team1, $team3, 0, 0);


duel($match1, $match3);
echo "<hr />";
duel($match1, $match2);


function checkIfRematch(Match $match1, Match $match2)
{
    if (
        $match1->getHost()->getName() == $match2->getGuest()->getName()
        && $match1->getGuest()->getName() == $match2->getHost()->getName()
    ) {
        return true;
    }

    return false;
}

function duel(Match $match1, Match $match2)
{
    if (checkIfRematch($match1, $match2)) {
        $goalsTeam1 = $match1->getHostGoals() + $match2->getGuestGoals();
        $goalsTeam2 = $match1->getGuestGoals() + $match2->getHostGoals();

        if ($goalsTeam1 > $goalsTeam2) {
            echo "{$match1->getHost()->getName()} is a winner by total score: {$match1->getHost()->getName()} {$goalsTeam1} : {$goalsTeam2} {$match2->getHost()->getName()}";
        } else if ($goalsTeam2 > $goalsTeam1) {
            echo "{$match2->getHost()->getName()} is a winner by total score: {$match1->getHost()->getName()} {$goalsTeam1} : {$goalsTeam2} {$match2->getHost()->getName()}";
        } else {
            echo "It is a tie with score: {$match1->getHost()->getName()} {$goalsTeam1} : {$goalsTeam2} {$match2->getHost()->getName()}";
        }
    } else {
        echo "It is not a rematch";
    }
}
