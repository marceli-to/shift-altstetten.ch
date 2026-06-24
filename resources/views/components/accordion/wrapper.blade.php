<div
  x-data="{ active: null }"
  @click.outside="active = null"
  {{ $attributes->class('border-t border-b border-cocoa/20 divide-y divide-cocoa/20') }}>
  {{ $slot }}
</div>
