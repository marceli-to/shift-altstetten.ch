@props([
  'columns' => [],
  'rows' => [],
])
<table class="w-full text-[16px] md:text-[18px]">
  <thead>
    <tr class="bg-cocoa text-blush">
      <th class="font-normal text-left py-12 px-16 md:px-20">{{ $columns[0] }}</th>
      <th class="font-normal text-right py-12 px-16 md:px-20 w-90 md:w-160">{{ $columns[1] }}</th>
      <th class="font-normal text-right py-12 px-16 md:px-20 w-90 md:w-160">{{ $columns[2] }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($rows as $row)
      <tr class="border-b border-cocoa/15">
        <td class="font-bold py-12 px-16 md:px-20">{{ $row[0] }}</td>
        <td class="text-right py-12 px-16 md:px-20">{{ $row[1] }}</td>
        <td class="text-right py-12 px-16 md:px-20">{{ $row[2] }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
