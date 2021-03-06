<?php 

use PHPUnit\Framework\TestCase;
require('./src/MarsRover.php');

class MarsRoverTest extends TestCase {
    public function testPlateau () {
        $upperRight = '5 5';
        $rovers = [
            ['1 2 N', 'LMLMLMLMM'], ['3 3 E', 'MMRMMRMRRM']
        ];
        $plateau = (new MarsRover)->plateau($upperRight, $rovers);
        $this->assertEquals(['1 3 N', '5 1 E'],$plateau);
    }

    public function testRightWithN(){
        $marsRover = new MarsRover;
        $this->assertEquals('E',$marsRover->right('N'));
    }

    public function testRightWithE(){
        $marsRover = new MarsRover;
        $this->assertEquals('S',$marsRover->right('E'));
    }

    public function testRightWithO(){
        $marsRover = new MarsRover;
        $this->assertEquals('N',$marsRover->right('O'));
    }   
    
    public function testRightWithS(){
        $marsRover = new MarsRover;
        $this->assertEquals('O',$marsRover->right('S'));
    }

    public function testLeftWithN(){
        $marsRover = new MarsRover;
        $this->assertEquals('O',$marsRover->left('N'));
    }

    public function testLeftWithE(){
        $marsRover = new MarsRover;
        $this->assertEquals('N',$marsRover->left('E'));
    }

    public function testLeftWithO(){
        $marsRover = new MarsRover;
        $this->assertEquals('S',$marsRover->left('O'));
    }   
    
    public function testLeftWithS(){
        $marsRover = new MarsRover;
        $this->assertEquals('E',$marsRover->left('S'));
    }

    public function testMoveWithFacingN(){
        $marsRover = new MarsRover;
        $resultat = [
            'x' => 2,
            'y' => 3,
            'facing' => 'N'
        ];
        $this->assertEquals($resultat,$marsRover->move('N',2,2));
    }

    public function testMoveWithFacingE(){
        $marsRover = new MarsRover;
        $resultat = [
            'x' => 3,
            'y' => 2,
            'facing' => 'E'
        ];
        $this->assertEquals($resultat,$marsRover->move('E',2,2));
    }

    public function testMoveWithFacingO(){
        $marsRover = new MarsRover;
        $resultat = [
            'x' => 1,
            'y' => 2,
            'facing' => 'O'
        ];
        $this->assertEquals($resultat,$marsRover->move('O',2,2));
    }   
    
    public function testMoveWithFacingS(){
        $marsRover = new MarsRover;
        $resultat = [
            'x' => 2,
            'y' => 1,
            'facing' => 'S'
        ];
        $this->assertEquals($resultat,$marsRover->move('S',2,2));
    }
}