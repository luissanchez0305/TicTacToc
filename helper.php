<?php
include_once 'cuadro.php';
class helper{
    public function isWinner($_cuadro){
        
        //horizontales
        if($_cuadro->a1 != null && $_cuadro->b1 != null && $_cuadro->c1 != null && $_cuadro->a1 == $_cuadro->b1 && $_cuadro->b1 == $_cuadro->c1)
            return true;
        if($_cuadro->a2 != null && $_cuadro->b2 != null && $_cuadro->c2 != null && $_cuadro->a2 == $_cuadro->b2 && $_cuadro->b2 == $_cuadro->c2)
            return true;
        if($_cuadro->a3 != null && $_cuadro->b3 != null && $_cuadro->c3 != null && $_cuadro->a3 == $_cuadro->b3 && $_cuadro->b3 == $_cuadro->c3)
            return true;
        //verticales
        if($_cuadro->a1 != null && $_cuadro->a2 != null && $_cuadro->a3 != null && $_cuadro->a1 == $_cuadro->a2 && $_cuadro->a2 == $_cuadro->a3)
            return true;
        if($_cuadro->b1 != null && $_cuadro->b2 != null && $_cuadro->b3 != null && $_cuadro->b1 == $_cuadro->b2 && $_cuadro->b2 == $_cuadro->b3)
            return true;
        if($_cuadro->c1 != null && $_cuadro->c2 != null && $_cuadro->c3 != null && $_cuadro->c1 == $_cuadro->c2 && $_cuadro->c2 == $_cuadro->c3)
            return true;
        //diagonales
        if($_cuadro->a1 != null && $_cuadro->b2 != null && $_cuadro->c3 != null && $_cuadro->a1 == $_cuadro->b2 && $_cuadro->b2 == $_cuadro->c3)
            return true;
        if($_cuadro->c1 != null && $_cuadro->b2 != null && $_cuadro->a3 != null && $_cuadro->c1 == $_cuadro->b2 && $_cuadro->b2 == $_cuadro->a3)
            return true;
        return false;
    }
    
    
    public function PrimaryCall($_cuadro, $letter){
        $n = $this->emptySlotsCount($_cuadro);
        $jugadas = array(null, null, null, null, null, null, null, null, null);
        $jugadaGanadora = new posicionNivel();
        $jugadaGanadora->nivel = 10;
        $jugadaGanadora->posicion = 0;
        for($x = 0; $x < $n; $x++){ // jugadas de o inicial (horizontal)
            for($y = 0; $y < $n; $y++){ // jugadas de x y o para hacer analisis (vertical)
                $reachLimit = -1;
                $_cuadro = $this->playOnEmptySlot($_cuadro, $letter);
        
                $jugada = new jugada();
                $jugada->cuadro = $_cuadro;
                $jugada->letra = $playingLetter;
                
                $jugadas[$y] = $jugada;
                
                if($this->isWinner($_cuadro) && $letter == 'o'){
                    if($y < $jugadaGanadora->nivel && $x != $jugadaGanadora->posicion){
                        $jugadaGanadora->nivel = $y;
                        $jugadaGanadora->posicion = $x;
                    }
                }
                else if($this->isWinner($_cuadro) && $letter == 'x'){
                    $reachLimit = 1;
                }
                else if($this->emptySlotsCount($_cuadro) == 0){
                    $reachLimit = 2;
                }
                else {
                    $letter = switchLetter($letter);
                }
                
                if($reachLimit > 0) {
                    $y = $y - $reachLimit;
                    $_cuadro = moveToNextSlot($jugadas[$y]->cuadro, $jugadas[$y]->letra);
                    $letter = switchLetter($jugadas[$y]->letra);
                }
            }
        }
    }
    
    private function switchLetter($letter){
        return $letter == 'x' ? 'o' : 'x';
    }
    
    private function moveToNextSlot($_cuadro, $letter){
        
    }
    
    public $counter = 0;
    public function pruebaRecursive($contador){
        $counter = $contador;
        if($contador > 0){
            echo '&nbsp;' . $contador . '<br>';
            $this->pruebaRecursive($contador - 1);
            echo '-' . $counter . '<br>';
        }
        else {
            echo '&nbsp;' . $contador . ' - fin' . '<br>';
        }
            
    }
    private function playOnEmptySlot($_cuadro, $letter){
        if($_cuadro->a1 == null){
            $_cuadro->a1 = $letter;
            $jugadaPosicion = "a1";
        }
        if($_cuadro->a2 == null){
            $_cuadro->a2 = $letter;
            $jugadaPosicion = "a2";
        }
        if($_cuadro->a3 == null){
            $_cuadro->a3 = $letter;
            $jugadaPosicion = "a3";
        }
        if($_cuadro->b1 == null){
            $_cuadro->b1 = $letter;
            $jugadaPosicion = "b1";
        }
        if($_cuadro->b2 == null){
            $_cuadro->b2 = $letter;
            $jugadaPosicion = "b2";
        }
        if($_cuadro->b3 == null){
            $_cuadro->b3 = $letter;
            $jugadaPosicion = "b3";
        }
        if($_cuadro->c1 == null){
            $_cuadro->c1 = $letter;
            $jugadaPosicion = "c1";
        }
        if($_cuadro->c2 == null){
            $_cuadro->c2 = $letter;
            $jugadaPosicion = "c2";
        }
        if($_cuadro->c3 == null){
            $_cuadro->c3 = $letter;
            $jugadaPosicion = "c3";
        }
            
        return $_cuadro;
    }

    private function emptySlotsCount($_cuadro){
        $count = 0;
        if($_cuadro->a1 != null)
            $count += 1;
        if($_cuadro->a2 != null)
            $count += 1;
        if($_cuadro->a3 != null)
            $count += 1;
        if($_cuadro->b1 != null)
            $count += 1;
        if($_cuadro->b2 != null)
            $count += 1;
        if($_cuadro->b3 != null)
            $count += 1;
        if($_cuadro->c1 != null)
            $count += 1;
        if($_cuadro->c2 != null)
            $count += 1;
        if($_cuadro->c3 != null)
            $count += 1;
            
        return $count;
    }
}

?>