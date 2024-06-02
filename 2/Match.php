<?php

namespace Football;

class Match
{
    private $host;
    private $guest;
    private $hostGoals;
    private $guestGoals;

    public function __construct(Team $team1, Team $team2, $goals1, $goals2)
    {
        $this->host = $team1;
        $this->guest = $team2;
        $this->hostGoals = $goals1;
        $this->guestGoals = $goals2;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getGuest()
    {
        return $this->guest;
    }

    public function getHostGoals()
    {
        return $this->hostGoals;
    }

    public function getGuestGoals()
    {
        return $this->guestGoals;
    }
}
