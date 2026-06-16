@props([
  'label',
  'filterType',
  'options',
  'selected' => null
])
<div>
  <div class="text-abyss font-sans-bold font-bold uppercase mb-4 lg:mb-8">
    {{ $label }}
  </div>
  <div class="text-abyss">
    <select 
      class="js-filter-attribute appearance-none bg-[url(../icons/chevron-down.svg)] bg-[length:15px_auto] bg-[right_8px_top_14px] bg-no-repeat !border-abyss focus:border-abyss !outline-none !ring-0 text-abyss uppercase w-full px-8 pt-4 pb-6" 
      data-filterType="{{ $filterType }}" 
      aria-label="{{ $label }}">
      @foreach($options as $value => $text)
        <option value="{{ $value }}" @selected($value === $selected)>
          {{ $text }}
        </option>
      @endforeach
    </select>
  </div>
</div>