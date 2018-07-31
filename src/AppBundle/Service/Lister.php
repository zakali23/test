<?php
/**
 * Created by PhpStorm.
 * User: zak
 * Date: 05/06/18
 * Time: 14:26
 */


namespace AppBundle\Service;


use AppBundle\Entity\Syndic;

class Lister
{

    public function getImmeubleFromSyndic(Syndic $syndic)
    {

        $batiments = $syndic->getGestionnaire()->getBatiments();

        return $batiments;
    }

    public function getLotsFromSyndic(Syndic $syndic)
    {
        $batiments = $syndic->getGestionnaire()->getBatiments();
        $lots=[];
        foreach ($batiments as $immeuble)
        {
            $appartements = $immeuble->getAppartements();

            foreach($appartements as $appartement)
            {
                $lots []=$appartement;
            }
        }
        return $lots;
    }

    public function getRoomsFromSyndic(Syndic $syndic)
    {
        $batiments = $syndic->getGestionnaire()->getBatiments();
        $lots=[];
        $piece=[];
        foreach ($batiments as $immeuble)
        {
            $appartements = $immeuble->getAppartements();

            foreach($appartements as $appartement)
            {
                $lots []=$appartement;
            }

            foreach ($lots as $lot)
            {
                $rooms=$lot->getRooms();
                foreach ($rooms as $room)
                {
                    $piece[]= $room;
                }
            }

        }
        return $piece;
    }
}