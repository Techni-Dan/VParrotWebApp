<?php
namespace App\Data;

use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Categorie;
use App\Entity\Type;
use App\Entity\Carburant;

class SearchData
{

    /**
     * @var int
     */
    public $page = 1;

    /**
     * @var null|integer
     */
    public $prixmax;

    /**
     * @var null|integer
     */
    public $prixmin;

    /**
     * @var null|integer
     */
    public $kmmax;

    /**
     * @var null|integer
     */
    public $kmmin;

    /**
     * @var null|integer
     */
    public $anneemax;

    /**
     * @var null|integer
     */
    public $anneemin;

    /**
     * @var Marque[]
     */
    public $marque = [];

     /**
     * @var Modele[]
     */
    public $modele = [];

    /**
     * @var Categorie[]
     */
    public $categorie = [];

    /**
     * @var Type[]
     */
    public $type = [];

    /**
     * @var Carburant[]
     */
    public $carburant = [];

}