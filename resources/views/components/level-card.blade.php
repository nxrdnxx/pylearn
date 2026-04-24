<div class="level-card {{ $status }}" onclick="location.href='{{ $link }}'">
    <div style="display:flex;gap:16px">
        <div class="level-number {{ $numberClass }}">
            {{ $level }}
        </div>

        <div style="flex:1">
            <div style="display:flex;gap:8px">
                <span>{{ $title }}</span>
                <span class="badge">{{ $badge }}</span>
            </div>
            <p>{{ $desc }}</p>
        </div>
    </div>
</div>