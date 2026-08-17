@props(['priority'])

<div @class([
    'card',
    'highlight-high' => $priority === 'high',
    'highlight-medium' => $priority === 'medium',
    'highlight-low' => $priority === 'low',
])>
    {{ $slot }}
    <a {{ $attributes }} class="btn">View Details</a>
</div>