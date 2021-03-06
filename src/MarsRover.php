<?php

class MarsRover {
    private $movements = [
        'N' => ['right' => 'E', 'left' => 'O', 'move' => ['x' => 0, 'y' => 1]],
        'S' => ['right' => 'O', 'left' => 'E', 'move' => ['x' => 0, 'y' => -1]], 
        'E' => ['right' => 'S', 'left' => 'N', 'move' => ['x' => 1, 'y' => 0]],
        'O' => ['right' => 'N', 'left' => 'S', 'move' => ['x' => -1, 'y' => 0]]
    ];
    const LEFT = 'L';
    const RIGHT = 'R';
    const MOVE = 'M';

    public function right($facing){
        return $this->movements[$facing]['right'];
    }

    public function left($facing){
        return $this->movements[$facing]['left'];
    }

    public function move($facing, $x, $y){
        $move_x = $x + $this->movements[$facing]['move']['x'];
        $move_y = $y + $this->movements[$facing]['move']['y'];
        return [
            'x' => $move_x,
            'y' => $move_y,
            'facing' => $facing
        ];
    }

    private function formatPosition($position){
        $position = explode(' ', $position);
        return [
            'x' => $position[0],
            'y' => $position[1],
            'facing' => $position[2]
        ];
    }

    private function formatDeplacements($deplacements){
        return str_split($deplacements);
    }

    /**
     * Run the deplacements of the rovers on the plateau
     *
     * @param [string] $upperRight: the upper-right coordinates of the plateau
     * @param [array] $rovers: the rovers instructions
     * @return array
     */
    public function plateau($upperRight, $rovers) {
        $coordonnees = [];
        foreach($rovers as $rover){
            $position = $this->formatPosition($rover[0]);
            $deplacements = $this->formatDeplacements($rover[1]);
            
            foreach($deplacements as $deplacement){
                switch ($deplacement) {
                    case self::RIGHT:
                        $position['facing'] = $this->right($position['facing']);
                        break;
                    case self::LEFT:
                        $position['facing'] = $this->left($position['facing']);
                        break;
                    case self::MOVE:
                        $position = $this->move($position['facing'],$position['x'],$position['y']);
                        break;
                }
            }
            $coordonnees[] = implode(' ', $position);
        }
        return $coordonnees;
    }
}
