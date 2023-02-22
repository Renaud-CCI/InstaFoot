<?php
function dateDiff($date1, $date2){
            $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
            $retour = array();
        
            $tmp = $diff;
            $retour['second'] = $tmp % 60;
        
            $tmp = floor( ($tmp - $retour['second']) /60 );
            $retour['minute'] = $tmp % 60;
        
            $tmp = floor( ($tmp - $retour['minute'])/60 );
            $retour['hour'] = $tmp % 24;
        
            $tmp = floor( ($tmp - $retour['hour'])  /24 );
            $retour['day'] = $tmp;
            
            if ($retour['day'] > 0){
                return sprintf('%02d jours, %02d heures, %02d minutes et %02d secondes', $retour['day'], $retour['hour'], $retour['minute'], $retour['second']);
            } else if ($retour['hour'] > 0){
                return sprintf('%02d heures, %02d minutes et %02d secondes', $retour['hour'], $retour['minute'], $retour['second']);
            } else if ($retour['minute'] > 0){
                return sprintf('%02d minutes et %02d secondes', $retour['minute'], $retour['second']);
            } else {
                return sprintf('%02d secondes', $retour['second']);
            }
            
        } 
?>