<?php

  // Cesar cipher Type 1
  if ($enckey==0 || is_null($enckey)) {
    echo "<div class=\"alert alert-danger\">\n";
    echo "<strong>$l_alert!</strong> $l_noksent\n";
    echo "</div>\n";
  } else {
    if ($phrase == "" or is_null($phrase)) {
      echo "<div class=\"alert alert-danger\">\n";
      echo "<strong>$l_alert!</strong> $l_nopsent\n";
      echo "</div>\n";
    } else {
      echo "<div class=\"table-responsive\">\n";
      echo "<table class=\"table table-sm\">\n";
      echo "<tr>\n";
      echo " <td class=\"table-dark text-right\">$l_type:</td>\n";
      echo " <td>$l_caesar1 - K=$enckey</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo " <td class=\"table-dark text-right\">$l_alphabet:</td>\n";
      echo " <td><pre>";
      for ($i=65; $i<=90; $i++) {
        echo chr($i);
      }
      echo "</pre></td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo " <td class=\"table-dark text-right\">$l_newalphabet:</td>\n";
      echo " <td><pre>";
      for ($i=65; $i<=90; $i++) {
        $position=$i;
        if ($i>(90-$enckey)) { $position=($i+$enckey-(26+$enckey)); }
        $letter=$position+$enckey;
        echo chr($letter);
      }
      echo "</pre></td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo " <td class=\"bg-warning text-right\"><strong>$l_phrase:</strong></td>\n";
      echo " <td><pre>$phrase</pre></td>";
      echo "</tr>\n";
      echo "<tr>\n";
      echo " <td class=\"bg-success text-right\"><strong>$l_newphrase:</strong></td>\n";
      echo " <td><pre>";
      $counter=0;
      while ($counter < strlen($phrase)) {
        $position = ord($phrase[$counter]);
          if ($position >=65 and $position<=90) {
          if ($position > (90-$enckey)) {
            $position= $position+$enckey-(26);
          } else {
            $position = $position + $enckey;
          }
        }
        echo chr($position);
         $counter++;
      }
      echo "</pre></td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo " <td class=\"bg-danger text-right\"><strong>$l_inverted:</strong></td>\n";
      echo " <td><pre>";
      $counter=0;
      while ($counter < strlen($phrase)) {
        $position = ord($phrase[$counter]);
        if ($position >=65 and $position<=90) {
          if ($position < (65+$enckey)) {
            $position = $position - $enckey +26;
          } else {
            $position = $position - $enckey;
          }
        }
        echo chr($position);
        $counter++;
      }
      echo "</pre></td>\n";
      echo "</tr>\n";
      echo "</table>\n";
      echo "</div>\n";
    }
  }
  echo "<br /><br />";
  echo "<div class=\"text text-center\">\n";
  echo "<a href=\"$phpself\" class=\"btn btn-secondary\" role=\"button\">$l_goback</a>\n";
  echo "</div>";
