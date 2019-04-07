<?php
use PHPUnit\Framework\TestCase;
require_once '/var/www/html/GSB/PPE-ApplicationFrais/Ressources/GSB_AppliMVC/includes/fct.inc.php';;

/**
 * Tests sur les fonctions incluses dans fct.inc.php
 *
 * @author MERLIERE VANHOEKE Sébastien <sertux.dev@gmail.com>
 */
class incTest extends TestCase {

// TEST --> dateFrancaisVersAnglais
/**
 * @test
 */
    public function reverseDateFrToEnTest() {
        $this->assertSame("2018-11-12", dateFrancaisVersAnglais('12/11/2018'));
    }
    
/**
 * @test
 */
public function reverseDateFrToEn2WithErrTest() {
        $this->assertSame("209-11-12", dateFrancaisVersAnglais('12/11/2019'));
    }
    
// TEST --> dateAnglaisVersFrancais
/**
 * @test
 */
    public function reverseDateEnToFrTest() {
        $this->assertSame("12/11/2018", dateAnglaisVersFrancais('2018-11-12'));
    }
    
/**
 * @test
 */
public function reverseDateEnToFr2WithErrTest() {
        $this->assertSame("12/11/2019", dateAnglaisVersFrancais('209-11-12'));
    }
    
// TEST --> anneeMois
/**
 * @test
 */
public function anneeMoisWithErrTest() {
        $this->assertSame("2018-11-12", getMois('12/11/2019'));
    }
    
/**
 * @test
 */
public function anneeMois2Test() {
        $this->assertSame("201911", getMois('12/11/2019'));
    }
    
/**
 * @test
 */
public function anneeMois3Test() {
        $this->assertSame("201901", getMois('12/01/2019'));
    }
    
/**
 * @test
 */
public function anneeMois4WithErrTest() {
        $this->assertSame("20192", getMois('12/02/2019'));
    }
    
// TEST --> estEntierPositif
/**
 * @test
 */
public function estEntierPositifWithErrTest() {
        $this->assertSame(true, estEntierPositif('1,2019'));
    }
    
/**
 * @test
 */
public function estEntierPositif2Test() {
        $this->assertSame(false, estEntierPositif('12.2019'));
    }
    
/**
 * @test
 */
public function estEntierPositif3Test() {
        $this->assertSame(true, estEntierPositif('122019'));
    }
    
/**
 * @test
 */
public function estEntierPositif4WithErrTest() {
        $this->assertSame(true, estEntierPositif('-019'));
    }
    
// TEST --> estTableauEntiers
/**
 * @test
 */
public function estTableauEntiersWithErrTest() {
        $this->assertSame(false, estTableauEntiers([1, 2, 0, 19]));
    }
    
/**
 * @test
 */
public function estTableauEntiers2Test() {
        $this->assertSame(false, estTableauEntiers([12.2, 0, 19]));
    }
    
/**
 * @test
 */
public function estTableauEntiers3Test() {
        $this->assertSame(true, estTableauEntiers([12, 2, -0, 19]));
    }
    
/**
 * @test
 */
public function estTableauEntiers4WithErrTest() {
        $this->assertSame(true, estTableauEntiers([50, 50, -50]));
    }
    
// TEST --> estDateDepassee
/**
 * @test
 */
public function estDateDepasseeWithErrTest() {
        $this->assertSame(false, estDateDepassee("01/04/2018"));
    }
    
/**
 * @test
 */
public function estDateDepassee2Test() {
        $this->assertSame(false, estDateDepassee("20/10/2019"));
    }
    
/**
 * @test
 */
public function estDateDepassee3Test() {
        $this->assertSame(true, estDateDepassee("12/12/2000"));
    }
    
/**
 * @test
 */
public function estDateDepassee4WithErrTest() {
        $this->assertSame(true, estDateDepassee("12/12/2018"));
    }

    
// TEST --> estDateValide
/**
 * @test
 */
public function estDateValideWithErrTest() {
        $this->assertSame(false, estDateValide("18/04/2018"));
    }
    
/**
 * @test
 */
public function estDateValide2Test() {
        $this->assertSame(false, estDateValide("2019/10/20"));
    }
    
/**
 * @test
 */
public function estDateValide3Test() {
        $this->assertSame(true, estDateValide("12/12/2020"));
    }
    
/**
 * @test
 */
public function estDateValide4WithErrTest() {
        $this->assertSame(true, estDateValide("12-12-2018"));
    }
    
/**
 * @test
 */
public function estDateValide5Test() {
        $this->assertSame(true, estDateValide("12/12/18"));
    }
    
// TEST --> lesQteFraisValides
/**
 * @test
 */
public function lesQteFraisValidesWithErrTest() {
        $this->assertSame(false, lesQteFraisValides([1, 2, 0, 19]));
    }
    
/**
 * @test
 */
public function lesQteFraisValides2Test() {
        $this->assertSame(false, lesQteFraisValides([12.2, 0, 19]));
    }
    
/**
 * @test
 */
public function lesQteFraisValides3Test() {
        $this->assertSame(true, lesQteFraisValides([12, 2, -0, 19]));
    }
    
/**
 * @test
 */
public function lesQteFraisValides4WithErrTest() {
        $this->assertSame(true, lesQteFraisValides([50, 50, -50]));
    }
    
    
    }
