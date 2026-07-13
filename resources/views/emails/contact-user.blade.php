<!DOCTYPE html>
<html lang="de">
<head><meta charset="utf-8"></head>
<body style="font-family: Arial, Helvetica, sans-serif; color: #48261D; font-size: 15px; line-height: 1.5;">

  <p>Guten Tag {{ trim(($data['firstname'] ?? '') . ' ' . ($data['name'] ?? '')) }}</p>

  <p>Vielen Dank für Ihre Anfrage. Wir haben Ihre Nachricht erhalten und melden uns baldmöglichst bei Ihnen.</p>

  <p>Freundliche Grüsse<br>
  Ihr Team von SHIFT Altstetten</p>

  <p style="margin-top: 24px; color: #48261D;">
    Cavegn Immobilien AG<br>
    <a href="mailto:shift@cavegn-immobilien.ch" style="color: #48261D;">shift@cavegn-immobilien.ch</a><br>
    +41 43 537 33 53
  </p>

</body>
</html>
