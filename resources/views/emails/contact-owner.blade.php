@php
  $rows = [
    'Vorname' => $data['firstname'] ?? '',
    'Name' => $data['name'] ?? '',
    'Strasse/Nr.' => $data['street_number'] ?? '',
    'PLZ/Ort' => $data['location'] ?? '',
    'E-Mail' => $data['email'] ?? '',
    'Telefon' => $data['phone'] ?? '',
    'Nachricht' => $data['message'] ?? '',
  ];
@endphp
<!DOCTYPE html>
<html lang="de">
<head><meta charset="utf-8"></head>
<body style="font-family: Arial, Helvetica, sans-serif; color: #48261D; font-size: 15px; line-height: 1.5;">

  <p>Neue Anfrage über das Kontaktformular auf shift-altstetten.ch:</p>

  <table cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
    @foreach($rows as $label => $value)
      @if($value !== '' && $value !== null)
        <tr>
          <td style="padding: 4px 20px 4px 0; vertical-align: top; font-weight: bold; white-space: nowrap;">{{ $label }}</td>
          <td style="padding: 4px 0; vertical-align: top;">{!! nl2br(e($value)) !!}</td>
        </tr>
      @endif
    @endforeach
  </table>

</body>
</html>
