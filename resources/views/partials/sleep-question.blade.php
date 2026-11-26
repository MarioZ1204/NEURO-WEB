<div style="margin-bottom:22px; padding-bottom:18px; {{ !$last ? 'border-bottom:1px solid #f0f4f3;' : '' }}">
    <p class="quiz-q">{{ $n }}. {{ $pregunta }}</p>
    <div class="scale-opts">
        @foreach([0=>'Nunca', 1=>'Poca probabilidad', 2=>'Moderada', 3=>'Alta probabilidad'] as $val => $lbl)
            <input type="radio" name="q{{ $n }}" id="q{{ $n }}_{{ $val }}" value="{{ $val }}" required>
            <label for="q{{ $n }}_{{ $val }}">
                <span class="opt-num">{{ $val }}</span>
                <span class="opt-label">{{ $lbl }}</span>
            </label>
        @endforeach
    </div>
</div>