@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-[#10B981] bg-[#10B981]/10 border border-[#10B981]/30 rounded-lg px-4 py-3']) }}>
        {{ $status }}
    </div>
@endif
