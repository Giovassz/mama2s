<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-transparent border-2 border-[#FFC107] text-[#FFC107] font-semibold rounded-xl hover:bg-[#FFC107] hover:text-black active:scale-95 focus:outline-none focus:ring-2 focus:ring-[#FFC107] focus:ring-offset-2 focus:ring-offset-[#0B0B0B] disabled:opacity-25 transition-all duration-300']) }}>
    {{ $slot }}
</button>
