<div class="wrap" style="max-width:950 !improtant;">
  <h2>WP Gold Charts</h2>
  <div id="poststuff" class="ui-sortable meta-box-sortables">
    <div id="wp_gold_charts_1" class="postbox " >
      <div class="handlediv" title="Zum umschalten klicken"><br/>
      </div>
      <h3>Über das Plugin</h3>
      <div class="inside">
        <p>Mit WP Gold Charts lassen sich im Artikel/in der Seite oder alternativ in der Sidebar automatisch aktualisierte Charts von den Edelmetallen Gold und Silber anzeigen. Dabei k&ouml;nnen die W&auml;hrung (Euro oder USD), der Zeitraum (von 24h bis 10 Jahre) und die Gr&ouml;&szlig;e der einzelnen Charts konfiguriert werden.</p>
        <p>Sie haben zwei M&ouml;glichkeiten Charts anzuzeigen:</p>
        <ol>
          <li>Charts als Widgets</li>
          <li>Charts in den Artikel und Seiten</li>
        </ol>
        <br class="clear"/>
      </div>
    </div>
    <div id="wp_gold_charts_2" class="postbox " >
      <div class="handlediv" title="Zum umschalten klicken"><br/>
      </div>
      <h3>Charts als Widgets</h3>
      <div class="inside">
        <p>Unter dem Men&uuml;punkt Widgets  lassen sich beliebig viele Charts in die einzelnen Widget-Bereiche des Blogs ziehen. Der Titel, das Edelmetall, die W&auml;hrung und der Zeitraum lassen sich hierbei f&uuml;r jedes einzelne Widget individuell einstellen. So k&ouml;nnen beispielsweise in der Sidebar des Blogs zwei Gold-Charts angezeigt werden: eines mit einem Zeitraum von 24 Stunden, das Andere mit einem Zeitraum von 1 Jahr.</p>
        <br class="clear"/>
      </div>
    </div>
    <div id="wp_gold_charts_3" class="postbox " >
      <div class="handlediv" title="Zum umschalten klicken"><br/>
      </div>
      <h3>Charts in den Artikel und Seiten</h3>
      <div class="inside">
        <p>Unter Einstellungen die gew&uuml;nschte Konfiguration vornehmen und anschlie&szlig;end den Button Shortcode bet&auml;tigen. Entspricht die Vorschau den Vorstellungen, wird den erzeugten Shortcode unter Erzeugter Shortcode herauskopieren und an die gew&uuml;nschte Stelle des Artikels/der Seite kopieren. Hier erscheint das soeben erstellte Chart im Blog. Auf diese Art und Weise lassen sich ebenfalls beliebig viele Charts erzeugen und in die Artikel bzw. Seiten des Blog einf&uuml;gen.</p>
        <br class="clear"/>
      </div>
    </div>
    <div id="wp_gold_charts_4" class="postbox " >
      <div class="handlediv" title="Zum umschalten klicken"><br/>
      </div>
      <h3>Einstellungen</h3>
      <div class="inside">
        <p>
          <?php
if ($_POST["gold_submit"] == "1") {
    $edelmetall = $_POST["gold_edelmetall"];
    $waehrung = $_POST["gold_waehrung"];
    $zeitraum = $_POST["gold_zeitraum"];
    $groesse = $_POST["gold_groesse"];
} else {
    $edelmetall = "goldkurs";
    $waehrung = "euro";
    $zeitraum = "6monate";
    $groesse = "b";
}

