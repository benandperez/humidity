<?php


namespace App\Services;


use App\Entity\History;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class SaveHistory
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var Connection
     */
    private $connection;


    public function __construct(EntityManagerInterface $entityManager, Connection $connection)
    {
        $this->entityManager = $entityManager;
        $this->connection = $connection;
    }

    public function searchData($request): History
    {
        $latitude= $request['city']->getLatitude();
        $longitude= $request['city']->getLongitude();

        $con = $this->connection->getDataApi($latitude, $longitude);

        $history = new History();
        $history->setHumidity($con->value);
        $history->setCity($request['city']);
        $history->setLatitude($latitude);
        $history->setLongitude($longitude);
        $history->setCreatedAt(new \DateTime());
        $history->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($history);
        $this->entityManager->flush();

        return $history;


    }

}