<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-[#FFC107] text-black font-semibold rounded-xl hover:bg-[#FFB703] hover:shadow-lg hover:shadow-[#FFC107]/20 active:scale-95 focus:outline-none focus:ring-2 focus:ring-[#FFC107] focus:ring-offset-2 focus:ring-offset-[#0B0B0B] transition-all duration-300']) }}>
    {{ $slot }}
</button>
