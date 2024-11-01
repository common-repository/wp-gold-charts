<p>
  <label for="<?php echo $this->get_field_id('title'); ?>">Titel:
    <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id('gold_edelmetall'); ?>">Edelmetall:
    <select name="<?php echo $this->get_field_name('gold_edelmetall'); ?>" id="<?php echo $this->get_field_id('gold_edelmetall'); ?>">
      <option value="goldkurs" <?php if ($edelmetall == "goldkurs") { echo('selected="selected"'); }?>>Gold</option>
      <option value="silberkurs" <?php if ($edelmetall == "silberkurs") { echo('selected="selected"'); }?>>Silber</option>
    </select>
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id('gold_waehrung'); ?>">W&auml;hrung:
    <select name="<?php echo $this->get_field_name('gold_waehrung'); ?>" id="<?php echo $this->get_field_id('gold_waehrung'); ?>">
      <option value="euro" <?php if ($waehrung == "euro") { echo('selected="selected"'); }?>>EUR</option>
      <option value="usd" <?php if ($waehrung == "usd") { echo('selected="selected"'); }?>>USD</option>
    </select>
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id('gold_zeitraum'); ?>">Zeitraum:
    <select name="<?php echo $this->get_field_name('gold_zeitraum'); ?>" id="<?php echo $this->get_field_id('gold_zeitraum'); ?>">
      <option value="24stunden" <?php if ($zeitraum == "24stunden") { echo('selected="selected"'); }?>>24 Stunden</option>
      <option value="1monat" <?php if ($zeitraum == "1monat") { echo('selected="selected"'); }?>>1 Monat</option>
      <option value="6monate" <?php if ($zeitraum == "6monate") { echo('selected="selected"'); }?>>6 Monate</option>
      <option value="1jahr" <?php if ($zeitraum == "1jahr") { echo('selected="selected"'); }?>>1 Jahr</option>
      <option value="5jahre" <?php if ($zeitraum == "5jahre") { echo('selected="selected"'); }?>>5 Jahre</option>
      <option value="10jahre" <?php if ($zeitraum == "10jahre") { echo('selected="selected"'); }?>>10 Jahre</option>
    </select>
  </label>
</p>
