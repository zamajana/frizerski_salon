<?php
if (!$baza=mysqli_connect("localhost", "root", "")) {
    die ("<b>Spajanje na mysql server neuspešno.</b>");
}
if (!mysqli_select_db($baza, "zakaz")) {
    die ("<b>Greška pri odabiru baze</b>");
}
