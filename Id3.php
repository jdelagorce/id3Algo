<?php
class Id3 {

  private $data;
  private $tree = array();

  public function Id3($data = null) {
    if(isset($data)) {
      $this->generate($data);
    }
  }

  public function generate($data) {
    $this->data = $data;
    $attr = array();
    foreach($data as $dataLine) {
      foreach($dataLine as $k => $d) {
        if(!in_array($k, $attr)) {
          $attr[] = $k;
        }
      }
    }
    $this->tree = $this->id3Algorithm($this->data, null, $attr);
  }

  private function id3Algorithm($exemples, $targetAttribute, $attributes) {
    if(empty($exemples)) { // Si "$exemples" est vide
      return array('value' => 'Erreur');
    }
    elseif(count($attributes) == 1) { // Si "$attributes" est seul
      $attr = array_values($attributes)[0];
      return array($attr => reset($exemples)[$attr]);
    }
    else {
      if(isset($targetAttribute)) {
        $nbSim = 0;
        foreach($exemples as $exemple) {
          if(reset($exemples)[$targetAttribute] == $exemple[$targetAttribute]) {
            $nbSim++;
          }
        }
        if($nbSim == count($exemples)) { // Si tous les exemples ont la même valeur pour "$targetAttribute"
          echo 'Insertion : '.reset($exemples)[$targetAttribute].'<br>';
          return array($targetAttribute => reset($exemples)[$targetAttribute]);
        }
      }
    }
    $entropy = array();
    if(!isset($targetAttribute)) {
      foreach($attributes as $attribute) {
        $entropy[$attribute] = $this->entropy($this->subset($exemples, $attribute));
        echo 'Entropy '.$attribute.' : '.$entropy[$attribute].'<br>';
      }
      $targetAttribute = array_search(max($entropy), $entropy);
    }
    echo 'Selection du set : '.$targetAttribute.' (E = '.$this->entropy($this->subset($exemples, $targetAttribute)).')<br>';
    $gain = array();
    foreach($attributes as $attribute) {
      if($attribute != $targetAttribute) {
        $gain[$attribute] = $this->gain($this->subset($exemples, $attribute), $targetAttribute, $exemples);
        echo 'Gain '.$targetAttribute.' ('.$attribute.') : '.$gain[$attribute].'<br>';
      }
    }
    $attrMaxGain = array_search(max($gain), $gain);
    echo 'Selection de l\'attribut : '.$attrMaxGain.' (G = '.$gain[$attrMaxGain].')<br>';
    echo '<ul>';
      foreach($this->valuesOfAttribute($exemples, $attrMaxGain) as $val) {
        echo '<li>'.$val.'</li>';
      }
    echo '</ul>';
    $branch = array();
    foreach($this->valuesOfAttribute($exemples, $attrMaxGain) as $val) {
      $newExemples = $exemples;
      foreach($exemples as $k => $dataLine) {
        if($newExemples[$k][$attrMaxGain] != $val) {
          unset($newExemples[$k]);
        }
        else {
          unset($newExemples[$k][$attrMaxGain]);
        }
      }
      $newAttributes = $attributes;
      array_splice($newAttributes, array_search($attrMaxGain, $attributes), 1);
      echo '<h3>Traitement valeur : '.$val.'</h3>';
      echo '<hr>';
      $branch[$attrMaxGain][$val] = $this->id3Algorithm($newExemples, $targetAttribute, $newAttributes);
    }
    return $branch;
  }

  public function subset($data, $attr) {
    $sub = array();
    foreach($data as $lineData) {
      $sub[] = $lineData[$attr];
    }
    return $sub;
  }

  public function valuesOfAttribute($data, $attr) {
    $values = array();
    foreach($data as $dataLine) {
      if(isset($dataLine[$attr])) {
        if(!in_array($dataLine[$attr], $values)) {
          $values[] = $dataLine[$attr];
        }
      }
    }
    return $values;
  }

  public function entropy($set) {
    $freq = array();
    $e = 0;
    $c = count($set);
    foreach($set as $dataLine) {
      if(!isset($freq[$dataLine])) {
        $freq[$dataLine] = 0;
      }
      $freq[$dataLine]++;
    }
    foreach($freq as $value) {
      $e += -($value/$c)*log($value/$c, 2);
    }
    return $e;
  }

  public function gain($set, $attr, $data) {
    $g = 0;
    $g += $this->entropy($set);
    foreach($this->valuesOfAttribute($data, $attr) as $value) {
      $entropySet = array();
      foreach($data as $k => $lineData) {
        if(isset($set[$k]) && $lineData[$attr] == $value) {
          $entropySet[] = $set[$k];
        }
      }
      $g -= count($entropySet) / count($data) * $this->entropy($entropySet);
    }
    return $g;
  }

  private function displayArrayRecursive($val) {
    if(is_array($val)) {
      foreach($val as $k => $inner) {
        echo '<li>';
        echo $k;
        echo '<ul>';
        $this->displayArrayRecursive($inner);
        echo '</ul>';
        echo '</li>';
      }
    }
    else {
      echo '<li>'.$val.'</li>';
    }
  }

  public function displayTree() {
    echo '<ul>';
    $this->displayArrayRecursive($this->tree);
    echo '</ul>';
  }
}
