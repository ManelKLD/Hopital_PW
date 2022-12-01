<?php

namespace App\Repository;

use App\Entity\Patients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @extends ServiceEntityRepository<Patients>
 *
 * @method Patients|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patients|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patients[]    findAll()
 * @method Patients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patients::class);
    }

    public function add(Patients $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Patients $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    //recherche dans la bd avec l'orm

    /**
     * @return Patients[] Returns an array of Patients objects
     */

    public function TrouverPatient($FormData)
    {
        $r = $this->createQueryBuilder('patient'); //p = table patient
        //si tout les champs vide
        if ($FormData['Nom'] == null and $FormData['Pays'] == null and $FormData['Motif'] == null and $FormData['Date'] == null) {

            return $r

                //requete sur le nom
                ->Where('patient.nom LIKE :nom') //nom de la table
                ->setParameter('nom',  $FormData['Nom'] . '%') //'Nom' provient de forulaire, FormData contient les infos saisie dans le formulaire
                ->orderBy('patient.nom' /*and 'p.prenom'*/, 'ASC')

                //requete sur le pays
                ->orWhere('patient.codePays = :codePays') //nom de la table
                ->setParameter('codePays', $FormData['Pays'])

                //requete sur le motif
                ->orWhere('patient.codeMotif = :codeMotif') //nom de la table
                ->setParameter('codeMotif', $FormData['Motif'])


                //requete sur la date
                ->orWhere('patient.dateNaiss = :date') //nom de la table
                ->setParameter('date', $FormData['Date'])

                //->select('patient', 'p', 'm')
                //jointure
                //->join('patient.codePays', 'p') --------erreur ?
                //->join('patient.codeMotif', 'm')

                ->getQuery()
                ->getResult();
        }

        //si que le nom est vide
        else if ($FormData['Nom'] == null) {
            return $r

                //requete sur le pays
                ->andWhere('patient.codePays = :codePays') //nom de la table
                ->setParameter('codePays', $FormData['Pays'])

                //requete sur le motif
                ->andWhere('patient.codeMotif = :codeMotif') //nom de la table
                ->setParameter('codeMotif', $FormData['Motif'])


                //requete sur la date
                ->andWhere('patient.dateNaiss = :date') //nom de la table
                ->setParameter('date', $FormData['Date'])

                ->getQuery()
                ->getResult();
        }
        //si que le Pays est vide
        else if ($FormData['Pays'] == null) {
            return $r

                //requete sur le nom
                ->andWhere('patient.nom LIKE :nom') //nom de la table
                ->setParameter('nom', '%' . $FormData['Nom'] . '%') //'Nom' provient de forulaire, FormData contient les infos saisie dans le formulaire
                ->orderBy('patient.nom' /*and 'p.prenom'*/, 'ASC')

                //requete sur le motif
                ->andWhere('patient.codeMotif = :codeMotif') //nom de la table
                ->setParameter('codeMotif', $FormData['Motif'])


                //requete sur la date
                ->andWhere('patient.dateNaiss = :date') //nom de la table
                ->setParameter('date', $FormData['Date'])

                ->getQuery()
                ->getResult();
        }
        //si que la Date est vide
        else if ($FormData['Date'] == null) {
            return $r

                //requete sur le nom
                ->andWhere('patient.nom LIKE :nom') //nom de la table
                ->setParameter('nom', '%' . $FormData['Nom'] . '%') //'Nom' provient de forulaire, FormData contient les infos saisie dans le formulaire
                ->orderBy('patient.nom' /*and 'p.prenom'*/, 'ASC')

                //requete sur le pays
                ->andWhere('patient.codePays = :codePays') //nom de la table
                ->setParameter('codePays', $FormData['Pays'])

                //requete sur le motif
                ->andWhere('patient.codeMotif = :codeMotif') //nom de la table
                ->setParameter('codeMotif', $FormData['Motif'])

                ->getQuery()
                ->getResult();
        }
        //si que le motif est vide
        else if ($FormData['Motif'] == "Indifférent") {
            return $r

                //requete sur le nom
                ->andWhere('patient.nom LIKE :nom') //nom de la table
                ->setParameter('nom', '%' . $FormData['Nom'] . '%') //'Nom' provient de forulaire, FormData contient les infos saisie dans le formulaire
                ->orderBy('patient.nom' /*and 'p.prenom'*/, 'ASC')

                //requete sur le pays
                ->andWhere('patient.codePays = :codePays') //nom de la table
                ->setParameter('codePays', $FormData['Pays'])

                //requete sur la date
                ->andWhere('patient.dateNaiss = :date') //nom de la table
                ->setParameter('date', $FormData['Date'])

                ->getQuery()
                ->getResult();
        }

        //si tout vide sauf le nom

        else if ($FormData['Nom'] != null and $FormData['Pays'] == null and $FormData['Motif'] == null and $FormData['Date'] == null) {

            return $r

                //requete sur le nom
                ->Where('patient.nom LIKE :nom') //nom de la table
                ->setParameter('nom',  $FormData['Nom'] . '%') //'Nom' provient de forulaire, FormData contient les infos saisie dans le formulaire
                ->orderBy('patient.nom' /*and 'p.prenom'*/, 'ASC')

                ->getQuery()
                ->getResult();
        }

        //si tout les champs ne sont pas vide
        else if ($FormData['Nom'] != null and $FormData['Pays'] != null and $FormData['Motif'] != null and $FormData['Date'] != null) {

            return $r

                //requete sur le nom
                ->andWhere('patient.nom LIKE :nom') //nom de la table
                ->setParameter('nom', '%' . $FormData['Nom'] . '%') //'Nom' provient de forulaire, FormData contient les infos saisie dans le formulaire
                ->orderBy('patient.nom' /*and 'p.prenom'*/, 'ASC')

                //requete sur le pays
                ->andWhere('patient.codePays = :codePays') //nom de la table
                ->setParameter('codePays', $FormData['Pays'])

                //requete sur le motif
                ->andWhere('patient.codeMotif = :codeMotif') //nom de la table
                ->setParameter('codeMotif', $FormData['Motif'])

                //requete sur la date
                ->andWhere('patient.dateNaiss = :date') //nom de la table
                ->setParameter('date', $FormData['Date'])

                ->getQuery()
                ->getResult();
        }
    }

































    //$nomform,$dateform,$motifsform,$paysform

    //    /**
    //     * @return Patients[] Returns an array of Patients objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Patients
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
