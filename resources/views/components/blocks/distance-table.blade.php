@props([
  'columns' => [],
  'rows' => [],
])
<table class="w-full text-[18px] md:text-[22px] font-bold max-w-6xl [&_td]:px-20 [&_th]:px-20 [&_td]:py-10 [&_th]:py-10">
  <thead>
    <tr class="bg-cocoa text-blush">
      <th class="text-left">{{ $columns[0] }}</th>
      <th class="text-right w-120 md:w-240">{{ $columns[1] }}</th>
      <th class="text-right w-120 md:w-240">{{ $columns[2] }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($rows as $row)
      <tr class="border-b border-cocoa">
        <td>{{ $row[0] }}</td>
        <td class="text-right">{{ $row[1] }}</td>
        <td class="text-right">{{ $row[2] }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
