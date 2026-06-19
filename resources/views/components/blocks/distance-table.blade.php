@props([
  'columns' => [],
  'rows' => [],
])
<table class="w-full text-[18px] md:text-[22px] font-bold max-w-6xl [&_td]:px-20 [&_th]:px-20 [&_td]:py-10 [&_th]:py-10">
  <thead>
    <tr class="bg-cocoa text-blush">
      <th class="text-left">{{ $columns[0] }}</th>
      <th class="text-right whitespace-nowrap md:w-160">{{ $columns[1] }}</th>
      <th class="text-right whitespace-nowrap md:w-160">{{ $columns[2] }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($rows as $row)
      <tr class="border-b border-cocoa">
        <td class="hyphens-auto md:whitespace-nowrap">{{ $row[0] }}</td>
        <td class="text-right whitespace-nowrap">{{ $row[1] }}</td>
        <td class="text-right whitespace-nowrap">{{ $row[2] }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
