<?php
// URL generieren
$url = 'http://www.gold.de/tools/chart/s/' . $edelmetall . '_' . $zeitraum . '_' . $waehrung . '.jpg';
// URL-Titel für Bild generieren
switch ($edelmetall) {
    case "goldkurs":
        $url_title = "Goldkurs";
        break;
    case "silberkurs":
        $url_title = "Silberkurs";
        break;
}
switch ($waehrung) {
    case "euro":
        $url_title .= " in Euro EUR, ";
        break;
    case "usd":
        $url_title .= " in Dollar USD, ";
        break;
}
switch ($zeitraum) {
    case "24stunden":
        $url_title .= "24 Stunden";
        break;
    case "1monat":
        $url_title .= "1 Monat";
        break;
    case "6monate":
        $url_title .= "6 Monate";
        break;
    case "1jahr":
        $url_title .= "1 Jahr";
        break;
    case "5jahre":
        $url_title .= "5 Jahre";
        break;
    case "10jahre":
        $url_title .= "10 Jahre";
        break;
}
// URL und Titel ändern, bei 10 Jahre
if ($edelmetall == "goldkurs" and $waehrung == "euro" and $zeitraum == "10jahre") {
    $url = "http://www.gold.de/tools/chart/s/goldpreisentwicklung-historisch_euro.jpg";
    $url_title = "Historischer Goldkurs in Euro EUR";
}
if ($edelmetall == "goldkurs" and $waehrung == "usd" and $zeitraum == "10jahre") {
    $url = "http://www.gold.de/tools/chart/s/goldpreisentwicklung-historisch_usd.jpg";
    $url_title = "Historischer Goldkurs in Dollar USD";
}
if ($edelmetall == "silberkurs" and $waehrung == "euro" and $zeitraum == "10jahre") {
    $url = "http://www.gold.de/tools/chart/s/silberpreisentwicklung-historisch_euro.jpg";
    $url_title = "Historischer Silberkurs in Euro EUR";
}
if ($edelmetall == "silberkurs" and $waehrung == "usd" and $zeitraum == "10jahre") {
    $url = "http://www.gold.de/tools/chart/s/silberpreisentwicklung-historisch_usd.jpg";
    $url_title = "Historischer Silberkurs in Dollar USD";
}
?>

<p><a href="<?php echo get_option('wp_gold_backlinkurl'); ?>" title="<?php echo get_option('wp_gold_backlinktext'); ?>" target="_blank"><img src="<?php echo $url; ?>" title="<?php echo $url_title; ?>" width="172" height="114" border="0" /></a></p>