?>
        <form action="#" method="post">
          <label for="gold_edelmetall">Edelmetall:
            <select name="gold_edelmetall" id="gold_edelmetall">
              <option value="goldkurs" <?php if ($edelmetall == "goldkurs") { echo('selected="selected"'); }?>>Gold</option>
              <option value="silberkurs" <?php if ($edelmetall == "silberkurs") { echo('selected="selected"'); }?>>Silber</option>
            </select>
          </label>
          <br />
          <label for="gold_waehrung">W&auml;hrung:
            <select name="gold_waehrung" id="gold_waehrung">
              <option value="euro" <?php if ($waehrung == "euro") { echo('selected="selected"'); }?>>EUR</option>
              <option value="usd" <?php if ($waehrung == "usd") { echo('selected="selected"'); }?>>USD</option>
            </select>
          </label>
          <br />
          <label for="gold_zeitraum">Zeitraum:
            <select name="gold_zeitraum" id="gold_zeitraum">
              <option value="24stunden" <?php if ($zeitraum == "24stunden") { echo('selected="selected"'); }?>>24 Stunden</option>
              <option value="1monat" <?php if ($zeitraum == "1monat") { echo('selected="selected"'); }?>>1 Monat</option>
              <option value="6monate" <?php if ($zeitraum == "6monate") { echo('selected="selected"'); }?>>6 Monate</option>
              <option value="1jahr" <?php if ($zeitraum == "1jahr") { echo('selected="selected"'); }?>>1 Jahr</option>
              <option value="5jahre" <?php if ($zeitraum == "5jahre") { echo('selected="selected"'); }?>>5 Jahre</option>
              <option value="10jahre" <?php if ($zeitraum == "10jahre") { echo('selected="selected"'); }?>>10 Jahre</option>
            </select>
          </label>
          <br />
          <label for="gold_groesse">Gr&ouml;&szlig;e:
            <select name="gold_groesse" id="gold_groesse">
              <option value="s" <?php if ($groesse == "s") { echo('selected="selected"'); }?>>klein</option>
              <option value="b" <?php if ($groesse == "b") { echo('selected="selected"'); }?>>gro&szlig;</option>
            </select>
          </label>
          <br />
          <input type="hidden" id="gold_submit" name="gold_submit" value="1" />
          <input type="submit" value="Shortcode erzeugen" />
        </form>
        </p>
        <br class="clear"/>
      </div>
    </div>
    <div id="wp_gold_charts_5" class="postbox " >
      <div class="handlediv" title="Zum umschalten klicken"><br/>
      </div>
      <h3>Vorschau</h3>
      <div class="inside">
        <?php
// URL generieren
$url = 'http://www.gold.de/tools/chart/' . $groesse . '/' . $edelmetall . '_' . $zeitraum . '_' . $waehrung . '.jpg'; 
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
    $url = "http://www.gold.de/tools/chart/" . $groesse . "/goldpreisentwicklung-historisch_euro.jpg";
    $url_title = "Historischer Goldkurs in Euro EUR";
}
if ($edelmetall == "goldkurs" and $waehrung == "usd" and $zeitraum == "10jahre") {
    $url = "http://www.gold.de/tools/chart/" . $groesse . "/goldpreisentwicklung-historisch_usd.jpg";
    $url_title = "Historischer Goldkurs in Dollar USD";
}
if ($edelmetall == "silberkurs" and $waehrung == "euro" and $zeitraum == "10jahre") {
    $url = "http://www.gold.de/tools/chart/" . $groesse . "/silberpreisentwicklung-historisch_euro.jpg";
    $url_title = "Historischer Silberkurs in Euro EUR";
}
if ($edelmetall == "silberkurs" and $waehrung == "usd" and $zeitraum == "10jahre") {
    $url = "http://www.gold.de/tools/chart/" . $groesse . "/silberpreisentwicklung-historisch_usd.jpg";
    $url_title = "Historischer Silberkurs in Dollar USD";
}

?>
        <p><a href="<?php echo get_option('wp_gold_backlinkurl'); ?>" title="<?php echo get_option('wp_gold_backlinktext'); ?>" target="_blank"><img src="<?php echo $url; ?>" title="<?php echo $url_title; ?>"  <?php if ( $groesse == "s" ) { echo ('width="172" height="114"'); } else { echo ('width="430" height="265"'); } ?> border="0" /></a></p>
        <br class="clear"/>
      </div>
    </div>
    <div id="wp_gold_charts_6" class="postbox " >
      <div class="handlediv" title="Zum umschalten klicken"><br/>
      </div>
      <h3>Erzeugter Shortcode</h3>
      <div class="inside">
        <p>Kopieren Sie folgenden Shortcode in Ihre Seite/Artikel:</p>
        <p><code><?php echo('[gold-charts edelmetall="'.$edelmetall.'" waehrung="'.$waehrung.'" zeitraum="'.$zeitraum.'" groesse="'.$groesse.'"]'); ?></code></p>
        <br class="clear"/>
      </div>
    </div>
  </div>
</div>
